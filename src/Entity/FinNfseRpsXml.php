<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\FinNfseRpsXmlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinNfseRpsXmlRepository::class)]
#[ORM\Table(
    name: 'fin_nfse_rps_xml',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_nfse_rps_xml_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_nfse_rps_xml_situacao', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'fin_nfse_rps_xml_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class FinNfseRpsXml
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_nfse_rps_xml', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdNfseRpsXml = null;

    #[ORM\ManyToOne(targetEntity: FinNfseRpsXmlSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => '1', 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?FinNfseRpsXmlSituacao $cdSituacao = null;

    #[ORM\Column(name: 'dt_criacao', type: 'datetime')]
    private ?\DateTimeInterface $dtCriacao = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\Column(name: 'ds_protocolo', type: 'string', length: 50, nullable: true, options: ['fixed' => true])]
    private ?string $dsProtocolo = null;

    #[ORM\Column(name: 'me_xml', type: 'blob', length: 16777215)]
    private ?string $meXml = null;

    public function __construct(
        ?FinNfseRpsXmlSituacao $cdSituacao = null,
        ?\DateTimeInterface $dtCriacao = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?string $dsProtocolo = null,
        ?string $meXml = null
    ) {
        $this->cdSituacao = $cdSituacao;
        $this->dtCriacao = $dtCriacao;
        $this->dtEnvio = $dtEnvio;
        $this->dsProtocolo = $dsProtocolo;
        $this->meXml = $meXml;
    }

    public function getCdNfseRpsXml(): ?int
    {
        return $this->cdNfseRpsXml;
    }

    public function getCdSituacao(): ?FinNfseRpsXmlSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?FinNfseRpsXmlSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getDtCriacao(): ?\DateTimeInterface
    {
        return $this->dtCriacao;
    }

    public function setDtCriacao(?\DateTimeInterface $dtCriacao): self
    {
        $this->dtCriacao = $dtCriacao;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function getDsProtocolo(): ?string
    {
        return $this->dsProtocolo;
    }

    public function setDsProtocolo(?string $dsProtocolo): self
    {
        $this->dsProtocolo = $dsProtocolo;
        return $this;
    }

    public function getMeXml(): ?string
    {
        return $this->meXml;
    }

    public function setMeXml(?string $meXml): self
    {
        $this->meXml = $meXml;
        return $this;
    }
}
