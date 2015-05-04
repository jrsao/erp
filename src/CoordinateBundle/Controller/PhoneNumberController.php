<?php

namespace CoordinateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\BaseController;

use CoordinateBundle\Form\PhoneNumberType;
use CoordinateBundle\Entity\PhoneNumber;

/**
 * @Route("/phone_number")
 */
class PhoneNumberController extends BaseController
{
    /**
     * @Route("/", name="phone_number_index")
     * @Template()
     */
    public function indexAction()
    {
        $entities = $this->getDoctrine()
            ->getRepository('CoordinateBundle:PhoneNumber')
            ->findAll();
        
        return $this->render(
            'CoordinateBundle:PhoneNumber:index.html.twig',
            array('entities' => $entities)
        );
    }
    
    private function addFromPersonChild(Request $request, $id, $entityType)
    {
        if ($id == 0){
            throw new Exception('id is needed in the function addAction from PhoneNumberController');
        }
        
        $phoneNumber = new PhoneNumber();
        $form = $this->createForm(new PhoneNumberType(), $phoneNumber);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $person = $em->getRepository('PersonBundle:Person')->find($id);
            
            if ($person == null) {
                throw new Exception('personId is invalid, no '.$entityType.' found in the function addAction from PhoneNumberController');
            }
            
            $person->addPhoneNumber($phoneNumber);
            $phoneNumber->setPerson($person);
            
            $em->persist($phoneNumber);
            $em->flush();
            
            //
            return $this->redirect($this->generateUrl($entityType.'_show', array('id' => $person->getId()), 301));
        }
        
        return $this->render(
            'CoordinateBundle:PhoneNumber:add.html.twig', 
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/add/person/{personId}", name="phone_number_person_add")
     * @Template()
     */
    public function addFromPersonAction(Request $request, $personId)
    {
        return $this->addFromPersonChild($request, $personId, 'person');
    }
    
    /**
     * @Route("/add/client/{personId}", name="phone_number_client_add")
     * @Template()
     */
    public function addFromClientAction(Request $request, $personId)
    {
        return $this->addFromPersonChild($request, $personId, 'client');
    }
    
      /**
     * @Route("/add/site/{siteId}", name="phone_number_site_add")
     * @Template()
     */
    public function addFromSiteAction(Request $request, $siteId)
    {
        if ($siteId == 0){
            throw new Exception('id is needed in the function addAction from PhoneNumberController');
        }
        
        $phoneNumber = new PhoneNumber();
        $form = $this->createForm(new PhoneNumberType(), $phoneNumber);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $site = $em->getRepository('SiteBundle:Site')->find($siteId);
            
            if ($site == null) {
                throw new Exception('siteId is invalid  in the function addAction from PhoneNumberController');
            }
            
            $site->addPhoneNumber($phoneNumber);
            $phoneNumber->setSite($site);
            
            $em->persist($phoneNumber);
            $em->flush();
            
            return $this->redirect($this->generateUrl('site_show', array('id' => $site->getId()), 301));
        }
        
        return $this->render(
            'CoordinateBundle:PhoneNumber:add.html.twig', 
            array('form' => $form->createView())
        );
    }
            
    /**
     * @Route("/show/{id}", name="phone_number_show")
     * @Template("CoordinateBundle:PhoneNumber:show.html.twig")
     */
    public function showAction($id)
    {
        $entity = $this->getDoctrine()     
            ->getRepository('CoordinateBundle:PhoneNumber')
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
