<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoSeniorNovaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoSeniorNovaRepository::class)]
#[ORM\Table(
    name: 'integracao_senior_nova',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoSeniorNova
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'ds_integracao_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsIntegracaoChave = null;

    #[ORM\Column(name: 'ds_codigo', type: 'string', length: 20, nullable: true)]
    private ?string $dsCodigo = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'I: Inserção / A: Alteração / E: Exclusão'])]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'ds_conteudo', type: 'text', length: 65535, nullable: true)]
    private ?string $dsConteudo = null;

    #[ORM\Column(name: 'dt_sincronizado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtSincronizado = null;

    #[ORM\Column(name: 'ds_msg_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $dsMsgErro = null;

    #[ORM\Column(name: 'nr_tentativas', type: 'integer', nullable: true)]
    private ?int $nrTentativas = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $dsIntegracaoChave = null,
        ?string $dsCodigo = null,
        ?string $dsAcao = null,
        ?string $dsConteudo = null,
        ?\DateTimeInterface $dtSincronizado = null,
        ?string $dsMsgErro = null,
        ?int $nrTentativas = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsIntegracaoChave = $dsIntegracaoChave;
        $this->dsCodigo = $dsCodigo;
        $this->dsAcao = $dsAcao;
        $this->dsConteudo = $dsConteudo;
        $this->dtSincronizado = $dtSincronizado;
        $this->dsMsgErro = $dsMsgErro;
        $this->nrTentativas = $nrTentativas;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDsIntegracaoChave(): ?string
    {
        return $this->dsIntegracaoChave;
    }

    public function setDsIntegracaoChave(?string $dsIntegracaoChave): self
    {
        $this->dsIntegracaoChave = $dsIntegracaoChave;
        return $this;
    }

    public function getDsCodigo(): ?string
    {
        return $this->dsCodigo;
    }

    public function setDsCodigo(?string $dsCodigo): self
    {
        $this->dsCodigo = $dsCodigo;
        return $this;
    }

    public function getDsAcao(): ?string
    {
        return $this->dsAcao;
    }

    public function setDsAcao(?string $dsAcao): self
    {
        $this->dsAcao = $dsAcao;
        return $this;
    }

    public function getDsConteudo(): ?string
    {
        return $this->dsConteudo;
    }

    public function setDsConteudo(?string $dsConteudo): self
    {
        $this->dsConteudo = $dsConteudo;
        return $this;
    }

    public function getDtSincronizado(): ?\DateTimeInterface
    {
        return $this->dtSincronizado;
    }

    public function setDtSincronizado(?\DateTimeInterface $dtSincronizado): self
    {
        $this->dtSincronizado = $dtSincronizado;
        return $this;
    }

    public function getDsMsgErro(): ?string
    {
        return $this->dsMsgErro;
    }

    public function setDsMsgErro(?string $dsMsgErro): self
    {
        $this->dsMsgErro = $dsMsgErro;
        return $this;
    }

    public function getNrTentativas(): ?int
    {
        return $this->nrTentativas;
    }

    public function setNrTentativas(?int $nrTentativas): self
    {
        $this->nrTentativas = $nrTentativas;
        return $this;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(?\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;
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
