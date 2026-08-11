<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\OuvOuvidoriasItensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvOuvidoriasItensRepository::class)]
#[ORM\Table(
    name: 'ouv_ouvidorias_itens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'ix_ouv_oi_setor', columns: ['CD_SETOR_RESPONDEU'])]
#[ORM\Index(name: 'ix_ouv_oi_ouvidoria', columns: ['CD_OUVIDORIA'])]
#[ORM\Index(name: 'IX_CD_OUVIDORIA', columns: ['CD_OUVIDORIA'])]
#[ORM\Index(name: 'IX_CD_SETOR_RESPONDEU', columns: ['CD_SETOR_RESPONDEU'])]
#[ORM\Index(name: 'IX_CD_PESS_RESPONDEU', columns: ['CD_PESS_RESPONDEU'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_OOI_OUVIDORIA_OO_OUVIDORIA', 'colunas' => ['CD_OUVIDORIA'], 'tabelaAlvo' => 'ouv_ouvidorias', 'colunasAlvo' => ['CD_OUVIDORIA'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_OOI_SETRESP_OS_SETOR', 'colunas' => ['CD_SETOR_RESPONDEU'], 'tabelaAlvo' => 'ouv_setores', 'colunasAlvo' => ['CD_SETOR'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class OuvOuvidoriasItens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_ITEM', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdItem = null;

    #[ORM\ManyToOne(targetEntity: OuvOuvidorias::class)]
    #[ORM\JoinColumn(name: 'CD_OUVIDORIA', referencedColumnName: 'CD_OUVIDORIA', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OuvOuvidorias $cdOuvidoria = null;

    #[ORM\ManyToOne(targetEntity: OuvSetores::class)]
    #[ORM\JoinColumn(name: 'CD_SETOR_RESPONDEU', referencedColumnName: 'CD_SETOR', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?OuvSetores $cdSetorRespondeu = null;

    #[ORM\Column(name: 'CD_PESS_RESPONDEU', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessRespondeu = null;

    #[ORM\Column(name: 'DS_MENSAGEM', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'DT_RESPOSTA', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtResposta = null;

    #[ORM\Column(name: 'DT_PRAZO_RETORNO', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtPrazoRetorno = null;

    #[ORM\Column(name: 'CD_NOVO_SETOR', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdNovoSetor = null;

    #[ORM\Column(name: 'CD_NOVO_RESPONSAVEL', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdNovoResponsavel = null;

    #[ORM\Column(name: 'SN_ABERTURA', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAbertura = null;

    #[ORM\Column(name: 'CD_NOVO_ASSUNTO', type: 'integer', nullable: true)]
    private ?int $cdNovoAssunto = null;

    public function __construct(
        ?OuvOuvidorias $cdOuvidoria = null,
        ?OuvSetores $cdSetorRespondeu = null,
        ?int $cdPessRespondeu = null,
        ?string $dsMensagem = null,
        ?\DateTimeInterface $dtResposta = null,
        ?\DateTimeInterface $dtPrazoRetorno = null,
        ?int $cdNovoSetor = null,
        ?int $cdNovoResponsavel = null,
        ?int $snAbertura = null,
        ?int $cdNovoAssunto = null
    ) {
        $this->cdOuvidoria = $cdOuvidoria;
        $this->cdSetorRespondeu = $cdSetorRespondeu;
        $this->cdPessRespondeu = $cdPessRespondeu;
        $this->dsMensagem = $dsMensagem;
        $this->dtResposta = $dtResposta;
        $this->dtPrazoRetorno = $dtPrazoRetorno;
        $this->cdNovoSetor = $cdNovoSetor;
        $this->cdNovoResponsavel = $cdNovoResponsavel;
        $this->snAbertura = $snAbertura;
        $this->cdNovoAssunto = $cdNovoAssunto;
    }

    public function getCdItem(): ?int
    {
        return $this->cdItem;
    }

    public function getCdOuvidoria(): ?OuvOuvidorias
    {
        return $this->cdOuvidoria;
    }

    public function setCdOuvidoria(?OuvOuvidorias $cdOuvidoria): self
    {
        $this->cdOuvidoria = $cdOuvidoria;
        return $this;
    }

    public function getCdSetorRespondeu(): ?OuvSetores
    {
        return $this->cdSetorRespondeu;
    }

    public function setCdSetorRespondeu(?OuvSetores $cdSetorRespondeu): self
    {
        $this->cdSetorRespondeu = $cdSetorRespondeu;
        return $this;
    }

    public function getCdPessRespondeu(): ?int
    {
        return $this->cdPessRespondeu;
    }

    public function setCdPessRespondeu(?int $cdPessRespondeu): self
    {
        $this->cdPessRespondeu = $cdPessRespondeu;
        return $this;
    }

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
        return $this;
    }

    public function getDtResposta(): ?\DateTimeInterface
    {
        return $this->dtResposta;
    }

    public function setDtResposta(?\DateTimeInterface $dtResposta): self
    {
        $this->dtResposta = $dtResposta;
        return $this;
    }

    public function getDtPrazoRetorno(): ?\DateTimeInterface
    {
        return $this->dtPrazoRetorno;
    }

    public function setDtPrazoRetorno(?\DateTimeInterface $dtPrazoRetorno): self
    {
        $this->dtPrazoRetorno = $dtPrazoRetorno;
        return $this;
    }

    public function getCdNovoSetor(): ?int
    {
        return $this->cdNovoSetor;
    }

    public function setCdNovoSetor(?int $cdNovoSetor): self
    {
        $this->cdNovoSetor = $cdNovoSetor;
        return $this;
    }

    public function getCdNovoResponsavel(): ?int
    {
        return $this->cdNovoResponsavel;
    }

    public function setCdNovoResponsavel(?int $cdNovoResponsavel): self
    {
        $this->cdNovoResponsavel = $cdNovoResponsavel;
        return $this;
    }

    public function getSnAbertura(): ?int
    {
        return $this->snAbertura;
    }

    public function setSnAbertura(?int $snAbertura): self
    {
        $this->snAbertura = $snAbertura;
        return $this;
    }

    public function getCdNovoAssunto(): ?int
    {
        return $this->cdNovoAssunto;
    }

    public function setCdNovoAssunto(?int $cdNovoAssunto): self
    {
        $this->cdNovoAssunto = $cdNovoAssunto;
        return $this;
    }
}
