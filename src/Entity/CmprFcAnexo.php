<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CmprFcAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CmprFcAnexoRepository::class)]
#[ORM\Table(
    name: 'cmpr_fc_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CMPR_FC_ANEXO_CD_CONTRATO', columns: ['cd_contrato'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cmpr_fornecedor_contrato_anexo_ibfk_1', 'colunas' => ['cd_contrato'], 'tabelaAlvo' => 'cmpr_fornecedor_contrato', 'colunasAlvo' => ['cd_contrato'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CmprFcAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_contrato_anexo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdContratoAnexo = null;

    #[ORM\ManyToOne(targetEntity: CmprFornecedorContrato::class)]
    #[ORM\JoinColumn(name: 'cd_contrato', referencedColumnName: 'cd_contrato', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?CmprFornecedorContrato $cdContrato = null;

    #[ORM\Column(name: 'me_anexo', type: 'blob', length: 65535, nullable: true)]
    private ?string $meAnexo = null;

    public function __construct(
        ?CmprFornecedorContrato $cdContrato = null,
        ?string $meAnexo = null
    ) {
        $this->cdContrato = $cdContrato;
        $this->meAnexo = $meAnexo;
    }

    public function getCdContratoAnexo(): ?int
    {
        return $this->cdContratoAnexo;
    }

    public function getCdContrato(): ?CmprFornecedorContrato
    {
        return $this->cdContrato;
    }

    public function setCdContrato(?CmprFornecedorContrato $cdContrato): self
    {
        $this->cdContrato = $cdContrato;
        return $this;
    }

    public function getMeAnexo(): ?string
    {
        return $this->meAnexo;
    }

    public function setMeAnexo(?string $meAnexo): self
    {
        $this->meAnexo = $meAnexo;
        return $this;
    }
}
