# Sistema de Gerenciamento de Motoristas e Veículos

Este projeto foi desenvolvido para gerenciar informações de motoristas e veículos utilizando PHP com Zend Framework 2,Doctrine ORM e um pequeno banco de dados em arquivo Sqlite.

# Servindo a aplicação
### Rodar servidor local
```bash
php -S 0.0.0.0:8080 -t public/ public/index.php
```
A aplicação estará acessível em [http://localhost:8080](http://localhost:8080)

### Criando o banco de Dados

O banco de dados é criado por meio do sript `create_schema.php` que está na raiz do projeto. Para criar o banco de dados, execute o seguinte comando:
```bash
php create_schema.php
```

# Rotas da Aplicação

## Rota de Motoristas
   - URL: /motoristas
   - Métodos: GET, POST
   - Controlador: Controller\MotoristaController
   - Ações:
     - index
     - cadastrar
     - editar
     - deletar
     
## Rota de Veículos 
   - Rota: /veiculos
   - Métodos: GET, POST
   - Controlador: Controller\VeiculoController
   - Ações:
     - index
     - cadastrar
     - editar
     - deletar


