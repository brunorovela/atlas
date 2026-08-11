<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniOrionToUnimestreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniOrionToUnimestreRepository::class)]
#[ORM\Table(
    name: 'uni_orion_to_unimestre',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class UniOrionToUnimestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_orion_to_unimestre', type: 'integer')]
    private ?int $cdOrionToUnimestre = null;

    #[ORM\Column(name: 'ds_endereco_web', type: 'string', length: 150)]
    private ?string $dsEnderecoWeb = null;

    #[ORM\Column(name: 'ds_nome_arquivo', type: 'string', length: 150)]
    private ?string $dsNomeArquivo = null;

    #[ORM\Column(name: 'nr_linha', type: 'integer', options: ['unsigned' => true])]
    private ?int $nrLinha = null;

    #[ORM\Column(name: 'dthrcriacao_doc', type: 'string', length: 100, nullable: true)]
    private ?string $dthrcriacaoDoc = null;

    #[ORM\Column(name: 'dtvalidade_doc', type: 'string', length: 100, nullable: true)]
    private ?string $dtvalidadeDoc = null;

    #[ORM\Column(name: 'nome_arquivo', type: 'string', length: 100, nullable: true)]
    private ?string $nomeArquivo = null;

    #[ORM\Column(name: 'nome_codificado_arquivo', type: 'string', length: 100, nullable: true)]
    private ?string $nomeCodificadoArquivo = null;

    #[ORM\Column(name: 'formato', type: 'string', length: 100, nullable: true)]
    private ?string $formato = null;

    #[ORM\Column(name: 'id_solicitante', type: 'string', length: 100, nullable: true)]
    private ?string $idSolicitante = null;

    #[ORM\Column(name: 'nome_solicitante', type: 'string', length: 100, nullable: true)]
    private ?string $nomeSolicitante = null;

    #[ORM\Column(name: 'id_proprietario', type: 'string', length: 100, nullable: true)]
    private ?string $idProprietario = null;

    #[ORM\Column(name: 'nome_proprietario', type: 'string', length: 100, nullable: true)]
    private ?string $nomeProprietario = null;

    #[ORM\Column(name: 'iddocum', type: 'string', length: 100, nullable: true)]
    private ?string $iddocum = null;

    #[ORM\Column(name: 'coddocumtpo', type: 'string', length: 100, nullable: true)]
    private ?string $coddocumtpo = null;

    #[ORM\Column(name: 'desdocumtpo', type: 'string', length: 100, nullable: true)]
    private ?string $desdocumtpo = null;

    #[ORM\Column(name: 'upload_download', type: 'string', length: 100, nullable: true)]
    private ?string $uploadDownload = null;

    #[ORM\Column(name: 'situacao', type: 'string', length: 100, nullable: true)]
    private ?string $situacao = null;

    #[ORM\Column(name: 'idprocerp', type: 'string', length: 100, nullable: true)]
    private ?string $idprocerp = null;

    #[ORM\Column(name: 'denprocerptpo', type: 'string', length: 100, nullable: true)]
    private ?string $denprocerptpo = null;

    #[ORM\Column(name: 'idies', type: 'string', length: 100, nullable: true)]
    private ?string $idies = null;

    #[ORM\Column(name: 'idcurso', type: 'string', length: 100, nullable: true)]
    private ?string $idcurso = null;

    #[ORM\Column(name: 'ds_status', type: 'boolean', nullable: true)]
    private ?bool $dsStatus = null;

    #[ORM\Column(name: 'me_observacao', type: 'text', length: 65535, nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 24 propriedades. Use os setters encadeados.

    public function getCdOrionToUnimestre(): ?int
    {
        return $this->cdOrionToUnimestre;
    }

    public function getDsEnderecoWeb(): ?string
    {
        return $this->dsEnderecoWeb;
    }

    public function setDsEnderecoWeb(?string $dsEnderecoWeb): self
    {
        $this->dsEnderecoWeb = $dsEnderecoWeb;
        return $this;
    }

    public function getDsNomeArquivo(): ?string
    {
        return $this->dsNomeArquivo;
    }

    public function setDsNomeArquivo(?string $dsNomeArquivo): self
    {
        $this->dsNomeArquivo = $dsNomeArquivo;
        return $this;
    }

    public function getNrLinha(): ?int
    {
        return $this->nrLinha;
    }

    public function setNrLinha(?int $nrLinha): self
    {
        $this->nrLinha = $nrLinha;
        return $this;
    }

    public function getDthrcriacaoDoc(): ?string
    {
        return $this->dthrcriacaoDoc;
    }

    public function setDthrcriacaoDoc(?string $dthrcriacaoDoc): self
    {
        $this->dthrcriacaoDoc = $dthrcriacaoDoc;
        return $this;
    }

    public function getDtvalidadeDoc(): ?string
    {
        return $this->dtvalidadeDoc;
    }

    public function setDtvalidadeDoc(?string $dtvalidadeDoc): self
    {
        $this->dtvalidadeDoc = $dtvalidadeDoc;
        return $this;
    }

    public function getNomeArquivo(): ?string
    {
        return $this->nomeArquivo;
    }

    public function setNomeArquivo(?string $nomeArquivo): self
    {
        $this->nomeArquivo = $nomeArquivo;
        return $this;
    }

    public function getNomeCodificadoArquivo(): ?string
    {
        return $this->nomeCodificadoArquivo;
    }

    public function setNomeCodificadoArquivo(?string $nomeCodificadoArquivo): self
    {
        $this->nomeCodificadoArquivo = $nomeCodificadoArquivo;
        return $this;
    }

    public function getFormato(): ?string
    {
        return $this->formato;
    }

    public function setFormato(?string $formato): self
    {
        $this->formato = $formato;
        return $this;
    }

    public function getIdSolicitante(): ?string
    {
        return $this->idSolicitante;
    }

    public function setIdSolicitante(?string $idSolicitante): self
    {
        $this->idSolicitante = $idSolicitante;
        return $this;
    }

    public function getNomeSolicitante(): ?string
    {
        return $this->nomeSolicitante;
    }

    public function setNomeSolicitante(?string $nomeSolicitante): self
    {
        $this->nomeSolicitante = $nomeSolicitante;
        return $this;
    }

    public function getIdProprietario(): ?string
    {
        return $this->idProprietario;
    }

    public function setIdProprietario(?string $idProprietario): self
    {
        $this->idProprietario = $idProprietario;
        return $this;
    }

    public function getNomeProprietario(): ?string
    {
        return $this->nomeProprietario;
    }

    public function setNomeProprietario(?string $nomeProprietario): self
    {
        $this->nomeProprietario = $nomeProprietario;
        return $this;
    }

    public function getIddocum(): ?string
    {
        return $this->iddocum;
    }

    public function setIddocum(?string $iddocum): self
    {
        $this->iddocum = $iddocum;
        return $this;
    }

    public function getCoddocumtpo(): ?string
    {
        return $this->coddocumtpo;
    }

    public function setCoddocumtpo(?string $coddocumtpo): self
    {
        $this->coddocumtpo = $coddocumtpo;
        return $this;
    }

    public function getDesdocumtpo(): ?string
    {
        return $this->desdocumtpo;
    }

    public function setDesdocumtpo(?string $desdocumtpo): self
    {
        $this->desdocumtpo = $desdocumtpo;
        return $this;
    }

    public function getUploadDownload(): ?string
    {
        return $this->uploadDownload;
    }

    public function setUploadDownload(?string $uploadDownload): self
    {
        $this->uploadDownload = $uploadDownload;
        return $this;
    }

    public function getSituacao(): ?string
    {
        return $this->situacao;
    }

    public function setSituacao(?string $situacao): self
    {
        $this->situacao = $situacao;
        return $this;
    }

    public function getIdprocerp(): ?string
    {
        return $this->idprocerp;
    }

    public function setIdprocerp(?string $idprocerp): self
    {
        $this->idprocerp = $idprocerp;
        return $this;
    }

    public function getDenprocerptpo(): ?string
    {
        return $this->denprocerptpo;
    }

    public function setDenprocerptpo(?string $denprocerptpo): self
    {
        $this->denprocerptpo = $denprocerptpo;
        return $this;
    }

    public function getIdies(): ?string
    {
        return $this->idies;
    }

    public function setIdies(?string $idies): self
    {
        $this->idies = $idies;
        return $this;
    }

    public function getIdcurso(): ?string
    {
        return $this->idcurso;
    }

    public function setIdcurso(?string $idcurso): self
    {
        $this->idcurso = $idcurso;
        return $this;
    }

    public function isDsStatus(): ?bool
    {
        return $this->dsStatus;
    }

    public function setDsStatus(?bool $dsStatus): self
    {
        $this->dsStatus = $dsStatus;
        return $this;
    }

    public function getMeObservacao(): ?string
    {
        return $this->meObservacao;
    }

    public function setMeObservacao(?string $meObservacao): self
    {
        $this->meObservacao = $meObservacao;
        return $this;
    }

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }
}
