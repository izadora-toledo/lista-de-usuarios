# Projeto Lista de Usuários

Aplicação que consome uma API para retornar uma lista de usuários, salva esses dados no banco de dados e os apresenta visualmente em um grid com as seguintes colunas: Nome, Email, Estado e Símbolo.

## Requisitos para Rodar a Aplicação

- **PHP:** 8.2
- **Laravel:** 11.9
- **Composer**
- **Git**

## Instruções de Instalação

1. Clone este repositório usando o comando:

    ```bash
    git clone https://github.com/izadora-toledo/lista-de-usuarios.git
    ```

2. Acesse a pasta do projeto:

    ```bash
    cd lista-de-usuarios
    ```

3. Instale as dependências do projeto:

    ```bash
    composer install
    ```

4. Gere a chave de criptografia do Laravel:

    ```bash
    php artisan key:generate
    ```

5. Crie o arquivo `database.sqlite` dentro do diretório `database`:

    ```bash
    touch database/database.sqlite
    ```

6. Rode as migrations do banco de dados:

    ```bash
    php artisan migrate
    ```

7. Inicie o servidor da aplicação:

    ```bash
    php artisan serve
    ```

## Acesso à Aplicação

Após seguir todos os passos acima, acesse o servidor através da URL que aparecer no terminal. Por padrão, geralmente é:

[http://127.0.0.1:8000](http://127.0.0.1:8000)

Acesse a rota para importar dados:

[http://127.0.0.1:8000/importar](http://127.0.0.1:8000/importar)

Após acessar, basta clicar no botão 'Importar usuários' para que faça a importação correta dos usuários e logo você será encaminhado para uma tela de 'sucesso de importação'. 

Após isso clique no botão 'Acessar lista de usuários importados' que te encaminhará para o grid onde tem a lista dos usuários que você fez a importação. 

Caso queira testar novamente a aplicação, na tela do grid na parte superior tem um botão escrito 'Importar novamente'.

## Dicas da Aplicação

- Você pode ordenar a lista clicando nas colunas Nome, Email e Estado. Uma seta branca aparecerá indicando a coluna que está sendo usada para ordenar.
- Ao clicar na coluna Estado, a lista será ordenada em ordem alfabética e os usuários que são do mesmo estado também estarão em ordem alfabética entre eles.

Aprecie a aplicação, simples mas objetiva!
