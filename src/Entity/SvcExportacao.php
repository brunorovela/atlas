<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\SvcExportacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcExportacaoRepository::class)]
#[ORM\Table(
    name: 'svc_exportacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class SvcExportacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id_exportacao', type: 'integer', options: ['unsigned' => true])]
    private ?int $idExportacao = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'ds_sql_consulta', type: 'text', length: 16777215)]
    private ?string $dsSqlConsulta = null;

    #[ORM\Column(name: 'sn_sobreescrever', type: TinyIntType::NAME, options: ['unsigned' => true, 'default' => '1'])]
    private int $snSobreescrever = 1;

    #[ORM\Column(name: 'nr_percentual_linhas_vazio', type: 'smallint', options: ['unsigned' => true, 'default' => '0'])]
    private int $nrPercentualLinhasVazio = 0;

    public function __construct(
        ?string $nmArquivo = null,
        ?string $dsSqlConsulta = null,
        int $snSobreescrever = 1,
        int $nrPercentualLinhasVazio = 0
    ) {
        $this->nmArquivo = $nmArquivo;
        $this->dsSqlConsulta = $dsSqlConsulta;
        $this->snSobreescrever = $snSobreescrever;
        $this->nrPercentualLinhasVazio = $nrPercentualLinhasVazio;
    }

    public function getIdExportacao(): ?int
    {
        return $this->idExportacao;
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

    public function getDsSqlConsulta(): ?string
    {
        return $this->dsSqlConsulta;
    }

    public function setDsSqlConsulta(?string $dsSqlConsulta): self
    {
        $this->dsSqlConsulta = $dsSqlConsulta;
        return $this;
    }

    public function getSnSobreescrever(): int
    {
        return $this->snSobreescrever;
    }

    public function setSnSobreescrever(int $snSobreescrever): self
    {
        $this->snSobreescrever = $snSobreescrever;
        return $this;
    }

    public function getNrPercentualLinhasVazio(): int
    {
        return $this->nrPercentualLinhasVazio;
    }

    public function setNrPercentualLinhasVazio(int $nrPercentualLinhasVazio): self
    {
        $this->nrPercentualLinhasVazio = $nrPercentualLinhasVazio;
        return $this;
    }
}
