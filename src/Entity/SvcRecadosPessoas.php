<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\SvcRecadosPessoasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvcRecadosPessoasRepository::class)]
#[ORM\Table(
    name: 'svc_recados_pessoas',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_recados_pesosas', columns: ['cd_recado_envio', 'cd_pessoa', 'tp_recado', 'ds_email', 'ds_chave'])]
#[ORM\Index(name: 'IX_CD_RECADO_ENVIO', columns: ['cd_recado_envio'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_TP_RECADO', columns: ['tp_recado'])]
#[ORM\Index(name: 'IX_DS_EMAIL', columns: ['ds_email'], options: ['lengths' => [20]])]
#[ORM\Index(name: 'IX_DS_CHAVE', columns: ['ds_chave'], options: ['lengths' => [20]])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'fk_recados_pessoas_envio', 'colunas' => ['cd_recado_envio'], 'tabelaAlvo' => 'svc_recados_envios', 'colunasAlvo' => ['cd_recado_envio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class SvcRecadosPessoas
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_recado_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdRecadoPessoa = null;

    #[ORM\ManyToOne(targetEntity: SvcRecadosEnvios::class)]
    #[ORM\JoinColumn(name: 'cd_recado_envio', referencedColumnName: 'cd_recado_envio', nullable: false, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?SvcRecadosEnvios $cdRecadoEnvio = null;

    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true])]
    private ?int $cdPessoa = null;

    #[ORM\Column(name: 'tp_recado', type: 'enum', options: ['default' => '1', 'values' => ['1', '2', '3', '4', '5', '6', '7', '8', '32']])]
    private string $tpRecado = '1';

    #[ORM\Column(name: 'ds_email', type: 'string', length: 100, nullable: true)]
    private ?string $dsEmail = null;

    #[ORM\Column(name: 'sn_sucesso', type: TinyIntType::NAME, nullable: true, options: ['unsigned' => true, 'default' => '0'])]
    private ?int $snSucesso = 0;

    #[ORM\Column(name: 'me_erro', type: 'text', length: 65535, nullable: true)]
    private ?string $meErro = null;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 32, nullable: true, options: ['fixed' => true])]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'cd_contato', type: 'integer', nullable: true)]
    private ?int $cdContato = null;

    public function __construct(
        ?SvcRecadosEnvios $cdRecadoEnvio = null,
        ?int $cdPessoa = null,
        string $tpRecado = '1',
        ?string $dsEmail = null,
        ?int $snSucesso = 0,
        ?string $meErro = null,
        ?string $dsChave = null,
        ?int $cdContato = null
    ) {
        $this->cdRecadoEnvio = $cdRecadoEnvio;
        $this->cdPessoa = $cdPessoa;
        $this->tpRecado = $tpRecado;
        $this->dsEmail = $dsEmail;
        $this->snSucesso = $snSucesso;
        $this->meErro = $meErro;
        $this->dsChave = $dsChave;
        $this->cdContato = $cdContato;
    }

    public function getCdRecadoPessoa(): ?int
    {
        return $this->cdRecadoPessoa;
    }

    public function getCdRecadoEnvio(): ?SvcRecadosEnvios
    {
        return $this->cdRecadoEnvio;
    }

    public function setCdRecadoEnvio(?SvcRecadosEnvios $cdRecadoEnvio): self
    {
        $this->cdRecadoEnvio = $cdRecadoEnvio;
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

    public function getTpRecado(): string
    {
        return $this->tpRecado;
    }

    public function setTpRecado(string $tpRecado): self
    {
        $this->tpRecado = $tpRecado;
        return $this;
    }

    public function getDsEmail(): ?string
    {
        return $this->dsEmail;
    }

    public function setDsEmail(?string $dsEmail): self
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    public function getSnSucesso(): ?int
    {
        return $this->snSucesso;
    }

    public function setSnSucesso(?int $snSucesso): self
    {
        $this->snSucesso = $snSucesso;
        return $this;
    }

    public function getMeErro(): ?string
    {
        return $this->meErro;
    }

    public function setMeErro(?string $meErro): self
    {
        $this->meErro = $meErro;
        return $this;
    }

    public function getDsChave(): ?string
    {
        return $this->dsChave;
    }

    public function setDsChave(?string $dsChave): self
    {
        $this->dsChave = $dsChave;
        return $this;
    }

    public function getCdContato(): ?int
    {
        return $this->cdContato;
    }

    public function setCdContato(?int $cdContato): self
    {
        $this->cdContato = $cdContato;
        return $this;
    }
}
