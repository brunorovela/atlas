<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\CapOfertaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapOfertaRepository::class)]
#[ORM\Table(
    name: 'cap_oferta',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_UNIDADE', columns: ['cd_unidade'])]
#[ORM\Index(name: 'IX_CD_MODALIDADE', columns: ['cd_modalidade'])]
#[ORM\Index(name: 'IX_ID_TURMA', columns: ['id_turma'])]
#[ORM\Index(name: 'cd_jornada_id', columns: ['cd_jornada_id'])]
#[ORM\Index(name: 'FK_cap_oferta_cap_processo_rematricula', columns: ['cd_processo_rematricula_id'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'cap_oferta_ibfk_1', 'colunas' => ['cd_jornada_id'], 'tabelaAlvo' => 'cap_jornada', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_oferta_cap_modalidade', 'colunas' => ['cd_modalidade'], 'tabelaAlvo' => 'cap_modalidade', 'colunasAlvo' => ['cd_modalidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_oferta_cap_processo_rematricula', 'colunas' => ['cd_processo_rematricula_id'], 'tabelaAlvo' => 'cap_processo_rematricula', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_oferta_cap_unidade', 'colunas' => ['cd_unidade'], 'tabelaAlvo' => 'cap_unidade', 'colunasAlvo' => ['cd_unidade'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cap_oferta_turmas', 'colunas' => ['id_turma'], 'tabelaAlvo' => 'turmas', 'colunasAlvo' => ['id_turma'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapOferta
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_oferta', type: 'integer')]
    private ?int $cdOferta = null;

    #[ORM\ManyToOne(targetEntity: CapUnidade::class)]
    #[ORM\JoinColumn(name: 'cd_unidade', referencedColumnName: 'cd_unidade', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapUnidade $cdUnidade = null;

    #[ORM\ManyToOne(targetEntity: CapModalidade::class)]
    #[ORM\JoinColumn(name: 'cd_modalidade', referencedColumnName: 'cd_modalidade', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapModalidade $cdModalidade = null;

    #[ORM\ManyToOne(targetEntity: Turmas::class)]
    #[ORM\JoinColumn(name: 'id_turma', referencedColumnName: 'id_turma', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Turmas $idTurma = null;

    #[ORM\ManyToOne(targetEntity: CapJornada::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornada $cdJornadaId = null;

    #[ORM\ManyToOne(targetEntity: CapProcessoRematricula::class)]
    #[ORM\JoinColumn(name: 'cd_processo_rematricula_id', referencedColumnName: 'id', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapProcessoRematricula $cdProcessoRematriculaId = null;

    #[ORM\Column(name: 'ds_oferta', type: 'string', length: 500)]
    private ?string $dsOferta = null;

    #[ORM\Column(name: 'me_oferta', type: 'text', length: 65535, nullable: true)]
    private ?string $meOferta = null;

    #[ORM\Column(name: 'ds_link_site', type: 'string', length: 500, nullable: true)]
    private ?string $dsLinkSite = null;

    #[ORM\Column(name: 'ds_caminho_imagem_grid', type: 'string', length: 500, nullable: true)]
    private ?string $dsCaminhoImagemGrid = null;

    #[ORM\Column(name: 'ds_caminho_imagem_capa', type: 'string', length: 500, nullable: true)]
    private ?string $dsCaminhoImagemCapa = null;

    #[ORM\Column(name: 'nr_conceito_mec', type: TinyIntType::NAME, nullable: true)]
    private ?int $nrConceitoMec = null;

    #[ORM\Column(name: 'dt_inicial', type: 'datetime')]
    private ?\DateTimeInterface $dtInicial = null;

    #[ORM\Column(name: 'dt_final', type: 'datetime')]
    private ?\DateTimeInterface $dtFinal = null;

    #[ORM\Column(name: 'sn_inscricao_por_data_de_nascimento', type: 'boolean', nullable: true, options: ['default' => '0'])]
    private ?bool $snInscricaoPorDataDeNascimento = false;

    #[ORM\Column(name: 'dt_nascimento_inicial', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtNascimentoInicial = null;

    #[ORM\Column(name: 'dt_nascimento_final', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtNascimentoFinal = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', options: ['default' => '1'])]
    private bool $snAtivo = true;

    #[ORM\Column(name: 'sn_mostrar_na_home', type: 'boolean', options: ['default' => '1'])]
    private bool $snMostrarNaHome = true;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapUnidade $cdUnidade = null,
        ?CapModalidade $cdModalidade = null,
        ?Turmas $idTurma = null,
        ?CapJornada $cdJornadaId = null,
        ?CapProcessoRematricula $cdProcessoRematriculaId = null,
        ?string $dsOferta = null,
        ?string $meOferta = null,
        ?string $dsLinkSite = null,
        ?string $dsCaminhoImagemGrid = null,
        ?string $dsCaminhoImagemCapa = null,
        ?int $nrConceitoMec = null,
        ?\DateTimeInterface $dtInicial = null,
        ?\DateTimeInterface $dtFinal = null,
        ?bool $snInscricaoPorDataDeNascimento = false,
        ?\DateTimeInterface $dtNascimentoInicial = null,
        ?\DateTimeInterface $dtNascimentoFinal = null,
        bool $snAtivo = true,
        bool $snMostrarNaHome = true,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdUnidade = $cdUnidade;
        $this->cdModalidade = $cdModalidade;
        $this->idTurma = $idTurma;
        $this->cdJornadaId = $cdJornadaId;
        $this->cdProcessoRematriculaId = $cdProcessoRematriculaId;
        $this->dsOferta = $dsOferta;
        $this->meOferta = $meOferta;
        $this->dsLinkSite = $dsLinkSite;
        $this->dsCaminhoImagemGrid = $dsCaminhoImagemGrid;
        $this->dsCaminhoImagemCapa = $dsCaminhoImagemCapa;
        $this->nrConceitoMec = $nrConceitoMec;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
        $this->snInscricaoPorDataDeNascimento = $snInscricaoPorDataDeNascimento;
        $this->dtNascimentoInicial = $dtNascimentoInicial;
        $this->dtNascimentoFinal = $dtNascimentoFinal;
        $this->snAtivo = $snAtivo;
        $this->snMostrarNaHome = $snMostrarNaHome;
        $this->dtBase = $dtBase;
    }

    public function getCdOferta(): ?int
    {
        return $this->cdOferta;
    }

    public function getCdUnidade(): ?CapUnidade
    {
        return $this->cdUnidade;
    }

    public function setCdUnidade(?CapUnidade $cdUnidade): self
    {
        $this->cdUnidade = $cdUnidade;
        return $this;
    }

    public function getCdModalidade(): ?CapModalidade
    {
        return $this->cdModalidade;
    }

    public function setCdModalidade(?CapModalidade $cdModalidade): self
    {
        $this->cdModalidade = $cdModalidade;
        return $this;
    }

    public function getIdTurma(): ?Turmas
    {
        return $this->idTurma;
    }

    public function setIdTurma(?Turmas $idTurma): self
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function getCdJornadaId(): ?CapJornada
    {
        return $this->cdJornadaId;
    }

    public function setCdJornadaId(?CapJornada $cdJornadaId): self
    {
        $this->cdJornadaId = $cdJornadaId;
        return $this;
    }

    public function getCdProcessoRematriculaId(): ?CapProcessoRematricula
    {
        return $this->cdProcessoRematriculaId;
    }

    public function setCdProcessoRematriculaId(?CapProcessoRematricula $cdProcessoRematriculaId): self
    {
        $this->cdProcessoRematriculaId = $cdProcessoRematriculaId;
        return $this;
    }

    public function getDsOferta(): ?string
    {
        return $this->dsOferta;
    }

    public function setDsOferta(?string $dsOferta): self
    {
        $this->dsOferta = $dsOferta;
        return $this;
    }

    public function getMeOferta(): ?string
    {
        return $this->meOferta;
    }

    public function setMeOferta(?string $meOferta): self
    {
        $this->meOferta = $meOferta;
        return $this;
    }

    public function getDsLinkSite(): ?string
    {
        return $this->dsLinkSite;
    }

    public function setDsLinkSite(?string $dsLinkSite): self
    {
        $this->dsLinkSite = $dsLinkSite;
        return $this;
    }

    public function getDsCaminhoImagemGrid(): ?string
    {
        return $this->dsCaminhoImagemGrid;
    }

    public function setDsCaminhoImagemGrid(?string $dsCaminhoImagemGrid): self
    {
        $this->dsCaminhoImagemGrid = $dsCaminhoImagemGrid;
        return $this;
    }

    public function getDsCaminhoImagemCapa(): ?string
    {
        return $this->dsCaminhoImagemCapa;
    }

    public function setDsCaminhoImagemCapa(?string $dsCaminhoImagemCapa): self
    {
        $this->dsCaminhoImagemCapa = $dsCaminhoImagemCapa;
        return $this;
    }

    public function getNrConceitoMec(): ?int
    {
        return $this->nrConceitoMec;
    }

    public function setNrConceitoMec(?int $nrConceitoMec): self
    {
        $this->nrConceitoMec = $nrConceitoMec;
        return $this;
    }

    public function getDtInicial(): ?\DateTimeInterface
    {
        return $this->dtInicial;
    }

    public function setDtInicial(?\DateTimeInterface $dtInicial): self
    {
        $this->dtInicial = $dtInicial;
        return $this;
    }

    public function getDtFinal(): ?\DateTimeInterface
    {
        return $this->dtFinal;
    }

    public function setDtFinal(?\DateTimeInterface $dtFinal): self
    {
        $this->dtFinal = $dtFinal;
        return $this;
    }

    public function isSnInscricaoPorDataDeNascimento(): ?bool
    {
        return $this->snInscricaoPorDataDeNascimento;
    }

    public function setSnInscricaoPorDataDeNascimento(?bool $snInscricaoPorDataDeNascimento): self
    {
        $this->snInscricaoPorDataDeNascimento = $snInscricaoPorDataDeNascimento;
        return $this;
    }

    public function getDtNascimentoInicial(): ?\DateTimeInterface
    {
        return $this->dtNascimentoInicial;
    }

    public function setDtNascimentoInicial(?\DateTimeInterface $dtNascimentoInicial): self
    {
        $this->dtNascimentoInicial = $dtNascimentoInicial;
        return $this;
    }

    public function getDtNascimentoFinal(): ?\DateTimeInterface
    {
        return $this->dtNascimentoFinal;
    }

    public function setDtNascimentoFinal(?\DateTimeInterface $dtNascimentoFinal): self
    {
        $this->dtNascimentoFinal = $dtNascimentoFinal;
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

    public function isSnMostrarNaHome(): bool
    {
        return $this->snMostrarNaHome;
    }

    public function setSnMostrarNaHome(bool $snMostrarNaHome): self
    {
        $this->snMostrarNaHome = $snMostrarNaHome;
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
