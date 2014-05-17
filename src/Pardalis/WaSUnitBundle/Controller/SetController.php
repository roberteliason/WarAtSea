<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\ReleaseSet;
use Pardalis\WaSUnitBundle\Entity\Unit;

class SetController extends Controller
{
	public function indexAction() {
		$releasesets = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:ReleaseSet')
			->findAll();

		return $this->render('PardalisWaSUnitBundle:Set:index.html.twig', array( 'releasesets' => $releasesets ) );

	}
}