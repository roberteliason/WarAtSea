<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Attack;
use Pardalis\WaSUnitBundle\Entity\AttackType;
use Pardalis\WaSUnitBundle\Entity\Unit;

class AttackController extends Controller
{
	public function indexAction()
	{
		$attacktypes = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:AttackType')
			->findAll();		

		return $this->render('PardalisWaSUnitBundle:Attack:index.html.twig', array( 'attacktypes' => $attacktypes ) );
	}
}