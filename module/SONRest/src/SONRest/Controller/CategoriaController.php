<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class CategoriaController extends AbstractRestfulController
{
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Categoria')->findAll();

        /*
        //o trecho a seguir foi substituido pelo tratamento de evento
        // criado na Module.php atraves da funcao "postProcess"
        // que é observada na funcao onBootstrap.
        // com esse listener da AbstractRestfulController, aqui só é necessário
        // dar o return no $data.

        //importante: existe um módulo pronto chamado ZF2 Restful . que elimina a necessidade de fazer
        // toda essa implementacao.

        $service = $this->getServiceLocator()->get('SONRest\Service\ProcessJson');
        $service->setResponse($this->response)
            ->setData($data);

        $this->response = $service->process();

        return $this->response;
        */

        return $data;

    }

    public function get($id)
    {

    }

    public function create($data)
    {

    }

    public function update($id, $data)
    {

    }

    public function delete($id)
    {

    }
}