<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\ItauPixRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItauPixRepository::class)]
#[ORM\Table(
    name: 'itau_pix',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_itau_pix_itau_conta_configuracao', columns: ['cd_itau_conta_configuracao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_itau_pix_itau_conta_configuracao', 'colunas' => ['cd_itau_conta_configuracao'], 'tabelaAlvo' => 'itau_conta_configuracao', 'colunasAlvo' => ['cd_itau_conta_configuracao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class ItauPix
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ItauContaConfiguracao::class)]
    #[ORM\JoinColumn(name: 'cd_itau_conta_configuracao', referencedColumnName: 'cd_itau_conta_configuracao', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ItauContaConfiguracao $cdItauContaConfiguracao = null;

    #[ORM\Column(name: 'ds_txid', type: 'string', length: 50)]
    private ?string $dsTxid = null;

    #[ORM\Column(name: 'ds_chave_evp', type: 'string', length: 50)]
    private ?string $dsChaveEvp = null;

    #[ORM\Column(name: 'ds_pix_copia_e_cola', type: 'string', length: 50)]
    private ?string $dsPixCopiaECola = null;

    public function __construct(
        ?ItauContaConfiguracao $cdItauContaConfiguracao = null,
        ?string $dsTxid = null,
        ?string $dsChaveEvp = null,
        ?string $dsPixCopiaECola = null
    ) {
        $this->cdItauContaConfiguracao = $cdItauContaConfiguracao;
        $this->dsTxid = $dsTxid;
        $this->dsChaveEvp = $dsChaveEvp;
        $this->dsPixCopiaECola = $dsPixCopiaECola;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdItauContaConfiguracao(): ?ItauContaConfiguracao
    {
        return $this->cdItauContaConfiguracao;
    }

    public function setCdItauContaConfiguracao(?ItauContaConfiguracao $cdItauContaConfiguracao): self
    {
        $this->cdItauContaConfiguracao = $cdItauContaConfiguracao;
        return $this;
    }

    public function getDsTxid(): ?string
    {
        return $this->dsTxid;
    }

    public function setDsTxid(?string $dsTxid): self
    {
        $this->dsTxid = $dsTxid;
        return $this;
    }

    public function getDsChaveEvp(): ?string
    {
        return $this->dsChaveEvp;
    }

    public function setDsChaveEvp(?string $dsChaveEvp): self
    {
        $this->dsChaveEvp = $dsChaveEvp;
        return $this;
    }

    public function getDsPixCopiaECola(): ?string
    {
        return $this->dsPixCopiaECola;
    }

    public function setDsPixCopiaECola(?string $dsPixCopiaECola): self
    {
        $this->dsPixCopiaECola = $dsPixCopiaECola;
        return $this;
    }
}
