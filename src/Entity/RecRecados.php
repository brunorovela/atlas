<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\RecRecadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecRecadosRepository::class)]
#[ORM\Table(
    name: 'rec_recados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_recado', columns: ['cd_recado'])]
#[ORM\Index(name: 'IX_CD_PESSOA_ORIGEM', columns: ['cd_pessoa_origem'])]
#[ORM\Index(name: 'IX_CD_RECADO_ORIGEM', columns: ['cd_recado_origem'])]
#[ORM\Index(name: 'IX_CD_ORIGEM', columns: ['cd_origem'])]
#[ORM\Index(name: 'IX_CD_DESTINO', columns: ['cd_destino'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class RecRecados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_recado', type: 'integer')]
    private ?int $cdRecado = null;

    #[ORM\Column(name: 'ds_recado', type: 'text', length: 16777215)]
    private ?string $dsRecado = null;

    #[ORM\Column(name: 'cd_origem', type: 'integer', options: ['default' => '0'])]
    private int $cdOrigem = 0;

    #[ORM\Column(name: 'dt_recado', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRecado = null;

    #[ORM\Column(name: 'cd_destino', type: 'integer', options: ['default' => '0'])]
    private int $cdDestino = 0;

    #[ORM\Column(name: 'sn_lido', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snLido = 'N';

    #[ORM\Column(name: 'dt_lido', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLido = null;

    #[ORM\Column(name: 'cd_pessoa_origem', type: 'string', length: 10, options: ['default' => '0'])]
    private string $cdPessoaOrigem = '0';

    #[ORM\Column(name: 'cd_recado_origem', type: 'integer', nullable: true)]
    private ?int $cdRecadoOrigem = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'sn_biblioteca', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snBiblioteca = 0;

    #[ORM\Column(name: 'sn_sms', type: 'boolean', options: ['default' => '0'])]
    private bool $snSms = false;

    #[ORM\Column(name: 'ds_recado_sms', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRecadoSms = null;

    #[ORM\Column(name: 'sn_urgente', type: 'boolean', options: ['default' => '0'])]
    private bool $snUrgente = false;

    #[ORM\Column(name: 'ds_recado_outclass', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRecadoOutclass = null;

    #[ORM\Column(name: 'cd_categoria', type: 'integer', nullable: true, options: ['default' => '1'])]
    private ?int $cdCategoria = 1;

    #[ORM\Column(name: 'sn_solicita_confirmacao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snSolicitaConfirmacao = false;

    #[ORM\Column(name: 'dt_prazo_autorizacao', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtPrazoAutorizacao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_recado_integrado', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdRecadoIntegrado = null;

    #[ORM\Column(name: 'sn_agenda_mais', type: 'boolean', options: ['default' => '0'])]
    private bool $snAgendaMais = false;

    #[ORM\Column(name: 'ds_recado_agenda_mais', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsRecadoAgendaMais = null;

    // Sem construtor: 21 propriedades. Use os setters encadeados.

    public function getCdRecado(): ?int
    {
        return $this->cdRecado;
    }

    public function getDsRecado(): ?string
    {
        return $this->dsRecado;
    }

    public function setDsRecado(?string $dsRecado): self
    {
        $this->dsRecado = $dsRecado;
        return $this;
    }

    public function getCdOrigem(): int
    {
        return $this->cdOrigem;
    }

    public function setCdOrigem(int $cdOrigem): self
    {
        $this->cdOrigem = $cdOrigem;
        return $this;
    }

    public function getDtRecado(): ?\DateTimeInterface
    {
        return $this->dtRecado;
    }

    public function setDtRecado(?\DateTimeInterface $dtRecado): self
    {
        $this->dtRecado = $dtRecado;
        return $this;
    }

    public function getCdDestino(): int
    {
        return $this->cdDestino;
    }

    public function setCdDestino(int $cdDestino): self
    {
        $this->cdDestino = $cdDestino;
        return $this;
    }

    public function getSnLido(): string
    {
        return $this->snLido;
    }

    public function setSnLido(string $snLido): self
    {
        $this->snLido = $snLido;
        return $this;
    }

    public function getDtLido(): ?\DateTimeInterface
    {
        return $this->dtLido;
    }

    public function setDtLido(?\DateTimeInterface $dtLido): self
    {
        $this->dtLido = $dtLido;
        return $this;
    }

    public function getCdPessoaOrigem(): string
    {
        return $this->cdPessoaOrigem;
    }

    public function setCdPessoaOrigem(string $cdPessoaOrigem): self
    {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        return $this;
    }

    public function getCdRecadoOrigem(): ?int
    {
        return $this->cdRecadoOrigem;
    }

    public function setCdRecadoOrigem(?int $cdRecadoOrigem): self
    {
        $this->cdRecadoOrigem = $cdRecadoOrigem;
        return $this;
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

    public function getSnBiblioteca(): int
    {
        return $this->snBiblioteca;
    }

    public function setSnBiblioteca(int $snBiblioteca): self
    {
        $this->snBiblioteca = $snBiblioteca;
        return $this;
    }

    public function isSnSms(): bool
    {
        return $this->snSms;
    }

    public function setSnSms(bool $snSms): self
    {
        $this->snSms = $snSms;
        return $this;
    }

    public function getDsRecadoSms(): ?string
    {
        return $this->dsRecadoSms;
    }

    public function setDsRecadoSms(?string $dsRecadoSms): self
    {
        $this->dsRecadoSms = $dsRecadoSms;
        return $this;
    }

    public function isSnUrgente(): bool
    {
        return $this->snUrgente;
    }

    public function setSnUrgente(bool $snUrgente): self
    {
        $this->snUrgente = $snUrgente;
        return $this;
    }

    public function getDsRecadoOutclass(): ?string
    {
        return $this->dsRecadoOutclass;
    }

    public function setDsRecadoOutclass(?string $dsRecadoOutclass): self
    {
        $this->dsRecadoOutclass = $dsRecadoOutclass;
        return $this;
    }

    public function getCdCategoria(): ?int
    {
        return $this->cdCategoria;
    }

    public function setCdCategoria(?int $cdCategoria): self
    {
        $this->cdCategoria = $cdCategoria;
        return $this;
    }

    public function isSnSolicitaConfirmacao(): ?bool
    {
        return $this->snSolicitaConfirmacao;
    }

    public function setSnSolicitaConfirmacao(?bool $snSolicitaConfirmacao): self
    {
        $this->snSolicitaConfirmacao = $snSolicitaConfirmacao;
        return $this;
    }

    public function getDtPrazoAutorizacao(): ?\DateTimeInterface
    {
        return $this->dtPrazoAutorizacao;
    }

    public function setDtPrazoAutorizacao(?\DateTimeInterface $dtPrazoAutorizacao): self
    {
        $this->dtPrazoAutorizacao = $dtPrazoAutorizacao;
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

    public function getCdRecadoIntegrado(): ?int
    {
        return $this->cdRecadoIntegrado;
    }

    public function setCdRecadoIntegrado(?int $cdRecadoIntegrado): self
    {
        $this->cdRecadoIntegrado = $cdRecadoIntegrado;
        return $this;
    }

    public function isSnAgendaMais(): bool
    {
        return $this->snAgendaMais;
    }

    public function setSnAgendaMais(bool $snAgendaMais): self
    {
        $this->snAgendaMais = $snAgendaMais;
        return $this;
    }

    public function getDsRecadoAgendaMais(): ?string
    {
        return $this->dsRecadoAgendaMais;
    }

    public function setDsRecadoAgendaMais(?string $dsRecadoAgendaMais): self
    {
        $this->dsRecadoAgendaMais = $dsRecadoAgendaMais;
        return $this;
    }
}
