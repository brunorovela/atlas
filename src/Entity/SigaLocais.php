<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\SigaLocaisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SigaLocaisRepository::class)]
#[ORM\Table(
    name: 'siga_locais',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_LOCAL_PAI', columns: ['cd_local_pai'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'siga_locais_ibfk_1', 'colunas' => ['cd_local_pai'], 'tabelaAlvo' => 'siga_locais', 'colunasAlvo' => ['cd_local'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SigaLocais
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_local', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdLocal = null;

    #[ORM\ManyToOne(targetEntity: SigaLocais::class)]
    #[ORM\JoinColumn(name: 'cd_local_pai', referencedColumnName: 'cd_local', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SigaLocais $cdLocalPai = null;

    #[ORM\Column(name: 'ds_local', type: 'string', length: 255, nullable: true)]
    private ?string $dsLocal = null;

    #[ORM\Column(name: 'sn_eletronico', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snEletronico = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?SigaLocais $cdLocalPai = null,
        ?string $dsLocal = null,
        ?int $snEletronico = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdLocalPai = $cdLocalPai;
        $this->dsLocal = $dsLocal;
        $this->snEletronico = $snEletronico;
        $this->dtCadastro = $dtCadastro;
        $this->dtBase = $dtBase;
    }

    public function getCdLocal(): ?int
    {
        return $this->cdLocal;
    }

    public function getCdLocalPai(): ?SigaLocais
    {
        return $this->cdLocalPai;
    }

    public function setCdLocalPai(?SigaLocais $cdLocalPai): self
    {
        $this->cdLocalPai = $cdLocalPai;
        return $this;
    }

    public function getDsLocal(): ?string
    {
        return $this->dsLocal;
    }

    public function setDsLocal(?string $dsLocal): self
    {
        $this->dsLocal = $dsLocal;
        return $this;
    }

    public function getSnEletronico(): ?int
    {
        return $this->snEletronico;
    }

    public function setSnEletronico(?int $snEletronico): self
    {
        $this->snEletronico = $snEletronico;
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
