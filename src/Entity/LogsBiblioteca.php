<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogsBibliotecaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogsBibliotecaRepository::class)]
#[ORM\Table(
    name: 'logs_biblioteca',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DT_LOG', columns: ['dt_log'])]
#[ORM\Index(name: 'IX_HR_LOG', columns: ['hr_log'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
#[ORM\Index(name: 'IX_TP_OPERACAO', columns: ['tp_operacao'])]
class LogsBiblioteca
{
    #[ORM\Id]
    #[ORM\Column(name: 'dt_log', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Id]
    #[ORM\Column(name: 'hr_log', type: 'time', options: ['default' => '00:00:00'])]
    private ?\DateTimeInterface $hrLog = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_usuario', type: 'integer', options: ['default' => '0'])]
    private int $cdUsuario = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'tp_operacao', type: 'string', length: 1, options: ['fixed' => true, 'default' => '0'])]
    private string $tpOperacao = '0';

    #[ORM\Column(name: 'cd_operacao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdOperacao = 0;

    public function __construct(
        ?\DateTimeInterface $dtLog = null,
        ?\DateTimeInterface $hrLog = null,
        int $cdUsuario = 0,
        string $tpOperacao = '0',
        ?int $cdOperacao = 0
    ) {
        $this->dtLog = $dtLog;
        $this->hrLog = $hrLog;
        $this->cdUsuario = $cdUsuario;
        $this->tpOperacao = $tpOperacao;
        $this->cdOperacao = $cdOperacao;
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

    public function getHrLog(): ?\DateTimeInterface
    {
        return $this->hrLog;
    }

    public function setHrLog(?\DateTimeInterface $hrLog): self
    {
        $this->hrLog = $hrLog;
        return $this;
    }

    public function getCdUsuario(): int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getTpOperacao(): string
    {
        return $this->tpOperacao;
    }

    public function setTpOperacao(string $tpOperacao): self
    {
        $this->tpOperacao = $tpOperacao;
        return $this;
    }

    public function getCdOperacao(): ?int
    {
        return $this->cdOperacao;
    }

    public function setCdOperacao(?int $cdOperacao): self
    {
        $this->cdOperacao = $cdOperacao;
        return $this;
    }
}
