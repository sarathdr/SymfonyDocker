<?php
/**
 * Created by PhpStorm.
 * User: sarathdr
 * Date: 20/10/2016
 * Time: 22:38
 */

namespace UserBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProfileController extends Controller
{

    public function showAction( Request $request )
    {

        $user = $this->getUser();
        if ( !is_object( $user ) || !$user instanceof UserInterface ) {
            throw new AccessDeniedException( 'This user does not have access to this section.' );
        }

        // Get emails
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT e
             FROM AppBundle:Email e
             WHERE e.user = :user'
        )->setParameter( 'user', $user );

        $paginator = $this->get( 'knp_paginator' );
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt( 'page', 1 ),
            5
        );

        return $this->render( 'FOSUserBundle:Profile:show.html.twig', array(
            'user'       => $user,
            'pagination' => $pagination
        ) );
    }
}