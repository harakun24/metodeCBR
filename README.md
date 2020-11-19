# Cat Finder

## Dengan metode CBR (Case Base Reasoning)

Case-Based Reasoning (CBR) merupakan sebuah pendekatan penyelesaian masalah dengan menekankan peran pengalaman sebelumnya. Permasalahan baru dapat diselesaikan dengan memanfaatkan kembali dan mungkin malakukan penyesuaian terhadap permasalahan yang memiliki kesamaan yang telah diselesaikan sebelumnya.

### Documentation

The [User Guide Code Igniter](https://codeigniter4.github.io/userguide/) is the primary documentation for CodeIgniter 4.

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- xml (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)

## Konfigurasi

- Export database terlebih dulu (export.sql)

- Sesuaikan pengaturan pada .env

### contoh:

database.default.hostname = localhost <br>
database.default.database = db <br>
database.default.username = root <br>
database.default.password = root <br>
database.default.DBDriver = MySQLi <br>
