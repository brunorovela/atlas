<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\UnimChavesIntegracaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimChavesIntegracaoRepository::class)]
#[ORM\Table(
    name: 'unim_chaves_integracao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_nu_integracao_externa', columns: ['cd_sistema_integracao'])]
#[ORM\Index(name: 'fk_cd_pessoa_responsavel', columns: ['cd_pessoa_responsavel'])]
#[ORM\Index(name: 'fk_cd_pessoa_criadora', columns: ['cd_pessoa_criadora'])]
#[ORM\Index(name: 'unim_chaves_integracao_FK', columns: ['cd_coligada_matriz'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_cd_pessoa_criadora', 'colunas' => ['cd_pessoa_criadora'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'fk_cd_pessoa_responsavel', 'colunas' => ['cd_pessoa_responsavel'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_nu_integracao_externa', 'colunas' => ['cd_sistema_integracao'], 'tabelaAlvo' => 'nu_integracao_externa', 'colunasAlvo' => ['cd_sistema'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'unim_chaves_integracao_FK', 'colunas' => ['cd_coligada_matriz'], 'tabelaAlvo' => 'coligadas_matriz', 'colunasAlvo' => ['cd_coligada'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimChavesIntegracao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: NuIntegracaoExterna::class)]
    #[ORM\JoinColumn(name: 'cd_sistema_integracao', referencedColumnName: 'cd_sistema', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?NuIntegracaoExterna $cdSistemaIntegracao = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_criadora', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaCriadora = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_responsavel', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaResponsavel = null;

    #[ORM\ManyToOne(targetEntity: ColigadasMatriz::class)]
    #[ORM\JoinColumn(name: 'cd_coligada_matriz', referencedColumnName: 'cd_coligada', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?ColigadasMatriz $cdColigadaMatriz = null;

    #[ORM\Column(name: 'sn_gera_log', type: 'smallint', options: ['default' => '0'])]
    private int $snGeraLog = 0;

    #[ORM\Column(name: 'sn_debug_sql', type: 'smallint', options: ['default' => '0'])]
    private int $snDebugSql = 0;

    #[ORM\Column(name: 'ds_chave_integracao', type: 'string', length: 50, options: ['default' => ''])]
    private string $dsChaveIntegracao = '';

    #[ORM\Column(name: 'dt_geracao_chave', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtGeracaoChave = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?NuIntegracaoExterna $cdSistemaIntegracao = null,
        ?Pessoas $cdPessoaCriadora = null,
        ?Pessoas $cdPessoaResponsavel = null,
        ?ColigadasMatriz $cdColigadaMatriz = null,
        int $snGeraLog = 0,
        int $snDebugSql = 0,
        string $dsChaveIntegracao = '',
        ?\DateTimeInterface $dtGeracaoChave = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdSistemaIntegracao = $cdSistemaIntegracao;
        $this->cdPessoaCriadora = $cdPessoaCriadora;
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        $this->snGeraLog = $snGeraLog;
        $this->snDebugSql = $snDebugSql;
        $this->dsChaveIntegracao = $dsChaveIntegracao;
        $this->dtGeracaoChave = $dtGeracaoChave;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdSistemaIntegracao(): ?NuIntegracaoExterna
    {
        return $this->cdSistemaIntegracao;
    }

    public function setCdSistemaIntegracao(?NuIntegracaoExterna $cdSistemaIntegracao): self
    {
        $this->cdSistemaIntegracao = $cdSistemaIntegracao;
        return $this;
    }

    public function getCdPessoaCriadora(): ?Pessoas
    {
        return $this->cdPessoaCriadora;
    }

    public function setCdPessoaCriadora(?Pessoas $cdPessoaCriadora): self
    {
        $this->cdPessoaCriadora = $cdPessoaCriadora;
        return $this;
    }

    public function getCdPessoaResponsavel(): ?Pessoas
    {
        return $this->cdPessoaResponsavel;
    }

    public function setCdPessoaResponsavel(?Pessoas $cdPessoaResponsavel): self
    {
        $this->cdPessoaResponsavel = $cdPessoaResponsavel;
        return $this;
    }

    public function getCdColigadaMatriz(): ?ColigadasMatriz
    {
        return $this->cdColigadaMatriz;
    }

    public function setCdColigadaMatriz(?ColigadasMatriz $cdColigadaMatriz): self
    {
        $this->cdColigadaMatriz = $cdColigadaMatriz;
        return $this;
    }

    public function getSnGeraLog(): int
    {
        return $this->snGeraLog;
    }

    public function setSnGeraLog(int $snGeraLog): self
    {
        $this->snGeraLog = $snGeraLog;
        return $this;
    }

    public function getSnDebugSql(): int
    {
        return $this->snDebugSql;
    }

    public function setSnDebugSql(int $snDebugSql): self
    {
        $this->snDebugSql = $snDebugSql;
        return $this;
    }

    public function getDsChaveIntegracao(): string
    {
        return $this->dsChaveIntegracao;
    }

    public function setDsChaveIntegracao(string $dsChaveIntegracao): self
    {
        $this->dsChaveIntegracao = $dsChaveIntegracao;
        return $this;
    }

    public function getDtGeracaoChave(): ?\DateTimeInterface
    {
        return $this->dtGeracaoChave;
    }

    public function setDtGeracaoChave(?\DateTimeInterface $dtGeracaoChave): self
    {
        $this->dtGeracaoChave = $dtGeracaoChave;
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
