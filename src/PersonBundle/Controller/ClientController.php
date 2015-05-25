<?php

namespace PersonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CommonBundle\Controller\CrudBaseController;
use PersonBundle\Form\ClientType;
use PersonBundle\Entity\Client;
use PersonBundle\Entity\Person;

/**
 * @Route("/client")
 */
class ClientController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'client_index',
            'show' => 'client_show',
            'add' => 'client_add',
            'edit' => 'client_edit',
            'delete' => 'client_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('PersonBundle:Client');
    }
    
    protected function getFormType()
    {
        return new ClientType();
    }

    protected function getNewEntity()
    {
        return new Client();
    }
    
    /**
     * @Route("/", name="client_index")
     * @Template("PersonBundle:Client:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="client_add")
     * @template("PersonBundle:Client:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="client_show")
     * @Template("PersonBundle:Client:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="client_edit")
     * @Template("PersonBundle:Client:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }

    /**
     * @Route("/delete/{id}", name="client_delete")
     * @Template("PersonBundle:Client:delete.html.twig")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
}
