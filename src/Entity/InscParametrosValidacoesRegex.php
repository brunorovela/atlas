<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\InscParametrosValidacoesRegexRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscParametrosValidacoesRegexRepository::class)]
#[ORM\Table(
    name: 'insc_parametros_validacoes_regex',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_parametros_validadoes_insc', columns: ['ds_regex'])]
class InscParametrosValidacoesRegex
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_parametro_validacao_regex', type: 'integer')]
    private ?int $cdParametroValidacaoRegex = null;

    #[ORM\Column(name: 'ds_regex', type: 'string', length: 255, options: ['default' => '0'])]
    private string $dsRegex = '0';

    #[ORM\Column(name: 'ds_regex_instrucao', type: 'string', length: 255, options: ['default' => '0'])]
    private string $dsRegexInstrucao = '0';

    #[ORM\Column(name: 'dt_inclusao', type: 'datetime', options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtInclusao = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        string $dsRegex = '0',
        string $dsRegexInstrucao = '0',
        ?\DateTimeInterface $dtInclusao = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->dsRegex = $dsRegex;
        $this->dsRegexInstrucao = $dsRegexInstrucao;
        $this->dtInclusao = $dtInclusao;
        $this->dtBase = $dtBase;
    }

    public function getCdParametroValidacaoRegex(): ?int
    {
        return $this->cdParametroValidacaoRegex;
    }

    public function getDsRegex(): string
    {
        return $this->dsRegex;
    }

    public function setDsRegex(string $dsRegex): self
    {
        $this->dsRegex = $dsRegex;
        return $this;
    }

    public function getDsRegexInstrucao(): string
    {
        return $this->dsRegexInstrucao;
    }

    public function setDsRegexInstrucao(string $dsRegexInstrucao): self
    {
        $this->dsRegexInstrucao = $dsRegexInstrucao;
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
