<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinDemonstrativosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinDemonstrativosRepository::class)]
#[ORM\Table(
    name: 'fin_demonstrativos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Esta tabela guarda os diferentes modelos de demonstrativos de caixa que poderão ser utilizados.']
)]
class FinDemonstrativos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_demonstrativo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdDemonstrativo = null;

    #[ORM\Column(name: 'ds_demonstrativo', type: 'string', length: 100)]
    private ?string $dsDemonstrativo = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtivo = 0;

    #[ORM\Column(name: 'ds_cor_extrapolado_mais', type: 'string', length: 7, options: ['fixed' => true, 'default' => '#0000FF'])]
    private string $dsCorExtrapoladoMais = '#0000FF';

    #[ORM\Column(name: 'ds_cor_normalidade', type: 'string', length: 7, options: ['fixed' => true, 'default' => '#008000'])]
    private string $dsCorNormalidade = '#008000';

    #[ORM\Column(name: 'ds_cor_alerta', type: 'string', length: 7, options: ['fixed' => true, 'default' => '#CC9900'])]
    private string $dsCorAlerta = '#CC9900';

    #[ORM\Column(name: 'ds_cor_extrapolado_menos', type: 'string', length: 7, options: ['fixed' => true, 'default' => '#FF0000'])]
    private string $dsCorExtrapoladoMenos = '#FF0000';

    #[ORM\Column(name: 'ds_campo_ordem', type: 'string', length: 100, nullable: true)]
    private ?string $dsCampoOrdem = null;

    public function __construct(
        ?string $dsDemonstrativo = null,
        ?int $snAtivo = 0,
        string $dsCorExtrapoladoMais = '#0000FF',
        string $dsCorNormalidade = '#008000',
        string $dsCorAlerta = '#CC9900',
        string $dsCorExtrapoladoMenos = '#FF0000',
        ?string $dsCampoOrdem = null
    ) {
        $this->dsDemonstrativo = $dsDemonstrativo;
        $this->snAtivo = $snAtivo;
        $this->dsCorExtrapoladoMais = $dsCorExtrapoladoMais;
        $this->dsCorNormalidade = $dsCorNormalidade;
        $this->dsCorAlerta = $dsCorAlerta;
        $this->dsCorExtrapoladoMenos = $dsCorExtrapoladoMenos;
        $this->dsCampoOrdem = $dsCampoOrdem;
    }

    public function getCdDemonstrativo(): ?int
    {
        return $this->cdDemonstrativo;
    }

    public function getDsDemonstrativo(): ?string
    {
        return $this->dsDemonstrativo;
    }

    public function setDsDemonstrativo(?string $dsDemonstrativo): self
    {
        $this->dsDemonstrativo = $dsDemonstrativo;
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

    public function getDsCorExtrapoladoMais(): string
    {
        return $this->dsCorExtrapoladoMais;
    }

    public function setDsCorExtrapoladoMais(string $dsCorExtrapoladoMais): self
    {
        $this->dsCorExtrapoladoMais = $dsCorExtrapoladoMais;
        return $this;
    }

    public function getDsCorNormalidade(): string
    {
        return $this->dsCorNormalidade;
    }

    public function setDsCorNormalidade(string $dsCorNormalidade): self
    {
        $this->dsCorNormalidade = $dsCorNormalidade;
        return $this;
    }

    public function getDsCorAlerta(): string
    {
        return $this->dsCorAlerta;
    }

    public function setDsCorAlerta(string $dsCorAlerta): self
    {
        $this->dsCorAlerta = $dsCorAlerta;
        return $this;
    }

    public function getDsCorExtrapoladoMenos(): string
    {
        return $this->dsCorExtrapoladoMenos;
    }

    public function setDsCorExtrapoladoMenos(string $dsCorExtrapoladoMenos): self
    {
        $this->dsCorExtrapoladoMenos = $dsCorExtrapoladoMenos;
        return $this;
    }

    public function getDsCampoOrdem(): ?string
    {
        return $this->dsCampoOrdem;
    }

    public function setDsCampoOrdem(?string $dsCampoOrdem): self
    {
        $this->dsCampoOrdem = $dsCampoOrdem;
        return $this;
    }
}
