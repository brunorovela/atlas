<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\FinCobrancaContatosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinCobrancaContatosRepository::class)]
#[ORM\Table(
    name: 'fin_cobranca_contatos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_COBRANCA', columns: ['cd_cobranca'])]
class FinCobrancaContatos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cobranca_contato', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCobrancaContato = null;

    #[ORM\Column(name: 'cd_cobranca', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdCobranca = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'dt_retorno', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRetorno = null;

    #[ORM\Column(name: 'ds_contato', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsContato = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'sn_retorno', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snRetorno = 0;

    #[ORM\Column(name: 'nm_contato', type: 'string', length: 50, nullable: true)]
    private ?string $nmContato = null;

    #[ORM\Column(name: 'ds_telefone', type: 'string', length: 50, nullable: true)]
    private ?string $dsTelefone = null;

    #[ORM\Column(name: 'BB_ANEXO', type: 'blob', nullable: true)]
    private ?string $bbAnexo = null;

    #[ORM\Column(name: 'nm_anexo', type: 'string', length: 255, nullable: true)]
    private ?string $nmAnexo = null;

    #[ORM\Column(name: 'ds_tipo_anexo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTipoAnexo = null;

    public function __construct(
        ?int $cdCobranca = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?\DateTimeInterface $dtRetorno = null,
        ?string $dsContato = null,
        ?int $cdUsuario = null,
        ?int $snRetorno = 0,
        ?string $nmContato = null,
        ?string $dsTelefone = null,
        ?string $bbAnexo = null,
        ?string $nmAnexo = null,
        ?string $dsTipoAnexo = null
    ) {
        $this->cdCobranca = $cdCobranca;
        $this->dtRegistro = $dtRegistro;
        $this->dtRetorno = $dtRetorno;
        $this->dsContato = $dsContato;
        $this->cdUsuario = $cdUsuario;
        $this->snRetorno = $snRetorno;
        $this->nmContato = $nmContato;
        $this->dsTelefone = $dsTelefone;
        $this->bbAnexo = $bbAnexo;
        $this->nmAnexo = $nmAnexo;
        $this->dsTipoAnexo = $dsTipoAnexo;
    }

    public function getCdCobrancaContato(): ?int
    {
        return $this->cdCobrancaContato;
    }

    public function getCdCobranca(): ?int
    {
        return $this->cdCobranca;
    }

    public function setCdCobranca(?int $cdCobranca): self
    {
        $this->cdCobranca = $cdCobranca;
        return $this;
    }

    public function getDtRegistro(): ?\DateTimeInterface
    {
        return $this->dtRegistro;
    }

    public function setDtRegistro(?\DateTimeInterface $dtRegistro): self
    {
        $this->dtRegistro = $dtRegistro;
        return $this;
    }

    public function getDtRetorno(): ?\DateTimeInterface
    {
        return $this->dtRetorno;
    }

    public function setDtRetorno(?\DateTimeInterface $dtRetorno): self
    {
        $this->dtRetorno = $dtRetorno;
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

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getSnRetorno(): ?int
    {
        return $this->snRetorno;
    }

    public function setSnRetorno(?int $snRetorno): self
    {
        $this->snRetorno = $snRetorno;
        return $this;
    }

    public function getNmContato(): ?string
    {
        return $this->nmContato;
    }

    public function setNmContato(?string $nmContato): self
    {
        $this->nmContato = $nmContato;
        return $this;
    }

    public function getDsTelefone(): ?string
    {
        return $this->dsTelefone;
    }

    public function setDsTelefone(?string $dsTelefone): self
    {
        $this->dsTelefone = $dsTelefone;
        return $this;
    }

    public function getBbAnexo(): ?string
    {
        return $this->bbAnexo;
    }

    public function setBbAnexo(?string $bbAnexo): self
    {
        $this->bbAnexo = $bbAnexo;
        return $this;
    }

    public function getNmAnexo(): ?string
    {
        return $this->nmAnexo;
    }

    public function setNmAnexo(?string $nmAnexo): self
    {
        $this->nmAnexo = $nmAnexo;
        return $this;
    }

    public function getDsTipoAnexo(): ?string
    {
        return $this->dsTipoAnexo;
    }

    public function setDsTipoAnexo(?string $dsTipoAnexo): self
    {
        $this->dsTipoAnexo = $dsTipoAnexo;
        return $this;
    }
}
