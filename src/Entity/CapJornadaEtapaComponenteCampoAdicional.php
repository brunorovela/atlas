<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\CapJornadaEtapaComponenteCampoAdicionalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapJornadaEtapaComponenteCampoAdicionalRepository::class)]
#[ORM\Table(
    name: 'cap_jornada_etapa_componente_campo_adicional',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'FK_cd_jornada_componente_id_ca', columns: ['cd_jornada_etapa_componente_id'])]
#[ORM\Index(name: 'FK_categoria_ca', columns: ['cd_categoria_campo_adicional'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_categoria_ca', 'colunas' => ['cd_categoria_campo_adicional'], 'tabelaAlvo' => 'pessoas_campos_categorias', 'colunasAlvo' => ['cd_categoria'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_cd_jornada_componente_id_ca', 'colunas' => ['cd_jornada_etapa_componente_id'], 'tabelaAlvo' => 'cap_jornada_etapa_componente', 'colunasAlvo' => ['id'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class CapJornadaEtapaComponenteCampoAdicional
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CapJornadaEtapaComponente::class)]
    #[ORM\JoinColumn(name: 'cd_jornada_etapa_componente_id', referencedColumnName: 'id', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null;

    #[ORM\ManyToOne(targetEntity: PessoasCamposCategorias::class)]
    #[ORM\JoinColumn(name: 'cd_categoria_campo_adicional', referencedColumnName: 'cd_categoria', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?PessoasCamposCategorias $cdCategoriaCampoAdicional = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId = null,
        ?PessoasCamposCategorias $cdCategoriaCampoAdicional = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        $this->cdCategoriaCampoAdicional = $cdCategoriaCampoAdicional;
        $this->dtBase = $dtBase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdJornadaEtapaComponenteId(): ?CapJornadaEtapaComponente
    {
        return $this->cdJornadaEtapaComponenteId;
    }

    public function setCdJornadaEtapaComponenteId(?CapJornadaEtapaComponente $cdJornadaEtapaComponenteId): self
    {
        $this->cdJornadaEtapaComponenteId = $cdJornadaEtapaComponenteId;
        return $this;
    }

    public function getCdCategoriaCampoAdicional(): ?PessoasCamposCategorias
    {
        return $this->cdCategoriaCampoAdicional;
    }

    public function setCdCategoriaCampoAdicional(?PessoasCamposCategorias $cdCategoriaCampoAdicional): self
    {
        $this->cdCategoriaCampoAdicional = $cdCategoriaCampoAdicional;
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
