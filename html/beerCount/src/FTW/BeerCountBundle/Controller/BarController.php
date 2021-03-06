<?php

namespace FTW\BeerCountBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FTW\BeerCountBundle\Entity\Bar;
use FTW\BeerCountBundle\Form\BarType;

/**
 * Bar controller.
 *
 */
class BarController extends Controller
{

    /**
     * Lists all Bar entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FTWBeerCountBundle:Bar')->findAll();

        return $this->render('FTWBeerCountBundle:Bar:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Bar entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Bar();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bar_show', array('id' => $entity->getId())));
        }

        return $this->render('FTWBeerCountBundle:Bar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Bar entity.
     *
     * @param Bar $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bar $entity)
    {
        $form = $this->createForm(new BarType(), $entity, array(
            'action' => $this->generateUrl('bar_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Bar entity.
     *
     */
    public function newAction()
    {
        $entity = new Bar();
        $form   = $this->createCreateForm($entity);

        return $this->render('FTWBeerCountBundle:Bar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bar entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FTWBeerCountBundle:Bar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FTWBeerCountBundle:Bar:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bar entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FTWBeerCountBundle:Bar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bar entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FTWBeerCountBundle:Bar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Bar entity.
    *
    * @param Bar $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bar $entity)
    {
        $form = $this->createForm(new BarType(), $entity, array(
            'action' => $this->generateUrl('bar_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bar entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FTWBeerCountBundle:Bar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bar_edit', array('id' => $id)));
        }

        return $this->render('FTWBeerCountBundle:Bar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Bar entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FTWBeerCountBundle:Bar')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bar entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bar'));
    }

    /**
     * Creates a form to delete a Bar entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bar_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
