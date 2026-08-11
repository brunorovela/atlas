<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\SvcRecadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcRecadosRepository::class)]
#[ORM\Table(
    name: 'svc_recados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_recados', columns: ['ds_titulo'])]
class SvcRecados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_recado', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRecado = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 100)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 65535)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 65535)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 50, options: ['fixed' => true])]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'me_msg_email', type: 'text')]
    private ?string $meMsgEmail = null;

    #[ORM\Column(name: 'me_msg_recado', type: 'text')]
    private ?string $meMsgRecado = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAtivo = 0;

    #[ORM\Column(name: 'tp_recado', type: 'enum', options: ['default' => '1', 'values' => ['1', '2', '3', '4', '5', '6', '7', '8', '32']])]
    private string $tpRecado = '1';

    #[ORM\Column(name: 'nr_intervalo', type: 'integer', options: ['unsigned' => true, 'default' => '30'])]
    private int $nrIntervalo = 30;

    #[ORM\Column(name: 'cd_origem', type: 'integer')]
    private ?int $cdOrigem = null;

    #[ORM\Column(name: 'cd_destino', type: 'integer')]
    private ?int $cdDestino = null;

    #[ORM\Column(name: 'me_pre_sql', type: 'text', length: 65535, nullable: true)]
    private ?string $mePreSql = null;

    #[ORM\Column(name: 'nr_ordem_execucao', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $nrOrdemExecucao = 1;

    #[ORM\Column(name: 'me_msg_sms', type: 'string', length: 255, nullable: true)]
    private ?string $meMsgSms = null;

    #[ORM\Column(name: 'ds_lista_tipos_contatos', type: 'string', length: 50, nullable: true)]
    private ?string $dsListaTiposContatos = null;

    #[ORM\Column(name: 'sn_urgente', type: 'boolean', nullable: true)]
    private ?bool $snUrgente = null;

    #[ORM\Column(name: 'cd_smtp', type: 'integer', nullable: true)]
    private ?int $cdSmtp = null;

    public function __construct(
        ?string $dsTitulo = null,
        ?string $meDescricao = null,
        ?string $meSql = null,
        ?string $dsAssunto = null,
        ?string $meMsgEmail = null,
        ?string $meMsgRecado = null,
        int $snAtivo = 0,
        string $tpRecado = '1',
        int $nrIntervalo = 30,
        ?int $cdOrigem = null,
        ?int $cdDestino = null,
        ?string $mePreSql = null,
        ?int $nrOrdemExecucao = 1,
        ?string $meMsgSms = null,
        ?string $dsListaTiposContatos = null,
        ?bool $snUrgente = null,
        ?int $cdSmtp = null
    ) {
        $this->dsTitulo = $dsTitulo;
        $this->meDescricao = $meDescricao;
        $this->meSql = $meSql;
        $this->dsAssunto = $dsAssunto;
        $this->meMsgEmail = $meMsgEmail;
        $this->meMsgRecado = $meMsgRecado;
        $this->snAtivo = $snAtivo;
        $this->tpRecado = $tpRecado;
        $this->nrIntervalo = $nrIntervalo;
        $this->cdOrigem = $cdOrigem;
        $this->cdDestino = $cdDestino;
        $this->mePreSql = $mePreSql;
        $this->nrOrdemExecucao = $nrOrdemExecucao;
        $this->meMsgSms = $meMsgSms;
        $this->dsListaTiposContatos = $dsListaTiposContatos;
        $this->snUrgente = $snUrgente;
        $this->cdSmtp = $cdSmtp;
    }

    public function getCdRecado(): ?int
    {
        return $this->cdRecado;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getMeDescricao(): ?string
    {
        return $this->meDescricao;
    }

    public function setMeDescricao(?string $meDescricao): self
    {
        $this->meDescricao = $meDescricao;
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

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getMeMsgEmail(): ?string
    {
        return $this->meMsgEmail;
    }

    public function setMeMsgEmail(?string $meMsgEmail): self
    {
        $this->meMsgEmail = $meMsgEmail;
        return $this;
    }

    public function getMeMsgRecado(): ?string
    {
        return $this->meMsgRecado;
    }

    public function setMeMsgRecado(?string $meMsgRecado): self
    {
        $this->meMsgRecado = $meMsgRecado;
        return $this;
    }

    public function getSnAtivo(): int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getTpRecado(): string
    {
        return $this->tpRecado;
    }

    public function setTpRecado(string $tpRecado): self
    {
        $this->tpRecado = $tpRecado;
        return $this;
    }

    public function getNrIntervalo(): int
    {
        return $this->nrIntervalo;
    }

    public function setNrIntervalo(int $nrIntervalo): self
    {
        $this->nrIntervalo = $nrIntervalo;
        return $this;
    }

    public function getCdOrigem(): ?int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(?int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getCdDestino(): ?int
    {
        return $this->cdDestino;
    }

    public function setCdDestino(?int $cdDestino): self
    {
        $this->cdDestino = $cdDestino;
        return $this;
    }

    public function getMePreSql(): ?string
    {
        return $this->mePreSql;
    }

    public function setMePreSql(?string $mePreSql): self
    {
        $this->mePreSql = $mePreSql;
        return $this;
    }

    public function getNrOrdemExecucao(): ?int
    {
        return $this->nrOrdemExecucao;
    }

    public function setNrOrdemExecucao(?int $nrOrdemExecucao): self
    {
        $this->nrOrdemExecucao = $nrOrdemExecucao;
        return $this;
    }

    public function getMeMsgSms(): ?string
    {
        return $this->meMsgSms;
    }

    public function setMeMsgSms(?string $meMsgSms): self
    {
        $this->meMsgSms = $meMsgSms;
        return $this;
    }

    public function getDsListaTiposContatos(): ?string
    {
        return $this->dsListaTiposContatos;
    }

    public function setDsListaTiposContatos(?string $dsListaTiposContatos): self
    {
        $this->dsListaTiposContatos = $dsListaTiposContatos;
        return $this;
    }

    public function isSnUrgente(): ?bool
    {
        return $this->snUrgente;
    }

    public function setSnUrgente(?bool $snUrgente): self
    {
        $this->snUrgente = $snUrgente;
        return $this;
    }

    public function getCdSmtp(): ?int
    {
        return $this->cdSmtp;
    }

    public function setCdSmtp(?int $cdSmtp): self
    {
        $this->cdSmtp = $cdSmtp;
        return $this;
    }
}
