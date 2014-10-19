<?php

namespace Pardalis\WaSUnitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pardalis\WaSUnitBundle\Entity;

class NationController extends Controller
{
    public function indexAction() {
        $alliances = $this->GetDoctrine()
            ->getRepository('PardalisWaSUnitBundle:Alliance')
            ->getAlliancesWithNationsAndUnits();

        return $this->render('PardalisWaSUnitBundle:Nation:home.html.twig', array( 'alliances' => $alliances ));
    }
}