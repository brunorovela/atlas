<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\NuIntegracaoUrlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuIntegracaoUrlRepository::class)]
#[ORM\Table(
    name: 'nu_integracao_url',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'nu_integracao_url_cd_sistema', columns: ['cd_sistema'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'nu_integracao_url_ibfk_2', 'colunas' => ['cd_sistema'], 'tabelaAlvo' => 'nu_integracao_externa', 'colunasAlvo' => ['cd_sistema'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuIntegracaoUrl
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_url', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdIntegracaoUrl = null;

    #[ORM\ManyToOne(targetEntity: NuIntegracaoExterna::class)]
    #[ORM\JoinColumn(name: 'cd_sistema', referencedColumnName: 'cd_sistema', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuIntegracaoExterna $cdSistema = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_url', type: 'string', length: 255, nullable: true)]
    private ?string $dsUrl = null;

    #[ORM\Column(name: 'ds_metodo', type: 'enum', nullable: true, options: ['default' => 'GET', 'values' => ['GET', 'POST', 'PUT', 'DELETE']])]
    private ?string $dsMetodo = 'GET';

    #[ORM\Column(name: 'nr_ordem', type: 'integer', nullable: true)]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nr_qtd_registros', type: 'integer', nullable: true)]
    private ?int $nrQtdRegistros = null;

    #[ORM\Column(name: 'nr_max_registros_executados', type: 'integer', nullable: true)]
    private ?int $nrMaxRegistrosExecutados = null;

    #[ORM\Column(name: 'dt_ultima_sincronizacao', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtUltimaSincronizacao = null;

    #[ORM\Column(name: 'dt_ultima_leitura', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtUltimaLeitura = null;

    #[ORM\Column(name: 'dt_insercao_fila', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInsercaoFila = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'ds_classe', type: 'string', length: 255, nullable: true)]
    private ?string $dsClasse = null;

    #[ORM\Column(name: 'me_log', type: 'text', length: 16777215, nullable: true)]
    private ?string $meLog = null;

    #[ORM\Column(name: 'nr_ultima_pagina_lida', type: 'integer', options: ['default' => '0'])]
    private int $nrUltimaPaginaLida = 0;

    #[ORM\Column(name: 'sn_debug', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snDebug = 0;

    public function __construct(
        ?NuIntegracaoExterna $cdSistema = null,
        ?string $dsDescricao = null,
        ?string $dsUrl = null,
        ?string $dsMetodo = 'GET',
        ?int $nrOrdem = null,
        ?string $dsChave = null,
        ?int $nrQtdRegistros = null,
        ?int $nrMaxRegistrosExecutados = null,
        ?\DateTimeInterface $dtUltimaSincronizacao = null,
        ?\DateTimeInterface $dtUltimaLeitura = null,
        ?\DateTimeInterface $dtInsercaoFila = null,
        ?string $meSql = null,
        ?string $dsClasse = null,
        ?string $meLog = null,
        int $nrUltimaPaginaLida = 0,
        int $snDebug = 0
    ) {
        $this->cdSistema = $cdSistema;
        $this->dsDescricao = $dsDescricao;
        $this->dsUrl = $dsUrl;
        $this->dsMetodo = $dsMetodo;
        $this->nrOrdem = $nrOrdem;
        $this->dsChave = $dsChave;
        $this->nrQtdRegistros = $nrQtdRegistros;
        $this->nrMaxRegistrosExecutados = $nrMaxRegistrosExecutados;
        $this->dtUltimaSincronizacao = $dtUltimaSincronizacao;
        $this->dtUltimaLeitura = $dtUltimaLeitura;
        $this->dtInsercaoFila = $dtInsercaoFila;
        $this->meSql = $meSql;
        $this->dsClasse = $dsClasse;
        $this->meLog = $meLog;
        $this->nrUltimaPaginaLida = $nrUltimaPaginaLida;
        $this->snDebug = $snDebug;
    }

    public function getCdIntegracaoUrl(): ?int
    {
        return $this->cdIntegracaoUrl;
    }

    public function getCdSistema(): ?NuIntegracaoExterna
    {
        return $this->cdSistema;
    }

    public function setCdSistema(?NuIntegracaoExterna $cdSistema): self
    {
        $this->cdSistema = $cdSistema;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function getDsMetodo(): ?string
    {
        return $this->dsMetodo;
    }

    public function setDsMetodo(?string $dsMetodo): self
    {
        $this->dsMetodo = $dsMetodo;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getNrQtdRegistros(): ?int
    {
        return $this->nrQtdRegistros;
    }

    public function setNrQtdRegistros(?int $nrQtdRegistros): self
    {
        $this->nrQtdRegistros = $nrQtdRegistros;
        return $this;
    }

    public function getNrMaxRegistrosExecutados(): ?int
    {
        return $this->nrMaxRegistrosExecutados;
    }

    public function setNrMaxRegistrosExecutados(?int $nrMaxRegistrosExecutados): self
    {
        $this->nrMaxRegistrosExecutados = $nrMaxRegistrosExecutados;
        return $this;
    }

    public function getDtUltimaSincronizacao(): ?\DateTimeInterface
    {
        return $this->dtUltimaSincronizacao;
    }

    public function setDtUltimaSincronizacao(?\DateTimeInterface $dtUltimaSincronizacao): self
    {
        $this->dtUltimaSincronizacao = $dtUltimaSincronizacao;
        return $this;
    }

    public function getDtUltimaLeitura(): ?\DateTimeInterface
    {
        return $this->dtUltimaLeitura;
    }

    public function setDtUltimaLeitura(?\DateTimeInterface $dtUltimaLeitura): self
    {
        $this->dtUltimaLeitura = $dtUltimaLeitura;
        return $this;
    }

    public function getDtInsercaoFila(): ?\DateTimeInterface
    {
        return $this->dtInsercaoFila;
    }

    public function setDtInsercaoFila(?\DateTimeInterface $dtInsercaoFila): self
    {
        $this->dtInsercaoFila = $dtInsercaoFila;
        return $this;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }

    public function getDsClasse(): ?string
    {
        return $this->dsClasse;
    }

    public function setDsClasse(?string $dsClasse): self
    {
        $this->dsClasse = $dsClasse;
        return $this;
    }

    public function getMeLog(): ?string
    {
        return $this->meLog;
    }

    public function setMeLog(?string $meLog): self
    {
        $this->meLog = $meLog;
        return $this;
    }

    public function getNrUltimaPaginaLida(): int
    {
        return $this->nrUltimaPaginaLida;
    }

    public function setNrUltimaPaginaLida(int $nrUltimaPaginaLida): self
    {
        $this->nrUltimaPaginaLida = $nrUltimaPaginaLida;
        return $this;
    }

    public function getSnDebug(): int
    {
        return $this->snDebug;
    }

    public function setSnDebug(int $snDebug): self
    {
        $this->snDebug = $snDebug;
        return $this;
    }
}
