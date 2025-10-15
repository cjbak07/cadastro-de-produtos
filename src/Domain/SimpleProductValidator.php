<?php

namespace App\Domain;

use App\Contracts\ProductValidator;

class SimpleProductValidator implements ProductValidator
{
    public function validate(array $product): array
    {
        $errors = [];

        if (empty($product['name']) || strlen($product['name']) < 2 || strlen($product['name']) > 100) {
            $errors[] = "O nome deve ter entre 2 e 100 caracteres.";
        }

        if (!isset($product['price']) || !is_numeric($product['price']) || $product['price'] < 0) {
            $errors[] = "O preço deve ser numérico e não negativo.";
        }

        return $errors;
    }
}
