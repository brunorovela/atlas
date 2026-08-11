<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\IntegracaoAutentiqueDocumentoAssinaturaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoAutentiqueDocumentoAssinaturaRepository::class)]
#[ORM\Table(
    name: 'integracao_autentique_documento_assinatura',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'fk_integracao_autentique_assinaturas', columns: ['cd_documento'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_integracao_autentique_assinaturas', 'colunas' => ['cd_documento'], 'tabelaAlvo' => 'integracao_autentique_documento', 'colunasAlvo' => ['cd_documento'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class IntegracaoAutentiqueDocumentoAssinatura
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_assinatura', type: 'integer')]
    private ?int $cdAssinatura = null;

    #[ORM\ManyToOne(targetEntity: IntegracaoAutentiqueDocumento::class)]
    #[ORM\JoinColumn(name: 'cd_documento', referencedColumnName: 'cd_documento', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?IntegracaoAutentiqueDocumento $cdDocumento = null;

    #[ORM\Column(name: 'ds_assinado', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsAssinado = null;

    #[ORM\Column(name: 'ds_funcao', type: 'string', length: 255, nullable: true)]
    private ?string $dsFuncao = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 255)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'ds_cpf', type: 'string', length: 15, nullable: true)]
    private ?string $dsCpf = null;

    public function __construct(
        ?IntegracaoAutentiqueDocumento $cdDocumento = null,
        ?string $dsAssinado = null,
        ?string $dsFuncao = null,
        ?string $dsEmail = null,
        ?\DateTimeInterface $dtBase = null,
        ?string $dsCpf = null
    ) {
        $this->cdDocumento = $cdDocumento;
        $this->dsAssinado = $dsAssinado;
        $this->dsFuncao = $dsFuncao;
        $this->dsEmail = $dsEmail;
        $this->dtBase = $dtBase;
        $this->dsCpf = $dsCpf;
    }

    public function getCdAssinatura(): ?int
    {
        return $this->cdAssinatura;
    }

    public function getCdDocumento(): ?IntegracaoAutentiqueDocumento
    {
        return $this->cdDocumento;
    }

    public function setCdDocumento(?IntegracaoAutentiqueDocumento $cdDocumento): self
    {
        $this->cdDocumento = $cdDocumento;
        return $this;
    }

    public function getDsAssinado(): ?string
    {
        return $this->dsAssinado;
    }

    public function setDsAssinado(?string $dsAssinado): self
    {
        $this->dsAssinado = $dsAssinado;
        return $this;
    }

    public function getDsFuncao(): ?string
    {
        return $this->dsFuncao;
    }

    public function setDsFuncao(?string $dsFuncao): self
    {
        $this->dsFuncao = $dsFuncao;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
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

    public function getDsCpf(): ?string
    {
        return $this->dsCpf;
    }

    public function setDsCpf(?string $dsCpf): self
    {
        $this->dsCpf = $dsCpf;
        return $this;
    }
}
