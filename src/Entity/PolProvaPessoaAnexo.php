<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PolProvaPessoaAnexoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolProvaPessoaAnexoRepository::class)]
#[ORM\Table(
    name: 'pol_prova_pessoa_anexo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'idx_pol_prova_pessoa_anexo_cd_anexo', columns: ['cd_prova_pessoa_anexo'])]
class PolProvaPessoaAnexo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_prova_pessoa_anexo', type: 'bigint', options: ['unsigned' => true, 'comment' => 'Codigo da prova anexada'])]
    private ?string $cdProvaPessoaAnexo = null;

    #[ORM\Column(name: 'cd_prova', type: 'bigint', nullable: true, options: ['unsigned' => true, 'comment' => 'Codigo da prova ao qual o anexo pertence'])]
    private ?string $cdProva = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'bigint', nullable: true, options: ['unsigned' => true, 'comment' => 'Codigo do aluno que fez a prova que esta sendo anexada'])]
    private ?string $cdPessoa = null;

    #[ORM\Column(name: 'me_anexo', type: 'blob', nullable: true, options: ['comment' => 'Arquivo de anexo'])]
    private ?string $meAnexo = null;

    #[ORM\Column(name: 'nm_original', type: 'string', length: 100, nullable: true, options: ['comment' => 'Nome original do arquivo'])]
    private ?string $nmOriginal = null;

    #[ORM\Column(name: 'ds_tamanho', type: 'string', length: 30, nullable: true, options: ['comment' => 'Tamanho do arquivo'])]
    private ?string $dsTamanho = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?string $cdProva = null,
        ?string $cdPessoa = null,
        ?string $meAnexo = null,
        ?string $nmOriginal = null,
        ?string $dsTamanho = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdProva = $cdProva;
        $this->cdPessoa = $cdPessoa;
        $this->meAnexo = $meAnexo;
        $this->nmOriginal = $nmOriginal;
        $this->dsTamanho = $dsTamanho;
        $this->dtBase = $dtBase;
    }

    public function getCdProvaPessoaAnexo(): ?string
    {
        return $this->cdProvaPessoaAnexo;
    }

    public function getCdProva(): ?string
    {
        return $this->cdProva;
    }

    public function setCdProva(?string $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getCdPessoa(): ?string
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?string $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getMeAnexo(): ?string
    {
        return $this->meAnexo;
    }

    public function setMeAnexo(?string $meAnexo): self
    {
        $this->meAnexo = $meAnexo;
        return $this;
    }

    public function getNmOriginal(): ?string
    {
        return $this->nmOriginal;
    }

    public function setNmOriginal(?string $nmOriginal): self
    {
        $this->nmOriginal = $nmOriginal;
        return $this;
    }

    public function getDsTamanho(): ?string
    {
        return $this->dsTamanho;
    }

    public function setDsTamanho(?string $dsTamanho): self
    {
        $this->dsTamanho = $dsTamanho;
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
