<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Application\Entity\Categoria');

        $ca = $repo->find(1);
//        $this->criarCategoria($em);
//        $this->criarCategoria();
//        $this->atualizarCategoria(array('id'=>9,'nome'=>'Monitor'));
//        $this->excluirCategoria(9);


        $categorias = $repo->findAll();



//        $this->criarProduto(array('categoriaId'=>1,'nome'=>'Outro bom jogo', 'descricao'=>'Esse jogo tambem é bom'),$ca,$em);
//        $this->criarProduto(array('categoriaId'=>1,'nome'=>'Outro bom jogo', 'descricao'=>'Esse jogo tambem é bom'));
//        $this->atualizarProduto(array('id'=>2,'nome'=>'Outro jogo do ano','descricao'=>'Esse jogo do ano também é muito bom','categoriaId'=>1));
//        $this->excluirProduto(3);

        return new ViewModel(array('categorias'=>$categorias));
    }

    private function criarCategoria($em = null)
    {
//        $categoria = new Categoria();
//        $categoria->setNome("Outras");
//        $em->persist($categoria); //preparar para gravar
//        $em->flush(); //gravar no banco

        //agora utilizando Service/Categoria
        //configurado no Module.php
        //pode suprimir o parametro $em.
        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
        $categoriaService->insert('Monitores');
    }

    private function atualizarCategoria($data)
    {
        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
        $categoriaService->update($data);
    }

    private function excluirCategoria($id)
    {
        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
        $categoriaService->delete($id);
    }

    private function criarProduto( $data, $categoria = null, $em = null)
    {
//        $produto = new Produto();
//        //interface fluente -> -> ->
//        $produto->setCategoria($categoria)
//                ->setNome("O jogo do ano")
//                ->setDescricao("Esse jogo é muito bom");
//        $em->persist($produto); //preparar para gravar
//        $em->flush(); //gravar no banco

        //agora utilizando Service/Produto
        //configurado no Module.php
        //pode suprimir o parametro $em.

        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        $produtoService->insert($data);


    }

    private function atualizarProduto($data)
    {
        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        $produtoService->update($data);
    }

    private function excluirProduto($id)
    {
        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        $produtoService->delete($id);
    }
}
