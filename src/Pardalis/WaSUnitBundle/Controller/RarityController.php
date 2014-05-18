<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Rarity;

class RarityController extends Controller
{
	public function indexAction()
	{
		$rarities = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Rarity')
			->findAll();		

		return $this->render('PardalisWaSUnitBundle:Rarity:index.html.twig', array( 'rarities' => $rarities ) );
	}
}