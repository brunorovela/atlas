<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\TinyIntType;
use App\Repository\LogsEmailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogsEmailRepository::class)]
#[ORM\Table(
    name: 'logs_email',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
class LogsEmail
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_envio', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdEnvio = null;

    #[ORM\Column(name: 'ds_email_origem', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmailOrigem = null;

    #[ORM\Column(name: 'ds_email_destino', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmailDestino = null;

    #[ORM\Column(name: 'ds_assunto', type: 'string', length: 255, nullable: true)]
    private ?string $dsAssunto = null;

    #[ORM\Column(name: 'ds_conteudo', type: 'blob', length: 65535, nullable: true)]
    private ?string $dsConteudo = null;

    #[ORM\Column(name: 'sn_enviado', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snEnviado = 0;

    #[ORM\Column(name: 'dt_cadastro', type: 'datetime', nullable: true, options: ['default' => '0000-00-00 00:00:00'])]
    private ?\DateTimeInterface $dtCadastro = null;

    #[ORM\Column(name: 'ds_erro', type: 'string', length: 255, nullable: true)]
    private ?string $dsErro = null;

    public function __construct(
        ?string $dsEmailOrigem = null,
        ?string $dsEmailDestino = null,
        ?string $dsAssunto = null,
        ?string $dsConteudo = null,
        ?int $snEnviado = 0,
        ?\DateTimeInterface $dtCadastro = null,
        ?string $dsErro = null
    ) {
        $this->dsEmailOrigem = $dsEmailOrigem;
        $this->dsEmailDestino = $dsEmailDestino;
        $this->dsAssunto = $dsAssunto;
        $this->dsConteudo = $dsConteudo;
        $this->snEnviado = $snEnviado;
        $this->dtCadastro = $dtCadastro;
        $this->dsErro = $dsErro;
    }

    public function getCdEnvio(): ?int
    {
        return $this->cdEnvio;
    }

    public function getDsEmailOrigem(): ?string
    {
        return $this->dsEmailOrigem;
    }

    public function setDsEmailOrigem(?string $dsEmailOrigem): self
    {
        $this->dsEmailOrigem = $dsEmailOrigem;
        return $this;
    }

    public function getDsEmailDestino(): ?string
    {
        return $this->dsEmailDestino;
    }

    public function setDsEmailDestino(?string $dsEmailDestino): self
    {
        $this->dsEmailDestino = $dsEmailDestino;
        return $this;
    }

    public function getDsAssunto(): ?string
    {
        return $this->dsAssunto;
    }

    public function setDsAssunto(?string $dsAssunto): self
    {
        $this->dsAssunto = $dsAssunto;
        return $this;
    }

    public function getDsConteudo(): ?string
    {
        return $this->dsConteudo;
    }

    public function setDsConteudo(?string $dsConteudo): self
    {
        $this->dsConteudo = $dsConteudo;
        return $this;
    }

    public function getSnEnviado(): ?int
    {
        return $this->snEnviado;
    }

    public function setSnEnviado(?int $snEnviado): self
    {
        $this->snEnviado = $snEnviado;
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

    public function getDsErro(): ?string
    {
        return $this->dsErro;
    }

    public function setDsErro(?string $dsErro): self
    {
        $this->dsErro = $dsErro;
        return $this;
    }
}
