<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Evenements;
use AppBundle\Entity\Photos;
use AppBundle\Form\EvenementsType;
use AppBundle\Form\PhotosType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of AdminController
 *
 * @author hugues
 */


class AdminController extends Controller {
    
 /**
 * @Route("/admin")
 * @Template(":admin:index.html.twig")
 */
    public function homeAdmin(){
        
    }
    
    /////////////////////////  CRUD Photo
    
    
    ///// Home admin Photo
  /**
   * @Route("/admin/photos", name="annoncePhotos")
   * @Template(":admin:photos.html.twig")
   */
    public function getPhotos(){
      $em = $this->getDoctrine()->getManager();
      $rsm = new ResultSetMappingBuilder($em);
      $rsm->addRootEntityFromClassMetadata('AppBundle:Photos', 'photos');
      $query = $em->createNativeQuery("select * from photos", $rsm);
      $photos = $query->getResult();
      
      return array ('annoncePhotos' => $photos);
      
    }
    ////// Ajout Photo Vue+Form
    /**
   * @Route("/admin/addphotos", name="formphotos")
   * @Template(":admin:addPhotos.html.twig")
   * @param Request $request
   */
    public function formPhotos(Request $request){
        $photos = new Photos();
        $f = $this->createForm(PhotosType::class, $photos);
        
        return array("formphotos"=> $f->createView());
        
    }
    ////// Ajout Photo Form Persist 
     /**
   * @Route("/admin/val", name="validphotos")
   */
    public function addPhotos(Request $request){
        $annonce = new Photos();
        $f = $this->createForm(PhotosType::class, $annonce);
        if ($request->getMethod() == 'POST'){
              $f->handleRequest($request);
//            $nomDuFichier = md5(uniqid()).".".$annonce->getPhoto()->getClientOriginalExtension();
//            $annonce->getPhoto()->move('uploads/img', $nomDuFichier);
//            $annonce->setPhoto($nomDuFichier);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($annonce);
            $em->flush();
            
            return $this->redirectToRoute('annoncePhotos');
        }
        
            return $this->redirectToRoute('formPhotos');
                           
    }
    
    /**
     * @Route("/admin/photos/brouillon", name="photoBrou");
     * @Template(":admin:brouillonPhoto.html.twig");
     */
    public function photoBrou() {
        $em = $this->getDoctrine();
        $photo = $em->getRepository("AppBundle:Photos")->findBy(array('publier' => '0'));
        return array("brouillonPhoto" => $photo);
    }
    
    
    /////////////////////////  CRUD Evénement
    
    ///// Home admin Evenements
    /**
   * @Route("/admin/event", name="annonceEvent")
   * @Template(":admin:evenements.html.twig")
   */
    public function getEvent(){
      $em = $this->getDoctrine()->getManager();
      $rsm = new ResultSetMappingBuilder($em);
      $rsm->addRootEntityFromClassMetadata('AppBundle:Evenements', 'evenements');
      $query = $em->createNativeQuery("select * from evenements ", $rsm);
      $event = $query->getResult();
      
      return array ('annonceEvent' => $event);
      
    }
    
    ////// Ajout Evenements Vue+Form
    /**
   * @Route("/admin/addEvenements", name="formAddEvent")
   * @Template(":admin:addEvenements.html.twig")
   * @param Request $request
   */
    public function formEvenements(Request $request){
        $event = new Evenements();
        $f = $this->createForm(EvenementsType::class, $event);
        
        return array("formEvent"=> $f->createView());    
    }
    
   ////// Ajout Evenements FormPersist  
   /**
   * @Route("/admin/event/val", name="valideEvent")
   */
    public function addEvent(Request $request){
        $event = new Evenements();
        $f = $this->createForm(EvenementsType::class, $event);
        if ($request->getMethod() == 'POST'){
              $f->handleRequest($request);
              
            $nomDuFichier = md5(uniqid()).".".$event->getPhoto()->getClientOriginalExtension();
            $event->getPhoto()->move('uploads/images', $nomDuFichier);
            $event->setPhoto($nomDuFichier);
              
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($event);
            $em->flush();
            
            return $this->redirectToRoute('annonceEvent');
        }
        
            return $this->redirectToRoute('formAddEvent');
    }
    
    ////// Supre Evenements  
     /**
     * @Route("/admin/event/supr/{id}", name="suprEvent")
     */
     public function suprEvent($id){
        $em = $this->getDoctrine()->getEntityManager();
        $recupId = $em->find("AppBundle:Evenements", $id);
        $em->remove($recupId);
        $em->flush();
        
        return $this->redirect($this->generateUrl('annonceEvent'));
    }
    
    ////// Modification Evenements Vue+Form
    /**
     * @Route("admin/event/edit/{id}",name="editEvent")
     * @Template(":admin:addEvenements.html.twig")
     */
    public function editEvent($id){
//        return array("formEvent" => $this->createForm(EvenementsType::class, $a)->createView(),'id'=>$id);
          $em = $this->getDoctrine()->getEntityManager();
          $event = $em->find('AppBundle:Evenements',$id);
          $f= $this->createForm(EvenementsType::class, $event);
        
          return array("formEvent"=> $f->createView(), "id"=>$id);
    }
   
    ////// Modification Evenements FormPersist
    /**
    * @Route("admin/event/update/{id}",name="modifEvent")
    * @Template(":admin:modifEvenements.html.twig")
    */
   public function  uptdateEvent(Request $request, $id){
       $em = $this->getDoctrine()->getEntityManager(); 
       $event = $em->find('AppBundle:Evenements',$id);
       $f= $this->createForm(EvenementsType::class, $event);
       
       if ($request->getMethod() == 'POST'){
       $f->handleRequest($request);
       
       $nomDuFichier = md5(uniqid()).".".$event->getPhoto()->getClientOriginalExtension();
            $event->getPhoto()->move('uploads/images', $nomDuFichier);
            $event->setPhoto($nomDuFichier);
       
       $em = merge($event);
       $em->flush();
       
       return $this->redirect($this->generateUrl('annonceEvent'));
        }
       
       }
    
    ////// Section Brouillon Evenements 
   /**
     * @Route("/admin/event/brouillon", name="eventBrou");
     * @Template(":admin:brouillonEvenements.html.twig");
     */
    public function brouilEvent() {
        $em = $this->getDoctrine();
        $event = $em->getRepository("AppBundle:Evenements")->findBy(array('publier' => '0'));
        return array("brouillonEvents" => $event);
    }
}
