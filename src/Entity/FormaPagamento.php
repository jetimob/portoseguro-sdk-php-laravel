<?php

namespace Jetimob\PortoSeguro\Entity;

use Jetimob\Http\Traits\Serializable;
use Jetimob\PortoSeguro\Validators\Validator;

class FormaPagamento
{
    use Serializable;
    use Validator;

    protected ?string $formaPagamento = null;

    protected ?string $nomeFormaPagamento = null;

    protected array $condicoesPagamento = [];

    public function condicoesPagamentoItemType(): string
    {
        return CondicaoPagamento::class;
    }

    /**
     *
     * Código da forma de pagamento escolhida pelo cliente. A lista das formas de pagamento são disponibilizadas
     * dentro da oferta no retorno da API de orçamento. É composto por até 3 caracteres maiúsculos.
     * Opções válidas: 'CP', 'CC', 'FAT'
     *
     * @required
     * @example CC
     *
     * @param string|null $formaPagamento
     * @return FormaPagamento
     */
    public function setFormaPagamento(?string $formaPagamento): FormaPagamento
    {
        if (is_null($formaPagamento)) {
            return $this;
        }

        $this->validateEnum(strtoupper($formaPagamento), ['CP', 'CC', 'FAT']);
        $this->formaPagamento = $formaPagamento;
        return $this;
    }

    /**
     * Descrição completa da forma de pagamento na oferta
     *
     * @example CARTAO DE CREDITO
     *
     * @param string|null $nomeFormaPagamento
     * @return FormaPagamento
     */
    public function setNomeFormaPagamento(?string $nomeFormaPagamento): FormaPagamento
    {
        $this->nomeFormaPagamento = $nomeFormaPagamento;
        return $this;
    }

    /**
     * @param array $condicoesPagamento
     * @return FormaPagamento
     */
    public function setCondicoesPagamento(array $condicoesPagamento): FormaPagamento
    {
        $this->condicoesPagamento = $condicoesPagamento;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormaPagamento(): ?string
    {
        return $this->formaPagamento;
    }

    /**
     * @return string|null
     */
    public function getNomeFormaPagamento(): ?string
    {
        return $this->nomeFormaPagamento;
    }

    /**
     * @return array
     */
    public function getCondicoesPagamento(): array
    {
        return $this->condicoesPagamento;
    }
}
