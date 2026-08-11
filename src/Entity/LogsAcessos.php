<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogsAcessosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogsAcessosRepository::class)]
#[ORM\Table(
    name: 'logs_acessos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_MODULO', columns: ['cd_modulo'])]
#[ORM\Index(name: 'IX_DT_LOG', columns: ['dt_log'])]
#[ORM\Index(name: 'IX_HR_LOG', columns: ['hr_log'])]
#[ORM\Index(name: 'IX_CD_USUARIO', columns: ['cd_usuario'])]
class LogsAcessos
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_modulo', type: 'integer', options: ['default' => '0'])]
    private int $cdModulo = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'dt_log', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLog = null;

    #[ORM\Id]
    #[ORM\Column(name: 'hr_log', type: 'time', options: ['default' => '00:00:00'])]
    private ?\DateTimeInterface $hrLog = null;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_usuario', type: 'integer', options: ['default' => '0'])]
    private int $cdUsuario = 0;

    #[ORM\Column(name: 'sn_acessou', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snAcessou = 'N';

    #[ORM\Column(name: 'sn_incluiu', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snIncluiu = 'N';

    #[ORM\Column(name: 'sn_alterou', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snAlterou = 'N';

    #[ORM\Column(name: 'sn_excluiu', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'default' => 'N'])]
    private ?string $snExcluiu = 'N';

    public function __construct(
        int $cdModulo = 0,
        ?\DateTimeInterface $dtLog = null,
        ?\DateTimeInterface $hrLog = null,
        int $cdUsuario = 0,
        ?string $snAcessou = 'N',
        ?string $snIncluiu = 'N',
        ?string $snAlterou = 'N',
        ?string $snExcluiu = 'N'
    ) {
        $this->cdModulo = $cdModulo;
        $this->dtLog = $dtLog;
        $this->hrLog = $hrLog;
        $this->cdUsuario = $cdUsuario;
        $this->snAcessou = $snAcessou;
        $this->snIncluiu = $snIncluiu;
        $this->snAlterou = $snAlterou;
        $this->snExcluiu = $snExcluiu;
    }

    public function getCdModulo(): int
    {
        return $this->cdModulo;
    }

    public function setCdModulo(int $cdModulo): self
    {
        $this->cdModulo = $cdModulo;
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

    public function getSnAcessou(): ?string
    {
        return $this->snAcessou;
    }

    public function setSnAcessou(?string $snAcessou): self
    {
        $this->snAcessou = $snAcessou;
        return $this;
    }

    public function getSnIncluiu(): ?string
    {
        return $this->snIncluiu;
    }

    public function setSnIncluiu(?string $snIncluiu): self
    {
        $this->snIncluiu = $snIncluiu;
        return $this;
    }

    public function getSnAlterou(): ?string
    {
        return $this->snAlterou;
    }

    public function setSnAlterou(?string $snAlterou): self
    {
        $this->snAlterou = $snAlterou;
        return $this;
    }

    public function getSnExcluiu(): ?string
    {
        return $this->snExcluiu;
    }

    public function setSnExcluiu(?string $snExcluiu): self
    {
        $this->snExcluiu = $snExcluiu;
        return $this;
    }
}
