<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ContatosTiposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContatosTiposRepository::class)]
#[ORM\Table(
    name: 'contatos_tipos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Ver documentação em: http://dev.unimestre.com/wiki/doku.php/duvidas_gerais/configuracao_tipos_contato

Foi adicionado FKS para que não seja adicionado nenhuma validação que não tenha sido criada/validada.

As validações existes estão descritas no link para documentação acima.']
)]
#[ORM\UniqueConstraint(name: 'Index_4D697877_A287_4AAB', columns: ['cd_contato'])]
#[ORM\UniqueConstraint(name: 'contatos_tipos_ds_chave_IDX', columns: ['ds_chave'])]
class ContatosTipos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_contato', type: 'integer')]
    private ?int $cdContato = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_contato', type: 'string', length: 20, nullable: true)]
    private ?string $dsContato = null;

    #[ORM\Column(name: 'sn_padrao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $snPadrao = null;

    #[ORM\Column(name: 'ds_tipo_original', type: 'string', length: 100, nullable: true)]
    private ?string $dsTipoOriginal = null;

    #[ORM\Column(name: 'ds_mascara', type: 'string', length: 255, nullable: true)]
    private ?string $dsMascara = null;

    #[ORM\Column(name: 'ds_validacao', type: 'string', length: 255, nullable: true)]
    private ?string $dsValidacao = null;

    #[ORM\Column(name: 'ds_filtro', type: 'string', length: 255, nullable: true)]
    private ?string $dsFiltro = null;

    #[ORM\Column(name: 'sn_confirmar', type: 'boolean', options: ['default' => '1'])]
    private bool $snConfirmar = true;

    public function __construct(
        ?string $dsChave = null,
        ?string $dsContato = null,
        ?string $snPadrao = null,
        ?string $dsTipoOriginal = null,
        ?string $dsMascara = null,
        ?string $dsValidacao = null,
        ?string $dsFiltro = null,
        bool $snConfirmar = true
    ) {
        $this->dsChave = $dsChave;
        $this->dsContato = $dsContato;
        $this->snPadrao = $snPadrao;
        $this->dsTipoOriginal = $dsTipoOriginal;
        $this->dsMascara = $dsMascara;
        $this->dsValidacao = $dsValidacao;
        $this->dsFiltro = $dsFiltro;
        $this->snConfirmar = $snConfirmar;
    }

    public function getCdContato(): ?int
    {
        return $this->cdContato;
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

    public function getDsContato(): ?string
    {
        return $this->dsContato;
    }

    public function setDsContato(?string $dsContato): self
    {
        $this->dsContato = $dsContato;
        return $this;
    }

    public function getSnPadrao(): ?string
    {
        return $this->snPadrao;
    }

    public function setSnPadrao(?string $snPadrao): self
    {
        $this->snPadrao = $snPadrao;
        return $this;
    }

    public function getDsTipoOriginal(): ?string
    {
        return $this->dsTipoOriginal;
    }

    public function setDsTipoOriginal(?string $dsTipoOriginal): self
    {
        $this->dsTipoOriginal = $dsTipoOriginal;
        return $this;
    }

    public function getDsMascara(): ?string
    {
        return $this->dsMascara;
    }

    public function setDsMascara(?string $dsMascara): self
    {
        $this->dsMascara = $dsMascara;
        return $this;
    }

    public function getDsValidacao(): ?string
    {
        return $this->dsValidacao;
    }

    public function setDsValidacao(?string $dsValidacao): self
    {
        $this->dsValidacao = $dsValidacao;
        return $this;
    }

    public function getDsFiltro(): ?string
    {
        return $this->dsFiltro;
    }

    public function setDsFiltro(?string $dsFiltro): self
    {
        $this->dsFiltro = $dsFiltro;
        return $this;
    }

    public function isSnConfirmar(): bool
    {
        return $this->snConfirmar;
    }

    public function setSnConfirmar(bool $snConfirmar): self
    {
        $this->snConfirmar = $snConfirmar;
        return $this;
    }
}
