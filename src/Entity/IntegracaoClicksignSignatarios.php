<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoClicksignSignatariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoClicksignSignatariosRepository::class)]
#[ORM\Table(
    name: 'integracao_clicksign_signatarios',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_integracao_clicksign_signatarios_clicksign_documentos', columns: ['cd_documento'])]
#[ORM\Index(name: 'FK_integracao_clicksign_signatarios_pessoas', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_integracao_clicksign_signatarios_clicksign_documentos', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'integracao_clicksign_documentos', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_integracao_clicksign_signatarios_pessoas', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoClicksignSignatarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_signatario', type: 'integer')]
    private ?int $cdSignatario = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoClicksignDocumentos::class)]
    #[ORM\JoinColumn(name: 'cd_documento', referencedColumnName: 'cd_documento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoClicksignDocumentos $cdDocumento = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_key', type: 'string', length: 50, options: ['default' => ''])]
    private string $dsKey = '';

    #[ORM\Column(name: 'sn_assinado', type: 'boolean', options: ['default' => '0'])]
    private bool $snAssinado = false;

    #[ORM\Column(name: 'dt_aceite', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtAceite = null;

    #[ORM\Column(name: 'ds_ip', type: 'string', length: 50, nullable: true)]
    private ?string $dsIp = null;

    public function __construct(
        ?IntegracaoClicksignDocumentos $cdDocumento = null,
        ?Pessoas $cdPessoa = null,
        string $dsKey = '',
        bool $snAssinado = false,
        ?\DateTimeInterface $dtAceite = null,
        ?string $dsIp = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->cdPessoa = $cdPessoa;
        $this->dsKey = $dsKey;
        $this->snAssinado = $snAssinado;
        $this->dtAceite = $dtAceite;
        $this->dsIp = $dsIp;
    }

    public function getCdSignatario(): ?int
    {
        return $this->cdSignatario;
    }

    public function getCdDocumento(): ?IntegracaoClicksignDocumentos
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?IntegracaoClicksignDocumentos $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
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

    public function getDsKey(): string
    {
        return $this->dsKey;
    }

    public function setDsKey(string $dsKey): self
    {
        $this->dsKey = $dsKey;
        return $this;
    }

    public function isSnAssinado(): bool
    {
        return $this->snAssinado;
    }

    public function setSnAssinado(bool $snAssinado): self
    {
        $this->snAssinado = $snAssinado;
        return $this;
    }

    public function getDtAceite(): ?\DateTimeInterface
    {
        return $this->dtAceite;
    }

    public function setDtAceite(?\DateTimeInterface $dtAceite): self
    {
        $this->dtAceite = $dtAceite;
        return $this;
    }

    public function getDsIp(): ?string
    {
        return $this->dsIp;
    }

    public function setDsIp(?string $dsIp): self
    {
        $this->dsIp = $dsIp;
        return $this;
    }
}
