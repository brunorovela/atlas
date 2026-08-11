<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AppClienteTemaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppClienteTemaRepository::class)]
#[ORM\Table(
    name: 'app_cliente_tema',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_APP_CLIENTE_TEMA_CD_TEMA', columns: ['cd_tema'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'app_cliente_tema_ibfk_2', 'colunas' => ['cd_tema'], 'tabelaAlvo' => 'app_tema', 'colunasAlvo' => ['cd_tema'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AppClienteTema
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_cliente', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdCliente = null;

    #[ORM\ManyToOne(targetEntity: AppTema::class)]
    #[ORM\JoinColumn(name: 'cd_tema', referencedColumnName: 'cd_tema', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?AppTema $cdTema = null;

    #[ORM\Column(name: 'me_imagem', type: 'blob', nullable: true)]
    private ?string $meImagem = null;

    #[ORM\Column(name: 'nm_arquivo', type: 'string', length: 255, nullable: true)]
    private ?string $nmArquivo = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?AppTema $cdTema = null,
        ?string $meImagem = null,
        ?string $nmArquivo = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdTema = $cdTema;
        $this->meImagem = $meImagem;
        $this->nmArquivo = $nmArquivo;
        $this->dtBase = $dtBase;
    }

    public function getCdCliente(): ?int
    {
        return $this->cdCliente;
    }

    public function getCdTema(): ?AppTema
    {
        return $this->cdTema;
    }

    public function setCdTema(?AppTema $cdTema): self
    {
        $this->cdTema = $cdTema;
        return $this;
    }

    public function getMeImagem(): ?string
    {
        return $this->meImagem;
    }

    public function setMeImagem(?string $meImagem): self
    {
        $this->meImagem = $meImagem;
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
