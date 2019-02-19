<?php

namespace MyBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@My/Default/index.html.twig');
    }
    public function contactAction()
    {
        return $this->render('@My/Default/contact.html.twig');
    }

}
