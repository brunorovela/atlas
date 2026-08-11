<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\SvcConversaoAnexoIdsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcConversaoAnexoIdsRepository::class)]
#[ORM\Table(
    name: 'svc_conversao_anexo_ids',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CONVERSAO_ANEXO_IDS', columns: ['cd_conversao_anexo', 'ds_codigo_anexo'])]
#[ORM\Index(name: 'IX_CD_CONVERSAO_ANEXO', columns: ['cd_conversao_anexo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'svc_conversao_anexo_ids_ibfk_1', 'colunas' => ['cd_conversao_anexo'], 'tabelaAlvo' => 'svc_conversao_anexo', 'colunasAlvo' => ['cd_conversao_anexo'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SvcConversaoAnexoIds
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_conversao_anexo_id', type: 'integer')]
    private ?int $cdConversaoAnexoId = null;

    #[ORM\ManyToOne(targetEntity: SvcConversaoAnexo::class)]
    #[ORM\JoinColumn(name: 'cd_conversao_anexo', referencedColumnName: 'cd_conversao_anexo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?SvcConversaoAnexo $cdConversaoAnexo = null;

    #[ORM\Column(name: 'ds_codigo_anexo', type: 'string', length: 255)]
    private ?string $dsCodigoAnexo = null;

    #[ORM\Column(name: 'sn_sucesso', type: 'boolean', options: ['default' => '0'])]
    private bool $snSucesso = false;

    #[ORM\Column(name: 'ds_erro', type: 'string', length: 255, nullable: true)]
    private ?string $dsErro = null;

    public function __construct(
        ?SvcConversaoAnexo $cdConversaoAnexo = null,
        ?string $dsCodigoAnexo = null,
        bool $snSucesso = false,
        ?string $dsErro = null
    ) {
        $this->cdConversaoAnexo = $cdConversaoAnexo;
        $this->dsCodigoAnexo = $dsCodigoAnexo;
        $this->snSucesso = $snSucesso;
        $this->dsErro = $dsErro;
    }

    public function getCdConversaoAnexoId(): ?int
    {
        return $this->cdConversaoAnexoId;
    }

    public function getCdConversaoAnexo(): ?SvcConversaoAnexo
    {
        return $this->cdConversaoAnexo;
    }

    public function setCdConversaoAnexo(?SvcConversaoAnexo $cdConversaoAnexo): self
    {
        $this->cdConversaoAnexo = $cdConversaoAnexo;
        return $this;
    }

    public function getDsCodigoAnexo(): ?string
    {
        return $this->dsCodigoAnexo;
    }

    public function setDsCodigoAnexo(?string $dsCodigoAnexo): self
    {
        $this->dsCodigoAnexo = $dsCodigoAnexo;
        return $this;
    }

    public function isSnSucesso(): bool
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(bool $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
        return $this;
    }

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }
}
