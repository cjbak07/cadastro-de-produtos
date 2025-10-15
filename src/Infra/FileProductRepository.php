<?php


namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
        if (!file_exists($this->file)) {
            file_put_contents($this->file, "");
        }
    }

    public function save(array $product): bool
    {
        $line = json_encode($product) . PHP_EOL;
        return file_put_contents($this->file, $line, FILE_APPEND | LOCK_EX) !== false;
    }

    public function findAll(): array
    {
        $products = [];
        $lines = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $products[] = json_decode($line, true);
        }
        return $products;
    }
}
