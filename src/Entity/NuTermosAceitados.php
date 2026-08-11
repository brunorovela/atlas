<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\NuTermosAceitadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuTermosAceitadosRepository::class)]
#[ORM\Table(
    name: 'nu_termos_aceitados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_TERMOS_ACEITADOS_CD_TERMO', columns: ['cd_termo'])]
#[ORM\Index(name: 'FK_TERMOS_ACEITADOS_CD_GRUPO', columns: ['cd_grupo'])]
#[ORM\Index(name: 'FK_TERMOS_ACEITADOS_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_TERMOS_ACEITADOS_CD_GRUPO', 'colunas' => ['cd_grupo'], 'tabelaAlvo' => 'nu_termos_grupos', 'colunasAlvo' => ['cd_grupo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TERMOS_ACEITADOS_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_TERMOS_ACEITADOS_CD_TERMO', 'colunas' => ['cd_termo'], 'tabelaAlvo' => 'nu_termos_grupos', 'colunasAlvo' => ['cd_termo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class NuTermosAceitados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_termo_aceitado', type: 'integer')]
    private ?int $idTermoAceitado = null;

    #[ORM\Column(name: 'cd_termo', type: 'integer')]
    private ?int $cdTermo = null;

    #[ORM\Column(name: 'cd_grupo', type: 'integer')]
    private ?int $cdGrupo = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_aceite', type: 'datetime')]
    private ?\DateTimeInterface $dtAceite = null;

    #[ORM\Column(name: 'ds_ip', type: 'string', length: 255, nullable: true)]
    private ?string $dsIp = null;

    #[ORM\Column(name: 'ds_conteudo_lido', type: 'text', nullable: true)]
    private ?string $dsConteudoLido = null;

    #[ORM\Column(name: 'ds_chaves', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsChaves = null;

    #[ORM\Column(name: 'nm_titulo_aceite', type: 'string', length: 255, nullable: true)]
    private ?string $nmTituloAceite = null;

    #[ORM\Column(name: 'bb_arquivo_lido', type: 'blob', length: 16777215, nullable: true)]
    private ?string $bbArquivoLido = null;

    #[ORM\Column(name: 'cd_aluno', type: 'integer', nullable: true)]
    private ?int $cdAluno = null;

    #[ORM\Column(name: 'cd_turma', type: 'string', length: 50, nullable: true)]
    private ?string $cdTurma = null;

    #[ORM\Column(name: 'ds_opcao', type: 'string', length: 255, nullable: true)]
    private ?string $dsOpcao = null;

    #[ORM\Column(name: 'nr_anosem', type: 'integer', nullable: true)]
    private ?int $nrAnosem = null;

    public function __construct(
        ?int $cdTermo = null,
        ?int $cdGrupo = null,
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtAceite = null,
        ?string $dsIp = null,
        ?string $dsConteudoLido = null,
        ?string $dsChaves = null,
        ?string $nmTituloAceite = null,
        ?string $bbArquivoLido = null,
        ?int $cdAluno = null,
        ?string $cdTurma = null,
        ?string $dsOpcao = null,
        ?int $nrAnosem = null
    ) {
        $this->cdTermo = $cdTermo;
        $this->cdGrupo = $cdGrupo;
        $this->cdPessoa = $cdPessoa;
        $this->dtAceite = $dtAceite;
        $this->dsIp = $dsIp;
        $this->dsConteudoLido = $dsConteudoLido;
        $this->dsChaves = $dsChaves;
        $this->nmTituloAceite = $nmTituloAceite;
        $this->bbArquivoLido = $bbArquivoLido;
        $this->cdAluno = $cdAluno;
        $this->cdTurma = $cdTurma;
        $this->dsOpcao = $dsOpcao;
        $this->nrAnosem = $nrAnosem;
    }

    public function getIdTermoAceitado(): ?int
    {
        return $this->idTermoAceitado;
    }

    public function getCdTermo(): ?int
    {
        return $this->cdTermo;
    }

    public function setCdTermo(?int $cdTermo): self
    {
        $this->cdTermo = $cdTermo;
        return $this;
    }

    public function getCdGrupo(): ?int
    {
        return $this->cdGrupo;
    }

    public function setCdGrupo(?int $cdGrupo): self
    {
        $this->cdGrupo = $cdGrupo;
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

    public function getDtAceite(): ?\DateTimeInterface
    {
        return $this->dtAceite;
    }

    public function setDtAceite(?\DateTimeInterface $dtAceite): self
    {
        $this->dtAceite = $dtAceite;
        return $this;
    }

    public function getDsIp(): ?string
    {
        return $this->dsIp;
    }

    public function setDsIp(?string $dsIp): self
    {
        $this->dsIp = $dsIp;
        return $this;
    }

    public function getDsConteudoLido(): ?string
    {
        return $this->dsConteudoLido;
    }

    public function setDsConteudoLido(?string $dsConteudoLido): self
    {
        $this->dsConteudoLido = $dsConteudoLido;
        return $this;
    }

    public function getDsChaves(): ?string
    {
        return $this->dsChaves;
    }

    public function setDsChaves(?string $dsChaves): self
    {
        $this->dsChaves = $dsChaves;
        return $this;
    }

    public function getNmTituloAceite(): ?string
    {
        return $this->nmTituloAceite;
    }

    public function setNmTituloAceite(?string $nmTituloAceite): self
    {
        $this->nmTituloAceite = $nmTituloAceite;
        return $this;
    }

    public function getBbArquivoLido(): ?string
    {
        return $this->bbArquivoLido;
    }

    public function setBbArquivoLido(?string $bbArquivoLido): self
    {
        $this->bbArquivoLido = $bbArquivoLido;
        return $this;
    }

    public function getCdAluno(): ?int
    {
        return $this->cdAluno;
    }

    public function setCdAluno(?int $cdAluno): self
    {
        $this->cdAluno = $cdAluno;
        return $this;
    }

    public function getCdTurma(): ?string
    {
        return $this->cdTurma;
    }

    public function setCdTurma(?string $cdTurma): self
    {
        $this->cdTurma = $cdTurma;
        return $this;
    }

    public function getDsOpcao(): ?string
    {
        return $this->dsOpcao;
    }

    public function setDsOpcao(?string $dsOpcao): self
    {
        $this->dsOpcao = $dsOpcao;
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
}
