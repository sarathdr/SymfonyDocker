<?php
/**
 * Created by PhpStorm.
 * User: sarathdr
 * Date: 19/10/2016
 * Time: 00:56
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="emails")
 */
class Email
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="emails")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fromEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $toEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;


    /**
     * @ORM\Column(type="text")
     */
    private $message;


    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId( $id )
    {

        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {

        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser( $user )
    {

        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getToEmail()
    {

        return $this->toEmail;
    }

    /**
     * @param mixed $toEmail
     */
    public function setToEmail( $toEmail )
    {

        $this->toEmail = $toEmail;
    }

    /**
     * @return mixed
     */
    public function getFromEmail()
    {

        return $this->fromEmail;
    }

    /**
     * @param mixed $fromEmail
     */
    public function setFromEmail( $fromEmail )
    {

        $this->fromEmail = $fromEmail;
    }

  

    /**
     * @return mixed
     */
    public function getSubject()
    {

        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject( $subject )
    {

        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {

        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage( $message )
    {

        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {

        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus( $status )
    {

        $this->status = $status;
    }


}