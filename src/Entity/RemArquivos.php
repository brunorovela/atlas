<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\RemArquivosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemArquivosRepository::class)]
#[ORM\Table(
    name: 'rem_arquivos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'FK_REM_ARQUIVOS_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_REM_ARQUIVOS_CD_PESSOA', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class RemArquivos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_arquivo', type: 'integer')]
    private ?int $cdArquivo = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => 'Referencia tabela pessoas.cd_pessoa'])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_exportacao', type: 'datetime')]
    private ?\DateTimeInterface $dtExportacao = null;

    #[ORM\Column(name: 'ds_situacao', type: 'string', length: 3, options: ['comment' => 'A - Aguardando envio ao banco, U - Envio confirmado pelo usuário e R - Confirmado pelo retorno'])]
    private ?string $dsSituacao = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'me_arquivo', type: 'text')]
    private ?string $meArquivo = null;

    #[ORM\Column(name: 'sn_ignorado', type: TinyIntType::NAME, options: ['default' => '0'])]
    private int $snIgnorado = 0;

    #[ORM\Column(name: 'dt_ignorado', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtIgnorado = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?\DateTimeInterface $dtExportacao = null,
        ?string $dsSituacao = null,
        ?string $nmArquivo = null,
        ?string $meArquivo = null,
        int $snIgnorado = 0,
        ?\DateTimeInterface $dtIgnorado = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dtExportacao = $dtExportacao;
        $this->dsSituacao = $dsSituacao;
        $this->nmArquivo = $nmArquivo;
        $this->meArquivo = $meArquivo;
        $this->snIgnorado = $snIgnorado;
        $this->dtIgnorado = $dtIgnorado;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
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

    public function getDtExportacao(): ?\DateTimeInterface
    {
        return $this->dtExportacao;
    }

    public function setDtExportacao(?\DateTimeInterface $dtExportacao): self
    {
        $this->dtExportacao = $dtExportacao;
        return $this;
    }

    public function getDsSituacao(): ?string
    {
        return $this->dsSituacao;
    }

    public function setDsSituacao(?string $dsSituacao): self
    {
        $this->dsSituacao = $dsSituacao;
        return $this;
    }

    public function getNmArquivo(): ?string
    {
        return $this->nmArquivo;
    }

    public function setNmArquivo(?string $nmArquivo): self
    {
        $this->nmArquivo = $nmArquivo;
        return $this;
    }

    public function getMeArquivo(): ?string
    {
        return $this->meArquivo;
    }

    public function setMeArquivo(?string $meArquivo): self
    {
        $this->meArquivo = $meArquivo;
        return $this;
    }

    public function getSnIgnorado(): int
    {
        return $this->snIgnorado;
    }

    public function setSnIgnorado(int $snIgnorado): self
    {
        $this->snIgnorado = $snIgnorado;
        return $this;
    }

    public function getDtIgnorado(): ?\DateTimeInterface
    {
        return $this->dtIgnorado;
    }

    public function setDtIgnorado(?\DateTimeInterface $dtIgnorado): self
    {
        $this->dtIgnorado = $dtIgnorado;
        return $this;
    }
}
