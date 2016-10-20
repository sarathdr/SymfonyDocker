<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Email;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ApiController extends FOSRestController
{

    /**
     * @Route("/api/send", name="api_send_email")
     * @Method("POST")
     *
     */
    public function sendAction( Request $request )
    {

        $logger = $this->get( 'logger' );
        $jsonContent = $request->getContent();

        $logger->debug( "Raw json string: " . $jsonContent );

        if ( empty( $jsonContent ) ) {
            throw new BadRequestHttpException( "Invalid content body" );
        }

        $user = $this->getUser();
        $emailItems = new ArrayCollection( json_decode( $jsonContent, true ) );

        if ( $emailItems == null ) {
            throw new BadRequestHttpException( "Content is not a valid json" );
        }

        $em = $this->getDoctrine()->getManager();

        $count = 0;
        foreach ( $emailItems as $emailItem ) {

            $logger->debug( "Saving email" );

            $email = new Email();
            $email->setFromEmail( $emailItem['from'] );
            $email->setToEmail( $emailItem['to'] );
            $email->setSubject( $emailItem['subject'] );
            $email->setMessage( $emailItem['message'] );
            $email->setUser( $user );

            $logger->debug( "Sending email" );
            $this->sendEmail( $email );

            $em->persist( $email );
            $em->flush();

            $count++;

        }

        $message = $count . " - messages have been sent. Account username: " . $user->getUsername();
        $logger->info( $message );
        $view = $this->view( array( "message" => $message ), 200 );

        return $this->handleView( $view );

    }

    /**
     * Sends email and saves status
     * @param Email $email
     */
    private function sendEmail( Email $email )
    {

        $message = \Swift_Message::newInstance()
            ->setSubject( $email->getSubject() )
            ->setFrom( $email->getFromEmail() )
            ->setTo( $email->getToEmail() )
            ->setBody( $email->getMessage(), 'text/html' );

        if ( $this->get( 'mailer' )->send( $message ) ) {
            $email->setStatus( 'SUCCESS' );
        }
        else {
            $email->setStatus( 'FAILED' );
        }
    }
}