<?php

namespace Pardalis\WaSUnitBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pardalis\WaSUnitBundle\Entity;
use Pardalis\WaSUnitBundle\Entity\ReleaseSet;

class SetController extends Controller
{
	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$releasesets = $em->getRepository('PardalisWaSUnitBundle:ReleaseSet')
			->getSetsWithSortedUnits();

		return $this->render('PardalisWaSUnitBundle:Set:index.html.twig', array( 'releasesets' => $releasesets ) );
	}


    public function newAction(Request $request) {
        $release_set = new ReleaseSet();

        $form = $this->createFormBuilder($release_set)
            ->add('name', 'text', array('label' => 'Name'))
            ->add('popularName', 'text', array('label' => 'Popular name'))
            ->add('totalUnits', 'integer', array('label' => 'Total number of units in set'))

            ->add('save', 'submit', array('label' => 'Create Set'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();

            $release_set->setName($data->getName());
            $release_set->setPopularName($data->getPopularName());
            $release_set->setTotalUnits($data->getTotalUnits());

            $em = $this->getDoctrine()->getManager();
            $em->persist($release_set);
            $em->flush();

            return $this->redirect($this->generateUrl('pardalis_was_set_sets'));
        }


        return $this->render('PardalisWaSUnitBundle:Set:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}