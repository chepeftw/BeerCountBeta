<?php

namespace FTW\BeerCountBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FTW\BeerCountBundle\Entity\Bar;
use FTW\BeerCountBundle\Form\BarType;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Bar controller.
 *
 */
class BarApiController extends Controller
{

    /**
     * @Rest\View
     */
    public function listAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FTWBeerCountBundle:Bar')->findAll();

        return array('bars' => $entities);
    }

    /**
     * @Rest\View
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FTWBeerCountBundle:Bar')->find( $id );

        return array('bar' => $entity);
    }
    
}
