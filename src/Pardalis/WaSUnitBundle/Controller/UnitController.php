<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\SimpleXMLElement;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Unit;
use Pardalis\WaSUnitBundle\Entity\UnitType;
use Pardalis\WaSUnitBundle\Entity\Alliance;
use Pardalis\WaSUnitBundle\Entity\Nation;


class UnitController extends Controller
{
    /**
     * Display an alphabetized list of units
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
	public function indexAction()
	{
		$units = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Unit')
			->findBy(array(), array('name'=>'asc'));

		return $this->render('PardalisWaSUnitBundle:Unit:index.html.twig', array( 'units' => $units ) );
	}


    /**
     * Display single unit by id
     *
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
	public function unitAction( $id )
	{
		$unit = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:Unit')
			->findOneById( $id );

		return $this->render('PardalisWaSUnitBundle:Unit:unit.html.twig', array( 'unit' => $unit ) );
	}


    /**
     * Retrieve unit as JSON data
     *
     * @param $id unit id
     */
    public function unitJSONAction( $id ) {
        $unit = $this->getDoctrine()
            ->getRepository('PardalisWaSUnitBundle:Unit')
            ->findOneById( $id );

        $encoder = new JsonEncoder();
        $normalizer = new GetSetMethodNormalizer();

        $serializer = new Serializer(array($normalizer), array($encoder));

        $jsonContent = $serializer->serialize($unit, 'json');

        echo( $jsonContent );
    }

	// public function abilitiesAction()
	// {
	// 	$abilities = $this->getDoctrine()
	// 		->getRepository('PardalisWaSUnitBundle:Ability')
	// 		->findAll();

	// 	return $this->render('PardalisWaSUnitBundle:Ability:index.html.twig', array( 'abilities' => $abilities ) );
	// }

	public function unittypesAction()
	{
		$unittypes = $this->getDoctrine()
			->getRepository('PardalisWaSUnitBundle:UnitType')
			->findAll();

		// $em = $this->getDoctrine()->getManager();
		// $unittypes = $em->getRepository('PardalisWaSUnitBundle:UnitType')
		// 	->getTopLevelUnittypes();

		return $this->render('PardalisWaSUnitBundle:Unit:types.html.twig', array( 'unittypes' => $unittypes ) );
	}


    /**
     * Retrieve a list of nations
     *
     * @return array
     */
    public function getAllNations() {
        $options = array();
        $nations = $this->getDoctrine()
            ->getRepository('PardalisWaSUnitBundle:Nation')
            ->findBy(array(), array('name'=>'asc'));

        foreach($nations as $nation) {
            $options[$nation->getId()] = $nation->getName();
        }

        return ($options);
    }


    /**
     * Retrieve a list of sets
     */
    public function getAllSets() {
        $options = array();
        $nations = $this->getDoctrine()
            ->getRepository('PardalisWaSUnitBundle:ReleaseSet')
            ->findBy(array(), array('name'=>'asc'));

        foreach($nations as $nation) {
            $options[$nation->getId()] = $nation->getName();
        }

        return ($options);
    }


    /**
     * Retrieve a list of rarities
     */
    public function getAllRarities() {
        $options = array();
        $nations = $this->getDoctrine()
            ->getRepository('PardalisWaSUnitBundle:Rarity')
            ->findBy(array(), array('name'=>'asc'));

        foreach($nations as $nation) {
            $options[$nation->getId()] = $nation->getName();
        }

        return ($options);
    }


    /**
     * Retrieve a list of unit types
     */
    public function getAllUnitTypes() {
        $options = array();
        $unittypes = $this->getDoctrine()
            ->getRepository('PardalisWaSUnitBundle:UnitType')
            ->findBy(array(), array('name'=>'asc'));

        foreach($unittypes as $unittype) {
            $options[$unittype->getId()] = $unittype->getName();
        }

        return ($options);
    }


    /**
     * Retrieve a list of attributes
     */
    public function getAllAttributes() {
        $options = array();
        $nations = $this->getDoctrine()
            ->getRepository('PardalisWaSUnitBundle:Ability')
            ->findBy(array(), array('name'=>'asc'));

        foreach($nations as $nation) {
            $options[$nation->getId()] = $nation->getName();
        }

        return ($options);
    }


    /**
     * Retrieve a list of attack types
     */
    public function getAllAttackTypes() {
        $options = array();
        $nations = $this->getDoctrine()
            ->getRepository('PardalisWaSUnitBundle:AttackType')
            ->findBy(array(), array('name'=>'asc'));

        foreach($nations as $nation) {
            $options[$nation->getId()] = $nation->getName();
        }

        return ($options);
    }


    /**
     * Handle new unit form
     *
     * @param   Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request) {
        $unit = new Unit;

        $form = $this->createFormBuilder($unit)
            ->add('nation', 'choice', array('label' => 'Nationality', 'choices' => $this->getAllNations()))
            ->add('releaseset', 'choice', array('label' => 'Release set', 'choices' => $this->getAllSets()))
            ->add('number_in_set', 'number', array('label' => 'Number in set'))
            ->add('rarity', 'choice', array('label' => 'Rarity', 'choices' => $this->getAllRarities()))
            ->add('name', 'text', array('label' => 'Unit name'))
            ->add('unittype', 'choice', array('label' => 'Unit type', 'choices' => $this->getAllUnitTypes()))
            ->add('year', 'choice', array('label' => 'Available from year', 'choices' => $unit->getYearOptions()))
            ->add('cost', 'number', array('label' => 'Cost'))
            ->add('speed', 'choice', array('label' => 'Speed', 'choices' => $unit->getSpeedOptions()))
            ->add('flags', 'choice', array('label' => 'Flag bonus', 'choices' => $unit->getFlagsOptions()))
            ->add('aircraft', 'choice', array('label' => 'Aircraft basing capacity', 'choices' => $unit->getAircraftOptions()))
            ->add('armor', 'number', array('label' => 'Armor value'))
            ->add('vital_armor', 'number', array('label' => 'Vital armor'))
            ->add('hull_points', 'number', array('label' => 'Hull points'))
            ->add('abilities', 'collection', array('type' => 'choice', 'allow_add' => true, 'options' => array('choices' => $this->getAllAttributes())))
            ->add('attacks', 'collection', array('type' => 'choice', 'allow_add' => true, 'options' => array('choices' => $this->getAllAttackTypes())))

            ->add('save', 'submit', array('label' => 'Create Unit'))
            ->getForm();

        $result = $request->request->all();

        if ( ! empty( $result ) ) {

            foreach( $result['form'] as $field_name => $value ) {

                switch( $field_name ) {

                    case 'name':
                        $unit->setName($value);
                        break;

                    case 'unittype':
                        $unittype = $this->getDoctrine()
                            ->getRepository('PardalisWaSUnitBundle:UnitType')
                            ->findOneById($value);

                        $unit->setUnittype($unittype);
                        break;

                    case 'number_in_set':
                        $unit->setNumberInSet($value);
                        break;

                    case 'releaseset':
                        $releaseset = $this->getDoctrine()
                            ->getRepository('PardalisWaSUnitBundle:ReleaseSet')
                            ->findOneById($value);

                        $unit->setReleaseset($releaseset);
                        break;

                    case 'cost':
                        $unit->setCost($value);
                        break;

                    case 'year':
                        $unit->setYear($value);
                        break;

                    case 'speed':
                        $unit->setSpeed($value);
                        break;

                    case 'flags':
                        $unit->setFlags($value);
                        break;

                    case 'aircraft':
                        $unit->setAircraft($value);
                        break;

                    case 'armor':
                        $unit->setArmor($value);
                        break;

                    case 'vital_armor':
                        $unit->setVitalArmor($value);
                        break;

                    case 'hull_points':
                        $unit->setHullPoints($value);
                        break;

                    case 'rarity':
                        $rarity = $this->getDoctrine()
                            ->getRepository('PardalisWaSUnitBundle:Rarity')
                            ->findOneById($value);

                        $unit->setRarity($rarity);
                        break;

                    case 'nation':
                        $nation = $this->getDoctrine()
                            ->getRepository('PardalisWaSUnitBundle:Nation')
                            ->findOneById($value);

                        $unit->setNation($nation);
                        break;

                }

            }

            // Attach abilities to unit
            if ( !empty( $result['form']['abilities'] ) ) {
                $abilities = $this->getDoctrine()
                    ->getRepository('PardalisWaSUnitBundle:Ability')
                    ->findById($result['form']['abilities']);

                foreach ($abilities as $ability) {
                    $unit->addAbility($ability);
                }
            }

            // Attach attacks to unit
            if ( !empty( $result['form']['attacks'] ) ) {
                $attacks = $this->getDoctrine()
                    ->getRepository('PardalisWaSUnitBundle:Attack')
                    ->findById($result['form']['attacks']);

                foreach ($attacks as $attack) {
                    $unit->addAttack($attack);
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($unit);
            $em->flush();

            return $this->redirect($this->generateUrl('pardalis_was_unit_view', array('id' => $unit->getId())));

        }

        return $this->render('PardalisWaSUnitBundle:Unit:new.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
