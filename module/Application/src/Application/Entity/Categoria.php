<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Categoria
 * @ORM\Entity(repositoryClass="Application\Entity\CategoriaRepository")
 * @ORM\Table("categorias")
 */
class Categoria
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        //interface fluente
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return $this
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        //interface fluente
        return $this;
    }

}