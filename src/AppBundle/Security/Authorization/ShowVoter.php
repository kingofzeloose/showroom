<?php

namespace AppBundle\Security\Authorization;

use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

//------------------------------------------------------------------------------

use AppBundle\Entity\Show;

//------------------------------------------------------------------------------


class ShowVoter extends Voter
{
    public function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        // récupérer l'utilisateur connecté
        $user = $token->getUser();
        // récupérer le show
        $show = $subject;
        // Si $show->getAuthor() === $user return true
        if ($show->getAuthor() === $user)
            return true;
        // sinon, return false
        return false;
    }

    public function supports($attribute, $subject)
    {
        if ($subject instanceof Show) {
            return true;
        }

        return false;
    }
}