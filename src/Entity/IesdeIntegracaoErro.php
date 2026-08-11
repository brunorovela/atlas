<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IesdeIntegracaoErroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IesdeIntegracaoErroRepository::class)]
#[ORM\Table(
    name: 'iesde_integracao_erro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IesdeIntegracaoErro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_iesde_integracao_erro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdIesdeIntegracaoErro = null;

    #[ORM\Column(name: 'me_descricao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDescricao = null;

    #[ORM\Column(name: 'me_dados', type: 'text', length: 16777215, nullable: true)]
    private ?string $meDados = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $meDescricao = null,
        ?string $meDados = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->meDescricao = $meDescricao;
        $this->meDados = $meDados;
        $this->dtBase = $dtBase;
    }

    public function getCdIesdeIntegracaoErro(): ?int
    {
        return $this->cdIesdeIntegracaoErro;
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

    public function getMeDados(): ?string
    {
        return $this->meDados;
    }

    public function setMeDados(?string $meDados): self
    {
        $this->meDados = $meDados;
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
