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
 * @Route("/annonce/photo",name="photo")
 * @Template(":site:annoncePhoto.html.twig")
 */
 public function annoncePhoto (){
     
     $em = $this->getDoctrine();
        $photos = $em->getRepository("AppBundle:Photos")->findBy(array('publier' => '1'));
      
      return array ('annoncePhotos' => $photos);
 }
 
 /**
 * @Route("/annonce/evenement",name="evenement")
 * @Template(":site:annonceEvenement.html.twig")
 */
 public function annonceEvenement (){
     
        $em = $this->getDoctrine();
        $event = $em->getRepository("AppBundle:Evenements")->findBy(array('publier' => '1'));
        return array("annonceEvent" => $event);
      
 }
  /**
 * @Route("/annonce/evenement/detail",name="detailevenement")
 * @Template(":site:detailEvenement.html.twig")
 */
 public function detailEvenement(){
     
        $em = $this->getDoctrine();
        $event = $em->getRepository("AppBundle:Evenements")->findBy(array('publier' => '1'));
        return array("annonceEvent" => $event);
 }
 /**
 * @Route("/annonce/photo/detail",name="detailphoto")
 * @Template(":site:detailPhoto.html.twig")
 */
 public function detailPhoto(){
      $em = $this->getDoctrine();
        $photos = $em->getRepository("AppBundle:Photos")->findBy(array('publier' => '1'));
      
      return array ('annoncePhotos' => $photos);
 }
 
 /**
 * @Route("/login",name="login")
 * @Template(":site:login.html.twig")
 */
 public function login (){
     
 }
  
}
