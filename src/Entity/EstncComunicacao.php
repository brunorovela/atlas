<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\EstncComunicacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncComunicacaoRepository::class)]
#[ORM\Table(
    name: 'estnc_comunicacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_CHAVE_TIPO_COMUNICACAO', columns: ['ds_chave'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
class EstncComunicacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_item', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdItem = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'sn_envia_email', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEnviaEmail = null;

    #[ORM\Column(name: 'sn_envia_sms', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEnviaSms = null;

    #[ORM\Column(name: 'sn_email_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEmailAtivo = null;

    #[ORM\Column(name: 'sn_sms_ativo', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snSmsAtivo = null;

    public function __construct(
        ?string $dsDescricao = null,
        ?string $dsChave = null,
        ?int $snEnviaEmail = null,
        ?int $snEnviaSms = null,
        ?int $snEmailAtivo = null,
        ?int $snSmsAtivo = null
    ) {
        $this->dsDescricao = $dsDescricao;
        $this->dsChave = $dsChave;
        $this->snEnviaEmail = $snEnviaEmail;
        $this->snEnviaSms = $snEnviaSms;
        $this->snEmailAtivo = $snEmailAtivo;
        $this->snSmsAtivo = $snSmsAtivo;
    }

    public function getCdItem(): ?int
    {
        return $this->cdItem;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
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

    public function getSnEnviaEmail(): ?int
    {
        return $this->snEnviaEmail;
    }

    public function setSnEnviaEmail(?int $snEnviaEmail): self
    {
        $this->snEnviaEmail = $snEnviaEmail;
        return $this;
    }

    public function getSnEnviaSms(): ?int
    {
        return $this->snEnviaSms;
    }

    public function setSnEnviaSms(?int $snEnviaSms): self
    {
        $this->snEnviaSms = $snEnviaSms;
        return $this;
    }

    public function getSnEmailAtivo(): ?int
    {
        return $this->snEmailAtivo;
    }

    public function setSnEmailAtivo(?int $snEmailAtivo): self
    {
        $this->snEmailAtivo = $snEmailAtivo;
        return $this;
    }

    public function getSnSmsAtivo(): ?int
    {
        return $this->snSmsAtivo;
    }

    public function setSnSmsAtivo(?int $snSmsAtivo): self
    {
        $this->snSmsAtivo = $snSmsAtivo;
        return $this;
    }
}
