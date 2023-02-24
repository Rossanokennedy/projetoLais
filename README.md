Instruções para rodar o projeto

1-baixar o projeto

2-rodar o migrate: php artisan migrate

3-criar usuario adminitrador usando o seed: php artisan db:seed 
    ->dados de acesso predefinidos,cpf=admin senha=password 

4-preencher tabela de estados usando seed: php artisan db:seed --class=EstadoSeeder

5-rodar o projeto usando:php artisan serve