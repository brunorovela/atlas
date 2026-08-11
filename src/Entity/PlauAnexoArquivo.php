<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PlauAnexoArquivoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlauAnexoArquivoRepository::class)]
#[ORM\Table(
    name: 'plau_anexo_arquivo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_DS_MD5', columns: ['ds_md5'])]
#[ORM\Index(name: 'IX_DS_SHA1', columns: ['ds_sha1'])]
#[ORM\Index(name: 'IX_DS_CHECKSUM', columns: ['ds_sha1'])]
#[ORM\Index(name: 'IX_DS_MD5_SHA1_SHA256', columns: ['ds_md5', 'ds_sha1', 'ds_sha256'])]
class PlauAnexoArquivo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_arquivo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdArquivo = null;

    #[ORM\Column(name: 'ds_nm_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $dsNmArquivo = null;

    #[ORM\Column(name: 'me_conteudo', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meConteudo = null;

    #[ORM\Column(name: 'nr_tamanho', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $nrTamanho = null;

    #[ORM\Column(name: 'ds_md5', type: 'string', length: 255, nullable: true)]
    private ?string $dsMd5 = null;

    #[ORM\Column(name: 'ds_sha1', type: 'string', length: 255, nullable: true)]
    private ?string $dsSha1 = null;

    #[ORM\Column(name: 'ds_sha256', type: 'string', length: 255, nullable: true)]
    private ?string $dsSha256 = null;

    #[ORM\Column(name: 'ds_crc32', type: 'string', length: 255, nullable: true)]
    private ?string $dsCrc32 = null;

    #[ORM\Column(name: 'ds_crc32b', type: 'string', length: 255, nullable: true)]
    private ?string $dsCrc32b = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?string $dsNmArquivo = null,
        ?string $meConteudo = null,
        ?int $nrTamanho = null,
        ?string $dsMd5 = null,
        ?string $dsSha1 = null,
        ?string $dsSha256 = null,
        ?string $dsCrc32 = null,
        ?string $dsCrc32b = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->dsNmArquivo = $dsNmArquivo;
        $this->meConteudo = $meConteudo;
        $this->nrTamanho = $nrTamanho;
        $this->dsMd5 = $dsMd5;
        $this->dsSha1 = $dsSha1;
        $this->dsSha256 = $dsSha256;
        $this->dsCrc32 = $dsCrc32;
        $this->dsCrc32b = $dsCrc32b;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdArquivo(): ?int
    {
        return $this->cdArquivo;
    }

    public function getDsNmArquivo(): ?string
    {
        return $this->dsNmArquivo;
    }

    public function setDsNmArquivo(?string $dsNmArquivo): self
    {
        $this->dsNmArquivo = $dsNmArquivo;
        return $this;
    }

    public function getMeConteudo(): ?string
    {
        return $this->meConteudo;
    }

    public function setMeConteudo(?string $meConteudo): self
    {
        $this->meConteudo = $meConteudo;
        return $this;
    }

    public function getNrTamanho(): ?int
    {
        return $this->nrTamanho;
    }

    public function setNrTamanho(?int $nrTamanho): self
    {
        $this->nrTamanho = $nrTamanho;
        return $this;
    }

    public function getDsMd5(): ?string
    {
        return $this->dsMd5;
    }

    public function setDsMd5(?string $dsMd5): self
    {
        $this->dsMd5 = $dsMd5;
        return $this;
    }

    public function getDsSha1(): ?string
    {
        return $this->dsSha1;
    }

    public function setDsSha1(?string $dsSha1): self
    {
        $this->dsSha1 = $dsSha1;
        return $this;
    }

    public function getDsSha256(): ?string
    {
        return $this->dsSha256;
    }

    public function setDsSha256(?string $dsSha256): self
    {
        $this->dsSha256 = $dsSha256;
        return $this;
    }

    public function getDsCrc32(): ?string
    {
        return $this->dsCrc32;
    }

    public function setDsCrc32(?string $dsCrc32): self
    {
        $this->dsCrc32 = $dsCrc32;
        return $this;
    }

    public function getDsCrc32b(): ?string
    {
        return $this->dsCrc32b;
    }

    public function setDsCrc32b(?string $dsCrc32b): self
    {
        $this->dsCrc32b = $dsCrc32b;
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
}
