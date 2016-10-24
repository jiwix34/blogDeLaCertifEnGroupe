<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Description of LoginController
 *
 * @author hugues
 */
class LoginController extends Controller {
    
    /**
     * @Route("/loginCheck",name="loginCheck")
     * @throws Exception
     */
    public function check() {
        throw new Exception('Verifiez votre fichier security');
    }
    /**
     * idem déconnexion
     * @Route("/loginOut",name="loginOut")
     * @throws Exception
     */
    public function logout() {
        throw new Exception('Verifiez votre fichier security');
    }
    /**
     * @Route("/add",name="add")
     * @throws Exception
     */
    public function add() {
        $u = new User();
        $u->setName("admin");
        $u->setPass("admin");
        $u->setRoles(array("ROLE_ADMIN"));
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($u);
        $em->flush();
        
        return $this->redirectToRoute("home");
    }
}
