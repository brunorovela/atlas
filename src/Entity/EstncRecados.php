<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\EstncRecadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncRecadosRepository::class)]
#[ORM\Table(
    name: 'estnc_recados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PESSOA_ORIGEM', columns: ['cd_pessoa_origem'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_ESTNC_RECADOS_ORIGEM_PESSOAS', 'colunas' => ['cd_pessoa_origem'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_ESTNC_RECADOS_PESSOA_PESSOAS', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncRecados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_recado', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRecado = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_origem', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaOrigem = null;

    #[ORM\Column(name: 'ds_email', type: 'string', length: 255)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 100)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'me_mensagem', type: 'text', length: 16777215)]
    private ?string $meMensagem = null;

    #[ORM\Column(name: 'dt_recado', type: 'datetime')]
    private ?\DateTimeInterface $dtRecado = null;

    #[ORM\Column(name: 'dt_leitura', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtLeitura = null;

    #[ORM\Column(name: 'sn_lida', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '0'])]
    private int $snLida = 0;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?Pessoas $cdPessoaOrigem = null,
        ?string $dsEmail = null,
        ?string $dsTitulo = null,
        ?string $meMensagem = null,
        ?\DateTimeInterface $dtRecado = null,
        ?\DateTimeInterface $dtLeitura = null,
        int $snLida = 0
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        $this->dsEmail = $dsEmail;
        $this->dsTitulo = $dsTitulo;
        $this->meMensagem = $meMensagem;
        $this->dtRecado = $dtRecado;
        $this->dtLeitura = $dtLeitura;
        $this->snLida = $snLida;
    }

    public function getCdRecado(): ?int
    {
        return $this->cdRecado;
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

    public function getCdPessoaOrigem(): ?Pessoas
    {
        return $this->cdPessoaOrigem;
    }

    public function setCdPessoaOrigem(?Pessoas $cdPessoaOrigem): self
    {
        $this->cdPessoaOrigem = $cdPessoaOrigem;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
        return $this;
    }

    public function getMeMensagem(): ?string
    {
        return $this->meMensagem;
    }

    public function setMeMensagem(?string $meMensagem): self
    {
        $this->meMensagem = $meMensagem;
        return $this;
    }

    public function getDtRecado(): ?\DateTimeInterface
    {
        return $this->dtRecado;
    }

    public function setDtRecado(?\DateTimeInterface $dtRecado): self
    {
        $this->dtRecado = $dtRecado;
        return $this;
    }

    public function getDtLeitura(): ?\DateTimeInterface
    {
        return $this->dtLeitura;
    }

    public function setDtLeitura(?\DateTimeInterface $dtLeitura): self
    {
        $this->dtLeitura = $dtLeitura;
        return $this;
    }

    public function getSnLida(): int
    {
        return $this->snLida;
    }

    public function setSnLida(int $snLida): self
    {
        $this->snLida = $snLida;
        return $this;
    }
}
