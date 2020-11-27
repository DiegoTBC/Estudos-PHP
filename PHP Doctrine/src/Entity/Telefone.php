<?php


namespace Alura\Doctrine\Entity;


use phpDocumentor\Reflection\Types\This;

/**
 * @Entity
 */
class Telefone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;
    /**
     * @Column (type="string")
     */
    private $numero;
    /**
     * @ManyToOne(targetEntity="Aluno")
     */
    private $aluno;


    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    public function setAluno(Aluno $aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;
        return $this;
    }
}