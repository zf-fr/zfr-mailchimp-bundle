<?php

namespace ZFR\MailChimpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ZFRMailChimpBundle:Default:index.html.twig', array('name' => $name));
    }
}
