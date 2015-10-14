<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ProdutoController extends AbstractRestfulController
{
    //http get
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->findAll();

        return $data;
    }

    //http get
    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->find($id);
        return $data;
    }

    //http post
    public function create($data)
    {

        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');

        $param['nome'] = $data['nome'];
        $param['descricao'] = $data['descricao'];
        $param['categoriaId'] = $data['categoriaId'];;

        $produto = $produtoService->insert($param);

        if ($produto) {
            return $produto;
        }

        return array('success' => false);
    }

    //http put
    public function update($id, $data)
    {
        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');

        $param['nome'] = $data['nome'];
        $param['descricao'] = $data['descricao'];
        $param['categoriaId'] = $data['categoriaId'];
        $param['id'] = $id;

        $produto = $produtoService->update($param);

        if ($produto) {
            return $produto;
        }

        return array('success' => false);

    }

    //http delete
    public function delete($id)
    {
        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        $result = $produtoService->delete($id);
        if($result) {
            return $result;
        }
        return array('success' => false);
    }
}