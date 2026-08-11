<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AvaAcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaAcessosRepository::class)]
#[ORM\Table(
    name: 'ava_acessos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'ava_acessos_cd_acesso_unique', columns: ['cd_acesso'])]
#[ORM\Index(name: 'IX_CD_ACESSO', columns: ['cd_acesso'])]
#[ORM\Index(name: 'IX_CD_ARQUIVO', columns: ['cd_arquivo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_acesso']
)]
class AvaAcessos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_acesso', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAcesso = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_arquivo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArquivo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'dt_acesso', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAcesso = null;

    public function __construct(
        ?int $cdAcesso = null,
        ?int $cdArquivo = null,
        ?int $cdPessoa = null,
        ?\DateTimeInterface $dtAcesso = null
    ) {
        $this->cdAcesso = $cdAcesso;
        $this->cdArquivo = $cdArquivo;
        $this->cdPessoa = $cdPessoa;
        $this->dtAcesso = $dtAcesso;
    }

    public function getCdAcesso(): ?int
    {
        return $this->cdAcesso;
    }

    public function setCdAcesso(?int $cdAcesso): self
    {
        $this->cdAcesso = $cdAcesso;
        return $this;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
    }

    public function setCdArquivo(?int $cdArquivo): self
    {
        $this->cdArquivo = $cdArquivo;
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

    public function getDtAcesso(): ?\DateTimeInterface
    {
        return $this->dtAcesso;
    }

    public function setDtAcesso(?\DateTimeInterface $dtAcesso): self
    {
        $this->dtAcesso = $dtAcesso;
        return $this;
    }
}
