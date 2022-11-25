****************************
UPDATE 25.11
***************************



FILMIK CZĘŚĆ 3

1) zmiana pliku systemowego C:\Windows\System32\drivers\etc plik hosts
dodanie:

127.0.0.1       localhost sklep.test



2) zmiana pliku w folderze C:\xampp\apache\conf\extra plik httpd-vhosts
dodać:

<VirtualHost sklep.test:80>
    ServerAdmin webmaster@sklep.test
    DocumentRoot "C:/xampp/htdocs/projekt/public"
    ServerName sklep.test
    ErrorLog "logs/sklep.test-error.log"
    CustomLog "logs/sklep.test-access.log" common
</VirtualHost>

3) reset apache

4) utworzenie bazy danych i modyfikacja pliku .env (zmiana DB_DATABASE z laravel na shop) -KTÓRY JEST UKRYTY - BAZĘ I TEN PLIK TRZEBA ZMODYFIKOWAĆ SAMEMU

5) migracja tabel komenda php artisan migrate

************************************************************************************************************


FILMIK CZĘŚĆ 4

1) stworzenie pliku hello blade i kontrolera-wszystko co w filmiku

************************************************************************************************************


FILMIK CZĘŚĆ 5

1) pobranie biblioteki za pomocą komendy    composer require laravel/ui:^4.1.0
2) pobranie komponentu bootstrapa za pomocą komendy    php artisan ui bootstrap --auth

FILMIK NR 5 DO 17:30 - PROBLEM Z DZIAŁANIEM LOG IN/REGISTER
