<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinEstudantilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinEstudantilRepository::class)]
#[ORM\Table(
    name: 'fin_estudantil',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'IX_DS_CHAVE', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DS_FINANCIAMENTO', columns: ['ds_financiamento'])]
#[ORM\Index(name: 'IX_DT_BASE', columns: ['dt_base'])]
class FinEstudantil
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_financiamento', type: 'string', length: 255, nullable: true)]
    private ?string $dsFinanciamento = null;

    #[ORM\Column(name: 'ds_chave', type: 'enum', options: ['values' => ['FIES', 'PROUNI']])]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_excluido', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtExcluido = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsFinanciamento = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtExcluido = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsFinanciamento = $dsFinanciamento;
        $this->dsChave = $dsChave;
        $this->dtExcluido = $dtExcluido;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsFinanciamento(): ?string
    {
        return $this->dsFinanciamento;
    }

    public function setDsFinanciamento(?string $dsFinanciamento): self
    {
        $this->dsFinanciamento = $dsFinanciamento;
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

    public function getDtExcluido(): ?\DateTimeInterface
    {
        return $this->dtExcluido;
    }

    public function setDtExcluido(?\DateTimeInterface $dtExcluido): self
    {
        $this->dtExcluido = $dtExcluido;
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
}
