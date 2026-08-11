<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\ForMensagensRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForMensagensRepository::class)]
#[ORM\Table(
    name: 'for_mensagens',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_TOPICO', columns: ['cd_topico'])]
#[ORM\Index(name: 'IX_CD_MENSAGEM_ORIGEM', columns: ['cd_mensagem_origem'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
class ForMensagens
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_mensagem', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdMensagem = null;

    #[ORM\Column(name: 'cd_topico', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdTopico = null;

    #[ORM\Column(name: 'cd_mensagem_origem', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMensagemOrigem = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'ds_titulo', type: 'string', length: 255, nullable: true)]
    private ?string $dsTitulo = null;

    #[ORM\Column(name: 'ds_mensagem', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsMensagem = null;

    #[ORM\Column(name: 'sn_mostrar', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snMostrar = null;

    #[ORM\Column(name: 'sn_avaliado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true])]
    private ?int $snAvaliado = null;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    public function __construct(
        ?int $cdTopico = null,
        ?int $cdMensagemOrigem = null,
        ?int $cdPessoa = null,
        ?string $dsTitulo = null,
        ?string $dsMensagem = null,
        ?int $snMostrar = null,
        ?int $snAvaliado = null,
        ?\DateTimeInterface $dtCadastro = null
    ) {
        $this->cdTopico = $cdTopico;
        $this->cdMensagemOrigem = $cdMensagemOrigem;
        $this->cdPessoa = $cdPessoa;
        $this->dsTitulo = $dsTitulo;
        $this->dsMensagem = $dsMensagem;
        $this->snMostrar = $snMostrar;
        $this->snAvaliado = $snAvaliado;
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdMensagem(): ?int
    {
        return $this->cdMensagem;
    }

    public function getCdTopico(): ?int
    {
        return $this->cdTopico;
    }

    public function setCdTopico(?int $cdTopico): self
    {
        $this->cdTopico = $cdTopico;
        return $this;
    }

    public function getCdMensagemOrigem(): ?int
    {
        return $this->cdMensagemOrigem;
    }

    public function setCdMensagemOrigem(?int $cdMensagemOrigem): self
    {
        $this->cdMensagemOrigem = $cdMensagemOrigem;
        return $this;
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

    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    public function setDsTitulo(?string $dsTitulo): self
    {
        $this->dsTitulo = $dsTitulo;
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

    public function getSnMostrar(): ?int
    {
        return $this->snMostrar;
    }

    public function setSnMostrar(?int $snMostrar): self
    {
        $this->snMostrar = $snMostrar;
        return $this;
    }

    public function getSnAvaliado(): ?int
    {
        return $this->snAvaliado;
    }

    public function setSnAvaliado(?int $snAvaliado): self
    {
        $this->snAvaliado = $snAvaliado;
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
}
