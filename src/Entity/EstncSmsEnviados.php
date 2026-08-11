<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\Repository\EstncSmsEnviadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstncSmsEnviadosRepository::class)]
#[ORM\Table(
    name: 'estnc_sms_enviados',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA_DESTINO', columns: ['cd_pessoa_destino'])]
#[ORM\Index(name: 'IX_CD_PESSOA_ENVIO', columns: ['cd_pessoa_envio'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_NC_SMS_ENV_CD_PESSOA_DEST', 'colunas' => ['cd_pessoa_destino'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_NC_SMS_ENV_CD_PESSOA_ENV', 'colunas' => ['cd_pessoa_envio'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class EstncSmsEnviados
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mensagem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensagem = null;

    #[ORM\Column(name: 'nr_destino', type: 'string', length: 255)]
    private ?string $nrDestino = null;

    #[ORM\Column(name: 'dt_envio', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtEnvio = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_destino', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaDestino = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_envio', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaEnvio = null;

    #[ORM\Column(name: 'ds_mensagem', type: 'text', length: 65535)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'sn_sms_servico', type: 'integer', nullable: true, options: ['default' => '0'])]
    private ?int $snSmsServico = 0;

    public function __construct(
        ?string $nrDestino = null,
        ?\DateTimeInterface $dtEnvio = null,
        ?Pessoas $cdPessoaDestino = null,
        ?Pessoas $cdPessoaEnvio = null,
        ?string $dsMensagem = null,
        ?int $snSmsServico = 0
    ) {
        $this->nrDestino = $nrDestino;
        $this->dtEnvio = $dtEnvio;
        $this->cdPessoaDestino = $cdPessoaDestino;
        $this->cdPessoaEnvio = $cdPessoaEnvio;
        $this->dsMensagem = $dsMensagem;
        $this->snSmsServico = $snSmsServico;
    }

    public function getCdMensagem(): ?int
    {
        return $this->cdMensagem;
    }

    public function getNrDestino(): ?string
    {
        return $this->nrDestino;
    }

    public function setNrDestino(?string $nrDestino): self
    {
        $this->nrDestino = $nrDestino;
        return $this;
    }

    public function getDtEnvio(): ?\DateTimeInterface
    {
        return $this->dtEnvio;
    }

    public function setDtEnvio(?\DateTimeInterface $dtEnvio): self
    {
        $this->dtEnvio = $dtEnvio;
        return $this;
    }

    public function getCdPessoaDestino(): ?Pessoas
    {
        return $this->cdPessoaDestino;
    }

    public function setCdPessoaDestino(?Pessoas $cdPessoaDestino): self
    {
        $this->cdPessoaDestino = $cdPessoaDestino;
        return $this;
    }

    public function getCdPessoaEnvio(): ?Pessoas
    {
        return $this->cdPessoaEnvio;
    }

    public function setCdPessoaEnvio(?Pessoas $cdPessoaEnvio): self
    {
        $this->cdPessoaEnvio = $cdPessoaEnvio;
        return $this;
    }

    public function getDsMensagem(): ?string
    {
        return $this->dsMensagem;
    }

    public function setDsMensagem(?string $dsMensagem): self
    {
        $this->dsMensagem = $dsMensagem;
        return $this;
    }

    public function getSnSmsServico(): ?int
    {
        return $this->snSmsServico;
    }

    public function setSnSmsServico(?int $snSmsServico): self
    {
        $this->snSmsServico = $snSmsServico;
        return $this;
    }
}
