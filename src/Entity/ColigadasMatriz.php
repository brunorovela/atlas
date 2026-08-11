<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ColigadasMatrizRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColigadasMatrizRepository::class)]
#[ORM\Table(
    name: 'coligadas_matriz',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\UniqueConstraint(name: 'UK_COLIGADAS_MATRIZ', columns: ['nm_coligada'])]
#[ORM\UniqueConstraint(name: 'UK_DS_CHAVE', columns: ['ds_chave'])]
class ColigadasMatriz
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_coligada', type: 'integer')]
    private ?int $cdColigada = null;

    #[ORM\Column(name: 'nm_coligada', type: 'string', length: 50)]
    private ?string $nmColigada = null;

    #[ORM\Column(name: 'nm_razao_social', type: 'string', length: 100, nullable: true)]
    private ?string $nmRazaoSocial = null;

    #[ORM\Column(name: 'ds_cnpj', type: 'string', length: 20, nullable: true)]
    private ?string $dsCnpj = null;

    #[ORM\Column(name: 'cd_municipio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMunicipio = null;

    #[ORM\Column(name: 'cd_escola', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdEscola = null;

    #[ORM\Column(name: 'cd_unidade_rede', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdUnidadeRede = null;

    #[ORM\Column(name: 'ds_codcliente', type: 'string', length: 30, nullable: true)]
    private ?string $dsCodcliente = null;

    #[ORM\Column(name: 'nm_diretor_geral', type: 'string', length: 100, nullable: true)]
    private ?string $nmDiretorGeral = null;

    #[ORM\Column(name: 'nm_diretor_acad', type: 'string', length: 100, nullable: true)]
    private ?string $nmDiretorAcad = null;

    #[ORM\Column(name: 'nm_diretor_finan', type: 'string', length: 100, nullable: true)]
    private ?string $nmDiretorFinan = null;

    #[ORM\Column(name: 'nm_testemunha1', type: 'string', length: 100, nullable: true)]
    private ?string $nmTestemunha1 = null;

    #[ORM\Column(name: 'nm_testemunha2', type: 'string', length: 100, nullable: true)]
    private ?string $nmTestemunha2 = null;

    #[ORM\Column(name: 'ds_cpf_geral', type: 'string', length: 20, nullable: true)]
    private ?string $dsCpfGeral = null;

    #[ORM\Column(name: 'ds_cpf_acad', type: 'string', length: 20, nullable: true)]
    private ?string $dsCpfAcad = null;

    #[ORM\Column(name: 'ds_cpf_finan', type: 'string', length: 20, nullable: true)]
    private ?string $dsCpfFinan = null;

    #[ORM\Column(name: 'ds_cpf_test1', type: 'string', length: 20, nullable: true)]
    private ?string $dsCpfTest1 = null;

    #[ORM\Column(name: 'ds_cpf_test2', type: 'string', length: 20, nullable: true)]
    private ?string $dsCpfTest2 = null;

    #[ORM\Column(name: 'me_instituicao', type: 'string', length: 240, nullable: true)]
    private ?string $meInstituicao = null;

    #[ORM\Column(name: 'me_diretor', type: 'string', length: 240, nullable: true)]
    private ?string $meDiretor = null;

    #[ORM\Column(name: 'ds_cidade', type: 'string', length: 50, nullable: true)]
    private ?string $dsCidade = null;

    #[ORM\Column(name: 'ds_estado', type: 'string', length: 255, nullable: true)]
    private ?string $dsEstado = null;

    #[ORM\Column(name: 'ds_endereco', type: 'string', length: 255, nullable: true)]
    private ?string $dsEndereco = null;

    #[ORM\Column(name: 'ds_numero', type: 'string', length: 255, nullable: true)]
    private ?string $dsNumero = null;

    #[ORM\Column(name: 'ds_complemento', type: 'string', length: 255, nullable: true)]
    private ?string $dsComplemento = null;

    #[ORM\Column(name: 'ds_bairro', type: 'string', length: 255, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_cep', type: 'string', length: 8, nullable: true)]
    private ?string $dsCep = null;

    #[ORM\Column(name: 'ds_email_geral', type: 'string', length: 255, nullable: true)]
    private ?string $dsEmailGeral = null;

    #[ORM\Column(name: 'ds_latitude', type: 'string', length: 255, nullable: true)]
    private ?string $dsLatitude = null;

    #[ORM\Column(name: 'ds_longitude', type: 'string', length: 255, nullable: true)]
    private ?string $dsLongitude = null;

    #[ORM\Column(name: 'ds_nre', type: 'string', length: 50, nullable: true)]
    private ?string $dsNre = null;

    #[ORM\Column(name: 'ds_ato_direto', type: 'string', length: 240, nullable: true)]
    private ?string $dsAtoDireto = null;

    #[ORM\Column(name: 'me_secretaria', type: 'string', length: 240, nullable: true)]
    private ?string $meSecretaria = null;

    #[ORM\Column(name: 'ds_ato_secretaria', type: 'string', length: 240, nullable: true)]
    private ?string $dsAtoSecretaria = null;

    #[ORM\Column(name: 'ds_ato_ofic_estab', type: 'string', length: 240, nullable: true)]
    private ?string $dsAtoOficEstab = null;

    #[ORM\Column(name: 'cd_instituicao_mec', type: 'integer', nullable: true)]
    private ?int $cdInstituicaoMec = null;

    #[ORM\Column(name: 'sn_bloquear_financeiro', type: 'boolean', nullable: true)]
    private ?bool $snBloquearFinanceiro = null;

    #[ORM\Column(name: 'dt_bloqueio_financeiro', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBloqueioFinanceiro = null;

    #[ORM\Column(name: 'sn_bloquear_boleto', type: 'boolean', nullable: true)]
    private ?bool $snBloquearBoleto = null;

    #[ORM\Column(name: 'dt_bloqueio_boleto', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dtBloqueioBoleto = null;

    #[ORM\Column(name: 'sn_conpass', type: 'boolean', options: ['default' => '0'])]
    private bool $snConpass = false;

    #[ORM\Column(name: 'ds_chave', type: 'string', length: 255, nullable: true)]
    private ?string $dsChave = null;

    #[ORM\Column(name: 'cd_unicontrole', type: 'integer', nullable: true)]
    private ?int $cdUnicontrole = null;

    #[ORM\Column(name: 'cd_unisac', type: 'integer', nullable: true)]
    private ?int $cdUnisac = null;

    #[ORM\Column(name: 'unim_sn_curso_basico', type: 'boolean', nullable: true)]
    private ?bool $unimSnCursoBasico = null;

    #[ORM\Column(name: 'unim_sn_curso_superior', type: 'boolean', nullable: true)]
    private ?bool $unimSnCursoSuperior = null;

    #[ORM\Column(name: 'unim_sn_curso_aberto', type: 'boolean', nullable: true)]
    private ?bool $unimSnCursoAberto = null;

    // Sem construtor: 46 propriedades. Use os setters encadeados.

    public function getCdColigada(): ?int
    {
        return $this->cdColigada;
    }

    public function getNmColigada(): ?string
    {
        return $this->nmColigada;
    }

    public function setNmColigada(?string $nmColigada): self
    {
        $this->nmColigada = $nmColigada;
        return $this;
    }

    public function getNmRazaoSocial(): ?string
    {
        return $this->nmRazaoSocial;
    }

    public function setNmRazaoSocial(?string $nmRazaoSocial): self
    {
        $this->nmRazaoSocial = $nmRazaoSocial;
        return $this;
    }

    public function getDsCnpj(): ?string
    {
        return $this->dsCnpj;
    }

    public function setDsCnpj(?string $dsCnpj): self
    {
        $this->dsCnpj = $dsCnpj;
        return $this;
    }

    public function getCdMunicipio(): ?int
    {
        return $this->cdMunicipio;
    }

    public function setCdMunicipio(?int $cdMunicipio): self
    {
        $this->cdMunicipio = $cdMunicipio;
        return $this;
    }

    public function getCdEscola(): ?int
    {
        return $this->cdEscola;
    }

    public function setCdEscola(?int $cdEscola): self
    {
        $this->cdEscola = $cdEscola;
        return $this;
    }

    public function getCdUnidadeRede(): ?int
    {
        return $this->cdUnidadeRede;
    }

    public function setCdUnidadeRede(?int $cdUnidadeRede): self
    {
        $this->cdUnidadeRede = $cdUnidadeRede;
        return $this;
    }

    public function getDsCodcliente(): ?string
    {
        return $this->dsCodcliente;
    }

    public function setDsCodcliente(?string $dsCodcliente): self
    {
        $this->dsCodcliente = $dsCodcliente;
        return $this;
    }

    public function getNmDiretorGeral(): ?string
    {
        return $this->nmDiretorGeral;
    }

    public function setNmDiretorGeral(?string $nmDiretorGeral): self
    {
        $this->nmDiretorGeral = $nmDiretorGeral;
        return $this;
    }

    public function getNmDiretorAcad(): ?string
    {
        return $this->nmDiretorAcad;
    }

    public function setNmDiretorAcad(?string $nmDiretorAcad): self
    {
        $this->nmDiretorAcad = $nmDiretorAcad;
        return $this;
    }

    public function getNmDiretorFinan(): ?string
    {
        return $this->nmDiretorFinan;
    }

    public function setNmDiretorFinan(?string $nmDiretorFinan): self
    {
        $this->nmDiretorFinan = $nmDiretorFinan;
        return $this;
    }

    public function getNmTestemunha1(): ?string
    {
        return $this->nmTestemunha1;
    }

    public function setNmTestemunha1(?string $nmTestemunha1): self
    {
        $this->nmTestemunha1 = $nmTestemunha1;
        return $this;
    }

    public function getNmTestemunha2(): ?string
    {
        return $this->nmTestemunha2;
    }

    public function setNmTestemunha2(?string $nmTestemunha2): self
    {
        $this->nmTestemunha2 = $nmTestemunha2;
        return $this;
    }

    public function getDsCpfGeral(): ?string
    {
        return $this->dsCpfGeral;
    }

    public function setDsCpfGeral(?string $dsCpfGeral): self
    {
        $this->dsCpfGeral = $dsCpfGeral;
        return $this;
    }

    public function getDsCpfAcad(): ?string
    {
        return $this->dsCpfAcad;
    }

    public function setDsCpfAcad(?string $dsCpfAcad): self
    {
        $this->dsCpfAcad = $dsCpfAcad;
        return $this;
    }

    public function getDsCpfFinan(): ?string
    {
        return $this->dsCpfFinan;
    }

    public function setDsCpfFinan(?string $dsCpfFinan): self
    {
        $this->dsCpfFinan = $dsCpfFinan;
        return $this;
    }

    public function getDsCpfTest1(): ?string
    {
        return $this->dsCpfTest1;
    }

    public function setDsCpfTest1(?string $dsCpfTest1): self
    {
        $this->dsCpfTest1 = $dsCpfTest1;
        return $this;
    }

    public function getDsCpfTest2(): ?string
    {
        return $this->dsCpfTest2;
    }

    public function setDsCpfTest2(?string $dsCpfTest2): self
    {
        $this->dsCpfTest2 = $dsCpfTest2;
        return $this;
    }

    public function getMeInstituicao(): ?string
    {
        return $this->meInstituicao;
    }

    public function setMeInstituicao(?string $meInstituicao): self
    {
        $this->meInstituicao = $meInstituicao;
        return $this;
    }

    public function getMeDiretor(): ?string
    {
        return $this->meDiretor;
    }

    public function setMeDiretor(?string $meDiretor): self
    {
        $this->meDiretor = $meDiretor;
        return $this;
    }

    public function getDsCidade(): ?string
    {
        return $this->dsCidade;
    }

    public function setDsCidade(?string $dsCidade): self
    {
        $this->dsCidade = $dsCidade;
        return $this;
    }

    public function getDsEstado(): ?string
    {
        return $this->dsEstado;
    }

    public function setDsEstado(?string $dsEstado): self
    {
        $this->dsEstado = $dsEstado;
        return $this;
    }

    public function getDsEndereco(): ?string
    {
        return $this->dsEndereco;
    }

    public function setDsEndereco(?string $dsEndereco): self
    {
        $this->dsEndereco = $dsEndereco;
        return $this;
    }

    public function getDsNumero(): ?string
    {
        return $this->dsNumero;
    }

    public function setDsNumero(?string $dsNumero): self
    {
        $this->dsNumero = $dsNumero;
        return $this;
    }

    public function getDsComplemento(): ?string
    {
        return $this->dsComplemento;
    }

    public function setDsComplemento(?string $dsComplemento): self
    {
        $this->dsComplemento = $dsComplemento;
        return $this;
    }

    public function getDsBairro(): ?string
    {
        return $this->dsBairro;
    }

    public function setDsBairro(?string $dsBairro): self
    {
        $this->dsBairro = $dsBairro;
        return $this;
    }

    public function getDsCep(): ?string
    {
        return $this->dsCep;
    }

    public function setDsCep(?string $dsCep): self
    {
        $this->dsCep = $dsCep;
        return $this;
    }

    public function getDsEmailGeral(): ?string
    {
        return $this->dsEmailGeral;
    }

    public function setDsEmailGeral(?string $dsEmailGeral): self
    {
        $this->dsEmailGeral = $dsEmailGeral;
        return $this;
    }

    public function getDsLatitude(): ?string
    {
        return $this->dsLatitude;
    }

    public function setDsLatitude(?string $dsLatitude): self
    {
        $this->dsLatitude = $dsLatitude;
        return $this;
    }

    public function getDsLongitude(): ?string
    {
        return $this->dsLongitude;
    }

    public function setDsLongitude(?string $dsLongitude): self
    {
        $this->dsLongitude = $dsLongitude;
        return $this;
    }

    public function getDsNre(): ?string
    {
        return $this->dsNre;
    }

    public function setDsNre(?string $dsNre): self
    {
        $this->dsNre = $dsNre;
        return $this;
    }

    public function getDsAtoDireto(): ?string
    {
        return $this->dsAtoDireto;
    }

    public function setDsAtoDireto(?string $dsAtoDireto): self
    {
        $this->dsAtoDireto = $dsAtoDireto;
        return $this;
    }

    public function getMeSecretaria(): ?string
    {
        return $this->meSecretaria;
    }

    public function setMeSecretaria(?string $meSecretaria): self
    {
        $this->meSecretaria = $meSecretaria;
        return $this;
    }

    public function getDsAtoSecretaria(): ?string
    {
        return $this->dsAtoSecretaria;
    }

    public function setDsAtoSecretaria(?string $dsAtoSecretaria): self
    {
        $this->dsAtoSecretaria = $dsAtoSecretaria;
        return $this;
    }

    public function getDsAtoOficEstab(): ?string
    {
        return $this->dsAtoOficEstab;
    }

    public function setDsAtoOficEstab(?string $dsAtoOficEstab): self
    {
        $this->dsAtoOficEstab = $dsAtoOficEstab;
        return $this;
    }

    public function getCdInstituicaoMec(): ?int
    {
        return $this->cdInstituicaoMec;
    }

    public function setCdInstituicaoMec(?int $cdInstituicaoMec): self
    {
        $this->cdInstituicaoMec = $cdInstituicaoMec;
        return $this;
    }

    public function isSnBloquearFinanceiro(): ?bool
    {
        return $this->snBloquearFinanceiro;
    }

    public function setSnBloquearFinanceiro(?bool $snBloquearFinanceiro): self
    {
        $this->snBloquearFinanceiro = $snBloquearFinanceiro;
        return $this;
    }

    public function getDtBloqueioFinanceiro(): ?\DateTimeInterface
    {
        return $this->dtBloqueioFinanceiro;
    }

    public function setDtBloqueioFinanceiro(?\DateTimeInterface $dtBloqueioFinanceiro): self
    {
        $this->dtBloqueioFinanceiro = $dtBloqueioFinanceiro;
        return $this;
    }

    public function isSnBloquearBoleto(): ?bool
    {
        return $this->snBloquearBoleto;
    }

    public function setSnBloquearBoleto(?bool $snBloquearBoleto): self
    {
        $this->snBloquearBoleto = $snBloquearBoleto;
        return $this;
    }

    public function getDtBloqueioBoleto(): ?\DateTimeInterface
    {
        return $this->dtBloqueioBoleto;
    }

    public function setDtBloqueioBoleto(?\DateTimeInterface $dtBloqueioBoleto): self
    {
        $this->dtBloqueioBoleto = $dtBloqueioBoleto;
        return $this;
    }

    public function isSnConpass(): bool
    {
        return $this->snConpass;
    }

    public function setSnConpass(bool $snConpass): self
    {
        $this->snConpass = $snConpass;
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

    public function getCdUnicontrole(): ?int
    {
        return $this->cdUnicontrole;
    }

    public function setCdUnicontrole(?int $cdUnicontrole): self
    {
        $this->cdUnicontrole = $cdUnicontrole;
        return $this;
    }

    public function getCdUnisac(): ?int
    {
        return $this->cdUnisac;
    }

    public function setCdUnisac(?int $cdUnisac): self
    {
        $this->cdUnisac = $cdUnisac;
        return $this;
    }

    public function isUnimSnCursoBasico(): ?bool
    {
        return $this->unimSnCursoBasico;
    }

    public function setUnimSnCursoBasico(?bool $unimSnCursoBasico): self
    {
        $this->unimSnCursoBasico = $unimSnCursoBasico;
        return $this;
    }

    public function isUnimSnCursoSuperior(): ?bool
    {
        return $this->unimSnCursoSuperior;
    }

    public function setUnimSnCursoSuperior(?bool $unimSnCursoSuperior): self
    {
        $this->unimSnCursoSuperior = $unimSnCursoSuperior;
        return $this;
    }

    public function isUnimSnCursoAberto(): ?bool
    {
        return $this->unimSnCursoAberto;
    }

    public function setUnimSnCursoAberto(?bool $unimSnCursoAberto): self
    {
        $this->unimSnCursoAberto = $unimSnCursoAberto;
        return $this;
    }
}
