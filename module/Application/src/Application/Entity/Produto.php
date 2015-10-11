<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Produto
 * @ORM\Entity
 * @ORM\Table("produtos")
 */
class Produto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="text")
     */
    private $descricao;

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
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     * @return $this
     */
    public function setCategoria( $categoria)
    {
        $this->categoria = $categoria;
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

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     * @return $this
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        //interface fluente
        return $this;
    }

}