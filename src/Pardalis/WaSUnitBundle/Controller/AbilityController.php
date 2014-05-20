<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Ability;
use Pardalis\WaSUnitBundle\Entity\UnitType;


class AbilityController extends Controller
{
	public function indexAction()
	{
		$abilities = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Ability')
			->findAll();		

		return $this->render('PardalisWaSUnitBundle:Ability:index.html.twig', array( 'abilities' => $abilities ) );
	}

	public function byUnitTypeAction() {
		$unittypes = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:UnitType')
			->getTopLevelUnittypesWithAbilitiesAndUnits();		

		return $this->render('PardalisWaSUnitBundle:Ability:byunittype.html.twig', array( 'unittypes' => $unittypes ) );
	}
}