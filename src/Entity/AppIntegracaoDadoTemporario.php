<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppIntegracaoDadoTemporarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppIntegracaoDadoTemporarioRepository::class)]
#[ORM\Table(
    name: 'app_integracao_dado_temporario',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'uk_app_idt', columns: ['cd_registro', 'tp_informacao'])]
#[ORM\Index(name: 'IX_APPIDT_REG', columns: ['cd_registro'])]
#[ORM\Index(name: 'IX_APPIDT_INFO', columns: ['tp_informacao'])]
#[ORM\Index(name: 'IX_APPIDT_REG_COMP', columns: ['cd_registro_composto'])]
#[ORM\Index(name: 'ix_app_idt_cd_registro', columns: ['cd_registro'])]
#[ORM\Index(name: 'ix_app_idt_tp_informacao', columns: ['tp_informacao'])]
class AppIntegracaoDadoTemporario
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_integracao_dado_temporario', type: 'integer')]
    private ?int $cdIntegracaoDadoTemporario = null;

    #[ORM\Column(name: 'cd_registro', type: 'integer', nullable: true)]
    private ?int $cdRegistro = null;

    #[ORM\Column(name: 'cd_registro_composto', type: 'string', length: 255, nullable: true)]
    private ?string $cdRegistroComposto = null;

    #[ORM\Column(name: 'ds_pk', type: 'string', length: 255, nullable: true)]
    private ?string $dsPk = null;

    #[ORM\Column(name: 'tp_informacao', type: 'enum', nullable: true, options: ['values' => ['TEMA', 'PESSOA', 'CURSO', 'TURMA', 'DISCIPLINA', 'PERFIL', 'MATRICULA', 'FICHA', 'PROVA', 'PROVA-ALUNO', 'AULA', 'AULA-ALUNO', 'MATERIAL', 'BOLETO', 'HORARIO', 'COLIGADA', 'COLIGADA-CURSO', 'CALENDARIO', 'RECADO-CATEGORIA', 'RECADO-ORIGEM', 'RECADO', 'NOTICIA', 'AVALIACAO', 'AVALIACAO-PARAMETRO', 'PESQUISADO', 'PESSOA-TOKEN', 'CANTINA-SALDO', 'CANTINA-EXTRATO-CONSUMO', 'ROTINA', 'TAREFA', 'NU-PARAMETRO']])]
    private ?string $tpInformacao = null;

    #[ORM\Column(name: 'dt_informacao', type: 'datetime')]
    private ?\DateTimeInterface $dtInformacao = null;

    public function __construct(
        ?int $cdRegistro = null,
        ?string $cdRegistroComposto = null,
        ?string $dsPk = null,
        ?string $tpInformacao = null,
        ?\DateTimeInterface $dtInformacao = null
    ) {
        $this->cdRegistro = $cdRegistro;
        $this->cdRegistroComposto = $cdRegistroComposto;
        $this->dsPk = $dsPk;
        $this->tpInformacao = $tpInformacao;
        $this->dtInformacao = $dtInformacao;
    }

    public function getCdIntegracaoDadoTemporario(): ?int
    {
        return $this->cdIntegracaoDadoTemporario;
    }

    public function getCdRegistro(): ?int
    {
        return $this->cdRegistro;
    }

    public function setCdRegistro(?int $cdRegistro): self
    {
        $this->cdRegistro = $cdRegistro;
        return $this;
    }

    public function getCdRegistroComposto(): ?string
    {
        return $this->cdRegistroComposto;
    }

    public function setCdRegistroComposto(?string $cdRegistroComposto): self
    {
        $this->cdRegistroComposto = $cdRegistroComposto;
        return $this;
    }

    public function getDsPk(): ?string
    {
        return $this->dsPk;
    }

    public function setDsPk(?string $dsPk): self
    {
        $this->dsPk = $dsPk;
        return $this;
    }

    public function getTpInformacao(): ?string
    {
        return $this->tpInformacao;
    }

    public function setTpInformacao(?string $tpInformacao): self
    {
        $this->tpInformacao = $tpInformacao;
        return $this;
    }

    public function getDtInformacao(): ?\DateTimeInterface
    {
        return $this->dtInformacao;
    }

    public function setDtInformacao(?\DateTimeInterface $dtInformacao): self
    {
        $this->dtInformacao = $dtInformacao;
        return $this;
    }
}
