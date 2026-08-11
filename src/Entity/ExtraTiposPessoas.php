<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ExtraTiposPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraTiposPessoasRepository::class)]
#[ORM\Table(
    name: 'extra_tipos_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class ExtraTiposPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_tipo_pessoa', type: 'integer', options: ['default' => '0'])]
    private int $cdTipoPessoa = 0;

    #[ORM\Column(name: 'ds_tipo_pessoa', type: 'string', length: 50, nullable: true)]
    private ?string $dsTipoPessoa = null;

    #[ORM\Column(name: 'ds_observacao', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsObservacao = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'tp_pessoa', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $tpPessoa = null;

    public function __construct(
        int $cdTipoPessoa = 0,
        ?string $dsTipoPessoa = null,
        ?string $dsObservacao = null,
        ?int $snAtivo = 0,
        ?string $tpPessoa = null
    ) {
        $this->cdTipoPessoa = $cdTipoPessoa;
        $this->dsTipoPessoa = $dsTipoPessoa;
        $this->dsObservacao = $dsObservacao;
        $this->snAtivo = $snAtivo;
        $this->tpPessoa = $tpPessoa;
    }

    public function getCdTipoPessoa(): int
    {
        return $this->cdTipoPessoa;
    }

    public function setCdTipoPessoa(int $cdTipoPessoa): self
    {
        $this->cdTipoPessoa = $cdTipoPessoa;
        return $this;
    }

    public function getDsTipoPessoa(): ?string
    {
        return $this->dsTipoPessoa;
    }

    public function setDsTipoPessoa(?string $dsTipoPessoa): self
    {
        $this->dsTipoPessoa = $dsTipoPessoa;
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        return $this;
    }

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getTpPessoa(): ?string
    {
        return $this->tpPessoa;
    }

    public function setTpPessoa(?string $tpPessoa): self
    {
        $this->tpPessoa = $tpPessoa;
        return $this;
    }
}
