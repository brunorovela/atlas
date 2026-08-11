<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\NuCadastrosCamposRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuCadastrosCamposRepository::class)]
#[ORM\Table(
    name: 'nu_cadastros_campos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO', columns: ['cd_tipo'])]
#[ORM\Index(name: 'IX_CD_CADASTRO_CAMPO_GRUPO', columns: ['cd_cadastro_campo_grupo'])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_CD_CADASTRO_CAMPO_RELAC_CHAVE', columns: ['cd_cadastro_campo_relac_chave'])]
#[ORM\Index(name: 'IX_CD_CADASTRO_CAMPO_RELAC_LIST', columns: ['cd_cadastro_campo_relac_list'])]
class NuCadastrosCampos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cadastro_campo', type: 'integer')]
    private ?int $cdCadastroCampo = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 100, options: ['default' => ''])]
    private string $dsTitulo = '';

    #[ORM\Column(name: 'cd_tipo', type: 'integer', options: ['default' => '0'])]
    private int $cdTipo = 0;

    #[ORM\Column(name: 'ds_ajuda', type: 'string', length: 255, nullable: true)]
    private ?string $dsAjuda = null;

    #[ORM\Column(name: 'sn_requerido', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snRequerido = null;

    #[ORM\Column(name: 'sn_consulta', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snConsulta = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'integer')]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'nr_ordem', type: 'integer')]
    private ?int $nrOrdem = null;

    #[ORM\Column(name: 'sn_cadastro', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snCadastro = null;

    #[ORM\Column(name: 'nr_tamanho_vertical', type: 'integer', nullable: true, options: ['default' => '50'])]
    private ?int $nrTamanhoVertical = 50;

    #[ORM\Column(name: 'sn_todas_maiusculas', type: 'boolean', options: ['default' => '0'])]
    private bool $snTodasMaiusculas = false;

    #[ORM\Column(name: 'sn_chave', type: 'boolean')]
    private ?bool $snChave = null;

    #[ORM\Column(name: 'cd_cadastro_relac', type: 'integer', nullable: true)]
    private ?int $cdCadastroRelac = null;

    #[ORM\Column(name: 'cd_cadastro_campo_relac_chave', type: 'integer', nullable: true)]
    private ?int $cdCadastroCampoRelacChave = null;

    #[ORM\Column(name: 'cd_cadastro_campo_relac_list', type: 'integer', nullable: true)]
    private ?int $cdCadastroCampoRelacList = null;

    #[ORM\Column(name: 'ds_valor_padrao', type: 'string', length: 255, nullable: true)]
    private ?string $dsValorPadrao = null;

    #[ORM\Column(name: 'sn_abaixo', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snAbaixo = null;

    #[ORM\Column(name: 'cd_cadastro_campo_grupo', type: 'integer')]
    private ?int $cdCadastroCampoGrupo = null;

    #[ORM\Column(name: 'nr_posicao_esquerda', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPosicaoEsquerda = null;

    #[ORM\Column(name: 'nr_posicao_topo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrPosicaoTopo = null;

    #[ORM\Column(name: 'sn_visivel', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snVisivel = 1;

    #[ORM\Column(name: 'sn_fixo', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snFixo = 0;

    #[ORM\Column(name: 'sn_requerido_original', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snRequeridoOriginal = null;

    #[ORM\Column(name: 'sn_valor_padrao_original', type: TinyIntType::NAME, options: ['unsigned' => true])]
    private ?int $snValorPadraoOriginal = null;

    #[ORM\Column(name: 'sn_filtro', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snFiltro = 0;

    #[ORM\Column(name: 'sn_grade', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snGrade = 1;

    #[ORM\Column(name: 'sn_ordem_padrao', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snOrdemPadrao = 0;

    // Sem construtor: 27 propriedades. Use os setters encadeados.

    public function getCdCadastroCampo(): ?int
    {
        return $this->cdCadastroCampo;
    }

    public function getDsTitulo(): string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getCdTipo(): int
    {
        return $this->cdTipo;
    }

    public function setCdTipo(int $cdTipo): self
    {
        $this->cdTipo = $cdTipo;
        return $this;
    }

    public function getDsAjuda(): ?string
    {
        return $this->dsAjuda;
    }

    public function setDsAjuda(?string $dsAjuda): self
    {
        $this->dsAjuda = $dsAjuda;
        return $this;
    }

    public function getSnRequerido(): ?int
    {
        return $this->snRequerido;
    }

    public function setSnRequerido(?int $snRequerido): self
    {
        $this->snRequerido = $snRequerido;
        return $this;
    }

    public function getSnConsulta(): ?int
    {
        return $this->snConsulta;
    }

    public function setSnConsulta(?int $snConsulta): self
    {
        $this->snConsulta = $snConsulta;
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

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }

    public function getNrOrdem(): ?int
    {
        return $this->nrOrdem;
    }

    public function setNrOrdem(?int $nrOrdem): self
    {
        $this->nrOrdem = $nrOrdem;
        return $this;
    }

    public function getSnCadastro(): ?int
    {
        return $this->snCadastro;
    }

    public function setSnCadastro(?int $snCadastro): self
    {
        $this->snCadastro = $snCadastro;
        return $this;
    }

    public function getNrTamanhoVertical(): ?int
    {
        return $this->nrTamanhoVertical;
    }

    public function setNrTamanhoVertical(?int $nrTamanhoVertical): self
    {
        $this->nrTamanhoVertical = $nrTamanhoVertical;
        return $this;
    }

    public function isSnTodasMaiusculas(): bool
    {
        return $this->snTodasMaiusculas;
    }

    public function setSnTodasMaiusculas(bool $snTodasMaiusculas): self
    {
        $this->snTodasMaiusculas = $snTodasMaiusculas;
        return $this;
    }

    public function isSnChave(): ?bool
    {
        return $this->snChave;
    }

    public function setSnChave(?bool $snChave): self
    {
        $this->snChave = $snChave;
        return $this;
    }

    public function getCdCadastroRelac(): ?int
    {
        return $this->cdCadastroRelac;
    }

    public function setCdCadastroRelac(?int $cdCadastroRelac): self
    {
        $this->cdCadastroRelac = $cdCadastroRelac;
        return $this;
    }

    public function getCdCadastroCampoRelacChave(): ?int
    {
        return $this->cdCadastroCampoRelacChave;
    }

    public function setCdCadastroCampoRelacChave(?int $cdCadastroCampoRelacChave): self
    {
        $this->cdCadastroCampoRelacChave = $cdCadastroCampoRelacChave;
        return $this;
    }

    public function getCdCadastroCampoRelacList(): ?int
    {
        return $this->cdCadastroCampoRelacList;
    }

    public function setCdCadastroCampoRelacList(?int $cdCadastroCampoRelacList): self
    {
        $this->cdCadastroCampoRelacList = $cdCadastroCampoRelacList;
        return $this;
    }

    public function getDsValorPadrao(): ?string
    {
        return $this->dsValorPadrao;
    }

    public function setDsValorPadrao(?string $dsValorPadrao): self
    {
        $this->dsValorPadrao = $dsValorPadrao;
        return $this;
    }

    public function getSnAbaixo(): ?int
    {
        return $this->snAbaixo;
    }

    public function setSnAbaixo(?int $snAbaixo): self
    {
        $this->snAbaixo = $snAbaixo;
        return $this;
    }

    public function getCdCadastroCampoGrupo(): ?int
    {
        return $this->cdCadastroCampoGrupo;
    }

    public function setCdCadastroCampoGrupo(?int $cdCadastroCampoGrupo): self
    {
        $this->cdCadastroCampoGrupo = $cdCadastroCampoGrupo;
        return $this;
    }

    public function getNrPosicaoEsquerda(): ?int
    {
        return $this->nrPosicaoEsquerda;
    }

    public function setNrPosicaoEsquerda(?int $nrPosicaoEsquerda): self
    {
        $this->nrPosicaoEsquerda = $nrPosicaoEsquerda;
        return $this;
    }

    public function getNrPosicaoTopo(): ?int
    {
        return $this->nrPosicaoTopo;
    }

    public function setNrPosicaoTopo(?int $nrPosicaoTopo): self
    {
        $this->nrPosicaoTopo = $nrPosicaoTopo;
        return $this;
    }

    public function getSnVisivel(): int
    {
        return $this->snVisivel;
    }

    public function setSnVisivel(int $snVisivel): self
    {
        $this->snVisivel = $snVisivel;
        return $this;
    }

    public function getSnFixo(): int
    {
        return $this->snFixo;
    }

    public function setSnFixo(int $snFixo): self
    {
        $this->snFixo = $snFixo;
        return $this;
    }

    public function getSnRequeridoOriginal(): ?int
    {
        return $this->snRequeridoOriginal;
    }

    public function setSnRequeridoOriginal(?int $snRequeridoOriginal): self
    {
        $this->snRequeridoOriginal = $snRequeridoOriginal;
        return $this;
    }

    public function getSnValorPadraoOriginal(): ?int
    {
        return $this->snValorPadraoOriginal;
    }

    public function setSnValorPadraoOriginal(?int $snValorPadraoOriginal): self
    {
        $this->snValorPadraoOriginal = $snValorPadraoOriginal;
        return $this;
    }

    public function getSnFiltro(): int
    {
        return $this->snFiltro;
    }

    public function setSnFiltro(int $snFiltro): self
    {
        $this->snFiltro = $snFiltro;
        return $this;
    }

    public function getSnGrade(): ?int
    {
        return $this->snGrade;
    }

    public function setSnGrade(?int $snGrade): self
    {
        $this->snGrade = $snGrade;
        return $this;
    }

    public function getSnOrdemPadrao(): ?int
    {
        return $this->snOrdemPadrao;
    }

    public function setSnOrdemPadrao(?int $snOrdemPadrao): self
    {
        $this->snOrdemPadrao = $snOrdemPadrao;
        return $this;
    }
}
