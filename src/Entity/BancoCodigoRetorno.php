<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\BancoCodigoRetornoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BancoCodigoRetornoRepository::class)]
#[ORM\Table(
    name: 'banco_codigo_retorno',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_BANCO', columns: ['cd_banco'])]
#[ORM\Index(name: 'IX_CD_RETORNO', columns: ['cd_retorno'])]
#[ORM\Index(name: 'IX_CD_ORIGEM', columns: ['cd_origem'])]
class BancoCodigoRetorno
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_banco', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $cdBanco = '';

    #[ORM\Id]
    #[ORM\Column(name: 'cd_retorno', type: 'string', length: 10)]
    private ?string $cdRetorno = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_origem', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1', 'comment' => '1 = Contas a Receber; 2 = Contas a Pagar'])]
    private int $cdOrigem = 1;

    #[ORM\Column(name: 'ds_ocorrencia', type: 'string', length: 50, nullable: true, options: ['default' => '0'])]
    private ?string $dsOcorrencia = '0';

    #[ORM\Column(name: 'sn_baixar', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snBaixar = 'N';

    #[ORM\Column(name: 'sn_aceito', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAceito = true;

    #[ORM\Column(name: 'cd_grupo_motivos', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdGrupoMotivos = 1;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 3, nullable: true, options: ['comment' => 'Status do nosso número para o codigo enviado do banco'])]
    private ?string $dsSituacao = null;

    public function __construct(
        string $cdBanco = '',
        ?string $cdRetorno = null,
        int $cdOrigem = 1,
        ?string $dsOcorrencia = '0',
        ?string $snBaixar = 'N',
        ?bool $snAceito = true,
        int $cdGrupoMotivos = 1,
        ?string $dsSituacao = null
    ) {
        $this->cdBanco = $cdBanco;
        $this->cdRetorno = $cdRetorno;
        $this->cdOrigem = $cdOrigem;
        $this->dsOcorrencia = $dsOcorrencia;
        $this->snBaixar = $snBaixar;
        $this->snAceito = $snAceito;
        $this->cdGrupoMotivos = $cdGrupoMotivos;
        $this->dsSituacao = $dsSituacao;
    }

    public function getCdBanco(): string
    {
        return $this->cdBanco;
    }

    public function setCdBanco(string $cdBanco): self
    {
        $this->cdBanco = $cdBanco;
        return $this;
    }

    public function getCdRetorno(): ?string
    {
        return $this->cdRetorno;
    }

    public function setCdRetorno(?string $cdRetorno): self
    {
        $this->cdRetorno = $cdRetorno;
        return $this;
    }

    public function getCdOrigem(): int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getDsOcorrencia(): ?string
    {
        return $this->dsOcorrencia;
    }

    public function setDsOcorrencia(?string $dsOcorrencia): self
    {
        $this->dsOcorrencia = $dsOcorrencia;
        return $this;
    }

    public function getSnBaixar(): ?string
    {
        return $this->snBaixar;
    }

    public function setSnBaixar(?string $snBaixar): self
    {
        $this->snBaixar = $snBaixar;
        return $this;
    }

    public function isSnAceito(): ?bool
    {
        return $this->snAceito;
    }

    public function setSnAceito(?bool $snAceito): self
    {
        $this->snAceito = $snAceito;
        return $this;
    }

    public function getCdGrupoMotivos(): int
    {
        return $this->cdGrupoMotivos;
    }

    public function setCdGrupoMotivos(int $cdGrupoMotivos): self
    {
        $this->cdGrupoMotivos = $cdGrupoMotivos;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }
}
