<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RemLayoutsExecucaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemLayoutsExecucaoRepository::class)]
#[ORM\Table(
    name: 'rem_layouts_execucao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_LAYOUTS_EXECUCAO_CD_LAYOUT_LAYOUTS_CD_LAYOUT', columns: ['CD_LAYOUT'])]
#[ORM\Index(name: 'FK_LAYOUTS_EXECUCAO_CD_ARQUIVO_ARQUIVOS_CD_ARQUIVO', columns: ['CD_ARQUIVO'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_LAYOUTS_EXECUCAO_CD_ARQUIVO_ARQUIVOS_CD_ARQUIVO', 'colunas' => ['CD_ARQUIVO'], 'tabelaAlvo' => 'rem_arquivos', 'colunasAlvo' => ['cd_arquivo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_LAYOUTS_EXECUCAO_CD_LAYOUT_LAYOUTS_CD_LAYOUT', 'colunas' => ['CD_LAYOUT'], 'tabelaAlvo' => 'rem_layouts', 'colunasAlvo' => ['cd_layout'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RemLayoutsExecucao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'CD_EXECUCAO', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdExecucao = null;

    #[ORM\ManyToOne(targetEntity: RemLayouts::class)]
    #[ORM\JoinColumn(name: 'CD_LAYOUT', referencedColumnName: 'cd_layout', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?RemLayouts $cdLayout = null;

    #[ORM\ManyToOne(targetEntity: RemArquivos::class)]
    #[ORM\JoinColumn(name: 'CD_ARQUIVO', referencedColumnName: 'cd_arquivo', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?RemArquivos $cdArquivo = null;

    #[ORM\Column(name: 'DT_INICIO', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtInicio = null;

    #[ORM\Column(name: 'DT_FIM', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtFim = null;

    #[ORM\Column(name: 'SN_SUCESSO', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snSucesso = 0;

    #[ORM\Column(name: 'ME_ERRO', type: 'text', length: 65535, nullable: true)]
    private ?string $meErro = null;

    public function __construct(
        ?RemLayouts $cdLayout = null,
        ?RemArquivos $cdArquivo = null,
        ?\DateTimeInterface $dtInicio = null,
        ?\DateTimeInterface $dtFim = null,
        int $snSucesso = 0,
        ?string $meErro = null
    ) {
        $this->cdLayout = $cdLayout;
        $this->cdArquivo = $cdArquivo;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->snSucesso = $snSucesso;
        $this->meErro = $meErro;
    }

    public function getCdExecucao(): ?int
    {
        return $this->cdExecucao;
    }

    public function getCdLayout(): ?RemLayouts
    {
        return $this->cdLayout;
    }

    public function setCdLayout(?RemLayouts $cdLayout): self
    {
        $this->cdLayout = $cdLayout;
        return $this;
    }

    public function getCdArquivo(): ?RemArquivos
    {
        return $this->cdArquivo;
    }

    public function setCdArquivo(?RemArquivos $cdArquivo): self
    {
        $this->cdArquivo = $cdArquivo;
        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dtInicio;
    }

    public function setDtInicio(?\DateTimeInterface $dtInicio): self
    {
        $this->dtInicio = $dtInicio;
        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dtFim;
    }

    public function setDtFim(?\DateTimeInterface $dtFim): self
    {
        $this->dtFim = $dtFim;
        return $this;
    }

    public function getSnSucesso(): int
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(int $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
        return $this;
    }

    public function getMeErro(): ?string
    {
        return $this->meErro;
    }

    public function setMeErro(?string $meErro): self
    {
        $this->meErro = $meErro;
        return $this;
    }
}
