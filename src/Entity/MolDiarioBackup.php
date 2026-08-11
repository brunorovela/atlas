<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MolDiarioBackupRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MolDiarioBackupRepository::class)]
#[ORM\Table(
    name: 'mol_diario_backup',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'idxUnique', columns: ['ds_tabela', 'ds_chave', 'ds_campo'])]
#[ORM\Index(name: 'IX_CD_DIARIO_BACKUP', columns: ['cd_diario_backup'])]
class MolDiarioBackup
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_diario_backup', type: 'integer')]
    private ?int $cdDiarioBackup = null;

    #[ORM\Column(name: 'ds_tabela', type: 'string', length: 50, nullable: true)]
    private ?string $dsTabela = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_chave_interna', type: 'string', length: 50, nullable: true)]
    private ?string $dsChaveInterna = null;

    #[ORM\Column(name: 'ds_campo', type: 'string', length: 50, nullable: true)]
    private ?string $dsCampo = null;

    #[ORM\Column(name: 'ds_valor', type: 'string', length: 255, nullable: true)]
    private ?string $dsValor = null;

    public function __construct(
        ?string $dsTabela = null,
        ?string $dsChave = null,
        ?string $dsChaveInterna = null,
        ?string $dsCampo = null,
        ?string $dsValor = null
    ) {
        $this->dsTabela = $dsTabela;
        $this->dsChave = $dsChave;
        $this->dsChaveInterna = $dsChaveInterna;
        $this->dsCampo = $dsCampo;
        $this->dsValor = $dsValor;
    }

    public function getCdDiarioBackup(): ?int
    {
        return $this->cdDiarioBackup;
    }

    public function getDsTabela(): ?string
    {
        return $this->dsTabela;
    }

    public function setDsTabela(?string $dsTabela): self
    {
        $this->dsTabela = $dsTabela;
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

    public function getDsChaveInterna(): ?string
    {
        return $this->dsChaveInterna;
    }

    public function setDsChaveInterna(?string $dsChaveInterna): self
    {
        $this->dsChaveInterna = $dsChaveInterna;
        return $this;
    }

    public function getDsCampo(): ?string
    {
        return $this->dsCampo;
    }

    public function setDsCampo(?string $dsCampo): self
    {
        $this->dsCampo = $dsCampo;
        return $this;
    }

    public function getDsValor(): ?string
    {
        return $this->dsValor;
    }

    public function setDsValor(?string $dsValor): self
    {
        $this->dsValor = $dsValor;
        return $this;
    }
}
