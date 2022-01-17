
Do w pełni działającego projektu należy:
1) Sklonować projekt z gita ( jeśli nie jest projekt pobrany z moodle )
2) Utworzyć na bazie kopii .env.example, plik .env ( skonfigurować dostęp do bazy ): cp .env.example .env
3) Zainstalować vendory: composer install
4) Wygenerowac klucz aplikacji: php artisan key:generate
5) Odpalić komende: php artisan module:enable ( aktywuje wszystkie moduły )
6) Odpalić komende ( tylko wtedy, gdy nie eksportujemy gotowej bazy ):
   php artisan cms:install ( ktora zainstaluje wszystkie migracje i utworzy podstawowe role, konto admina..)

Konto admina:
email: admin@admin.admin
hasło: admin

Link do GITa: https://github.com/damian990617/programowanie_studia

Wyeksportowana baza z utworzonymi już ogłoszeniami i kategoriami: db.sql
