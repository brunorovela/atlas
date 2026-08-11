<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\PessoasDeficienciasCompletoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasDeficienciasCompletoRepository::class)]
#[ORM\Table(
    name: 'pessoas_deficiencias_completo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'pessoa_defc_comp_pessoa_campo', columns: ['cd_pessoa', 'cd_campo'])]
#[ORM\Index(name: 'cd_campo', columns: ['cd_campo'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_CAMPO', columns: ['cd_campo'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'pessoas_deficiencias_completo_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'pessoas_deficiencias_completo_ibfk_2', 'colunas' => ['cd_campo'], 'tabelaAlvo' => 'pessoas_campos_adicionais', 'colunasAlvo' => ['CD_CAMPO'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PessoasDeficienciasCompleto
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_pessoa_deficiencia', type: 'integer')]
    private ?int $cdPessoaDeficiencia = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\ManyToOne(targetEntity: PessoasCamposAdicionais::class)]
    #[ORM\JoinColumn(name: 'cd_campo', referencedColumnName: 'CD_CAMPO', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?PessoasCamposAdicionais $cdCampo = null;

    #[ORM\Column(name: 'me_valor', type: 'text', length: 16777215, nullable: true)]
    private ?string $meValor = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?PessoasCamposAdicionais $cdCampo = null,
        ?string $meValor = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdCampo = $cdCampo;
        $this->meValor = $meValor;
    }

    public function getCdPessoaDeficiencia(): ?int
    {
        return $this->cdPessoaDeficiencia;
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

    public function getCdCampo(): ?PessoasCamposAdicionais
    {
        return $this->cdCampo;
    }

    public function setCdCampo(?PessoasCamposAdicionais $cdCampo): self
    {
        $this->cdCampo = $cdCampo;
        return $this;
    }

    public function getMeValor(): ?string
    {
        return $this->meValor;
    }

    public function setMeValor(?string $meValor): self
    {
        $this->meValor = $meValor;
        return $this;
    }
}
