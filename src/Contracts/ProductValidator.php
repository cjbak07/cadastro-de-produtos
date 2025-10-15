<?php

namespace App\Contracts;

interface ProductValidator
{
    /**
     * Valida os dados de um produto.
     * Retorna array com erros se houver, vazio se válido.
     */
    public function validate(array $product): array;
}
