<?php

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data): array
    {
        $errors = $this->validator->validate($data);
        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        $products = $this->repository->findAll();
        $lastId = count($products) ? end($products)['id'] : 0;

        $product = [
            'id' => $lastId + 1,
            'name' => $data['name'],
            'price' => floatval($data['price'])
        ];

        $this->repository->save($product);

        return ['success' => true, 'product' => $product];
    }

    public function list(): array
    {
        return $this->repository->findAll();
    }
}
