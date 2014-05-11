<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\SimpleXMLElement;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Unit;
use Pardalis\WaSUnitBundle\Entity\UnitType;
use Pardalis\WaSUnitBundle\Entity\Attack;
use Pardalis\WaSUnitBundle\Entity\AttackType;
use Pardalis\WaSUnitBundle\Entity\Ability;
use Pardalis\WaSUnitBundle\Entity\Alliance;
use Pardalis\WaSUnitBundle\Entity\Nation;
use Pardalis\WaSUnitBundle\Entity\ReleaseSet;
use Pardalis\WaSUnitBundle\Entity\Rarity;

class ImportController extends Controller
{

	/**
	 * Return XML Data from a passed file
	 * 
	 * @param string filename
	 * @return object SimpleXmlElement
	 */
	public function readXmlFile( $filename = null ) {
		$xml_folder = $this->get('kernel')->getRootDir() . '/Resources/Data/';

		$fh = fopen( $xml_folder . $filename, 'r');
		$xml_file = fread( $fh, filesize( $xml_folder . $filename ));
		$xml_data = new SimpleXmlElement( $xml_file );
		fclose( $fh );

		return $xml_data;
	}

	public function importAlliancesAction() {
		$xml_data = $this->readXmlFile( 'alliances.xml' );
		$entityManager = $this->getDoctrine()->getManager();

		foreach ($xml_data as $alliance) {

			$allianceDb = new Alliance();
			$allianceDb->setName( $alliance->name );
			
			$entityManager->persist( $allianceDb );
			$entityManager->flush();

			foreach ($alliance->nations->nation as $nation) {

				$nationDb = new Nation();
				$nationDb->setName( $nation->name );
				$nationDb->setAlliance( $allianceDb );

				$entityManager->persist( $nationDb );
				$entityManager->flush();
				
			}			
		}

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => array() ) );
	}

	public function importReleaseSetsAction() {
		$xml_data = $this->readXmlFile( 'releasesets.xml' );
		$entityManager = $this->getDoctrine()->getManager();

		foreach ($xml_data as $set) {

			$setDb = new ReleaseSet();
			$setDb->setName( $set->name );
			$setDb->setPopularName( $set->popularname );
			
			$entityManager->persist( $setDb );
			$entityManager->flush();
			
		}

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => array() ) );
	}

	public function importRaritiesAction() {
		$xml_data = $this->readXmlFile( 'rarities.xml' );
		$entityManager = $this->getDoctrine()->getManager();

		foreach ($xml_data as $rarity) {
			$rarityDb = new Rarity();
			$rarityDb->setName( $rarity->name );
			$rarityDb->setSortOrder( $rarity->sortorder );
			
			$entityManager->persist( $rarityDb );
			$entityManager->flush();
			
		}

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => array() ) );
	}

	public function importUnitTypesAction() {
		$xml_data = $this->readXmlFile( 'unittypes.xml' );
		$entityManager = $this->getDoctrine()->getManager();


		foreach ($xml_data as $unittype) {
			$unittypeDb = new UnitType();
			$unittypeDb->setName( $unittype->name );
			
			$entityManager->persist( $unittypeDb );
			$entityManager->flush();

			if (isset($unittype->unittypes->unittype)) {
				foreach ($unittype->unittypes->unittype as $sub_unittype) {

					$sub_unittypeDb = new UnitType();
					$sub_unittypeDb->setName( $sub_unittype->name );
					$sub_unittypeDb->setParent( $unittypeDb );

					$entityManager->persist( $sub_unittypeDb );
					$entityManager->flush();
					
				}
			}		
		}

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => array() ) );
	}

	public function importAttackTypesAction() {
		$xml_data = $this->readXmlFile( 'attacktypes.xml' );
		$entityManager = $this->getDoctrine()->getManager();

		foreach ($xml_data as $unittype) {
			$unittypeDb = $this->getDoctrine()
				->getRepository('PardalisWaSUnitBundle:UnitType')
				->findOneByName($unittype->name);

			foreach ($unittype->attacktypes->attacktype as $attacktype) {

				$attacktypeDb = $this->getDoctrine()
					->getRepository('PardalisWaSUnitBundle:AttackType')
					->findOneByName($attacktype->name);

				if (!$attacktypeDb) {
					$attacktypeDb = new AttackType();
					$attacktypeDb->setName( $attacktype->name );
					$attacktypeDb->setSortOrder( $attacktype->sortorder );
					$attacktypeDb->addUnittype( $unittypeDb );

					$entityManager->persist( $attacktypeDb );
					$entityManager->flush();
				} else {
					$attacktypeDb->addUnittype( $unittypeDb );

					$entityManager->flush();
				}
			}			
		}

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => array() ) );
	}

	public function importUnitsAction() {
		$xml_data = $this->readXmlFile( 'units.xml' );
		$entityManager = $this->getDoctrine()->getManager();

		print( '<pre>' );
		foreach ($xml_data as $nation) {
			var_dump($nation->name);

			$nationDb = $this->getDoctrine()
				->getRepository('PardalisWaSUnitBundle:Nation')
				->findOneByName($nation->name);

			foreach ($nation->unittypes->unittype as $unittype) {
				var_dump($unittype->name);

				$unittypeDb = $this->getDoctrine()
					->getRepository('PardalisWaSUnitBundle:UnitType')
					->findOneByName($unittype->name);

				if (isset($unittype->units->unit)) {
					foreach ($unittype->units->unit as $unit) {
						var_dump($unit);

						$setDb = $this->getDoctrine()
							->getRepository('PardalisWaSUnitBundle:ReleaseSet')
							->findOneByName($unit->set);

						$rarityDb = $this->getDoctrine()
							->getRepository('PardalisWaSUnitBundle:Rarity')
							->findOneByName($unit->rarity);

						$unitDb = new Unit();
						$unitDb->setName( $unit->name );
						$unitDb->setCost( $unit->cost );
						$unitDb->setNumberInSet( $unit->number );
						$unitDb->setSpeed( $unit->speed );
						$unitDb->setFlags( $unit->flags );
						$unitDb->setAircraft( $unit->aircraft );
						$unitDb->setArmor( $unit->armor );
						$unitDb->setVitalArmor( $unit->vitalarmor );
						$unitDb->setHullPoints( $unit->hullpoints );

						$unitDb->setUnitType( $unittypeDb );
						$unitDb->setNation( $nationDb );
						$unitDb->setReleaseSet( $setDb );
						$unitDb->setRarity( $rarityDb );

						$entityManager->persist( $unitDb );
						$entityManager->flush();

						foreach ($unit->attacks->attack as $attack) {
							var_dump($attack->attacktype->name);
							$attacktypeDb = $this->getDoctrine()
								->getRepository('PardalisWaSUnitBundle:AttackType')
								->findOneByName($attack->attacktype->name);

							$attackDb = new Attack();
							$attackDb->setUnit( $unitDb );
							$attackDb->setAttacktype( $attacktypeDb );
							$attackDb->setRange0( $attack->attacktype->range_0 );
							$attackDb->setRange1( $attack->attacktype->range_1 );
							$attackDb->setRange2( $attack->attacktype->range_2 );
							$attackDb->setRange3( $attack->attacktype->range_3 );

							$entityManager->persist( $attackDb );
							$entityManager->flush();
						}	
					}
				}		
			}
		}
		print( '</pre>' );

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => array() ) );
	}
}
