<?php

namespace PersonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CommonBundle\Controller\BaseController;
use PersonBundle\Form\ClientType;
use PersonBundle\Entity\Client;

/**
 * @Route("/client")
 */
class ClientController extends BaseController
{
    /**
     * @Route("/index")
     * @Template()
     */
    public function indexAction()
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
        $client = new Client();
        $form = $this->createForm(new ClientType());

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush($client);
//            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            return $this->redirect($this->render('PersonBundle:Client:show.html.twig'));
        }
        return $this->render('PersonBundle:Client:add.html.twig', array(
                    'form' => $form->createView(),
                ));
    }
            
    /**
     * @Route("/show")
     * @Template()
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
