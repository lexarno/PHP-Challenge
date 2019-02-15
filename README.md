# PHP-Challenge

- 1. Clone o projeto do github: https://github.com/lexarno/PHP-Challenge.git
- 2. Entre na pasta do projeto e execute o comando: composer install
- 3. Faça uma cópia do arquivo ".env.example" e altere o nome para: .env
- 4. Abra o arquivo ".env", encontre os atributos: DB_USERNAME e DB_PASSWORD e atribua a eles o "usuário" e "senha" do seu banco de dados.
(OBS: Caso os atributos DB_HOST e DB_PORT tiverem valores diferentes do necessário para configurar o MySQL na sua máquina, substitua os valores)
- 5. Faça uma cópia do arquivo ".env.testing.example" e altere o nome para: .env.testing
- 6. Abra o arquivo ".env.testing", encontre os atributos: DB_USERNAME e DB_PASSWORD e atribua a eles o "usuário" e "senha" do seu banco de dados.
(OBS: Caso os atributos DB_HOST e DB_PORT tiverem valores diferentes do necessário para configurar o MySQL na sua máquina, substitua os valores)
- 7. Crie em seu MySQL um banco chamado "challenge" e outro chamado "challenge_test"
- 8. Abra o terminal (console) da sua máquina e acesse o diretório do projeto. Em seguida digite: php artisan key:generate
- 9. Ainda dentro do diretório do projeto no terminal digite: php artisan migrate
- 10. Ainda dentro do diretório do projeto no terminal digite: php artisan db:seed
- 11. Testes - Ainda dentro do diretório do projeto no terminal digite: vendor/bin/phpunit
- 12. Para executar o App digite no terminal, dentro do diretório do projeto: php artisan serve


# cartões para teste

- Cartão que aprava sempre
card_number : 4893111111111111,
card_expiration : 12/26, 
card_cvv : 111

- Cartão que reprova sempre
card_number : 4893222222222222,
card_expiration : 12/23,
card_cvv : 222

- Cartão randomico aprova/reprova
card_number : 4893333333333333,
card_expiration : 09/22,
card_cvv : 333