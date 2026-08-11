<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\TaImportacaoLogsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaImportacaoLogsRepository::class)]
#[ORM\Table(
    name: 'ta_importacao_logs',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TA_IMPORTACAO_LOGS', columns: ['cd_agendamento'])]
#[ORM\Index(name: 'IX_CD_AGENDAMENTO', columns: ['cd_agendamento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'ta_importacao_logs_ibfk_1', 'colunas' => ['cd_agendamento'], 'tabelaAlvo' => 'ta_importacao_agendamento', 'colunasAlvo' => ['cd_agendamento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class TaImportacaoLogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_log', type: 'integer')]
    private ?int $cdLog = null;

    #[ORM\ManyToOne(targetEntity: TaImportacaoAgendamento::class)]
    #[ORM\JoinColumn(name: 'cd_agendamento', referencedColumnName: 'cd_agendamento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?TaImportacaoAgendamento $cdAgendamento = null;

    #[ORM\Column(name: 'dt_log', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Column(name: 'sn_erro', type: 'boolean', options: ['default' => '0'])]
    private bool $snErro = false;

    #[ORM\Column(name: 'sn_encerramento', type: 'boolean', options: ['default' => '0'])]
    private bool $snEncerramento = false;

    #[ORM\Column(name: 'me_erro', type: 'text', length: 16777215, nullable: true)]
    private ?string $meErro = null;

    #[ORM\Column(name: 'me_arquivo', type: 'text', length: 16777215, nullable: true)]
    private ?string $meArquivo = null;

    #[ORM\Column(name: 'ds_md5_arquivo', type: 'string', length: 32, nullable: true)]
    private ?string $dsMd5Arquivo = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $nmArquivo = null;

    public function __construct(
        ?TaImportacaoAgendamento $cdAgendamento = null,
        ?\DateTimeInterface $dtLog = null,
        bool $snErro = false,
        bool $snEncerramento = false,
        ?string $meErro = null,
        ?string $meArquivo = null,
        ?string $dsMd5Arquivo = null,
        ?string $nmArquivo = null
    ) {
        $this->cdAgendamento = $cdAgendamento;
        $this->dtLog = $dtLog;
        $this->snErro = $snErro;
        $this->snEncerramento = $snEncerramento;
        $this->meErro = $meErro;
        $this->meArquivo = $meArquivo;
        $this->dsMd5Arquivo = $dsMd5Arquivo;
        $this->nmArquivo = $nmArquivo;
    }

    public function getCdLog(): ?int
    {
        return $this->cdLog;
    }

    public function getCdAgendamento(): ?TaImportacaoAgendamento
    {
        return $this->cdAgendamento;
    }

    public function setCdAgendamento(?TaImportacaoAgendamento $cdAgendamento): self
    {
        $this->cdAgendamento = $cdAgendamento;
        return $this;
    }

    public function getDtLog(): ?\DateTimeInterface
    {
        return $this->dtLog;
    }

    public function setDtLog(?\DateTimeInterface $dtLog): self
    {
        $this->dtLog = $dtLog;
        return $this;
    }

    public function isSnErro(): bool
    {
        return $this->snErro;
    }

    public function setSnErro(bool $snErro): self
    {
        $this->snErro = $snErro;
        return $this;
    }

    public function isSnEncerramento(): bool
    {
        return $this->snEncerramento;
    }

    public function setSnEncerramento(bool $snEncerramento): self
    {
        $this->snEncerramento = $snEncerramento;
        return $this;
    }

    public function getMeErro(): ?string
    {
        return $this->meErro;
    }

    public function setMeErro(?string $meErro): self
    {
        $this->meErro = $meErro;
        return $this;
    }

    public function getMeArquivo(): ?string
    {
        return $this->meArquivo;
    }

    public function setMeArquivo(?string $meArquivo): self
    {
        $this->meArquivo = $meArquivo;
        return $this;
    }

    public function getDsMd5Arquivo(): ?string
    {
        return $this->dsMd5Arquivo;
    }

    public function setDsMd5Arquivo(?string $dsMd5Arquivo): self
    {
        $this->dsMd5Arquivo = $dsMd5Arquivo;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }
}
