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
    /**
 * @Route("/")
 * @Template(":site:index.html.twig")
 */
 public function HomeSite(){
     
 }
}
