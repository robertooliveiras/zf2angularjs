<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Categoria as CategoriaEntity;

class Categoria
{
    private $em;

    public function __construct(EntityManager $em)
    {
        //ijecao de dependencia ao se inserir o $em como parametro
        $this->em = $em;
    }

    public function insert ($nome)
    {
        $categoriaEntity = new CategoriaEntity();
        $categoriaEntity->setNome($nome);

        $this->em->persist($categoriaEntity);
        $this->em->flush();

        return $categoriaEntity;

    }

    public function update (array $data)
    {
//        executa um select primeiro pra depois fazer o update
//        $categoriaEntity = $this->em
//                           ->getRepository('Application\Entity\Categoria')
//                           ->find($data['id']);
        //nao realiza select antecipadamente, mas carrega o objeto com uma especie de proxy
        //fazendo referencia ao CategoriaEntity (isso economiza numero de requisicoes no BD
        $categoriaEntity = $this->em
                           ->getReference('Application\Entity\Categoria', $data['id']);

        $categoriaEntity->setNome($data['nome']);
        $this->em->persist($categoriaEntity);
        $this->em->flush();

        return $categoriaEntity;
    }

    public function delete ($id)
    {
        $categoriaEntity = $this->em
            ->getReference('Application\Entity\Categoria', $id);

        $this->em->remove($categoriaEntity);
        $this->em->flush();

        return $id;
    }

}