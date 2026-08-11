<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuIntegracaoRepository::class)]
#[ORM\Table(
    name: 'nu_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PARCEIRO', columns: ['cd_parceiro'])]
#[ORM\Index(name: 'IX_CD_LIVRE', columns: ['cd_livre'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_DT_REGISTRO', columns: ['dt_registro'])]
#[ORM\Index(name: 'IX_SN_INTEGRADO', columns: ['sn_integrado'])]
#[ORM\Index(name: 'IX_DS_ACAO', columns: ['ds_acao'])]
class NuIntegracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao', type: 'integer')]
    private ?int $cdIntegracao = null;

    #[ORM\Column(name: 'cd_parceiro', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdParceiro = null;

    #[ORM\Column(name: 'cd_livre', type: 'integer', nullable: true)]
    private ?int $cdLivre = null;

    #[ORM\Column(name: 'ds_acao', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private ?string $dsAcao = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'dt_registro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtRegistro = null;

    #[ORM\Column(name: 'sn_integrado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snIntegrado = 0;

    #[ORM\Column(name: 'ds_erro', type: 'string', length: 100, nullable: true)]
    private ?string $dsErro = null;

    #[ORM\Column(name: 'me_extra', type: 'text', length: 65535, nullable: true)]
    private ?string $meExtra = null;

    public function __construct(
        ?int $cdParceiro = null,
        ?int $cdLivre = null,
        ?string $dsAcao = null,
        ?string $dsChave = null,
        ?\DateTimeInterface $dtRegistro = null,
        ?int $snIntegrado = 0,
        ?string $dsErro = null,
        ?string $meExtra = null
    ) {
        $this->cdParceiro = $cdParceiro;
        $this->cdLivre = $cdLivre;
        $this->dsAcao = $dsAcao;
        $this->dsChave = $dsChave;
        $this->dtRegistro = $dtRegistro;
        $this->snIntegrado = $snIntegrado;
        $this->dsErro = $dsErro;
        $this->meExtra = $meExtra;
    }

    public function getCdIntegracao(): ?int
    {
        return $this->cdIntegracao;
    }

    public function getCdParceiro(): ?int
    {
        return $this->cdParceiro;
    }

    public function setCdParceiro(?int $cdParceiro): self
    {
        $this->cdParceiro = $cdParceiro;
        return $this;
    }

    public function getCdLivre(): ?int
    {
        return $this->cdLivre;
    }

    public function setCdLivre(?int $cdLivre): self
    {
        $this->cdLivre = $cdLivre;
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

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
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

    public function getSnIntegrado(): ?int
    {
        return $this->snIntegrado;
    }

    public function setSnIntegrado(?int $snIntegrado): self
    {
        $this->snIntegrado = $snIntegrado;
        return $this;
    }

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }

    public function getMeExtra(): ?string
    {
        return $this->meExtra;
    }

    public function setMeExtra(?string $meExtra): self
    {
        $this->meExtra = $meExtra;
        return $this;
    }
}
