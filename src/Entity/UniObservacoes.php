<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniObservacoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniObservacoesRepository::class)]
#[ORM\Table(
    name: 'uni_observacoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_OBS_CD_PESSOA_PES_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'FK_OBS_CD_USUARIO_PES_CD_PESSO', columns: ['CD_USUARIO'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['CD_PESSOA'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['CD_USUARIO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_OBS_CD_PESSOA_PES_CD_PESSOA', 'colunas' => ['CD_PESSOA'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_OBS_CD_USUARIO_PES_CD_PESSO', 'colunas' => ['CD_USUARIO'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniObservacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_OBSERVACAO', type: 'bigint', options: ['unsigned' => true])]
    private ?string $cdObservacao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_PESSOA', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'CD_USUARIO', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdUsuario = null;

    #[ORM\Column(name: 'DT_OBSERVACAO', type: 'datetime')]
    private ?\DateTimeInterface $dtObservacao = null;

    #[ORM\Column(name: 'SG_TIPO', type: 'string', length: 1, options: ['fixed' => true])]
    private ?string $sgTipo = null;

    #[ORM\Column(name: 'ME_OBSERVACAO', type: 'text', nullable: true)]
    private ?string $meObservacao = null;

    #[ORM\Column(name: 'ME_OBSERVACAO_FORMATADO', type: 'text', nullable: true)]
    private ?string $meObservacaoFormatado = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?Pessoas $cdUsuario = null,
        ?\DateTimeInterface $dtObservacao = null,
        ?string $sgTipo = null,
        ?string $meObservacao = null,
        ?string $meObservacaoFormatado = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdUsuario = $cdUsuario;
        $this->dtObservacao = $dtObservacao;
        $this->sgTipo = $sgTipo;
        $this->meObservacao = $meObservacao;
        $this->meObservacaoFormatado = $meObservacaoFormatado;
    }

    public function getCdObservacao(): ?string
    {
        return $this->cdObservacao;
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

    public function getCdUsuario(): ?Pessoas
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?Pessoas $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getDtObservacao(): ?\DateTimeInterface
    {
        return $this->dtObservacao;
    }

    public function setDtObservacao(?\DateTimeInterface $dtObservacao): self
    {
        $this->dtObservacao = $dtObservacao;
        return $this;
    }

    public function getSgTipo(): ?string
    {
        return $this->sgTipo;
    }

    public function setSgTipo(?string $sgTipo): self
    {
        $this->sgTipo = $sgTipo;
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

    public function getMeObservacaoFormatado(): ?string
    {
        return $this->meObservacaoFormatado;
    }

    public function setMeObservacaoFormatado(?string $meObservacaoFormatado): self
    {
        $this->meObservacaoFormatado = $meObservacaoFormatado;
        return $this;
    }
}
