<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Photos;
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
    
    
  /**
   * @Route("/admin/photos", name="annoncephotos")
   * @Template(":admin:photos.html.twig")
   */
    public function getPhotos(){
      $em = $this->getDoctrine()->getManager();
      $rsm = new ResultSetMappingBuilder($em);
      $rsm->addRootEntityFromClassMetadata('AppBundle:Photos', 'photos');
      $query = $em->createNativeQuery("select * from photos", $rsm);
      $photos = $query->getResult();
      
      return array ('annoncephotos' => $photos);
      
    }
    
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
            
            return $this->redirectToRoute('annoncephotos');
        }
        
            return $this->redirectToRoute('formphotos');
    }
}
