<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AcrvDocumentoPessoaAssinanteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvDocumentoPessoaAssinanteRepository::class)]
#[ORM\Table(
    name: 'acrv_documento_pessoa_assinante',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_cd_documento_pessoa', columns: ['cd_documento_pessoa'])]
#[ORM\Index(name: 'idx_cd_documento', columns: ['cd_documento'])]
#[ORM\Index(name: 'idx_cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'idx_pes_doc_docpes', columns: ['cd_documento_pessoa', 'cd_documento', 'cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'acrv_doc_pes_assinante_ibfk_1', 'colunas' => ['cd_documento_pessoa'], 'tabelaAlvo' => 'acrv_documento_pessoa', 'colunasAlvo' => ['cd_documento_pessoa'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]],
        ['nome' => 'acrv_doc_pes_assinante_ibfk_2', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]],
        ['nome' => 'acrv_doc_pes_assinante_ibfk_3', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => null, 'onUpdate' => null]]
    ],
    autoIncremento: []
)]
class AcrvDocumentoPessoaAssinante
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_documento_pessoa_assinante', type: 'integer', options: ['unsigned' => true])]
    private ?int $idDocumentoPessoaAssinante = null;

    #[ORM\ManyToOne(targetEntity: AcrvDocumentoPessoa::class)]
    #[ORM\JoinColumn(name: 'cd_documento_pessoa', referencedColumnName: 'cd_documento_pessoa', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AcrvDocumentoPessoa $cdDocumentoPessoa = null;

    #[ORM\Column(name: 'cd_documento', type: 'integer')]
    private ?int $cdDocumento = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'sn_pessoa_selecionada', type: 'boolean', options: ['default' => '0'])]
    private bool $snPessoaSelecionada = false;

    #[ORM\Column(name: 'sn_assinado', type: 'boolean', options: ['default' => '0'])]
    private bool $snAssinado = false;

    #[ORM\Column(name: 'ds_chave_senha', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsChaveSenha = null;

    #[ORM\Column(name: 'ds_chave_a1', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsChaveA1 = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'dt_assinatura', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAssinatura = null;

    public function __construct(
        ?AcrvDocumentoPessoa $cdDocumentoPessoa = null,
        ?int $cdDocumento = null,
        ?Pessoas $cdPessoa = null,
        bool $snPessoaSelecionada = false,
        bool $snAssinado = false,
        ?string $dsChaveSenha = null,
        ?string $dsChaveA1 = null,
        ?\DateTimeInterface $dtBase = null,
        ?\DateTimeInterface $dtAssinatura = null
    ) {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        $this->cdDocumento = $cdDocumento;
        $this->cdPessoa = $cdPessoa;
        $this->snPessoaSelecionada = $snPessoaSelecionada;
        $this->snAssinado = $snAssinado;
        $this->dsChaveSenha = $dsChaveSenha;
        $this->dsChaveA1 = $dsChaveA1;
        $this->dtBase = $dtBase;
        $this->dtAssinatura = $dtAssinatura;
    }

    public function getIdDocumentoPessoaAssinante(): ?int
    {
        return $this->idDocumentoPessoaAssinante;
    }

    public function getCdDocumentoPessoa(): ?AcrvDocumentoPessoa
    {
        return $this->cdDocumentoPessoa;
    }

    public function setCdDocumentoPessoa(?AcrvDocumentoPessoa $cdDocumentoPessoa): self
    {
        $this->cdDocumentoPessoa = $cdDocumentoPessoa;
        return $this;
    }

    public function getCdDocumento(): ?int
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?int $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function isSnPessoaSelecionada(): bool
    {
        return $this->snPessoaSelecionada;
    }

    public function setSnPessoaSelecionada(bool $snPessoaSelecionada): self
    {
        $this->snPessoaSelecionada = $snPessoaSelecionada;
        return $this;
    }

    public function isSnAssinado(): bool
    {
        return $this->snAssinado;
    }

    public function setSnAssinado(bool $snAssinado): self
    {
        $this->snAssinado = $snAssinado;
        return $this;
    }

    public function getDsChaveSenha(): ?string
    {
        return $this->dsChaveSenha;
    }

    public function setDsChaveSenha(?string $dsChaveSenha): self
    {
        $this->dsChaveSenha = $dsChaveSenha;
        return $this;
    }

    public function getDsChaveA1(): ?string
    {
        return $this->dsChaveA1;
    }

    public function setDsChaveA1(?string $dsChaveA1): self
    {
        $this->dsChaveA1 = $dsChaveA1;
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

    public function getDtAssinatura(): ?\DateTimeInterface
    {
        return $this->dtAssinatura;
    }

    public function setDtAssinatura(?\DateTimeInterface $dtAssinatura): self
    {
        $this->dtAssinatura = $dtAssinatura;
        return $this;
    }
}
