<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of SiteController
 *
 * @author hugues
 */
class SiteController extends Controller {
    
    
///////////////////////// View User
/**
 * @Route("/",name="home")
 * @Template(":site:index.html.twig")
 */
 public function homeSite(){
     
 }
 
 /**
 * @Route("/annoncePhoto",name="photo")
 * @Template(":site:annoncePhoto.html.twig")
 */
 public function annoncePhoto (){
     
 }
 
 /**
 * @Route("/annonceEvenement",name="evenement")
 * @Template(":site:annonceEvenement.html.twig")
 */
 public function annonceEvenement (){
     
 }
 
 /**
 * @Route("/login",name="login")
 * @Template(":site:login.html.twig")
 */
 public function login (){
     
 }
  
}
