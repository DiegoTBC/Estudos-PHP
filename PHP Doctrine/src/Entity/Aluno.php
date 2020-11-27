<?php


namespace Alura\Doctrine\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

//seta a classe AlunoRepository como repositorio padrao quando for chamado o getRepository(Aluno::class)
//os metodos find, findAll ainda funcionarão
/**
 * @Entity(repositoryClass="Alura\Doctrine\Repository\AlunoRepository");
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;
    /**
     * @Column (type="string", nullable=false)
     */
    private $nome;
    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $telefones;
    /**
     * @ManyToMany (targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function getCursos(): Collection
    {
        return $this->cursos;
    }

    public function addCursos(Curso $curso): self
    {
        if ($this->cursos->contains($curso)) {
            return $this;
        }
        $this->cursos->add($curso);
        $curso->addAlunos($this);
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        //esse return possibilita isso: $aluno->setNome("Teste")->getId();
        return $this;
    }

    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones(): Collection
    {
         return $this->telefones;
    }
}