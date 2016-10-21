<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Doctrine\ORM\Query\ResultSetMappingBuilder;
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
     
     $em = $this->getDoctrine();
        $photos = $em->getRepository("AppBundle:Photos")->findBy(array('publier' => '1'));
      
      return array ('annoncePhotos' => $photos);
 }
 
 /**
 * @Route("/annonceEvenement",name="evenement")
 * @Template(":site:annonceEvenement.html.twig")
 */
 public function annonceEvenement (){
     
        $em = $this->getDoctrine();
        $event = $em->getRepository("AppBundle:Evenements")->findBy(array('publier' => '1'));
        return array("annonceEvent" => $event);
      
 }
 
 /**
 * @Route("/login",name="login")
 * @Template(":site:login.html.twig")
 */
 public function login (){
     
 }
  
}
