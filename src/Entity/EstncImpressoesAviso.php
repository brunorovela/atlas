<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncImpressoesAvisoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncImpressoesAvisoRepository::class)]
#[ORM\Table(
    name: 'estnc_impressoes_aviso',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_IMPRESSOES_AVISO_TITULO_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_TITULO', columns: ['cd_titulo'])]
#[ORM\Index(name: 'IX_CD_PESSOA_REGISTRO', columns: ['cd_pessoa_registro'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_IMPRESSOES_AVISO_TITULO_CD_TITULO', 'colunas' => ['cd_titulo'], 'tabelaAlvo' => 'estnc_titulos', 'colunasAlvo' => ['cd_titulo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncImpressoesAviso
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_impressao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdImpressao = null;

    #[ORM\ManyToOne(targetEntity: EstncTitulos::class)]
    #[ORM\JoinColumn(name: 'cd_titulo', referencedColumnName: 'cd_titulo', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncTitulos $cdTitulo = null;

    #[ORM\Column(name: 'cd_pessoa_registro', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoaRegistro = null;

    #[ORM\Column(name: 'dt_impressao', type: 'datetime')]
    private ?\DateTimeInterface $dtImpressao = null;

    #[ORM\Column(name: 'dt_prazo_fim', type: 'datetime')]
    private ?\DateTimeInterface $dtPrazoFim = null;

    #[ORM\Column(name: 'sn_recebido', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snRecebido = 0;

    #[ORM\Column(name: 'sn_servico_cancelou', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snServicoCancelou = 0;

    public function __construct(
        ?EstncTitulos $cdTitulo = null,
        ?int $cdPessoaRegistro = null,
        ?\DateTimeInterface $dtImpressao = null,
        ?\DateTimeInterface $dtPrazoFim = null,
        int $snRecebido = 0,
        int $snServicoCancelou = 0
    ) {
        $this->cdTitulo = $cdTitulo;
        $this->cdPessoaRegistro = $cdPessoaRegistro;
        $this->dtImpressao = $dtImpressao;
        $this->dtPrazoFim = $dtPrazoFim;
        $this->snRecebido = $snRecebido;
        $this->snServicoCancelou = $snServicoCancelou;
    }

    public function getCdImpressao(): ?int
    {
        return $this->cdImpressao;
    }

    public function getCdTitulo(): ?EstncTitulos
    {
        return $this->cdTitulo;
    }

    public function setCdTitulo(?EstncTitulos $cdTitulo): self
    {
        $this->cdTitulo = $cdTitulo;
        return $this;
    }

    public function getCdPessoaRegistro(): ?int
    {
        return $this->cdPessoaRegistro;
    }

    public function setCdPessoaRegistro(?int $cdPessoaRegistro): self
    {
        $this->cdPessoaRegistro = $cdPessoaRegistro;
        return $this;
    }

    public function getDtImpressao(): ?\DateTimeInterface
    {
        return $this->dtImpressao;
    }

    public function setDtImpressao(?\DateTimeInterface $dtImpressao): self
    {
        $this->dtImpressao = $dtImpressao;
        return $this;
    }

    public function getDtPrazoFim(): ?\DateTimeInterface
    {
        return $this->dtPrazoFim;
    }

    public function setDtPrazoFim(?\DateTimeInterface $dtPrazoFim): self
    {
        $this->dtPrazoFim = $dtPrazoFim;
        return $this;
    }

    public function getSnRecebido(): int
    {
        return $this->snRecebido;
    }

    public function setSnRecebido(int $snRecebido): self
    {
        $this->snRecebido = $snRecebido;
        return $this;
    }

    public function getSnServicoCancelou(): int
    {
        return $this->snServicoCancelou;
    }

    public function setSnServicoCancelou(int $snServicoCancelou): self
    {
        $this->snServicoCancelou = $snServicoCancelou;
        return $this;
    }
}
