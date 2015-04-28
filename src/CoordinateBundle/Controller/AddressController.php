<?php

namespace CoordinateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\BaseController;

use CoordinateBundle\Form\AddressType;
use CoordinateBundle\Entity\Address;

/**
 * @Route("/address")
 */
class AddressController extends BaseController
{
    /**
     * @Route("/", name="address_index")
     * @Template()
     */
    public function indexAction()
    {
        $entities = $this->getDoctrine()
            ->getRepository('CoordinateBundle:Address')
            ->findAll();
        
        return $this->render(
            'CoordinateBundle:Address:index.html.twig',
            array('entities' => $entities)
        );
    }
    
    private function addFromPersonChild(Request $request, $id, $entityType)
    {
        if ($id == 0){
            throw new Exception('id is needed in the function addAction from AddressController');
        }
        
        $address = new Address();
        $form = $this->createForm(new AddressType(), $address);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $person = $em->getRepository('PersonBundle:Person')->find($id);
            
            if ($person == null) {
                throw new Exception('personId is invalid, no '.$entityType.' found in the function addAction from AddressController');
            }
            
            $person->addAddress($address);
            $address->setPerson($person);
            
            $em->persist($address);
            $em->flush();
            
            //
            return $this->redirect($this->generateUrl($entityType.'_show', array('id' => $person->getId()), 301));
        }
        
        return $this->render(
            'CoordinateBundle:Address:add.html.twig', 
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/add/person/{personId}", name="address_person_add")
     * @Template()
     */
    public function addFromPersonAction(Request $request, $personId)
    {
        return $this->addFromPersonChild($request, $personId, 'person');
    }
    
    /**
     * @Route("/add/client/{personId}", name="address_client_add")
     * @Template()
     */
    public function addFromClientAction(Request $request, $personId)
    {
        return $this->addFromPersonChild($request, $personId, 'client');
    }
            
    /**
     * @Route("/show/{id}", name="address_show")
     * @Template("CoordinateBundle:Address:show.html.twig")
     */
    public function showAction($id)
    {
        $entity = $this->getDoctrine()     
            ->getRepository('CoordinateBundle:Address')
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
