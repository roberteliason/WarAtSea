<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Unit;
use Pardalis\WaSUnitBundle\Entity\Alliance;
use Pardalis\WaSUnitBundle\Entity\Nation;


class NationController extends Controller
{
	public function indexAction() {
		$alliances = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Alliance')
			->findAll();

		return $this->render('PardalisWaSUnitBundle:Nation:index.html.twig', array( 'alliances' => $alliances ) );

	}
}