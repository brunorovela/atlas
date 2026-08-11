<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\LeitoraProvasGabaritosRespRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeitoraProvasGabaritosRespRepository::class)]
#[ORM\Table(
    name: 'leitora_provas_gabaritos_resp',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'cd_prova_gabarito_resposta', columns: ['cd_prova_gabarito_resposta'])]
#[ORM\Index(name: 'IX_CD_PROVA_GABARITO', columns: ['cd_prova_gabarito'])]
#[ORM\Index(name: 'IX_CD_PROVA_DISCIPLINA', columns: ['cd_prova_disciplina'])]
#[ORM\Index(name: 'IX_CD_SITUACAO', columns: ['cd_situacao'])]
class LeitoraProvasGabaritosResp
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_gabarito_resposta', type: 'integer')]
    private ?int $cdProvaGabaritoResposta = null;

    #[ORM\Column(name: 'cd_prova_gabarito', type: 'integer', options: ['default' => '0'])]
    private int $cdProvaGabarito = 0;

    #[ORM\Column(name: 'nr_alternativas', type: 'smallint', nullable: true)]
    private ?int $nrAlternativas = null;

    #[ORM\Column(name: 'nr_questao', type: 'smallint', options: ['default' => '0'])]
    private int $nrQuestao = 0;

    #[ORM\Column(name: 'ds_resposta', type: 'string', length: 3, options: ['fixed' => true, 'default' => ''])]
    private string $dsResposta = '';

    #[ORM\Column(name: 'cd_prova_disciplina', type: 'integer', options: ['default' => '0'])]
    private int $cdProvaDisciplina = 0;

    #[ORM\Column(name: 'vl_peso', type: 'float', nullable: true, options: ['default' => '1'])]
    private ?float $vlPeso = 1.0;

    #[ORM\Column(name: 'cd_situacao', type: 'smallint', nullable: true, options: ['default' => '-1'])]
    private ?int $cdSituacao = -1;

    #[ORM\Column(name: 'sn_discursiva', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snDiscursiva = 0;

    #[ORM\Column(name: 'sn_parcial', type: 'smallint', nullable: true, options: ['default' => '0'])]
    private ?int $snParcial = 0;

    #[ORM\Column(name: 'nr_parte', type: TinyIntType::NAME, options: ['default' => '1', 'comment' => 'Informação de qual é a parte desta questão'])]
    private int $nrParte = 1;

    public function __construct(
        int $cdProvaGabarito = 0,
        ?int $nrAlternativas = null,
        int $nrQuestao = 0,
        string $dsResposta = '',
        int $cdProvaDisciplina = 0,
        ?float $vlPeso = 1.0,
        ?int $cdSituacao = -1,
        int $snDiscursiva = 0,
        ?int $snParcial = 0,
        int $nrParte = 1
    ) {
        $this->cdProvaGabarito = $cdProvaGabarito;
        $this->nrAlternativas = $nrAlternativas;
        $this->nrQuestao = $nrQuestao;
        $this->dsResposta = $dsResposta;
        $this->cdProvaDisciplina = $cdProvaDisciplina;
        $this->vlPeso = $vlPeso;
        $this->cdSituacao = $cdSituacao;
        $this->snDiscursiva = $snDiscursiva;
        $this->snParcial = $snParcial;
        $this->nrParte = $nrParte;
    }

    public function getCdProvaGabaritoResposta(): ?int
    {
        return $this->cdProvaGabaritoResposta;
    }

    public function getCdProvaGabarito(): int
    {
        return $this->cdProvaGabarito;
    }

    public function setCdProvaGabarito(int $cdProvaGabarito): self
    {
        $this->cdProvaGabarito = $cdProvaGabarito;
        return $this;
    }

    public function getNrAlternativas(): ?int
    {
        return $this->nrAlternativas;
    }

    public function setNrAlternativas(?int $nrAlternativas): self
    {
        $this->nrAlternativas = $nrAlternativas;
        return $this;
    }

    public function getNrQuestao(): int
    {
        return $this->nrQuestao;
    }

    public function setNrQuestao(int $nrQuestao): self
    {
        $this->nrQuestao = $nrQuestao;
        return $this;
    }

    public function getDsResposta(): string
    {
        return $this->dsResposta;
    }

    public function setDsResposta(string $dsResposta): self
    {
        $this->dsResposta = $dsResposta;
        return $this;
    }

    public function getCdProvaDisciplina(): int
    {
        return $this->cdProvaDisciplina;
    }

    public function setCdProvaDisciplina(int $cdProvaDisciplina): self
    {
        $this->cdProvaDisciplina = $cdProvaDisciplina;
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

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getSnDiscursiva(): int
    {
        return $this->snDiscursiva;
    }

    public function setSnDiscursiva(int $snDiscursiva): self
    {
        $this->snDiscursiva = $snDiscursiva;
        return $this;
    }

    public function getSnParcial(): ?int
    {
        return $this->snParcial;
    }

    public function setSnParcial(?int $snParcial): self
    {
        $this->snParcial = $snParcial;
        return $this;
    }

    public function getNrParte(): int
    {
        return $this->nrParte;
    }

    public function setNrParte(int $nrParte): self
    {
        $this->nrParte = $nrParte;
        return $this;
    }
}
