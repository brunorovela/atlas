<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\NuOmitizadorBdLogsErroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NuOmitizadorBdLogsErroRepository::class)]
#[ORM\Table(
    name: 'nu_omitizador_bd_logs_erro',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class NuOmitizadorBdLogsErro
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_erro', type: 'integer')]
    private ?int $cdErro = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer')]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'nm_tabela', type: 'string', length: 255)]
    private ?string $nmTabela = null;

    #[ORM\Column(name: 'nm_indice', type: 'string', length: 255)]
    private ?string $nmIndice = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 100)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'ds_erro', type: 'text', length: 65535)]
    private ?string $dsErro = null;

    #[ORM\Column(name: 'dt_erro', type: 'datetime')]
    private ?\DateTimeInterface $dtErro = null;

    public function __construct(
        ?int $cdPessoa = null,
        ?string $nmTabela = null,
        ?string $nmIndice = null,
        ?string $dsChave = null,
        ?string $dsErro = null,
        ?\DateTimeInterface $dtErro = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->nmTabela = $nmTabela;
        $this->nmIndice = $nmIndice;
        $this->dsChave = $dsChave;
        $this->dsErro = $dsErro;
        $this->dtErro = $dtErro;
    }

    public function getCdErro(): ?int
    {
        return $this->cdErro;
    }

    public function getCdPessoa(): ?int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(?int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getNmTabela(): ?string
    {
        return $this->nmTabela;
    }

    public function setNmTabela(?string $nmTabela): self
    {
        $this->nmTabela = $nmTabela;
        return $this;
    }

    public function getNmIndice(): ?string
    {
        return $this->nmIndice;
    }

    public function setNmIndice(?string $nmIndice): self
    {
        $this->nmIndice = $nmIndice;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }

    public function getDtErro(): ?\DateTimeInterface
    {
        return $this->dtErro;
    }

    public function setDtErro(?\DateTimeInterface $dtErro): self
    {
        $this->dtErro = $dtErro;
        return $this;
    }
}
