<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ProProvasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProProvasRepository::class)]
#[ORM\Table(
    name: 'pro_provas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TIPO_PROVA', columns: ['cd_tipo_prova'])]
#[ORM\Index(name: 'IX_SN_ATIVO', columns: ['sn_ativo'])]
class ProProvas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova', type: 'integer')]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_tipo_prova', type: 'integer')]
    private ?int $cdTipoProva = null;

    #[ORM\Column(name: 'ds_prova', type: 'string', length: 200)]
    private ?string $dsProva = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_cad_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadInicio = null;

    #[ORM\Column(name: 'dt_cad_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadFim = null;

    #[ORM\Column(name: 'dt_res_inicio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtResInicio = null;

    #[ORM\Column(name: 'dt_res_fim', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtResFim = null;

    #[ORM\Column(name: 'cd_professor', type: 'integer', nullable: true)]
    private ?int $cdProfessor = null;

    #[ORM\Column(name: 'nr_questoes', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrQuestoes = null;

    #[ORM\Column(name: 'vl_peso', type: 'smallfloat', nullable: true)]
    private ?float $vlPeso = null;

    #[ORM\Column(name: 'nr_anosem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrAnosem = null;

    #[ORM\Column(name: 'nr_duracao', type: 'integer', nullable: true)]
    private ?int $nrDuracao = null;

    #[ORM\Column(name: 'ds_situacoes_validas', type: 'string', length: 255, nullable: true)]
    private ?string $dsSituacoesValidas = null;

    #[ORM\Column(name: 'ds_diario_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsDiarioChave = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'sn_concurso', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snConcurso = 0;

    #[ORM\Column(name: 'sn_voltar', type: 'boolean', nullable: true)]
    private ?bool $snVoltar = null;

    #[ORM\Column(name: 'cd_sorteio', type: 'integer', options: ['default' => '0', 'comment' => '0 - Aleatorio | 1 - Sequencial'])]
    private int $cdSorteio = 0;

    #[ORM\Column(name: 'cd_exibir_resultado', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0', 'comment' => '0 - Completo | 1 - Erros | 2 - So a Nota'])]
    private int $cdExibirResultado = 0;

    #[ORM\Column(name: 'sn_exibir_gabarito', type: TinyIntType::NAME, options: ['default' => '1'])]
    private int $snExibirGabarito = 1;

    #[ORM\Column(name: 'sn_anulada_responde', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snAnuladaResponde = 0;

    #[ORM\Column(name: 'sn_prova_online', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '1'])]
    private ?int $snProvaOnline = 1;

    #[ORM\Column(name: 'sn_multidisciplinar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snMultidisciplinar = 0;

    // Sem construtor: 23 propriedades. Use os setters encadeados.

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function getCdTipoProva(): ?int
    {
        return $this->cdTipoProva;
    }

    public function setCdTipoProva(?int $cdTipoProva): self
    {
        $this->cdTipoProva = $cdTipoProva;
        return $this;
    }

    public function getDsProva(): ?string
    {
        return $this->dsProva;
    }

    public function setDsProva(?string $dsProva): self
    {
        $this->dsProva = $dsProva;
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

    public function getDtCadInicio(): ?\DateTimeInterface
    {
        return $this->dtCadInicio;
    }

    public function setDtCadInicio(?\DateTimeInterface $dtCadInicio): self
    {
        $this->dtCadInicio = $dtCadInicio;
        return $this;
    }

    public function getDtCadFim(): ?\DateTimeInterface
    {
        return $this->dtCadFim;
    }

    public function setDtCadFim(?\DateTimeInterface $dtCadFim): self
    {
        $this->dtCadFim = $dtCadFim;
        return $this;
    }

    public function getDtResInicio(): ?\DateTimeInterface
    {
        return $this->dtResInicio;
    }

    public function setDtResInicio(?\DateTimeInterface $dtResInicio): self
    {
        $this->dtResInicio = $dtResInicio;
        return $this;
    }

    public function getDtResFim(): ?\DateTimeInterface
    {
        return $this->dtResFim;
    }

    public function setDtResFim(?\DateTimeInterface $dtResFim): self
    {
        $this->dtResFim = $dtResFim;
        return $this;
    }

    public function getCdProfessor(): ?int
    {
        return $this->cdProfessor;
    }

    public function setCdProfessor(?int $cdProfessor): self
    {
        $this->cdProfessor = $cdProfessor;
        return $this;
    }

    public function getNrQuestoes(): ?int
    {
        return $this->nrQuestoes;
    }

    public function setNrQuestoes(?int $nrQuestoes): self
    {
        $this->nrQuestoes = $nrQuestoes;
        return $this;
    }

    public function getVlPeso(): ?float
    {
        return $this->vlPeso;
    }

    public function setVlPeso(?float $vlPeso): self
    {
        $this->vlPeso = $vlPeso;
        return $this;
    }

    public function getNrAnosem(): ?int
    {
        return $this->nrAnosem;
    }

    public function setNrAnosem(?int $nrAnosem): self
    {
        $this->nrAnosem = $nrAnosem;
        return $this;
    }

    public function getNrDuracao(): ?int
    {
        return $this->nrDuracao;
    }

    public function setNrDuracao(?int $nrDuracao): self
    {
        $this->nrDuracao = $nrDuracao;
        return $this;
    }

    public function getDsSituacoesValidas(): ?string
    {
        return $this->dsSituacoesValidas;
    }

    public function setDsSituacoesValidas(?string $dsSituacoesValidas): self
    {
        $this->dsSituacoesValidas = $dsSituacoesValidas;
        return $this;
    }

    public function getDsDiarioChave(): ?string
    {
        return $this->dsDiarioChave;
    }

    public function setDsDiarioChave(?string $dsDiarioChave): self
    {
        $this->dsDiarioChave = $dsDiarioChave;
        return $this;
    }

    public function isSnAtivo(): bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnConcurso(): ?int
    {
        return $this->snConcurso;
    }

    public function setSnConcurso(?int $snConcurso): self
    {
        $this->snConcurso = $snConcurso;
        return $this;
    }

    public function isSnVoltar(): ?bool
    {
        return $this->snVoltar;
    }

    public function setSnVoltar(?bool $snVoltar): self
    {
        $this->snVoltar = $snVoltar;
        return $this;
    }

    public function getCdSorteio(): int
    {
        return $this->cdSorteio;
    }

    public function setCdSorteio(int $cdSorteio): self
    {
        $this->cdSorteio = $cdSorteio;
        return $this;
    }

    public function getCdExibirResultado(): int
    {
        return $this->cdExibirResultado;
    }

    public function setCdExibirResultado(int $cdExibirResultado): self
    {
        $this->cdExibirResultado = $cdExibirResultado;
        return $this;
    }

    public function getSnExibirGabarito(): int
    {
        return $this->snExibirGabarito;
    }

    public function setSnExibirGabarito(int $snExibirGabarito): self
    {
        $this->snExibirGabarito = $snExibirGabarito;
        return $this;
    }

    public function getSnAnuladaResponde(): int
    {
        return $this->snAnuladaResponde;
    }

    public function setSnAnuladaResponde(int $snAnuladaResponde): self
    {
        $this->snAnuladaResponde = $snAnuladaResponde;
        return $this;
    }

    public function getSnProvaOnline(): ?int
    {
        return $this->snProvaOnline;
    }

    public function setSnProvaOnline(?int $snProvaOnline): self
    {
        $this->snProvaOnline = $snProvaOnline;
        return $this;
    }

    public function getSnMultidisciplinar(): ?int
    {
        return $this->snMultidisciplinar;
    }

    public function setSnMultidisciplinar(?int $snMultidisciplinar): self
    {
        $this->snMultidisciplinar = $snMultidisciplinar;
        return $this;
    }
}
