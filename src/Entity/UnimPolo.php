<?php

declare(strict_types=1);

namespace App\Entity;

use App\DBAL\EsquemaFisico;
use App\DBAL\TinyIntType;
use App\Repository\UnimPoloRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnimPoloRepository::class)]
#[ORM\Table(
    name: 'unim_polo',
    options: ['charset' => 'latin1', 'collation' => 'latin1_swedish_ci']
)]
#[ORM\Index(name: 'IX_CD_PAIS', columns: ['cd_pais'])]
#[ORM\Index(name: 'IX_DS_UF', columns: ['ds_uf'])]
#[ORM\Index(name: 'IX_CD_MUNICIPIO', columns: ['cd_municipio'])]
#[ORM\Index(name: 'IX_CD_PESSOA_DIRETOR_GERAL', columns: ['cd_pessoa_diretor_geral'])]
#[ORM\Index(name: 'IX_CD_PESSOA_DIRETOR_ACADEMICO', columns: ['cd_pessoa_diretor_academico'])]
#[ORM\Index(name: 'IX_CD_PESSOA_DIRETOR_FINANCEIRO', columns: ['cd_pessoa_diretor_financeiro'])]
#[ORM\Index(name: 'IX_CD_PESSOA_SECRETARIA', columns: ['cd_pessoa_secretaria'])]
#[ORM\Index(name: 'IX_CD_PESSOA_TESTEMUNHA1', columns: ['cd_pessoa_testemunha1'])]
#[ORM\Index(name: 'IX_CD_PESSOA_TESTEMUNHA2', columns: ['cd_pessoa_testemunha2'])]
#[EsquemaFisico(
    chavesEstrangeiras: [
        ['nome' => 'FK_unim_polo_diretor_academico', 'colunas' => ['cd_pessoa_diretor_academico'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_diretor_financeiro', 'colunas' => ['cd_pessoa_diretor_financeiro'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_diretor_geral', 'colunas' => ['cd_pessoa_diretor_geral'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_estados', 'colunas' => ['ds_uf'], 'tabelaAlvo' => 'estados', 'colunasAlvo' => ['ds_uf'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_municipios', 'colunas' => ['cd_municipio'], 'tabelaAlvo' => 'municipios', 'colunasAlvo' => ['cd_municipio'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_paises', 'colunas' => ['cd_pais'], 'tabelaAlvo' => 'paises', 'colunasAlvo' => ['cd_pais'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_secretaria', 'colunas' => ['cd_pessoa_secretaria'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_testemunha1', 'colunas' => ['cd_pessoa_testemunha1'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']],
        ['nome' => 'FK_unim_polo_testemunha2', 'colunas' => ['cd_pessoa_testemunha2'], 'tabelaAlvo' => 'pessoas', 'colunasAlvo' => ['cd_pessoa'], 'opcoes' => ['onDelete' => 'NO ACTION', 'onUpdate' => 'NO ACTION']]
    ],
    autoIncremento: []
)]
class UnimPolo
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'cd_polo', type: 'integer')]
    private ?int $cdPolo = null;

    #[ORM\Column(name: 'ds_polo', type: 'string', length: 255, nullable: true)]
    private ?string $dsPolo = null;

    #[ORM\Column(name: 'ds_razao_social_polo', type: 'string', length: 255, nullable: true)]
    private ?string $dsRazaoSocialPolo = null;

    #[ORM\Column(name: 'ds_cnpj', type: 'string', length: 20, nullable: true)]
    private ?string $dsCnpj = null;

    #[ORM\Column(name: 'ds_codigo_municipio_mec', type: 'string', length: 10, nullable: true)]
    private ?string $dsCodigoMunicipioMec = null;

    #[ORM\Column(name: 'ds_codigo_instituicao_mec', type: 'string', length: 10, nullable: true)]
    private ?string $dsCodigoInstituicaoMec = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_diretor_geral', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaDiretorGeral = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_diretor_academico', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaDiretorAcademico = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_diretor_financeiro', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaDiretorFinanceiro = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_secretaria', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaSecretaria = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_testemunha1', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaTestemunha1 = null;

    #[ORM\ManyToOne(targetEntity: Pessoas::class)]
    #[ORM\JoinColumn(name: 'cd_pessoa_testemunha2', referencedColumnName: 'cd_pessoa', nullable: true, options: ['default' => null, 'unsigned' => false, 'fixed' => false, 'comment' => ''])]
    private ?Pessoas $cdPessoaTestemunha2 = null;

    #[ORM\Column(name: 'ds_ato_oficial_diretor_geral', type: 'string', length: 255, nullable: true)]
    private ?string $dsAtoOficialDiretorGeral = null;

    #[ORM\Column(name: 'ds_ato_oficial_secretaria', type: 'string', length: 255, nullable: true)]
    private ?string $dsAtoOficialSecretaria = null;

    #[ORM\Column(name: 'ds_ato_oficial_estabelecimento', type: 'string', length: 255, nullable: true)]
    private ?string $dsAtoOficialEstabelecimento = null;

    #[ORM\ManyToOne(targetEntity: Paises::class)]
    #[ORM\JoinColumn(name: 'cd_pais', referencedColumnName: 'cd_pais', nullable: true, options: ['default' => null, 'unsigned' => true, 'fixed' => false, 'comment' => ''])]
    private ?Paises $cdPais = null;

    #[ORM\Column(name: 'ds_uf', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private ?string $dsUf = null;

    #[ORM\Column(name: 'cd_municipio', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $cdMunicipio = null;

    #[ORM\Column(name: 'ds_cep', type: 'string', length: 8, nullable: true)]
    private ?string $dsCep = null;

    #[ORM\Column(name: 'ds_bairro', type: 'string', length: 255, nullable: true)]
    private ?string $dsBairro = null;

    #[ORM\Column(name: 'ds_logradouro', type: 'string', length: 255, nullable: true)]
    private ?string $dsLogradouro = null;

    #[ORM\Column(name: 'ds_logradouro_numero', type: 'string', length: 255, nullable: true)]
    private ?string $dsLogradouroNumero = null;

    #[ORM\Column(name: 'ds_complemento', type: 'string', length: 255, nullable: true)]
    private ?string $dsComplemento = null;

    #[ORM\Column(name: 'ds_latitude', type: 'string', length: 255, nullable: true)]
    private ?string $dsLatitude = null;

    #[ORM\Column(name: 'ds_longitude', type: 'string', length: 255, nullable: true)]
    private ?string $dsLongitude = null;

    #[ORM\Column(name: 'sn_ativo', type: TinyIntType::NAME, nullable: true, options: ['default' => '1'])]
    private ?int $snAtivo = 1;

    #[ORM\Column(name: 'sn_excluido', type: TinyIntType::NAME, nullable: true, options: ['default' => '0'])]
    private ?int $snExcluido = 0;

    #[ORM\Column(name: 'dt_base', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $dtBase = null;

    // Sem construtor: 27 propriedades. Use os setters encadeados.

    public function getCdPolo(): ?int
    {
        return $this->cdPolo;
    }

    public function getDsPolo(): ?string
    {
        return $this->dsPolo;
    }

    public function setDsPolo(?string $dsPolo): self
    {
        $this->dsPolo = $dsPolo;
        return $this;
    }

    public function getDsRazaoSocialPolo(): ?string
    {
        return $this->dsRazaoSocialPolo;
    }

    public function setDsRazaoSocialPolo(?string $dsRazaoSocialPolo): self
    {
        $this->dsRazaoSocialPolo = $dsRazaoSocialPolo;
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

    public function getDsCodigoMunicipioMec(): ?string
    {
        return $this->dsCodigoMunicipioMec;
    }

    public function setDsCodigoMunicipioMec(?string $dsCodigoMunicipioMec): self
    {
        $this->dsCodigoMunicipioMec = $dsCodigoMunicipioMec;
        return $this;
    }

    public function getDsCodigoInstituicaoMec(): ?string
    {
        return $this->dsCodigoInstituicaoMec;
    }

    public function setDsCodigoInstituicaoMec(?string $dsCodigoInstituicaoMec): self
    {
        $this->dsCodigoInstituicaoMec = $dsCodigoInstituicaoMec;
        return $this;
    }

    public function getCdPessoaDiretorGeral(): ?Pessoas
    {
        return $this->cdPessoaDiretorGeral;
    }

    public function setCdPessoaDiretorGeral(?Pessoas $cdPessoaDiretorGeral): self
    {
        $this->cdPessoaDiretorGeral = $cdPessoaDiretorGeral;
        return $this;
    }

    public function getCdPessoaDiretorAcademico(): ?Pessoas
    {
        return $this->cdPessoaDiretorAcademico;
    }

    public function setCdPessoaDiretorAcademico(?Pessoas $cdPessoaDiretorAcademico): self
    {
        $this->cdPessoaDiretorAcademico = $cdPessoaDiretorAcademico;
        return $this;
    }

    public function getCdPessoaDiretorFinanceiro(): ?Pessoas
    {
        return $this->cdPessoaDiretorFinanceiro;
    }

    public function setCdPessoaDiretorFinanceiro(?Pessoas $cdPessoaDiretorFinanceiro): self
    {
        $this->cdPessoaDiretorFinanceiro = $cdPessoaDiretorFinanceiro;
        return $this;
    }

    public function getCdPessoaSecretaria(): ?Pessoas
    {
        return $this->cdPessoaSecretaria;
    }

    public function setCdPessoaSecretaria(?Pessoas $cdPessoaSecretaria): self
    {
        $this->cdPessoaSecretaria = $cdPessoaSecretaria;
        return $this;
    }

    public function getCdPessoaTestemunha1(): ?Pessoas
    {
        return $this->cdPessoaTestemunha1;
    }

    public function setCdPessoaTestemunha1(?Pessoas $cdPessoaTestemunha1): self
    {
        $this->cdPessoaTestemunha1 = $cdPessoaTestemunha1;
        return $this;
    }

    public function getCdPessoaTestemunha2(): ?Pessoas
    {
        return $this->cdPessoaTestemunha2;
    }

    public function setCdPessoaTestemunha2(?Pessoas $cdPessoaTestemunha2): self
    {
        $this->cdPessoaTestemunha2 = $cdPessoaTestemunha2;
        return $this;
    }

    public function getDsAtoOficialDiretorGeral(): ?string
    {
        return $this->dsAtoOficialDiretorGeral;
    }

    public function setDsAtoOficialDiretorGeral(?string $dsAtoOficialDiretorGeral): self
    {
        $this->dsAtoOficialDiretorGeral = $dsAtoOficialDiretorGeral;
        return $this;
    }

    public function getDsAtoOficialSecretaria(): ?string
    {
        return $this->dsAtoOficialSecretaria;
    }

    public function setDsAtoOficialSecretaria(?string $dsAtoOficialSecretaria): self
    {
        $this->dsAtoOficialSecretaria = $dsAtoOficialSecretaria;
        return $this;
    }

    public function getDsAtoOficialEstabelecimento(): ?string
    {
        return $this->dsAtoOficialEstabelecimento;
    }

    public function setDsAtoOficialEstabelecimento(?string $dsAtoOficialEstabelecimento): self
    {
        $this->dsAtoOficialEstabelecimento = $dsAtoOficialEstabelecimento;
        return $this;
    }

    public function getCdPais(): ?Paises
    {
        return $this->cdPais;
    }

    public function setCdPais(?Paises $cdPais): self
    {
        $this->cdPais = $cdPais;
        return $this;
    }

    public function getDsUf(): ?string
    {
        return $this->dsUf;
    }

    public function setDsUf(?string $dsUf): self
    {
        $this->dsUf = $dsUf;
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

    public function getDsCep(): ?string
    {
        return $this->dsCep;
    }

    public function setDsCep(?string $dsCep): self
    {
        $this->dsCep = $dsCep;
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

    public function getDsLogradouro(): ?string
    {
        return $this->dsLogradouro;
    }

    public function setDsLogradouro(?string $dsLogradouro): self
    {
        $this->dsLogradouro = $dsLogradouro;
        return $this;
    }

    public function getDsLogradouroNumero(): ?string
    {
        return $this->dsLogradouroNumero;
    }

    public function setDsLogradouroNumero(?string $dsLogradouroNumero): self
    {
        $this->dsLogradouroNumero = $dsLogradouroNumero;
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

    public function getSnAtivo(): ?int
    {
        return $this->snAtivo;
    }

    public function setSnAtivo(?int $snAtivo): self
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    public function getSnExcluido(): ?int
    {
        return $this->snExcluido;
    }

    public function setSnExcluido(?int $snExcluido): self
    {
        $this->snExcluido = $snExcluido;
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
