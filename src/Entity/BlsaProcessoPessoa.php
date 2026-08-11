<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\BlsaProcessoPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlsaProcessoPessoaRepository::class)]
#[ORM\Table(
    name: 'blsa_processo_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK__blsa_processo', columns: ['cd_processo'])]
#[ORM\Index(name: 'FK_cd_candidato_pessoas', columns: ['cd_pessoa_candidato'])]
#[ORM\Index(name: 'FK_cd_pessoa_pai_pessoas', columns: ['cd_pessoa_pai'])]
#[ORM\Index(name: 'FK_cd_pessoa_mae_pessoas', columns: ['cd_pessoa_mae'])]
#[ORM\Index(name: 'FK_cd_pessoa_responsavel_pessoas', columns: ['cd_pessoa_responsavel'])]
#[ORM\Index(name: 'FK_cd_situacao_blsa_processo_situacao', columns: ['cd_situacao'])]
#[ORM\Index(name: 'IX_CD_RESP_FINAN', columns: ['cd_resp_acad'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK__blsa_processo', 'colunas' => ['cd_processo'], 'tabelaAlvo' => 'blsa_processo', 'colunasAlvo' => ['cd_processo'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_candidato_pessoas', 'colunas' => ['cd_pessoa_candidato'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_pessoa_mae_pessoas', 'colunas' => ['cd_pessoa_mae'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_pessoa_pai_pessoas', 'colunas' => ['cd_pessoa_pai'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_pessoa_responsavel_pessoas', 'colunas' => ['cd_pessoa_responsavel'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_situacao_blsa_processo_situacao', 'colunas' => ['cd_situacao'], 'tabelaAlvo' => 'blsa_processo_situacao', 'colunasAlvo' => ['cd_situacao'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class BlsaProcessoPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_processo_pessoa', type: 'integer')]
    private ?int $cdProcessoPessoa = null;

    #[ORM\ManyToOne(targetEntity: BlsaProcesso::class)]
    #[ORM\JoinColumn(name: 'cd_processo', referencedColumnName: 'cd_processo', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BlsaProcesso $cdProcesso = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_candidato', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaCandidato = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_pai', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaPai = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_mae', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaMae = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_responsavel', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaResponsavel = null;

    #[ORM\ManyToOne(targetEntity: BlsaProcessoSituacao::class)]
    #[ORM\JoinColumn(name: 'cd_situacao', referencedColumnName: 'cd_situacao', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?BlsaProcessoSituacao $cdSituacao = null;

    #[ORM\Column(name: 'sn_cadastro_unico_gov', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snCadastroUnicoGov = 0;

    #[ORM\Column(name: 'ds_estudou_ie', type: 'string', length: 255, nullable: true)]
    private ?string $dsEstudouIe = null;

    #[ORM\Column(name: 'ds_estudou_serie', type: 'string', length: 255, nullable: true)]
    private ?string $dsEstudouSerie = null;

    #[ORM\Column(name: 'cd_estudou_rede', type: TinyIntType::NAME, nullable: true, options: ['comment' => '1 = Pública, 2 = Privada'])]
    private ?int $cdEstudouRede = null;

    #[ORM\Column(name: 'cd_residencia_situacao', type: 'integer', nullable: true)]
    private ?int $cdResidenciaSituacao = null;

    #[ORM\Column(name: 'vl_parcela_residencia', type: 'float', nullable: true)]
    private ?float $vlParcelaResidencia = null;

    #[ORM\Column(name: 'sn_possui_automovel', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snPossuiAutomovel = 0;

    #[ORM\Column(name: 'ds_automovel_json', type: 'text', length: 16777215, nullable: true)]
    private ?string $dsAutomovelJson = null;

    #[ORM\Column(name: 'vl_renda_bruta_total', type: 'float', nullable: true)]
    private ?float $vlRendaBrutaTotal = null;

    #[ORM\Column(name: 'sn_termo_aceitado', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snTermoAceitado = 0;

    #[ORM\Column(name: 'vl_receber_bolsa', type: 'float', nullable: true)]
    private ?float $vlReceberBolsa = null;

    #[ORM\Column(name: 'ds_parecer_observacao', type: 'text', length: 65535, nullable: true)]
    private ?string $dsParecerObservacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    #[ORM\Column(name: 'cd_resp_acad', type: 'integer', nullable: true)]
    private ?int $cdRespAcad = null;

    // Sem construtor: 21 propriedades. Use os setters encadeados.

    public function getCdProcessoPessoa(): ?int
    {
        return $this->cdProcessoPessoa;
    }

    public function getCdProcesso(): ?BlsaProcesso
    {
        return $this->cdProcesso;
    }

    public function setCdProcesso(?BlsaProcesso $cdProcesso): self
    {
        $this->cdProcesso = $cdProcesso;
        return $this;
    }

    public function getCdPessoaCandidato(): ?Pessoas
    {
        return $this->cdPessoaCandidato;
    }

    public function setCdPessoaCandidato(?Pessoas $cdPessoaCandidato): self
    {
        $this->cdPessoaCandidato = $cdPessoaCandidato;
        return $this;
    }

    public function getCdPessoaPai(): ?Pessoas
    {
        return $this->cdPessoaPai;
    }

    public function setCdPessoaPai(?Pessoas $cdPessoaPai): self
    {
        $this->cdPessoaPai = $cdPessoaPai;
        return $this;
    }

    public function getCdPessoaMae(): ?Pessoas
    {
        return $this->cdPessoaMae;
    }

    public function setCdPessoaMae(?Pessoas $cdPessoaMae): self
    {
        $this->cdPessoaMae = $cdPessoaMae;
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

    public function getCdSituacao(): ?BlsaProcessoSituacao
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?BlsaProcessoSituacao $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
        return $this;
    }

    public function getSnCadastroUnicoGov(): int
    {
        return $this->snCadastroUnicoGov;
    }

    public function setSnCadastroUnicoGov(int $snCadastroUnicoGov): self
    {
        $this->snCadastroUnicoGov = $snCadastroUnicoGov;
        return $this;
    }

    public function getDsEstudouIe(): ?string
    {
        return $this->dsEstudouIe;
    }

    public function setDsEstudouIe(?string $dsEstudouIe): self
    {
        $this->dsEstudouIe = $dsEstudouIe;
        return $this;
    }

    public function getDsEstudouSerie(): ?string
    {
        return $this->dsEstudouSerie;
    }

    public function setDsEstudouSerie(?string $dsEstudouSerie): self
    {
        $this->dsEstudouSerie = $dsEstudouSerie;
        return $this;
    }

    public function getCdEstudouRede(): ?int
    {
        return $this->cdEstudouRede;
    }

    public function setCdEstudouRede(?int $cdEstudouRede): self
    {
        $this->cdEstudouRede = $cdEstudouRede;
        return $this;
    }

    public function getCdResidenciaSituacao(): ?int
    {
        return $this->cdResidenciaSituacao;
    }

    public function setCdResidenciaSituacao(?int $cdResidenciaSituacao): self
    {
        $this->cdResidenciaSituacao = $cdResidenciaSituacao;
        return $this;
    }

    public function getVlParcelaResidencia(): ?float
    {
        return $this->vlParcelaResidencia;
    }

    public function setVlParcelaResidencia(?float $vlParcelaResidencia): self
    {
        $this->vlParcelaResidencia = $vlParcelaResidencia;
        return $this;
    }

    public function getSnPossuiAutomovel(): int
    {
        return $this->snPossuiAutomovel;
    }

    public function setSnPossuiAutomovel(int $snPossuiAutomovel): self
    {
        $this->snPossuiAutomovel = $snPossuiAutomovel;
        return $this;
    }

    public function getDsAutomovelJson(): ?string
    {
        return $this->dsAutomovelJson;
    }

    public function setDsAutomovelJson(?string $dsAutomovelJson): self
    {
        $this->dsAutomovelJson = $dsAutomovelJson;
        return $this;
    }

    public function getVlRendaBrutaTotal(): ?float
    {
        return $this->vlRendaBrutaTotal;
    }

    public function setVlRendaBrutaTotal(?float $vlRendaBrutaTotal): self
    {
        $this->vlRendaBrutaTotal = $vlRendaBrutaTotal;
        return $this;
    }

    public function getSnTermoAceitado(): int
    {
        return $this->snTermoAceitado;
    }

    public function setSnTermoAceitado(int $snTermoAceitado): self
    {
        $this->snTermoAceitado = $snTermoAceitado;
        return $this;
    }

    public function getVlReceberBolsa(): ?float
    {
        return $this->vlReceberBolsa;
    }

    public function setVlReceberBolsa(?float $vlReceberBolsa): self
    {
        $this->vlReceberBolsa = $vlReceberBolsa;
        return $this;
    }

    public function getDsParecerObservacao(): ?string
    {
        return $this->dsParecerObservacao;
    }

    public function setDsParecerObservacao(?string $dsParecerObservacao): self
    {
        $this->dsParecerObservacao = $dsParecerObservacao;
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

    public function getDtBase(): ?\DateTimeInterface
    {
        return $this->dtBase;
    }

    public function setDtBase(?\DateTimeInterface $dtBase): self
    {
        $this->dtBase = $dtBase;
        return $this;
    }

    public function getCdRespAcad(): ?int
    {
        return $this->cdRespAcad;
    }

    public function setCdRespAcad(?int $cdRespAcad): self
    {
        $this->cdRespAcad = $cdRespAcad;
        return $this;
    }
}
