<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EstncEstagioInterrompidoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncEstagioInterrompidoRepository::class)]
#[ORM\Table(
    name: 'estnc_estagio_interrompido',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_ESTAGIO', columns: ['cd_estagio'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_EMPRESA', columns: ['cd_empresa'])]
class EstncEstagioInterrompido
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_estagio_interrompido', type: 'integer')]
    private ?int $cdEstagioInterrompido = null;

    #[ORM\Column(name: 'cd_estagio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEstagio = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_empresa', type: 'integer')]
    private ?int $cdEmpresa = null;

    #[ORM\Column(name: 'sn_verificado', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snVerificado = 0;

    #[ORM\Column(name: 'dt_interrupcao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInterrupcao = null;

    public function __construct(
        ?int $cdEstagio = null,
        ?int $cdPessoa = null,
        ?int $cdEmpresa = null,
        ?int $snVerificado = 0,
        ?\DateTimeInterface $dtInterrupcao = null
    ) {
        $this->cdEstagio = $cdEstagio;
        $this->cdPessoa = $cdPessoa;
        $this->cdEmpresa = $cdEmpresa;
        $this->snVerificado = $snVerificado;
        $this->dtInterrupcao = $dtInterrupcao;
    }

    public function getCdEstagioInterrompido(): ?int
    {
        return $this->cdEstagioInterrompido;
    }

    public function getCdEstagio(): ?int
    {
        return $this->cdEstagio;
    }

    public function setCdEstagio(?int $cdEstagio): self
    {
        $this->cdEstagio = $cdEstagio;
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

    public function getCdEmpresa(): ?int
    {
        return $this->cdEmpresa;
    }

    public function setCdEmpresa(?int $cdEmpresa): self
    {
        $this->cdEmpresa = $cdEmpresa;
        return $this;
    }

    public function getSnVerificado(): ?int
    {
        return $this->snVerificado;
    }

    public function setSnVerificado(?int $snVerificado): self
    {
        $this->snVerificado = $snVerificado;
        return $this;
    }

    public function getDtInterrupcao(): ?\DateTimeInterface
    {
        return $this->dtInterrupcao;
    }

    public function setDtInterrupcao(?\DateTimeInterface $dtInterrupcao): self
    {
        $this->dtInterrupcao = $dtInterrupcao;
        return $this;
    }
}
