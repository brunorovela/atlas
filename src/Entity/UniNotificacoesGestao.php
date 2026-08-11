<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UniNotificacoesGestaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniNotificacoesGestaoRepository::class)]
#[ORM\Table(
    name: 'uni_notificacoes_gestao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_UNI_NOTIFICACOES_GESTAO_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UniNotificacoesGestao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_notificacao', type: 'integer')]
    private ?int $cdNotificacao = null;

    #[ORM\Column(name: 'ds_notificacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsNotificacao = null;

    #[ORM\Column(name: 'ds_tipo', type: 'string', length: 100, nullable: true)]
    private ?string $dsTipo = null;

    #[ORM\Column(name: 'ds_url', type: 'text', length: 65535, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    public function __construct(
        ?string $dsNotificacao = null,
        ?string $dsTipo = null,
        ?string $dsUrl = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?Pessoas $cdPessoa = null
    ) {
        $this->dsNotificacao = $dsNotificacao;
        $this->dsTipo = $dsTipo;
        $this->dsUrl = $dsUrl;
        $this->dtInclusao = $dtInclusao;
        $this->cdPessoa = $cdPessoa;
    }

    public function getCdNotificacao(): ?int
    {
        return $this->cdNotificacao;
    }

    public function getDsNotificacao(): ?string
    {
        return $this->dsNotificacao;
    }

    public function setDsNotificacao(?string $dsNotificacao): self
    {
        $this->dsNotificacao = $dsNotificacao;
        return $this;
    }

    public function getDsTipo(): ?string
    {
        return $this->dsTipo;
    }

    public function setDsTipo(?string $dsTipo): self
    {
        $this->dsTipo = $dsTipo;
        return $this;
    }

    public function getDsUrl(): ?string
    {
        return $this->dsUrl;
    }

    public function setDsUrl(?string $dsUrl): self
    {
        $this->dsUrl = $dsUrl;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
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
}
