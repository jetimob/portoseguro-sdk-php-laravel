<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Exceptions\InvalidArgumentException;

/**
 * Dados relacionados à pessoa exposta politicamente (PEP).
 * São PEP os ocupantes de cargos e funções públicas como por exemplo Deputados e Senadores.
 */
class Pep
{
    use Serializable;

    protected string $faixaRenda;

    protected string $paisResidencia;

    protected string $profissao;

    protected string $nacionalidade;

    protected string $cpf;

    protected string $nome;

    /**
     * Faixa renda do PEP. É composto por 3 caracteres numéricos preenchidos com zeros à esquerda.
     * É obrigatório se no campo relacionamento for informado o código 001 e conforme lista abaixo:
     * 001 - Sem Renda
     * 002 - Até R$2.500,00
     * 003 - De R$2.500,01 até R$5.000,00
     * 004 - De R$5.000,01 até R$10.000,00
     * 005 - Acima de R$10.000,01
     *
     * @param string $faixaRenda
     * @return Pep
     */
    public function setFaixaRenda(string $faixaRenda): Pep
    {
        $this->faixaRenda = $faixaRenda;
        return $this;
    }

    /**
     * País de residência do PEP. É composto por 5 caracteres numéricos preenchidos com zeros à esquerda.
     * Disponível apenas se no campo relacionamento for informado o código 001.
     * Se este campo não for informado, ficará gravado que o PEP é residente no Brasil (código 01058).
     * Para obter este código, utilize a API de Consulta de Países da Porto Seguro.
     * Campo opcional.
     *
     * @defalt 01058
     * @param string $paisResidencia
     * @return Pep
     */
    public function setPaisResidencia(string $paisResidencia): Pep
    {
        if(strlen($paisResidencia) !== 5) {
            throw new InvalidArgumentException('O código do país de residência é composto por 5 caracteres númericos');
        }

        $this->paisResidencia = $paisResidencia;
        return $this;
    }

    /**
     * Código da profissão conforme Cadastro Brasileiro de Ocupações (CBO) que é utilizado pela receita federal.
     * Utilizar API de consulta CBO da Porto Seguro ou buscar a informação direto na receita federal.
     * É composto por 4 caracteres numéricos preenchidos com zeros à esquerda, sem máscaras, sem espaços e sem
     * caracteres especiais.
     * Campo opcional.
     *
     * @param string $profissao
     * @return Pep
     */
    public function setProfissao(string $profissao): Pep
    {
        $this->profissao = $profissao;
        return $this;
    }

    /**
     * Nacionalidade do PEP. É composto por 3 caracteres numéricos preenchidos com zeros à esquerda.
     * Disponível apenas se no campo relacionamento for informado o código 001.
     * Se este campo não for informado, ficará gravado que o PEP é brasileiro.
     * Campo opcional.
     *
     * @param string $nacionalidade
     * @return Pep
     */
    public function setNacionalidade(string $nacionalidade): Pep
    {
        $this->nacionalidade = $nacionalidade;
        return $this;
    }

    /**
     * CPF do PEP. Deve conter 11 digitos numéricos, sem máscaras ou caracteres especiais e
     * caso tenha menos que 11 digitos preencher com zeros à esquerda.
     * Obrigatório apenas se o campo relacionamento for informado com um código diferente de 001.
     * @param string $cpf
     * @return Pep
     */
    public function setCpf(string $cpf): Pep
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * Nome e sobrenome do PEP. É composto por no mínimo 5 caracteres, no máximo 60 caracteres, pelo menos 1 espaço
     * entre o nome e sobrenome e sem caracteres especiais. Obrigatório apenas se o campo relacionamento for informado
     * com um código diferente de 001.
     *
     * @param string $nome
     * @return Pep
     */
    public function setNome(string $nome): Pep
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getFaixaRenda(): string
    {
        return $this->faixaRenda;
    }

    /**
     * @return string
     */
    public function getPaisResidencia(): string
    {
        return $this->paisResidencia;
    }

    /**
     * @return string
     */
    public function getProfissao(): string
    {
        return $this->profissao;
    }

    /**
     * @return string
     */
    public function getNacionalidade(): string
    {
        return $this->nacionalidade;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    public static function new($faixaRenda, $paisResidencia, $profissao, $nacionalidade, $cpf, $nome): self
    {
        return (new static())
            ->setFaixaRenda($faixaRenda)
            ->setPaisResidencia($paisResidencia)
            ->setProfissao($profissao)
            ->setNacionalidade($nacionalidade)
            ->setCpf($cpf)
            ->setNome($nome);
    }
}
