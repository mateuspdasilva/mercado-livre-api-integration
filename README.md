# Integração com API Mercado Livre usando PHP

# Passo 1 - Criando o app Mercado Livre
Você precisa ter uma conta autenticada no Mercado Livre e acessar a url https://developers.mercadolivre.com.br/devcenter/ para começar a criar seu primeiro app, o passo a passo você encontra aqui https://developers.mercadolivre.com.br/pt_br/minha-primeira-aplicacao e https://developers.mercadolivre.com.br/pt_br/registre-o-seu-aplicativo 
# IMPORTANTE
- NÃO FAÇAM OS PASSOS DE DEPLOY NO HEROKU POIS NÃO IREMOS USAR, APENAS CRIE O APP DENTRO DO SITE DO MERCADO LIVRE.
- TANTO A URL NORMAL QUANDO A URL DE REDIRECT CADASTRADAS DEVEM SER IGUAIS A PREENCHIDA NO CÓDIGO: https://localhost/index.php/

# Passo 2 - Instalando o Docker
Para rodar esta aplicação, primeiramente você precisa ter o docker e o docker compose instalados na sua máquina, você encontrará o download disponível no site oficial do docker https://www.docker.com/

# Passo 3 - Subindo os containers no Docker
Agora que você tem o docker instalado e configurado, você vai acessar o projeto na sua IDE ou terminal, vai entrar na pasta laradock (api-meli/laradock) e vai rodar o seguinte comando
docker compose up nginx phpmyadmin mysql

# Passo 4 - Configurando o Banco de Dados
Com os containers do docker rodando, você vai acessar a url localhost:80 e vai fazer login com o user "root" e a senha "root". Tendo isso feito você vai importar a tabela localizada em api-meli/database_dump/ e preencher os campos 'client_id' com o ID da sua aplicação do mercado livre e 'client_secret' com a respectiva secret key, também disponível na sua aplicação.

# Passo 5 - Testando 
Agora você acessa https://localhost/index.php/ clique em "Solicitar permissão" e se estiver tudo certo será redirecionado para o Mercado Livre pedindo permissão e pronto, você já pode acessar os serviços, como cadastrar um produto usando a url https://localhost/produtos/cadastro.php/ 

# Aviso - Não foquei no front-end neste projeto pois vou levá-lo adiante dentro de um projeto privado, mas fico feliz em compartilhar o que posso com o Open Source.
