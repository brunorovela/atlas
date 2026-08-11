<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CapUnidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapUnidadeRepository::class)]
#[ORM\Table(
    name: 'cap_unidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class CapUnidade
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_unidade', type: 'integer')]
    private ?int $cdUnidade = null;

    #[ORM\Column(name: 'ds_unidade', type: 'string', length: 100)]
    private ?string $dsUnidade = null;

    #[ORM\Column(name: 'ds_contato_telefone', type: 'string', length: 100, nullable: true)]
    private ?string $dsContatoTelefone = null;

    #[ORM\Column(name: 'ds_contato_email', type: 'string', length: 100, nullable: true)]
    private ?string $dsContatoEmail = null;

    #[ORM\Column(name: 'ds_horario', type: 'string', length: 100, nullable: true)]
    private ?string $dsHorario = null;

    #[ORM\Column(name: 'ds_endereco', type: 'string', length: 500, nullable: true)]
    private ?string $dsEndereco = null;

    #[ORM\Column(name: 'ds_caminho_imagem_unidade', type: 'string', length: 500, nullable: true)]
    private ?string $dsCaminhoImagemUnidade = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsUnidade = null,
        ?string $dsContatoTelefone = null,
        ?string $dsContatoEmail = null,
        ?string $dsHorario = null,
        ?string $dsEndereco = null,
        ?string $dsCaminhoImagemUnidade = null,
        ?bool $snAtivo = true,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsUnidade = $dsUnidade;
        $this->dsContatoTelefone = $dsContatoTelefone;
        $this->dsContatoEmail = $dsContatoEmail;
        $this->dsHorario = $dsHorario;
        $this->dsEndereco = $dsEndereco;
        $this->dsCaminhoImagemUnidade = $dsCaminhoImagemUnidade;
        $this->snAtivo = $snAtivo;
        $this->dtBase = $dtBase;
    }

    public function getCdUnidade(): ?int
    {
        return $this->cdUnidade;
    }

    public function getDsUnidade(): ?string
    {
        return $this->dsUnidade;
    }

    public function setDsUnidade(?string $dsUnidade): self
    {
        $this->dsUnidade = $dsUnidade;
        return $this;
    }

    public function getDsContatoTelefone(): ?string
    {
        return $this->dsContatoTelefone;
    }

    public function setDsContatoTelefone(?string $dsContatoTelefone): self
    {
        $this->dsContatoTelefone = $dsContatoTelefone;
        return $this;
    }

    public function getDsContatoEmail(): ?string
    {
        return $this->dsContatoEmail;
    }

    public function setDsContatoEmail(?string $dsContatoEmail): self
    {
        $this->dsContatoEmail = $dsContatoEmail;
        return $this;
    }

    public function getDsHorario(): ?string
    {
        return $this->dsHorario;
    }

    public function setDsHorario(?string $dsHorario): self
    {
        $this->dsHorario = $dsHorario;
        return $this;
    }

    public function getDsEndereco(): ?string
    {
        return $this->dsEndereco;
    }

    public function setDsEndereco(?string $dsEndereco): self
    {
        $this->dsEndereco = $dsEndereco;
        return $this;
    }

    public function getDsCaminhoImagemUnidade(): ?string
    {
        return $this->dsCaminhoImagemUnidade;
    }

    public function setDsCaminhoImagemUnidade(?string $dsCaminhoImagemUnidade): self
    {
        $this->dsCaminhoImagemUnidade = $dsCaminhoImagemUnidade;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
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
