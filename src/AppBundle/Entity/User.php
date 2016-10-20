<?php
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * var string
     * @ORM\Column(type="string", length=255)
     */
    private $apiKey;

    /**
     * var Email
     * @ORM\OneToMany(targetEntity="Email", mappedBy="user")
     */
    private $emails;


    public function __construct()
    {

        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {

        return $this->apiKey;
    }

    /**
     * @param mixed $apiKey
     */
    public function setApiKey( $apiKey )
    {

        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getEmails()
    {

        return $this->emails;
    }

    /**
     * @param mixed $emails
     */
    public function setEmails( $emails )
    {

        $this->emails = $emails;
    }


}