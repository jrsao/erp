<?php

namespace PersonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;

use PersonBundle\Entity\Person;
use PersonBundle\Form\PersonType;

/**
 * @Route("/person")
 */
class PersonController extends Controller
{
    //TODO implement
//    protected function getRoutes()
//    {
//        return array(
//            'index' => 'address_index',
//            'show' => 'address_show',
//            'add' => 'address_add'
//        );
//    }
//    
//    protected function getRepository()
//    {
//        return $this->getDoctrine()->getRepository('PersonBundle:Person');
//    }
//    
//    protected function getFormType()
//    {
//        return new AddressType();
//    }
//
//    protected function getNewEntity()
//    {
//        return new Address();
//    }
    
    /**
     * @Route("/index")
     * @Template()
     */
    public function indexAction()
    {
        return null;
//        return parent::indexAction();
    }

    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction()
    {
        return array(
                // ...
            );    }

                
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $person = new Person();
        $form = $this->createForm(new PersonType(), $person);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            return $this->render('PersonBundle:Person:show.html.twig');
        }
        return $this->render(
            'PersonBundle:Person:add.html.twig', 
            array('form' => $form->createView())
        );
    }
    
    /**
     * @Route("/show")
     * @Template()ss
     */
    public function showAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/edit")
     * @Template()
     */
    public function editAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction()
    {
        return array(
                // ...
            );    }

}
