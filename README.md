# Gimmobiliaria

Pots trobar la versió online del projecte a (https://quiet-cove-65965.herokuapp.com)

## Instal·lació i configuració

Per instal·lar el projecte a la teva màquina local segueix els passos:

- Clonar el projecte amb `git clone https://github.com/jamescalvinmarti/immobiliaria.git` des del terminal.
- Accedir a la arrel del projecte amb `cd immobiliaria`
- Crear un arxiu que es digui **.env** amb el contingut de l'arxiu **env.example**
- Canviar les dades de l'arxiu **.env**. Nom de la teva base de dades local a `DB_DATABASE`, nom de l'usuari a `DB_USERNAME` i la contrasenya a `DB_PASSWORD`.
- Executar la comanda `php artisan key:generate` al terminal.
- Executar la comanda `php artisan migrate` per crear les taules.
- Executar la comanda `php artisan db:seed` per omplir amb dades les taules.
- Executar `php artisan serve` per iniciar el servidor. Accedir a localhost:8000 per veure la web.

## Usage

- Accedir a localhost:8000/login per entrar a la pàgina de login.
- Les dades per accedir són email: ```admin@black.com``` i contrasenya: ```secret```

## Tests

Per poder realitzar testos s'ha de tenir una segona base de dades per poder realitzar tests i no modificar res de la base de dades de desenvolupament.

- Al fitxer **.env** modificar els camps `TESTING_DB_DATABASE`, `TESTING_DB_USERNAME`, `TESTING_DB_PASSWORD`.
- Executar la comanda `php artisan migrate --seed --database=mysql_testing` al terminal.
- Executar els tests amb la comanda `php artisan test`.
