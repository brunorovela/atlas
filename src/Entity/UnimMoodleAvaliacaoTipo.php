<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UnimMoodleAvaliacaoTipoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimMoodleAvaliacaoTipoRepository::class)]
#[ORM\Table(
    name: 'unim_moodle_avaliacao_tipo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UX_ITEMMODULE_NOME_PROVA', columns: ['ds_chave_itemmodule', 'ds_nome_prova'])]
class UnimMoodleAvaliacaoTipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_moodle_avaliacao_tipo', type: 'integer')]
    private ?int $cdMoodleAvaliacaoTipo = null;

    #[ORM\Column(name: 'cd_avaliacao_tipo', type: 'integer')]
    private ?int $cdAvaliacaoTipo = null;

    #[ORM\Column(name: 'cd_integracao_externa', type: 'integer', nullable: true)]
    private ?int $cdIntegracaoExterna = null;

    #[ORM\Column(name: 'ds_chave_itemmodule', type: 'string', length: 255, nullable: true)]
    private ?string $dsChaveItemmodule = null;

    #[ORM\Column(name: 'ds_nome_prova', type: 'string', length: 255, nullable: true, options: ['default' => ''])]
    private ?string $dsNomeProva = '';

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?int $cdAvaliacaoTipo = null,
        ?int $cdIntegracaoExterna = null,
        ?string $dsChaveItemmodule = null,
        ?string $dsNomeProva = '',
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        $this->cdIntegracaoExterna = $cdIntegracaoExterna;
        $this->dsChaveItemmodule = $dsChaveItemmodule;
        $this->dsNomeProva = $dsNomeProva;
        $this->dtBase = $dtBase;
    }

    public function getCdMoodleAvaliacaoTipo(): ?int
    {
        return $this->cdMoodleAvaliacaoTipo;
    }

    public function getCdAvaliacaoTipo(): ?int
    {
        return $this->cdAvaliacaoTipo;
    }

    public function setCdAvaliacaoTipo(?int $cdAvaliacaoTipo): self
    {
        $this->cdAvaliacaoTipo = $cdAvaliacaoTipo;
        return $this;
    }

    public function getCdIntegracaoExterna(): ?int
    {
        return $this->cdIntegracaoExterna;
    }

    public function setCdIntegracaoExterna(?int $cdIntegracaoExterna): self
    {
        $this->cdIntegracaoExterna = $cdIntegracaoExterna;
        return $this;
    }

    public function getDsChaveItemmodule(): ?string
    {
        return $this->dsChaveItemmodule;
    }

    public function setDsChaveItemmodule(?string $dsChaveItemmodule): self
    {
        $this->dsChaveItemmodule = $dsChaveItemmodule;
        return $this;
    }

    public function getDsNomeProva(): ?string
    {
        return $this->dsNomeProva;
    }

    public function setDsNomeProva(?string $dsNomeProva): self
    {
        $this->dsNomeProva = $dsNomeProva;
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
