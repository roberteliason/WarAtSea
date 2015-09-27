<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\Ability;


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


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request) {
        $ability = new Ability();
        $em = $this->getDoctrine()->getManager();

        $form = $this->createFormBuilder($ability)
            ->add('name', 'text', array('label' => 'Name'))
            ->add('description', 'textarea', array('label' => 'Description'))
            ->add('unittypes', 'entity', array(
                'class' => 'PardalisWaSUnitBundle:UnitType',
                'property' => 'name',
                'label' => 'Applies to this type of unit',
                'expanded' => true,
                'multiple' => false,
            ))

            ->add('save', 'submit', array('label' => 'Create Ability'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();

            $ability->setName($data->getName());
            $ability->setDescription($data->getDescription());
            $em->persist($ability);
            $em->flush();

            echo('<pre>');
            var_dump($data->getUnittypes());
            echo('</pre>');
            die();
            //$ability->addUnittype($data->getUnittypes());

            $em->persist($ability);
            $em->flush();

            return $this->redirect($this->generateUrl('pardalis_was_ability_abilities'));
        }


        return $this->render('PardalisWaSUnitBundle:Ability:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}