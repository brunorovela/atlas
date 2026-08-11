<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\SvcExportacaoXmlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcExportacaoXmlRepository::class)]
#[ORM\Table(
    name: 'svc_exportacao_xml',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TAG_PAI', columns: ['cd_tag_pai'])]
#[ORM\Index(name: 'IX_ID_EXPORTACAO', columns: ['id_exportacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'svc_exportacao_xml_ibfk_1', 'colunas' => ['cd_tag_pai'], 'tabelaAlvo' => 'svc_exportacao_xml', 'colunasAlvo' => ['cd_tag'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'svc_exportacao_xml_ibfk_2', 'colunas' => ['id_exportacao'], 'tabelaAlvo' => 'svc_exportacao', 'colunasAlvo' => ['id_exportacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SvcExportacaoXml
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_tag', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTag = null;

    #[ORM\ManyToOne(targetEntity: SvcExportacaoXml::class)]
    #[ORM\JoinColumn(name: 'cd_tag_pai', referencedColumnName: 'cd_tag', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SvcExportacaoXml $cdTagPai = null;

    #[ORM\ManyToOne(targetEntity: SvcExportacao::class)]
    #[ORM\JoinColumn(name: 'id_exportacao', referencedColumnName: 'id_exportacao', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SvcExportacao $idExportacao = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_tag', type: 'string', length: 255)]
    private ?string $dsTag = null;

    #[ORM\Column(name: 'sn_multiplas_vezes', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snMultiplasVezes = 0;

    #[ORM\Column(name: 'ds_campo_sql', type: 'string', length: 255, nullable: true)]
    private ?string $dsCampoSql = null;

    public function __construct(
        ?SvcExportacaoXml $cdTagPai = null,
        ?SvcExportacao $idExportacao = null,
        ?int $nrOrdem = null,
        ?string $dsTag = null,
        int $snMultiplasVezes = 0,
        ?string $dsCampoSql = null
    ) {
        $this->cdTagPai = $cdTagPai;
        $this->idExportacao = $idExportacao;
        $this->nrOrdem = $nrOrdem;
        $this->dsTag = $dsTag;
        $this->snMultiplasVezes = $snMultiplasVezes;
        $this->dsCampoSql = $dsCampoSql;
    }

    public function getCdTag(): ?int
    {
        return $this->cdTag;
    }

    public function getCdTagPai(): ?SvcExportacaoXml
    {
        return $this->cdTagPai;
    }

    public function setCdTagPai(?SvcExportacaoXml $cdTagPai): self
    {
        $this->cdTagPai = $cdTagPai;
        return $this;
    }

    public function getIdExportacao(): ?SvcExportacao
    {
        return $this->idExportacao;
    }

    public function setIdExportacao(?SvcExportacao $idExportacao): self
    {
        $this->idExportacao = $idExportacao;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getDsTag(): ?string
    {
        return $this->dsTag;
    }

    public function setDsTag(?string $dsTag): self
    {
        $this->dsTag = $dsTag;
        return $this;
    }

    public function getSnMultiplasVezes(): int
    {
        return $this->snMultiplasVezes;
    }

    public function setSnMultiplasVezes(int $snMultiplasVezes): self
    {
        $this->snMultiplasVezes = $snMultiplasVezes;
        return $this;
    }

    public function getDsCampoSql(): ?string
    {
        return $this->dsCampoSql;
    }

    public function setDsCampoSql(?string $dsCampoSql): self
    {
        $this->dsCampoSql = $dsCampoSql;
        return $this;
    }
}
