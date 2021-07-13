<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Exceptions\InvalidArgumentException;
use Jetimob\PortoSeguro\Validators\Validator;

/**
 *
 * Lista dos locatários / inquilinos. Aqui você deve informar os dados cadastrais dos CPF’s inclusos anteriormente na
 * API de orçamento e não é permitido a inclusão ou exclusão de CPF’s. Caso necessite incluir um novo locatário é
 * necessário executar novamente a etapa de orçamento e passar por nova análise cadastral. Campo obrigatório.
 */
class PropostaLocatario
{
    use Serializable;
    use Validator;

    protected string $cpfCnpj;

    protected string $titular;

    protected string $nome;

    protected string $dataNascimento;

    protected ?string $sexo;

    protected ?string $mae;

    protected string $email;

    protected string $telefoneCelular;

    protected ?string $telefoneComercial;

    protected ?string $telefoneResidencial;

    protected ?Pep $pep;

    /**
     * CPF do pretendente / locatário / inquilino informado na API de orçamento. Deve conter 11 digitos numéricos,
     * sem máscaras ou caracteres especiais e caso tenha menos que 11 digitos preencher com zeros à esquerda.
     * Campo obrigatório.
     *
     * @example 20489072887
     * @required
     *
     * @param string $cpfCnpj
     * @return PropostaLocatario
     * @throws InvalidArgumentException
     */
    public function setCpfCnpj(string $cpfCnpj): PropostaLocatario
    {
        $this->validateDocument($cpfCnpj);

        $this->cpfCnpj = $cpfCnpj;

        return $this;
    }

    /**
     * Campo que identifica o titular do orçamento. É composto por 1 caracter maiúsculo, sendo ‘S’ para afirmar que
     * o CPF é o titular e ‘N’ para afirmar que não é o titular. Campo obrigatório.
     *
     * @example S
     * @required
     *
     * @param string $titular
     * @return PropostaLocatario
     */
    public function setTitular(string $titular): PropostaLocatario
    {
        $titular = strtoupper($titular);

        if ($titular !== 'S' && $titular !== 'N') {
            throw new InvalidArgumentException('As opções válidas são apenas \'S\' ou \'N\'');
        }

        $this->titular = $titular;
        return $this;
    }

    /**
     * Nome e sobrenome do pretendente / locatário / inquilino. É composto por no mínimo 5 caracteres, no máximo 60
     * caracteres, pelo menos 1 espaço entre o nome e sobrenome e sem caracteres especiais. Campo obrigatório.
     *
     * @required
     * @example João Antônio da Silva
     *
     *
     * @param string $nome
     * @return PropostaLocatario
     */
    public function setNome(string $nome): PropostaLocatario
    {
        $this->validateName($nome);
        $this->nome = $nome;
        return $this;
    }

    /**
     * Data de nascimento do locatário no formato DD/MM/AAAA. Campo obrigatório.
     *
     * @required
     *
     * @param $dataNascimento
     *
     * @return PropostaLocatario
     * @example 07/02/1947
     */
    public function setDataNascimento($dataNascimento): PropostaLocatario
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    /**
     * Sexo / gênero do locatário. É composto por um caractere maiúsculo. Campo opcional.
     * Opções disponíveis
     * M - Masculino
     * F - Feminino
     * I - Indefinido
     *
     * @default I
     * @example M
     *
     * @param string|null $sexo
     * @return PropostaLocatario
     */
    public function setSexo(?string $sexo): PropostaLocatario
    {
        $this->validateEnum(strtoupper($sexo), ['M', 'F', 'I']);
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * Nome da mãe do locatário. É composto por no mínimo 5 caracteres, no máximo 60 caracteres, pelo menos 1 espaço
     * entre o nome e sobrenome e sem caracteres especiais.
     * Campo opcional.
     *
     * @example DEA TONELLI QUARANTA
     *
     * @param string|null $mae
     * @return PropostaLocatario
     */
    public function setMae(?string $mae): PropostaLocatario
    {
        $this->validateName($mae);
        $this->mae = $mae;
        return $this;
    }

    /**
     * É o endereço de e-mail do locatário. É composto por no máximo 64 caracteres, deve conter um @, um . após o @, ao
     * menos 5 caracteres antes do @, não deve terminar com um caracter especial, não deve conter nenhum caracter
     * especial além do arroba, hífen e underline/underscore, não deve conter espaços.
     * Campo obrigatório.
     * @example jose.antonio-01@gmail.com
     *
     * @param string $email
     * @return PropostaLocatario
     */
    public function setEmail(string $email): PropostaLocatario
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('E-mail inválido');
        }

        if (strlen($email) > 64) {
            throw new InvalidArgumentException('O e-mail pode conter no máximo 64 caracteres');
        }

        $this->email = $email;
        return $this;
    }

    /**
     * Número do telefone celular do locatário, incluindo o código DDD. É composto por 11 caracteres numéricos, sendo os
     * dois primeiros o código DDD e os demais o número do celular, preenchido com zeros à esquerda, sem máscaras, sem
     * caracteres especiais ou espaços.
     * Campo obrigatório.
     *
     * @required
     * @example 11998467395
     *
     * @param string $telefoneCelular
     * @return PropostaLocatario
     */
    public function setTelefoneCelular(string $telefoneCelular): PropostaLocatario
    {
        $this->validatePhone($telefoneCelular);
        $this->telefoneCelular = $telefoneCelular;
        return $this;
    }

    /**
     * Número do telefone comercial do locatário, incluindo o código DDD. É composto por 10 caracteres numéricos, sendo
     * os dois primeiros o código DDD e os demais o número do telefone, preenchido com zeros à esquerda, sem máscaras,
     * sem caracteres especiais ou espaços. Campo opcional.
     * @example 1141239635
     *
     * @param string|null $telefoneComercial
     * @return PropostaLocatario
     */
    public function setTelefoneComercial(?string $telefoneComercial): PropostaLocatario
    {
        $this->validatePhone($telefoneComercial, 10);
        $this->telefoneComercial = $telefoneComercial;
        return $this;
    }

    /**
     * @param string|null $telefoneResidencial
     *
     * @return Locador
     */
    public function setTelefoneResidencial(?string $telefoneResidencial): Locador
    {
        $this->telefoneResidencial = $telefoneResidencial;
        return $this;
    }

    /**
     * @param Pep $pep
     * @return PropostaLocatario
     */
    public function setPep(Pep $pep): PropostaLocatario
    {
        $this->pep = $pep;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpj(): string
    {
        return $this->cpfCnpj;
    }

    /**
     * @return string
     */
    public function getTitular(): string
    {
        return $this->titular;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    /**
     * @return string|null
     */
    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    /**
     * @return string|null
     */
    public function getMae(): ?string
    {
        return $this->mae;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getTelefoneCelular(): string
    {
        return $this->telefoneCelular;
    }

    /**
     * @return string|null
     */
    public function getTelefoneComercial(): ?string
    {
        return $this->telefoneComercial;
    }

    /**
     * @return string|null
     */
    public function getTelefoneResidencial(): ?string
    {
        return $this->telefoneResidencial;
    }

    /**
     * @return Pep
     */
    public function getPep(): Pep
    {
        return $this->pep;
    }

    public static function new($cpfCnpj, $titular, $nome, $dataNascimento, $email): self
    {
        return (new static())
            ->setCpfCnpj($cpfCnpj)
            ->setTitular($titular)
            ->setNome($nome)
            ->setDataNascimento($dataNascimento)
            ->setEmail($email);
    }
}
