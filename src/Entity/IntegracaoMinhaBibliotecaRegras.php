<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\IntegracaoMinhaBibliotecaRegrasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegracaoMinhaBibliotecaRegrasRepository::class)]
#[ORM\Table(
    name: 'integracao_minha_biblioteca_regras',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class IntegracaoMinhaBibliotecaRegras
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_minha_biblioteca_regra', type: 'integer')]
    private ?int $cdMinhaBibliotecaRegra = null;

    #[ORM\Column(name: 'me_sql', type: 'text', length: 16777215, nullable: true)]
    private ?string $meSql = null;

    #[ORM\Column(name: 'me_sql_servico', type: 'text', length: 16777215, nullable: true)]
    private ?string $meSqlServico = null;

    #[ORM\Column(name: 'ds_descricao', type: 'string', length: 255, nullable: true)]
    private ?string $dsDescricao = null;

    #[ORM\Column(name: 'sn_ativo', type: 'boolean', nullable: true, options: ['default' => '1'])]
    private ?bool $snAtivo = true;

    public function __construct(
        ?string $meSql = null,
        ?string $meSqlServico = null,
        ?string $dsDescricao = null,
        ?bool $snAtivo = true
    ) {
        $this->meSql = $meSql;
        $this->meSqlServico = $meSqlServico;
        $this->dsDescricao = $dsDescricao;
        $this->snAtivo = $snAtivo;
    }

    public function getCdMinhaBibliotecaRegra(): ?int
    {
        return $this->cdMinhaBibliotecaRegra;
    }

    public function getMeSql(): ?string
    {
        return $this->meSql;
    }

    public function setMeSql(?string $meSql): self
    {
        $this->meSql = $meSql;
        return $this;
    }

    public function getMeSqlServico(): ?string
    {
        return $this->meSqlServico;
    }

    public function setMeSqlServico(?string $meSqlServico): self
    {
        $this->meSqlServico = $meSqlServico;
        return $this;
    }

    public function getDsDescricao(): ?string
    {
        return $this->dsDescricao;
    }

    public function setDsDescricao(?string $dsDescricao): self
    {
        $this->dsDescricao = $dsDescricao;
        return $this;
    }

    public function isSnAtivo(): ?bool
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?bool $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }
}
