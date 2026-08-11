<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PintQuestoesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintQuestoesRepository::class)]
#[ORM\Table(
    name: 'pint_questoes',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_RESPONSAVEL', columns: ['cd_responsavel'])]
#[ORM\Index(name: 'IX_CD_PROVA_ORIGEM', columns: ['cd_prova_origem'])]
#[ORM\Index(name: 'IX_CD_DISCIPLINA_PAI', columns: ['cd_disciplina_pai'])]
#[ORM\Index(name: 'fk_cd_questao_nivel', columns: ['cd_questao_nivel'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_questao_nivel', 'colunas' => ['cd_questao_nivel'], 'tabelaAlvo' => 'pint_questoes_niveis', 'colunasAlvo' => ['cd_questao_nivel'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PintQuestoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_questao', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'cd_responsavel', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdResponsavel = null;

    #[ORM\Column(name: 'cd_prova_origem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProvaOrigem = null;

    #[ORM\Column(name: 'cd_disciplina_pai', type: 'string', length: 255)]
    private ?string $cdDisciplinaPai = null;

    #[ORM\Column(name: 'ds_questao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsQuestao = null;

    #[ORM\Column(name: 'cd_alternativa_certa', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $cdAlternativaCerta = 0;

    #[ORM\Column(name: 'sn_ativa', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snAtiva = 0;

    #[ORM\Column(name: 'sn_controle', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snControle = 0;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snExcluido = 0;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_questao_nova', type: 'text', length: 65535, nullable: true)]
    private ?string $dsQuestaoNova = null;

    #[ORM\Column(name: 'ds_questao_errada', type: 'text', length: 65535, nullable: true)]
    private ?string $dsQuestaoErrada = null;

    #[ORM\Column(name: 'sn_aceite_professor', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snAceiteProfessor = 0;

    #[ORM\Column(name: 'cd_questao_copia', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdQuestaoCopia = 0;

    #[ORM\Column(name: 'ds_motivo_ajuste', type: 'text', length: 65535, nullable: true)]
    private ?string $dsMotivoAjuste = null;

    #[ORM\ManyToOne(targetEntity: PintQuestoesNiveis::class)]
    #[ORM\JoinColumn(name: 'cd_questao_nivel', referencedColumnName: 'cd_questao_nivel', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PintQuestoesNiveis $cdQuestaoNivel = null;

    #[ORM\Column(name: 'cd_tipo_anulacao', type: 'integer', nullable: true)]
    private ?int $cdTipoAnulacao = null;

    public function __construct(
        ?int $cdResponsavel = null,
        ?int $cdProvaOrigem = null,
        ?string $cdDisciplinaPai = null,
        ?string $dsQuestao = null,
        ?int $cdAlternativaCerta = 0,
        ?int $snAtiva = 0,
        ?int $snControle = 0,
        ?int $snExcluido = 0,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsQuestaoNova = null,
        ?string $dsQuestaoErrada = null,
        ?int $snAceiteProfessor = 0,
        ?int $cdQuestaoCopia = 0,
        ?string $dsMotivoAjuste = null,
        ?PintQuestoesNiveis $cdQuestaoNivel = null,
        ?int $cdTipoAnulacao = null
    ) {
        $this->cdResponsavel = $cdResponsavel;
        $this->cdProvaOrigem = $cdProvaOrigem;
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        $this->dsQuestao = $dsQuestao;
        $this->cdAlternativaCerta = $cdAlternativaCerta;
        $this->snAtiva = $snAtiva;
        $this->snControle = $snControle;
        $this->snExcluido = $snExcluido;
        $this->dtCadastro = $dtCadastro;
        $this->dsQuestaoNova = $dsQuestaoNova;
        $this->dsQuestaoErrada = $dsQuestaoErrada;
        $this->snAceiteProfessor = $snAceiteProfessor;
        $this->cdQuestaoCopia = $cdQuestaoCopia;
        $this->dsMotivoAjuste = $dsMotivoAjuste;
        $this->cdQuestaoNivel = $cdQuestaoNivel;
        $this->cdTipoAnulacao = $cdTipoAnulacao;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function getCdResponsavel(): ?int
    {
        return $this->cdResponsavel;
    }

    public function setCdResponsavel(?int $cdResponsavel): self
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    public function getCdProvaOrigem(): ?int
    {
        return $this->cdProvaOrigem;
    }

    public function setCdProvaOrigem(?int $cdProvaOrigem): self
    {
        $this->cdProvaOrigem = $cdProvaOrigem;
        return $this;
    }

    public function getCdDisciplinaPai(): ?string
    {
        return $this->cdDisciplinaPai;
    }

    public function setCdDisciplinaPai(?string $cdDisciplinaPai): self
    {
        $this->cdDisciplinaPai = $cdDisciplinaPai;
        return $this;
    }

    public function getDsQuestao(): ?string
    {
        return $this->dsQuestao;
    }

    public function setDsQuestao(?string $dsQuestao): self
    {
        $this->dsQuestao = $dsQuestao;
        return $this;
    }

    public function getCdAlternativaCerta(): ?int
    {
        return $this->cdAlternativaCerta;
    }

    public function setCdAlternativaCerta(?int $cdAlternativaCerta): self
    {
        $this->cdAlternativaCerta = $cdAlternativaCerta;
        return $this;
    }

    public function getSnAtiva(): ?int
    {
        return $this->snAtiva;
    }

    public function setSnAtiva(?int $snAtiva): self
    {
        $this->snAtiva = $snAtiva;
        return $this;
    }

    public function getSnControle(): ?int
    {
        return $this->snControle;
    }

    public function setSnControle(?int $snControle): self
    {
        $this->snControle = $snControle;
        return $this;
    }

    public function getSnExcluido(): ?int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
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

    public function getDsQuestaoNova(): ?string
    {
        return $this->dsQuestaoNova;
    }

    public function setDsQuestaoNova(?string $dsQuestaoNova): self
    {
        $this->dsQuestaoNova = $dsQuestaoNova;
        return $this;
    }

    public function getDsQuestaoErrada(): ?string
    {
        return $this->dsQuestaoErrada;
    }

    public function setDsQuestaoErrada(?string $dsQuestaoErrada): self
    {
        $this->dsQuestaoErrada = $dsQuestaoErrada;
        return $this;
    }

    public function getSnAceiteProfessor(): ?int
    {
        return $this->snAceiteProfessor;
    }

    public function setSnAceiteProfessor(?int $snAceiteProfessor): self
    {
        $this->snAceiteProfessor = $snAceiteProfessor;
        return $this;
    }

    public function getCdQuestaoCopia(): ?int
    {
        return $this->cdQuestaoCopia;
    }

    public function setCdQuestaoCopia(?int $cdQuestaoCopia): self
    {
        $this->cdQuestaoCopia = $cdQuestaoCopia;
        return $this;
    }

    public function getDsMotivoAjuste(): ?string
    {
        return $this->dsMotivoAjuste;
    }

    public function setDsMotivoAjuste(?string $dsMotivoAjuste): self
    {
        $this->dsMotivoAjuste = $dsMotivoAjuste;
        return $this;
    }

    public function getCdQuestaoNivel(): ?PintQuestoesNiveis
    {
        return $this->cdQuestaoNivel;
    }

    public function setCdQuestaoNivel(?PintQuestoesNiveis $cdQuestaoNivel): self
    {
        $this->cdQuestaoNivel = $cdQuestaoNivel;
        return $this;
    }

    public function getCdTipoAnulacao(): ?int
    {
        return $this->cdTipoAnulacao;
    }

    public function setCdTipoAnulacao(?int $cdTipoAnulacao): self
    {
        $this->cdTipoAnulacao = $cdTipoAnulacao;
        return $this;
    }
}
