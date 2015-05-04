<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CommonBundle\Controller\BaseController;
use SiteBundle\Form\SiteType;
use SiteBundle\Entity\Site;

/**
 * @Route("/site")
 */
class SiteController extends BaseController
{
    /**
     * @Route("/", name="site_index")
     * @Template()
     */
    public function indexAction()
    {
        $entities = $this->getDoctrine()
            ->getRepository('SiteBundle:Site')
            ->findAll();
        
        return $this->render(
            'SiteBundle:Site:index.html.twig',
            array('entities' => $entities)
        );
    }
            
    /**
     * @Route("/add", name="site_add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $site = new Site();
        $form = $this->createForm(new SiteType(), $site);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();
            return $this->indexAction();
        }
        
        return $this->render(
            'SiteBundle:Site:add.html.twig', 
            array('form' => $form->createView())
        );
    }
            
    /**
     * @Route("/show/{id}", name="site_show")
     * @Template("SiteBundle:Site:show.html.twig")
     */
    public function showAction($id)
    {
        $entity = $this->getDoctrine()     
            ->getRepository('SiteBundle:Site')
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
