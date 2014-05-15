<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\SimpleXMLElement;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Unit;
use Pardalis\WaSUnitBundle\Entity\Alliance;
use Pardalis\WaSUnitBundle\Entity\Nation;


class UnitController extends Controller
{
	public function indexAction()
	{
		$units = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Unit')
			->findAll();

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => $units ) );
	}

	public function unitAction( $id )
	{
		$unit = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Unit')
			->findOneById( $id );

		// print( '<pre>' );
		// var_dump( $unit );
		// print( '</pre>' );		

		return $this->render('PardalisWaSUnitBundle:Unit:unit.html.twig', array( 'unit' => $unit ) );
	}

	public function abilitiesAction()
	{
		$abilities = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Ability')
			->findAll();		

		return $this->render('PardalisWaSUnitBundle:Ability:index.html.twig', array( 'abilities' => $abilities ) );
	}
}
