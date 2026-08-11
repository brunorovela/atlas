<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncInteresseVagaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncInteresseVagaRepository::class)]
#[ORM\Table(
    name: 'estnc_interesse_vaga',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_VAGA', columns: ['cd_vaga'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_INSTITUICAO', columns: ['cd_instituicao'])]
#[ORM\Index(name: 'IX_CD_CURSO', columns: ['cd_curso'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_INTER_VAGA_CD_CURSO', 'colunas' => ['cd_curso'], 'tabelaAlvo' => 'estnc_cursos', 'colunasAlvo' => ['cd_curso'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_INTER_VAGA_CD_IE', 'colunas' => ['cd_instituicao'], 'tabelaAlvo' => 'instituicoes_ensino', 'colunasAlvo' => ['cd_instituicao'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_INTER_VAGA_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_INTER_VAGA_CD_VAGA', 'colunas' => ['cd_vaga'], 'tabelaAlvo' => 'estnc_vagas', 'colunasAlvo' => ['cd_vaga'], 'opcoes' => ['onDelete' => 'CASCADE', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncInteresseVaga
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_interesse_vaga', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdInteresseVaga = null;

    #[ORM\ManyToOne(targetEntity: EstncVagas::class)]
    #[ORM\JoinColumn(name: 'cd_vaga', referencedColumnName: 'cd_vaga', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncVagas $cdVaga = null;

    #[ORM\ManyToOne(targetEntity: InstituicoesEnsino::class)]
    #[ORM\JoinColumn(name: 'cd_instituicao', referencedColumnName: 'cd_instituicao', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InstituicoesEnsino $cdInstituicao = null;

    #[ORM\ManyToOne(targetEntity: EstncCursos::class)]
    #[ORM\JoinColumn(name: 'cd_curso', referencedColumnName: 'cd_curso', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?EstncCursos $cdCurso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'sn_interesse_pessoa', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snInteressePessoa = null;

    #[ORM\Column(name: 'sn_interesse', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snInteresse = null;

    #[ORM\Column(name: 'sn_curriculo_enviado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snCurriculoEnviado = null;

    #[ORM\Column(name: 'sn_contratar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snContratar = null;

    #[ORM\Column(name: 'nr_nota', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrNota = 0;

    #[ORM\Column(name: 'nr_nota_empresa', type: 'integer', nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $nrNotaEmpresa = 0;

    #[ORM\Column(name: 'sn_entrevista', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snEntrevista = false;

    #[ORM\Column(name: 'dt_entrevista', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEntrevista = null;

    public function __construct(
        ?EstncVagas $cdVaga = null,
        ?InstituicoesEnsino $cdInstituicao = null,
        ?EstncCursos $cdCurso = null,
        ?Pessoas $cdPessoa = null,
        ?int $snInteressePessoa = null,
        ?int $snInteresse = null,
        ?int $snCurriculoEnviado = null,
        ?int $snContratar = null,
        ?int $nrNota = 0,
        ?int $nrNotaEmpresa = 0,
        ?bool $snEntrevista = false,
        ?\DateTimeInterface $dtEntrevista = null
    ) {
        $this->cdVaga = $cdVaga;
        $this->cdInstituicao = $cdInstituicao;
        $this->cdCurso = $cdCurso;
        $this->cdPessoa = $cdPessoa;
        $this->snInteressePessoa = $snInteressePessoa;
        $this->snInteresse = $snInteresse;
        $this->snCurriculoEnviado = $snCurriculoEnviado;
        $this->snContratar = $snContratar;
        $this->nrNota = $nrNota;
        $this->nrNotaEmpresa = $nrNotaEmpresa;
        $this->snEntrevista = $snEntrevista;
        $this->dtEntrevista = $dtEntrevista;
    }

    public function getCdInteresseVaga(): ?int
    {
        return $this->cdInteresseVaga;
    }

    public function getCdVaga(): ?EstncVagas
    {
        return $this->cdVaga;
    }

    public function setCdVaga(?EstncVagas $cdVaga): self
    {
        $this->cdVaga = $cdVaga;
        return $this;
    }

    public function getCdInstituicao(): ?InstituicoesEnsino
    {
        return $this->cdInstituicao;
    }

    public function setCdInstituicao(?InstituicoesEnsino $cdInstituicao): self
    {
        $this->cdInstituicao = $cdInstituicao;
        return $this;
    }

    public function getCdCurso(): ?EstncCursos
    {
        return $this->cdCurso;
    }

    public function setCdCurso(?EstncCursos $cdCurso): self
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    public function getCdPessoa(): ?Pessoas
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?Pessoas $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getSnInteressePessoa(): ?int
    {
        return $this->snInteressePessoa;
    }

    public function setSnInteressePessoa(?int $snInteressePessoa): self
    {
        $this->snInteressePessoa = $snInteressePessoa;
        return $this;
    }

    public function getSnInteresse(): ?int
    {
        return $this->snInteresse;
    }

    public function setSnInteresse(?int $snInteresse): self
    {
        $this->snInteresse = $snInteresse;
        return $this;
    }

    public function getSnCurriculoEnviado(): ?int
    {
        return $this->snCurriculoEnviado;
    }

    public function setSnCurriculoEnviado(?int $snCurriculoEnviado): self
    {
        $this->snCurriculoEnviado = $snCurriculoEnviado;
        return $this;
    }

    public function getSnContratar(): ?int
    {
        return $this->snContratar;
    }

    public function setSnContratar(?int $snContratar): self
    {
        $this->snContratar = $snContratar;
        return $this;
    }

    public function getNrNota(): ?int
    {
        return $this->nrNota;
    }

    public function setNrNota(?int $nrNota): self
    {
        $this->nrNota = $nrNota;
        return $this;
    }

    public function getNrNotaEmpresa(): ?int
    {
        return $this->nrNotaEmpresa;
    }

    public function setNrNotaEmpresa(?int $nrNotaEmpresa): self
    {
        $this->nrNotaEmpresa = $nrNotaEmpresa;
        return $this;
    }

    public function isSnEntrevista(): ?bool
    {
        return $this->snEntrevista;
    }

    public function setSnEntrevista(?bool $snEntrevista): self
    {
        $this->snEntrevista = $snEntrevista;
        return $this;
    }

    public function getDtEntrevista(): ?\DateTimeInterface
    {
        return $this->dtEntrevista;
    }

    public function setDtEntrevista(?\DateTimeInterface $dtEntrevista): self
    {
        $this->dtEntrevista = $dtEntrevista;
        return $this;
    }
}
