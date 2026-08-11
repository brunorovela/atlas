<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\PessoasAtendimentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoasAtendimentosRepository::class)]
#[ORM\Table(
    name: 'pessoas_atendimentos',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'cd_pessoa', columns: ['cd_pessoa'])]
#[ORM\Index(name: 'IX_CD_PESSOA', columns: ['cd_pessoa'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'pessoas_atendimentos_ibfk_1', 'colunas' => ['cd_pessoa'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class PessoasAtendimentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_atendimento', type: 'integer')]
    private ?int $cdAtendimento = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa', referencedColumnName: 'cd_pessoa', nullable: false, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoa = null;

    #[ORM\Column(name: 'dt_atendimento', type: 'datetime')]
    private ?\DateTimeInterface $dtAtendimento = null;

    #[ORM\Column(name: 'sn_acompanhado', type: 'smallint')]
    private ?int $snAcompanhado = null;

    #[ORM\Column(name: 'nm_acompanhante', type: 'string', length: 255, nullable: true)]
    private ?string $nmAcompanhante = null;

    #[ORM\Column(name: 'sn_medicado_casa', type: 'smallint')]
    private ?int $snMedicadoCasa = null;

    #[ORM\Column(name: 'ds_medicamento_casa', type: 'string', length: 255, nullable: true)]
    private ?string $dsMedicamentoCasa = null;

    #[ORM\Column(name: 'ds_pressao_arterial', type: 'string', length: 20, nullable: true)]
    private ?string $dsPressaoArterial = null;

    #[ORM\Column(name: 'ds_temperatura', type: 'string', length: 10, nullable: true)]
    private ?string $dsTemperatura = null;

    #[ORM\Column(name: 'vl_peso', type: 'float', nullable: true)]
    private ?float $vlPeso = null;

    #[ORM\Column(name: 'sn_comunicado_telefone', type: 'smallint')]
    private ?int $snComunicadoTelefone = null;

    #[ORM\Column(name: 'sn_comunicado_agenda', type: 'smallint')]
    private ?int $snComunicadoAgenda = null;

    #[ORM\Column(name: 'sn_comunicado_email', type: 'smallint')]
    private ?int $snComunicadoEmail = null;

    #[ORM\Column(name: 'sn_comunicado_ocorrencia', type: 'smallint')]
    private ?int $snComunicadoOcorrencia = null;

    #[ORM\Column(name: 'ds_comunicado_outros', type: 'string', length: 255, nullable: true)]
    private ?string $dsComunicadoOutros = null;

    #[ORM\Column(name: 'cd_retorno', type: 'smallint')]
    private ?int $cdRetorno = null;

    #[ORM\Column(name: 'ds_retorno_quem', type: 'string', length: 255, nullable: true)]
    private ?string $dsRetornoQuem = null;

    #[ORM\Column(name: 'ds_procedimento_adotado', type: 'text', length: 65535, nullable: true)]
    private ?string $dsProcedimentoAdotado = null;

    #[ORM\Column(name: 'cd_usuario', type: 'integer', nullable: true)]
    private ?int $cdUsuario = null;

    #[ORM\Column(name: 'sn_envia_notificacao', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snEnviaNotificacao = 0;

    #[ORM\Column(name: 'vl_altura', type: 'float', nullable: true)]
    private ?float $vlAltura = null;

    #[ORM\Column(name: 'vl_freq_respiratoria', type: 'float', nullable: true)]
    private ?float $vlFreqRespiratoria = null;

    #[ORM\Column(name: 'vl_freq_cardiaca', type: 'float', nullable: true)]
    private ?float $vlFreqCardiaca = null;

    #[ORM\Column(name: 'vl_indice_massa_corporal', type: 'float', nullable: true)]
    private ?float $vlIndiceMassaCorporal = null;

    // Sem construtor: 23 propriedades. Use os setters encadeados.

    public function getCdAtendimento(): ?int
    {
        return $this->cdAtendimento;
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

    public function getDtAtendimento(): ?\DateTimeInterface
    {
        return $this->dtAtendimento;
    }

    public function setDtAtendimento(?\DateTimeInterface $dtAtendimento): self
    {
        $this->dtAtendimento = $dtAtendimento;
        return $this;
    }

    public function getSnAcompanhado(): ?int
    {
        return $this->snAcompanhado;
    }

    public function setSnAcompanhado(?int $snAcompanhado): self
    {
        $this->snAcompanhado = $snAcompanhado;
        return $this;
    }

    public function getNmAcompanhante(): ?string
    {
        return $this->nmAcompanhante;
    }

    public function setNmAcompanhante(?string $nmAcompanhante): self
    {
        $this->nmAcompanhante = $nmAcompanhante;
        return $this;
    }

    public function getSnMedicadoCasa(): ?int
    {
        return $this->snMedicadoCasa;
    }

    public function setSnMedicadoCasa(?int $snMedicadoCasa): self
    {
        $this->snMedicadoCasa = $snMedicadoCasa;
        return $this;
    }

    public function getDsMedicamentoCasa(): ?string
    {
        return $this->dsMedicamentoCasa;
    }

    public function setDsMedicamentoCasa(?string $dsMedicamentoCasa): self
    {
        $this->dsMedicamentoCasa = $dsMedicamentoCasa;
        return $this;
    }

    public function getDsPressaoArterial(): ?string
    {
        return $this->dsPressaoArterial;
    }

    public function setDsPressaoArterial(?string $dsPressaoArterial): self
    {
        $this->dsPressaoArterial = $dsPressaoArterial;
        return $this;
    }

    public function getDsTemperatura(): ?string
    {
        return $this->dsTemperatura;
    }

    public function setDsTemperatura(?string $dsTemperatura): self
    {
        $this->dsTemperatura = $dsTemperatura;
        return $this;
    }

    public function getVlPeso(): ?float
    {
        return $this->vlPeso;
    }

    public function setVlPeso(?float $vlPeso): self
    {
        $this->vlPeso = $vlPeso;
        return $this;
    }

    public function getSnComunicadoTelefone(): ?int
    {
        return $this->snComunicadoTelefone;
    }

    public function setSnComunicadoTelefone(?int $snComunicadoTelefone): self
    {
        $this->snComunicadoTelefone = $snComunicadoTelefone;
        return $this;
    }

    public function getSnComunicadoAgenda(): ?int
    {
        return $this->snComunicadoAgenda;
    }

    public function setSnComunicadoAgenda(?int $snComunicadoAgenda): self
    {
        $this->snComunicadoAgenda = $snComunicadoAgenda;
        return $this;
    }

    public function getSnComunicadoEmail(): ?int
    {
        return $this->snComunicadoEmail;
    }

    public function setSnComunicadoEmail(?int $snComunicadoEmail): self
    {
        $this->snComunicadoEmail = $snComunicadoEmail;
        return $this;
    }

    public function getSnComunicadoOcorrencia(): ?int
    {
        return $this->snComunicadoOcorrencia;
    }

    public function setSnComunicadoOcorrencia(?int $snComunicadoOcorrencia): self
    {
        $this->snComunicadoOcorrencia = $snComunicadoOcorrencia;
        return $this;
    }

    public function getDsComunicadoOutros(): ?string
    {
        return $this->dsComunicadoOutros;
    }

    public function setDsComunicadoOutros(?string $dsComunicadoOutros): self
    {
        $this->dsComunicadoOutros = $dsComunicadoOutros;
        return $this;
    }

    public function getCdRetorno(): ?int
    {
        return $this->cdRetorno;
    }

    public function setCdRetorno(?int $cdRetorno): self
    {
        $this->cdRetorno = $cdRetorno;
        return $this;
    }

    public function getDsRetornoQuem(): ?string
    {
        return $this->dsRetornoQuem;
    }

    public function setDsRetornoQuem(?string $dsRetornoQuem): self
    {
        $this->dsRetornoQuem = $dsRetornoQuem;
        return $this;
    }

    public function getDsProcedimentoAdotado(): ?string
    {
        return $this->dsProcedimentoAdotado;
    }

    public function setDsProcedimentoAdotado(?string $dsProcedimentoAdotado): self
    {
        $this->dsProcedimentoAdotado = $dsProcedimentoAdotado;
        return $this;
    }

    public function getCdUsuario(): ?int
    {
        return $this->cdUsuario;
    }

    public function setCdUsuario(?int $cdUsuario): self
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    public function getSnEnviaNotificacao(): ?int
    {
        return $this->snEnviaNotificacao;
    }

    public function setSnEnviaNotificacao(?int $snEnviaNotificacao): self
    {
        $this->snEnviaNotificacao = $snEnviaNotificacao;
        return $this;
    }

    public function getVlAltura(): ?float
    {
        return $this->vlAltura;
    }

    public function setVlAltura(?float $vlAltura): self
    {
        $this->vlAltura = $vlAltura;
        return $this;
    }

    public function getVlFreqRespiratoria(): ?float
    {
        return $this->vlFreqRespiratoria;
    }

    public function setVlFreqRespiratoria(?float $vlFreqRespiratoria): self
    {
        $this->vlFreqRespiratoria = $vlFreqRespiratoria;
        return $this;
    }

    public function getVlFreqCardiaca(): ?float
    {
        return $this->vlFreqCardiaca;
    }

    public function setVlFreqCardiaca(?float $vlFreqCardiaca): self
    {
        $this->vlFreqCardiaca = $vlFreqCardiaca;
        return $this;
    }

    public function getVlIndiceMassaCorporal(): ?float
    {
        return $this->vlIndiceMassaCorporal;
    }

    public function setVlIndiceMassaCorporal(?float $vlIndiceMassaCorporal): self
    {
        $this->vlIndiceMassaCorporal = $vlIndiceMassaCorporal;
        return $this;
    }
}
