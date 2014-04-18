<?php
/**
 * @author DUBUFFET Thibault <dubuffet.thibault@gmail.com>
 * @package Odysseus\Bundle\UserBundle\Controller
 * @version 1
 */

/**
 * Controller sur les actions du back
 * 
 */
namespace Odysseus\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class BackController extends Controller
{
    /**
     * Action sur l'authentification au back d'administration
     * 
     * @return Odysseus\Bundle\UserBundle\Controller\DefaultController
     */
    public function loginAction()
    {
        
        $connect = (bool) $this->getRequest()->get('connect', false);
        
        // Tentative de connexion
        if ($connect) {
            
            $mail       = $this->getRequest()->get('mail', null);
            $password   = $this->getRequest()->get('password', null);
            
            //Champs vides
            if ($mail == null || $password == null) {
                $error = $translated = $this->get('translator')->trans('login.form_empty');
            }
            
            //Pas d'erreur, on cherche l'utilisateur
            if (!isset($error)) {
               
                $repoUser = $this->getDoctrine()->getManager()->getRepository('Odysseus\Entity\User');
                
                $user = $repoUser->findOneBy(array('mail' => $mail));
                
                if ($user === null) {
                    $error = $translated = $this->get('translator')->trans('login.not_result');
                } else {
                    
                    $passwordForm = md5($password . $user->getSalt());
                    
                    if ($passwordForm === $user->getPassword()) {
                        
                        $securityContext = $this->get('security.context');
                        $token = new UsernamePasswordToken(
                            $user->getMail(),
                            $user->getPassword(),
                            $user->getToken(),
                            array('ROLE_ADMIN')
                        );
                        
                        $securityContext->setToken($token);
                        $this->getRequest()->getSession()->set('_security_secured_area', serialize($token));
                        
                    } else {
                        $error = $translated = $this->get('translator')->trans('login.password_invalid');
                    }
                    
                }
            }
            
            //Erreur, on l'affiche
            if (isset($error)) {
                $this->get('session')->getFlashBag()->add('notice', $error);
            }
            
            
        }
            
        return $this->render('OdysseusUserBundle:back:login.html.twig');
    }
}
