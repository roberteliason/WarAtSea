<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Nation;


class AbilityController extends Controller
{
	public function indexAction()
	{
		$abilities = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Ability')
			->findAll();		

		return $this->render('PardalisWaSUnitBundle:Ability:index.html.twig', array( 'abilities' => $abilities ) );
	}
}