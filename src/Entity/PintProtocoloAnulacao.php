<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PintProtocoloAnulacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PintProtocoloAnulacaoRepository::class)]
#[ORM\Table(
    name: 'pint_protocolo_anulacao',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_QUESTAO', columns: ['cd_questao'])]
#[ORM\Index(name: 'IX_CD_PROVA', columns: ['cd_prova'])]
#[ORM\Index(name: 'IX_CD_TIPO_ANULACAO', columns: ['cd_tipo_anulacao'])]
class PintProtocoloAnulacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_protocolo', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdProtocolo = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'cd_prova', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdProva = null;

    #[ORM\Column(name: 'cd_questao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdQuestao = null;

    #[ORM\Column(name: 'ds_protocolo', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $dsProtocolo = null;

    #[ORM\Column(name: 'ds_comentario', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsComentario = null;

    #[ORM\Column(name: 'cd_situacao', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdSituacao = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'cd_tipo_anulacao', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $cdTipoAnulacao = 0;

    public function __construct(
        ?int $cdPessoa = null,
        ?int $cdProva = null,
        ?int $cdQuestao = null,
        ?int $dsProtocolo = null,
        ?string $dsComentario = null,
        ?int $cdSituacao = null,
        ?\DateTimeInterface $dtCadastro = null,
        ?int $cdTipoAnulacao = 0
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdProva = $cdProva;
        $this->cdQuestao = $cdQuestao;
        $this->dsProtocolo = $dsProtocolo;
        $this->dsComentario = $dsComentario;
        $this->cdSituacao = $cdSituacao;
        $this->dtCadastro = $dtCadastro;
        $this->cdTipoAnulacao = $cdTipoAnulacao;
    }

    public function getCdProtocolo(): ?int
    {
        return $this->cdProtocolo;
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

    public function getCdProva(): ?int
    {
        return $this->cdProva;
    }

    public function setCdProva(?int $cdProva): self
    {
        $this->cdProva = $cdProva;
        return $this;
    }

    public function getCdQuestao(): ?int
    {
        return $this->cdQuestao;
    }

    public function setCdQuestao(?int $cdQuestao): self
    {
        $this->cdQuestao = $cdQuestao;
        return $this;
    }

    public function getDsProtocolo(): ?int
    {
        return $this->dsProtocolo;
    }

    public function setDsProtocolo(?int $dsProtocolo): self
    {
        $this->dsProtocolo = $dsProtocolo;
        return $this;
    }

    public function getDsComentario(): ?string
    {
        return $this->dsComentario;
    }

    public function setDsComentario(?string $dsComentario): self
    {
        $this->dsComentario = $dsComentario;
        return $this;
    }

    public function getCdSituacao(): ?int
    {
        return $this->cdSituacao;
    }

    public function setCdSituacao(?int $cdSituacao): self
    {
        $this->cdSituacao = $cdSituacao;
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

    public function getCdTipoAnulacao(): ?int
    {
        return $this->cdTipoAnulacao;
    }

    public function setCdTipoAnulacao(?int $cdTipoAnulacao): self
    {
        $this->cdTipoAnulacao = $cdTipoAnulacao;
        return $this;
    }
}
