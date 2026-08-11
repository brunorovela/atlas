<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\AcrvAssinaturaPessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcrvAssinaturaPessoaRepository::class)]
#[ORM\Table(
    name: 'acrv_assinatura_pessoa',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'acrv_assinatura_pessoa_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class AcrvAssinaturaPessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_assinatura_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdAssinaturaPessoa = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'ds_nome_assinatura', type: 'string', length: 255, nullable: true)]
    private ?string $dsNomeAssinatura = null;

    #[ORM\Column(name: 'me_arquivo_certificado', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meArquivoCertificado = null;

    #[ORM\Column(name: 'me_arquivo_certificado_key', type: 'blob', length: 16777215, nullable: true)]
    private ?string $meArquivoCertificadoKey = null;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    public function __construct(
        ?Pessoas $cdPessoa = null,
        ?string $dsNomeAssinatura = null,
        ?string $meArquivoCertificado = null,
        ?string $meArquivoCertificadoKey = null,
        ?\DateTimeInterface $dtBase = null
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->dsNomeAssinatura = $dsNomeAssinatura;
        $this->meArquivoCertificado = $meArquivoCertificado;
        $this->meArquivoCertificadoKey = $meArquivoCertificadoKey;
        $this->dtBase = $dtBase;
    }

    public function getCdAssinaturaPessoa(): ?int
    {
        return $this->cdAssinaturaPessoa;
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

    public function getDsNomeAssinatura(): ?string
    {
        return $this->dsNomeAssinatura;
    }

    public function setDsNomeAssinatura(?string $dsNomeAssinatura): self
    {
        $this->dsNomeAssinatura = $dsNomeAssinatura;
        return $this;
    }

    public function getMeArquivoCertificado(): ?string
    {
        return $this->meArquivoCertificado;
    }

    public function setMeArquivoCertificado(?string $meArquivoCertificado): self
    {
        $this->meArquivoCertificado = $meArquivoCertificado;
        return $this;
    }

    public function getMeArquivoCertificadoKey(): ?string
    {
        return $this->meArquivoCertificadoKey;
    }

    public function setMeArquivoCertificadoKey(?string $meArquivoCertificadoKey): self
    {
        $this->meArquivoCertificadoKey = $meArquivoCertificadoKey;
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
