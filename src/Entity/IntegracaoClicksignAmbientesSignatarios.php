<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoClicksignAmbientesSignatariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoClicksignAmbientesSignatariosRepository::class)]
#[ORM\Table(
    name: 'integracao_clicksign_ambientes_signatarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_ambiente_signatario', columns: ['cd_clicksign_ambiente', 'cd_pessoa'])]
#[ORM\Index(name: 'FK_integracao_clicksign_ambientes_signatarios_pessoas', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IDX_EC7C14D9CC8C6DC', columns: ['cd_clicksign_ambiente'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_integracao_clicksign_ambientes_signatarios', 'colunas' => ['cd_clicksign_ambiente'], 'tabelaAlvo' => 'integracao_clicksign_ambientes', 'colunasAlvo' => ['cd_clicksign_ambiente'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_integracao_clicksign_ambientes_signatarios_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoClicksignAmbientesSignatarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_clicksign_ambiente_signatario', type: 'integer')]
    private ?int $cdClicksignAmbienteSignatario = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoClicksignAmbientes::class)]
    #[ORM\JoinColumn(name: 'cd_clicksign_ambiente', referencedColumnName: 'cd_clicksign_ambiente', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoClicksignAmbientes $cdClicksignAmbiente = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_chave_signatario', type: 'string', length: 50, nullable: true)]
    private ?string $dsChaveSignatario = null;

    #[ORM\Column(name: 'ds_segredo_signatario', type: 'text', length: 65535, nullable: true)]
    private ?string $dsSegredoSignatario = null;

    public function __construct(
        ?IntegracaoClicksignAmbientes $cdClicksignAmbiente = null,
        ?Pessoas $cdPessoa = null,
        ?string $dsChaveSignatario = null,
        ?string $dsSegredoSignatario = null
    ) {
        $this->cdClicksignAmbiente = $cdClicksignAmbiente;
        $this->cdPessoa = $cdPessoa;
        $this->dsChaveSignatario = $dsChaveSignatario;
        $this->dsSegredoSignatario = $dsSegredoSignatario;
    }

    public function getCdClicksignAmbienteSignatario(): ?int
    {
        return $this->cdClicksignAmbienteSignatario;
    }

    public function getCdClicksignAmbiente(): ?IntegracaoClicksignAmbientes
    {
        return $this->cdClicksignAmbiente;
    }

    public function setCdClicksignAmbiente(?IntegracaoClicksignAmbientes $cdClicksignAmbiente): self
    {
        $this->cdClicksignAmbiente = $cdClicksignAmbiente;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getDsChaveSignatario(): ?string
    {
        return $this->dsChaveSignatario;
    }

    public function setDsChaveSignatario(?string $dsChaveSignatario): self
    {
        $this->dsChaveSignatario = $dsChaveSignatario;
        return $this;
    }

    public function getDsSegredoSignatario(): ?string
    {
        return $this->dsSegredoSignatario;
    }

    public function setDsSegredoSignatario(?string $dsSegredoSignatario): self
    {
        $this->dsSegredoSignatario = $dsSegredoSignatario;
        return $this;
    }
}
