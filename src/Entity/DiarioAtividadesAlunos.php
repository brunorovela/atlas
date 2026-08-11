<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\DiarioAtividadesAlunosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiarioAtividadesAlunosRepository::class)]
#[ORM\Table(
    name: 'diario_atividades_alunos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Relação de atividades com os alunos das disciplinas.
']
)]
#[ORM\UniqueConstraint(name: 'UK_ATIVIDADE_ALUNO', columns: ['cd_atividade', 'cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_ATIVIDADE', columns: ['cd_atividade'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class DiarioAtividadesAlunos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_atividade_aluno', type: 'integer', options: ['unsigned' => true, 'comment' => 'Auto increment da tabela .'])]
    private ?int $cdAtividadeAluno = null;

    #[ORM\Column(name: 'cd_atividade', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Código da atividade em diario_atividades.'])]
    private ?int $cdAtividade = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true, 'comment' => 'Código do aluno a participar na atividade.'])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'sn_presente', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'comment' => 'Indica se o aluno marcou presença.'])]
    private ?int $snPresente = null;

    public function __construct(
        ?int $cdAtividade = null,
        ?int $cdPessoa = null,
        ?int $snPresente = null
    ) {
        $this->cdAtividade = $cdAtividade;
        $this->cdPessoa = $cdPessoa;
        $this->snPresente = $snPresente;
    }

    public function getCdAtividadeAluno(): ?int
    {
        return $this->cdAtividadeAluno;
    }

    public function getCdAtividade(): ?int
    {
        return $this->cdAtividade;
    }

    public function setCdAtividade(?int $cdAtividade): self
    {
        $this->cdAtividade = $cdAtividade;
        return $this;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getSnPresente(): ?int
    {
        return $this->snPresente;
    }

    public function setSnPresente(?int $snPresente): self
    {
        $this->snPresente = $snPresente;
        return $this;
    }
}
