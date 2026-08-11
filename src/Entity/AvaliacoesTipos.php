<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AvaliacoesTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacoesTiposRepository::class)]
#[ORM\Table(
    name: 'avaliacoes_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class AvaliacoesTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_avaliacao_tipo', type: 'integer')]
    private ?int $cdAvaliacaoTipo = null;

    #[ORM\Column(name: 'ds_avaliacao', type: 'string', length: 255)]
    private ?string $dsAvaliacao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'cd_tipo', type: 'integer')]
    private ?int $cdTipo = null;

    #[ORM\Column(name: 'sn_diario_local', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snDiarioLocal = 'N';

    #[ORM\Column(name: 'sn_diario_online', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snDiarioOnline = 'N';

    #[ORM\Column(name: 'sn_producao_academica', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snProducaoAcademica = 'N';

    #[ORM\Column(name: 'sn_prova_online', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snProvaOnline = 'N';

    #[ORM\Column(name: 'sn_prova_online_presencial', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snProvaOnlinePresencial = 'N';

    #[ORM\Column(name: 'sn_necessita_deferimento', type: 'string', length: 1, options: ['fixed' => true, 'default' => 'N'])]
    private string $snNecessitaDeferimento = 'N';

    public function __construct(
        ?string $dsAvaliacao = null,
        ?string $dsChave = null,
        ?int $cdTipo = null,
        string $snDiarioLocal = 'N',
        string $snDiarioOnline = 'N',
        string $snProducaoAcademica = 'N',
        string $snProvaOnline = 'N',
        string $snProvaOnlinePresencial = 'N',
        string $snNecessitaDeferimento = 'N'
    ) {
        $this->dsAvaliacao = $dsAvaliacao;
        $this->dsChave = $dsChave;
        $this->cdTipo = $cdTipo;
        $this->snDiarioLocal = $snDiarioLocal;
        $this->snDiarioOnline = $snDiarioOnline;
        $this->snProducaoAcademica = $snProducaoAcademica;
        $this->snProvaOnline = $snProvaOnline;
        $this->snProvaOnlinePresencial = $snProvaOnlinePresencial;
        $this->snNecessitaDeferimento = $snNecessitaDeferimento;
    }

    public function getCdAvaliacaoTipo(): ?int
    {
        return $this->cdAvaliacaoTipo;
    }

    public function getDsAvaliacao(): ?string
    {
        return $this->dsAvaliacao;
    }

    public function setDsAvaliacao(?string $dsAvaliacao): self
    {
        $this->dsAvaliacao = $dsAvaliacao;
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

    public function getCdTipo(): ?int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(?int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getSnDiarioLocal(): string
    {
        return $this->snDiarioLocal;
    }

    public function setSnDiarioLocal(string $snDiarioLocal): self
    {
        $this->snDiarioLocal = $snDiarioLocal;
        return $this;
    }

    public function getSnDiarioOnline(): string
    {
        return $this->snDiarioOnline;
    }

    public function setSnDiarioOnline(string $snDiarioOnline): self
    {
        $this->snDiarioOnline = $snDiarioOnline;
        return $this;
    }

    public function getSnProducaoAcademica(): string
    {
        return $this->snProducaoAcademica;
    }

    public function setSnProducaoAcademica(string $snProducaoAcademica): self
    {
        $this->snProducaoAcademica = $snProducaoAcademica;
        return $this;
    }

    public function getSnProvaOnline(): string
    {
        return $this->snProvaOnline;
    }

    public function setSnProvaOnline(string $snProvaOnline): self
    {
        $this->snProvaOnline = $snProvaOnline;
        return $this;
    }

    public function getSnProvaOnlinePresencial(): string
    {
        return $this->snProvaOnlinePresencial;
    }

    public function setSnProvaOnlinePresencial(string $snProvaOnlinePresencial): self
    {
        $this->snProvaOnlinePresencial = $snProvaOnlinePresencial;
        return $this;
    }

    public function getSnNecessitaDeferimento(): string
    {
        return $this->snNecessitaDeferimento;
    }

    public function setSnNecessitaDeferimento(string $snNecessitaDeferimento): self
    {
        $this->snNecessitaDeferimento = $snNecessitaDeferimento;
        return $this;
    }
}
