<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

class CategoriaRepository extends EntityRepository
{
    public function buscarPorNome($nome) {
        //sua consulta padronizada
    }

}