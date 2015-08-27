<?php

namespace iut\DumbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('iutDumbBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function additionAction($x, $y)
    {
		$result = $x + $y;
		return $this->render('iutDumbBundle:Default:resultat.html.twig', array('result' => $result));
	}
}
