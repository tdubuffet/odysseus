<?php

namespace Odysseus\UserBundle\Listener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

Class IsConnected
{
    /**
     * On vérifie si la personne est connecté 
     * sinon on le redirige sur le formulaire du back
     */
    public function onNotConnected()
    {
        $request = Request::createFromGlobals();
        
        /** Aucune connexion, on redirige 
         *  sur le formulaire de connexion
         */
        
        if ($request->getUser() === null) {
            
            $uri = $request->getPathInfo();
            
            if (preg_match('#^\/admin(.+)$#', $uri) && $uri !== '/admin/login') {
                
                $response = new RedirectResponse($request->getUriForPath('/admin/login'));
                $response->send(); // On envoie la redirection
            }
            
        }
    }
}