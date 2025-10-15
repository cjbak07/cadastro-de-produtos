# Products SRP Demo

Sistema simples de **cadastro e listagem de produtos** em PHP puro, aplicando **SRP**, **PSR-4**, e persistência em **arquivo texto (JSON por linha)**.

---

## 🗂 Estrutura do projeto

products-srp-demo/
├─ composer.json
├─ vendor/
├─ src/
│ ├─ Contracts/
│ │ ├─ ProductRepository.php
│ │ └─ ProductValidator.php
│ ├─ Application/
│ │ └─ ProductService.php
│ ├─ Domain/
│ │ └─ SimpleProductValidator.php
│ └─ Infra/
│ └─ FileProductRepository.php
├─ public/
│ ├─ index.php
│ ├─ create.php
│ └─ products.php
└─ storage/
└─ products.txt

---

## ⚙️ Requisitos

- PHP 8.x  
- XAMPP (ou outro servidor local)  
- Composer  

---

## 🚀 Como executar

1. Abra o projeto no VS Code.  
2. No terminal do VS Code, dentro da pasta do projeto, rode:

```bash
"composer install"
```

3. Abra o XAMPP e inicie o Apache.
4. Acesse no navegador:

http://localhost/products-srp-demo/public/