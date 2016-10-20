<?php
namespace AppBundle\Security;

use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use FOS\UserBundle\Security\UserProvider;

class ApiKeyUserProvider extends UserProvider
{

    public function __construct(UserManagerInterface $userManager) {
        parent::__construct($userManager);
    }

    public function getUsernameForApiKey( $apiKey )
    {
        $user = $this->userManager->findUserBy( array( 'apiKey' => $apiKey ) );

        return $user !== null ? $user->getUsername() : null;
    }

    public function refreshUser( UserInterface $user )
    {
        // Do not store key in the session
        throw new UnsupportedUserException();
    }

}
