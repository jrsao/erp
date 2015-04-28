<?php

namespace PersonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CommonBundle\Controller\BaseController;
use PersonBundle\Form\ClientType;
use PersonBundle\Entity\Client;
use PersonBundle\Entity\Person;

/**
 * @Route("/client")
 */
class ClientController extends BaseController
{
    /**
     * @Route("/", name="client_index")
     * @Template()
     */
    public function indexAction()
    {
        $entities = $this->getDoctrine()
            ->getRepository('PersonBundle:Client')
            ->findAll();
        
        return $this->render(
            'PersonBundle:Client:index.html.twig',
            array('entities' => $entities)
        );
    }
            
    /**
     * @Route("/add", name="client_add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(new ClientType(), $client);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->indexAction();
        }
        return $this->render(
            'PersonBundle:Client:add.html.twig', 
            array('form' => $form->createView())
        );
    }
            
    /**
     * @Route("/show/{id}", name="client_show")
     * @Template("PersonBundle:Client:show.html.twig")
     */
    public function showAction($id)
    {
        $entity = $this->getDoctrine()     
            ->getRepository('PersonBundle:Client')
            ->find($id);
        
        return array('entity' => $entity);
    }
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

    /**
     * @Route("/update")
     * @Template()
     */
    public function updateAction()
    {
        return array(
                // ...
            );    }

}
