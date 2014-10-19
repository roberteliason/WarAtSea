<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;

class NationController extends Controller
{
/*	public function indexAction() {
		$alliances = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Alliance')
			->findAll();

		return $this->render('PardalisWaSUnitBundle:Nation:index.html.twig', array( 'alliances' => $alliances ) );

	}*/


    public function indexAction() {
        $alliances = $this->GetDoctrine()
            ->getRepository('PardalisWaSUnitBundle:Alliance')
            ->getAlliancesWithNationsAndUnits();

        return $this->render('PardalisWaSUnitBundle:Nation:home.html.twig', array( 'alliances' => $alliances ));
    }
}