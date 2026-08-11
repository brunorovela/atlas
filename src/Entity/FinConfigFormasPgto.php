<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\FinConfigFormasPgtoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinConfigFormasPgtoRepository::class)]
#[ORM\Table(
    name: 'fin_config_formas_pgto',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_FORMA_PGTO', columns: ['cd_forma_pgto'])]
#[ORM\Index(name: 'IX_CD_COLIGADA_MATRIZ', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [],
    autoIncremento: ['cd_forma_pgto']
)]
class FinConfigFormasPgto
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_forma_pgto', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdFormaPgto = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada_matriz', type: 'smallint', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigadaMatriz = 1;

    #[ORM\Column(name: 'ds_forma_pgto', type: 'string', length: 40, nullable: true)]
    private ?string $dsFormaPgto = null;

    #[ORM\Column(name: 'sn_cadastra_cheque', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCadastraCheque = 0;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'sn_compensa_auto', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snCompensaAuto = 0;

    #[ORM\Column(name: 'cd_forma_banco', type: 'string', length: 50, nullable: true)]
    private ?string $cdFormaBanco = null;

    #[ORM\Column(name: 'cd_chave_pgto', type: 'string', length: 50, nullable: true)]
    private ?string $cdChavePgto = null;

    #[ORM\Column(name: 'SN_PADRAO_COMPROMISSO_AULA', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snPadraoCompromissoAula = 0;

    public function __construct(
        ?int $cdFormaPgto = null,
        int $cdColigadaMatriz = 1,
        ?string $dsFormaPgto = null,
        ?int $snCadastraCheque = 0,
        ?int $snAtivo = 1,
        ?int $snCompensaAuto = 0,
        ?string $cdFormaBanco = null,
        ?string $cdChavePgto = null,
        int $snPadraoCompromissoAula = 0
    ) {
        $this->cdFormaPgto = $cdFormaPgto;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->dsFormaPgto = $dsFormaPgto;
        $this->snCadastraCheque = $snCadastraCheque;
        $this->snAtivo = $snAtivo;
        $this->snCompensaAuto = $snCompensaAuto;
        $this->cdFormaBanco = $cdFormaBanco;
        $this->cdChavePgto = $cdChavePgto;
        $this->snPadraoCompromissoAula = $snPadraoCompromissoAula;
    }

    public function getCdFormaPgto(): ?int
    {
        return $this->cdFormaPgto;
    }

    public function setCdFormaPgto(?int $cdFormaPgto): self
    {
        $this->cdFormaPgto = $cdFormaPgto;
        return $this;
    }

    public function getCdColigadaMatriz(): int
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(int $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getDsFormaPgto(): ?string
    {
        return $this->dsFormaPgto;
    }

    public function setDsFormaPgto(?string $dsFormaPgto): self
    {
        $this->dsFormaPgto = $dsFormaPgto;
        return $this;
    }

    public function getSnCadastraCheque(): ?int
    {
        return $this->snCadastraCheque;
    }

    public function setSnCadastraCheque(?int $snCadastraCheque): self
    {
        $this->snCadastraCheque = $snCadastraCheque;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnCompensaAuto(): ?int
    {
        return $this->snCompensaAuto;
    }

    public function setSnCompensaAuto(?int $snCompensaAuto): self
    {
        $this->snCompensaAuto = $snCompensaAuto;
        return $this;
    }

    public function getCdFormaBanco(): ?string
    {
        return $this->cdFormaBanco;
    }

    public function setCdFormaBanco(?string $cdFormaBanco): self
    {
        $this->cdFormaBanco = $cdFormaBanco;
        return $this;
    }

    public function getCdChavePgto(): ?string
    {
        return $this->cdChavePgto;
    }

    public function setCdChavePgto(?string $cdChavePgto): self
    {
        $this->cdChavePgto = $cdChavePgto;
        return $this;
    }

    public function getSnPadraoCompromissoAula(): int
    {
        return $this->snPadraoCompromissoAula;
    }

    public function setSnPadraoCompromissoAula(int $snPadraoCompromissoAula): self
    {
        $this->snPadraoCompromissoAula = $snPadraoCompromissoAula;
        return $this;
    }
}
