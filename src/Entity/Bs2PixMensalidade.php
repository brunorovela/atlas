<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\Bs2PixMensalidadeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Bs2PixMensalidadeRepository::class)]
#[ORM\Table(
    name: 'bs2_pix_mensalidade',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_MENSALIDADES_CD_MENSALIDADE', columns: ['cd_mensalidade'])]
#[ORM\Index(name: 'IDX_DA51F7F233D371C6', columns: ['cd_bs2_pix'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_BS2_PIX_CD_BS2_PIX', 'colunas' => ['cd_bs2_pix'], 'tabelaAlvo' => 'bs2_pix', 'colunasAlvo' => ['cd_bs2_pix'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_MENSALIDADES_CD_MENSALIDADE', 'colunas' => ['cd_mensalidade'], 'tabelaAlvo' => 'mensalidades', 'colunasAlvo' => ['cd_mensalidade'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class Bs2PixMensalidade
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Bs2Pix::class)]
    #[ORM\JoinColumn(name: 'cd_bs2_pix', referencedColumnName: 'cd_bs2_pix', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Bs2Pix $cdBs2Pix = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Mensalidades::class)]
    #[ORM\JoinColumn(name: 'cd_mensalidade', referencedColumnName: 'cd_mensalidade', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Mensalidades $cdMensalidade = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Bs2Pix $cdBs2Pix = null,
        ?Mensalidades $cdMensalidade = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdBs2Pix = $cdBs2Pix;
        $this->cdMensalidade = $cdMensalidade;
        $this->dtBase = $dtBase;
    }

    public function getCdBs2Pix(): ?Bs2Pix
    {
        return $this->cdBs2Pix;
    }

    public function setCdBs2Pix(?Bs2Pix $cdBs2Pix): self
    {
        $this->cdBs2Pix = $cdBs2Pix;
        return $this;
    }

    public function getCdMensalidade(): ?Mensalidades
    {
        return $this->cdMensalidade;
    }

    public function setCdMensalidade(?Mensalidades $cdMensalidade): self
    {
        $this->cdMensalidade = $cdMensalidade;
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
