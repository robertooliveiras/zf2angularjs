<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $categoriaLivros = $this->getReference('categoria-livros');
        $categoriaComputadores = $this->getReference('categoria-computadores');

        $produto = new Produto();
        $produto->setNome('Orientacao a Objetos')
        ->setCategoria($categoriaLivros)
        ->setDescricao('Livro sobre OO muito bom');
        $manager->persist($produto);

        $produto = new Produto();
        $produto->setNome('i MAC')
            ->setCategoria($categoriaComputadores)
            ->setDescricao('O computador da Apple');
        $manager->persist($produto);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 20;
    }
}