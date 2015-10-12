<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class CategoriaController extends AbstractRestfulController
{
    //http get
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

    //http get
    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Categoria')->find($id);
        return $data;
    }

    //http post
    public function create($data)
    {
        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');

        $param = $data['nome'];

        $categoria = $categoriaService->insert($param);

        if ($categoria) {
            return $categoria;
        }

        return array('success' => false);
    }

    //http put
    public function update($id, $data)
    {
        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');

        $param['nome'] = $data['nome'];
        $param['id'] = $id;

        $categoria = $categoriaService->update($param);

        if ($categoria) {
            return $categoria;
        }

        return array('success' => false);

    }

    //http delete
    public function delete($id)
    {
        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
        $result = $categoriaService->delete($id);
        if($result) {
            return $result;
        }
        return array('success' => false);
    }
}