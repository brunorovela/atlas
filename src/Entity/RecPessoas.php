<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RecPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecPessoasRepository::class)]
#[ORM\Table(
    name: 'rec_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci', 'comment' => 'Campo sn_lido ser? 0 ou 1']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_RECADO', columns: ['cd_recado'])]
#[ORM\Index(name: 'IX_NR_ANOSEMESTRE', columns: ['nr_anosemestre'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_rec_pessoas_rec_recados', 'colunas' => ['cd_recado'], 'tabelaAlvo' => 'rec_recados', 'colunasAlvo' => ['cd_recado'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']]
    ],
    autoIncremento: []
)]
class RecPessoas
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: RecRecados::class)]
    #[ORM\JoinColumn(name: 'cd_recado', referencedColumnName: 'cd_recado', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RecRecados $cdRecado = null;

    #[ORM\Column(name: 'sn_lido', type: 'smallint', options: ['default' => '0'])]
    private int $snLido = 0;

    #[ORM\Column(name: 'dt_lido', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtLido = null;

    #[ORM\Column(name: 'nr_anosemestre', type: 'integer', nullable: true, options: ['default' => '20051'])]
    private ?int $nrAnosemestre = 20051;

    #[ORM\Column(name: 'dt_recebido', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtRecebido = null;

    #[ORM\Column(name: 'sn_recebido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snRecebido = 0;

    #[ORM\Column(name: 'sn_confirmacao', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snConfirmacao = false;

    #[ORM\Column(name: 'dt_aprovado', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtAprovado = null;

    public function __construct(
        int $cdPessoa = 0,
        ?RecRecados $cdRecado = null,
        int $snLido = 0,
        ?\DateTimeInterface $dtLido = null,
        ?int $nrAnosemestre = 20051,
        ?\DateTimeInterface $dtRecebido = null,
        ?int $snRecebido = 0,
        ?bool $snConfirmacao = false,
        ?\DateTimeInterface $dtAprovado = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdRecado = $cdRecado;
        $this->snLido = $snLido;
        $this->dtLido = $dtLido;
        $this->nrAnosemestre = $nrAnosemestre;
        $this->dtRecebido = $dtRecebido;
        $this->snRecebido = $snRecebido;
        $this->snConfirmacao = $snConfirmacao;
        $this->dtAprovado = $dtAprovado;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdRecado(): ?RecRecados
    {
        return $this->cdRecado;
    }

    public function setCdRecado(?RecRecados $cdRecado): self
    {
        $this->cdRecado = $cdRecado;
        return $this;
    }

    public function getSnLido(): int
    {
        return $this->snLido;
    }

    public function setSnLido(int $snLido): self
    {
        $this->snLido = $snLido;
        return $this;
    }

    public function getDtLido(): ?\DateTimeInterface
    {
        return $this->dtLido;
    }

    public function setDtLido(?\DateTimeInterface $dtLido): self
    {
        $this->dtLido = $dtLido;
        return $this;
    }

    public function getNrAnosemestre(): ?int
    {
        return $this->nrAnosemestre;
    }

    public function setNrAnosemestre(?int $nrAnosemestre): self
    {
        $this->nrAnosemestre = $nrAnosemestre;
        return $this;
    }

    public function getDtRecebido(): ?\DateTimeInterface
    {
        return $this->dtRecebido;
    }

    public function setDtRecebido(?\DateTimeInterface $dtRecebido): self
    {
        $this->dtRecebido = $dtRecebido;
        return $this;
    }

    public function getSnRecebido(): ?int
    {
        return $this->snRecebido;
    }

    public function setSnRecebido(?int $snRecebido): self
    {
        $this->snRecebido = $snRecebido;
        return $this;
    }

    public function isSnConfirmacao(): ?bool
    {
        return $this->snConfirmacao;
    }

    public function setSnConfirmacao(?bool $snConfirmacao): self
    {
        $this->snConfirmacao = $snConfirmacao;
        return $this;
    }

    public function getDtAprovado(): ?\DateTimeInterface
    {
        return $this->dtAprovado;
    }

    public function setDtAprovado(?\DateTimeInterface $dtAprovado): self
    {
        $this->dtAprovado = $dtAprovado;
        return $this;
    }
}
