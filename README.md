# PHP-Challenge

1 - Clone o projeto do github: https://github.com/lexarno/PHP-Challenge.git
2 - Entre na pasta do projeto e execute o comando: composer install
3 - Faça uma cópia do arquivo ".env.example" e altere o nome para: .env
4 - Abra o arquivo ".env", encontre os atributos: DB_USERNAME e DB_PASSWORD e atribua a eles o "usuário" e "senha" do seu banco de dados.
(OBS: Caso os atributos DB_HOST e DB_PORT tiverem valores diferentes do necessário para configurar o MySQL na sua máquina, substitua os valores)
5 - Crie em seu MySQL um banco chamado "challenge"
6 - Abra o terminal (console) da sua máquina e acesse o diretório do projeto. Em seguida digite: php artisan key:generate
7 - Ainda dentro do diretório do projeto no terminal digite: php artisan migrate
8 - Ainda dentro do diretório do projeto no terminal digite: php artisan db:seed