<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\InscParametrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscParametrosRepository::class)]
#[ORM\Table(
    name: 'insc_parametros',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'Uk', columns: ['ds_chave'])]
#[ORM\Index(name: 'FK__insc_parametros_validacoes_regex', columns: ['cd_parametro_validacao_regex'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK__insc_parametros_validacoes_regex', 'colunas' => ['cd_parametro_validacao_regex'], 'tabelaAlvo' => 'insc_parametros_validacoes_regex', 'colunasAlvo' => ['cd_parametro_validacao_regex'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class InscParametros
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parametro', type: 'integer')]
    private ?int $cdParametro = null;

    #[ORM\ManyToOne(targetEntity: InscParametrosValidacoesRegex::class)]
    #[ORM\JoinColumn(name: 'cd_parametro_validacao_regex', referencedColumnName: 'cd_parametro_validacao_regex', nullable: false, options: ['default' => '0', 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?InscParametrosValidacoesRegex $cdParametroValidacaoRegex = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 50, options: ['default' => '0'])]
    private string $dsChave = '0';

    #[ORM\Column(name: 'ds_valor_padrao', type: 'string', length: 255, nullable: true, options: ['default' => '0'])]
    private ?string $dsValorPadrao = '0';

    #[ORM\Column(name: 'me_insrucao', type: 'text', length: 16777215, nullable: true)]
    private ?string $meInsrucao = null;

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?InscParametrosValidacoesRegex $cdParametroValidacaoRegex = null,
        string $dsChave = '0',
        ?string $dsValorPadrao = '0',
        ?string $meInsrucao = null,
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdParametroValidacaoRegex = $cdParametroValidacaoRegex;
        $this->dsChave = $dsChave;
        $this->dsValorPadrao = $dsValorPadrao;
        $this->meInsrucao = $meInsrucao;
        $this->dtInclusao = $dtInclusao;
        $this->dtBase = $dtBase;
    }

    public function getCdParametro(): ?int
    {
        return $this->cdParametro;
    }

    public function getCdParametroValidacaoRegex(): ?InscParametrosValidacoesRegex
    {
        return $this->cdParametroValidacaoRegex;
    }

    public function setCdParametroValidacaoRegex(?InscParametrosValidacoesRegex $cdParametroValidacaoRegex): self
    {
        $this->cdParametroValidacaoRegex = $cdParametroValidacaoRegex;
        return $this;
    }

    public function getDsChave(): string
    {
        return $this->dsChave;
    }

    public function setDsChave(string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getDsValorPadrao(): ?string
    {
        return $this->dsValorPadrao;
    }

    public function setDsValorPadrao(?string $dsValorPadrao): self
    {
        $this->dsValorPadrao = $dsValorPadrao;
        return $this;
    }

    public function getMeInsrucao(): ?string
    {
        return $this->meInsrucao;
    }

    public function setMeInsrucao(?string $meInsrucao): self
    {
        $this->meInsrucao = $meInsrucao;
        return $this;
    }

    public function getDtInclusao(): ?\DateTimeInterface
    {
        return $this->dtInclusao;
    }

    public function setDtInclusao(?\DateTimeInterface $dtInclusao): self
    {
        $this->dtInclusao = $dtInclusao;
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
