<?php

namespace Jetimob\PortoSeguro\Validators;

use Jetimob\PortoSeguro\Exceptions\InvalidArgumentException;

trait Validator
{
    protected function validateName(string $name): void
    {
        if (preg_match('/[^A-zÀ-ú\s.-]/u', $name)) {
            throw new InvalidArgumentException('O nome não pode conter caracteres especiais');
        }

        $nameLength = strlen($name);

        if ($nameLength < 5 || $nameLength > 60) {
            throw new InvalidArgumentException('O nome precisa ter no mínimo 5 caracteres, e no máximo 60');
        }

        if (!str_contains($name, ' ')) {
            throw new InvalidArgumentException('Precisa informar nome e sobrenome separados por espaço');
        }
    }

    protected function validatePhone(string $phone, $requiredDigits = 11): void
    {
        $phone = $this->getOnlyDigits($phone);

        if (strlen($phone) !== $requiredDigits) {
            throw new InvalidArgumentException('O telefone precisa conter ' . $requiredDigits . ' dígitos. Ex.: (99) 9 9999-9999');
        }
    }

    protected function validateDocument($cpfCnpj): void
    {
        $cpfCnpj = $this->getOnlyDigits($cpfCnpj);

        $cpfCnpjCount = strlen($cpfCnpj);

        if (($cpfCnpjCount !== 11 && $cpfCnpjCount !== 14)) {
            throw new InvalidArgumentException('O CPF/CNPJ em formato inválido');
        }
    }

    protected function validateCep($cep): void
    {
        $cep = $this->getOnlyDigits($cep);
        if (strlen($cep) !== 8) {
            throw new InvalidArgumentException('O CEP precisa conter 8 dígitos númericos');
        }
    }

    protected function validateEnum($input, array $enum): void
    {
        if (!in_array($input, $enum)) {
            $validOptions = implode(', ', $enum);
            throw new InvalidArgumentException('As opções válidas são apenas: ' . $validOptions);
        }
    }

    private function getOnlyDigits($input): string
    {
        return preg_replace('/\D/', '', $input);
    }
}
