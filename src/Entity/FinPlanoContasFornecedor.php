<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FinPlanoContasFornecedorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinPlanoContasFornecedorRepository::class)]
#[ORM\Table(
    name: 'fin_plano_contas_fornecedor',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_COLIGADA', columns: ['cd_coligada'])]
#[ORM\Index(name: 'IX_CD_CONTA', columns: ['cd_conta'])]
#[ORM\Index(name: 'IX_CD_CONTA_PASSIVO', columns: ['cd_conta_passivo'])]
class FinPlanoContasFornecedor
{
    #[ORM\Id]
    #[ORM\Column(name: 'cd_pessoa', type: 'integer', options: ['unsigned' => true, 'default' => '0'])]
    private int $cdPessoa = 0;

    #[ORM\Id]
    #[ORM\Column(name: 'cd_coligada', type: 'integer', options: ['unsigned' => true, 'default' => '1'])]
    private int $cdColigada = 1;

    #[ORM\Column(name: 'cd_conta', type: 'integer', options: ['unsigned' => true, 'default' => '0', 'comment' => 'Conta padrão de resultado, quando utilizado este fornecedor'])]
    private int $cdConta = 0;

    #[ORM\Column(name: 'cd_conta_passivo', type: 'integer', options: ['unsigned' => true, 'default' => '0', 'comment' => 'Codigo da conta do fornecedor no passivo'])]
    private int $cdContaPassivo = 0;

    public function __construct(
        int $cdPessoa = 0,
        int $cdColigada = 1,
        int $cdConta = 0,
        int $cdContaPassivo = 0
    ) {
        $this->cdPessoa = $cdPessoa;
        $this->cdColigada = $cdColigada;
        $this->cdConta = $cdConta;
        $this->cdContaPassivo = $cdContaPassivo;
    }

    public function getCdPessoa(): int
    {
        return $this->cdPessoa;
    }

    public function setCdPessoa(int $cdPessoa): self
    {
        $this->cdPessoa = $cdPessoa;
        return $this;
    }

    public function getCdColigada(): int
    {
        return $this->cdColigada;
    }

    public function setCdColigada(int $cdColigada): self
    {
        $this->cdColigada = $cdColigada;
        return $this;
    }

    public function getCdConta(): int
    {
        return $this->cdConta;
    }

    public function setCdConta(int $cdConta): self
    {
        $this->cdConta = $cdConta;
        return $this;
    }

    public function getCdContaPassivo(): int
    {
        return $this->cdContaPassivo;
    }

    public function setCdContaPassivo(int $cdContaPassivo): self
    {
        $this->cdContaPassivo = $cdContaPassivo;
        return $this;
    }
}
