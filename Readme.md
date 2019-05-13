//@todo:

- dependencies
- used libraries
- brief description of functionality
- how to run the project

# TOTP authentication application demo

This application demonstrate the usage of [TOTP](https://en.wikipedia.org/wiki/Time-based_One-time_Password_algorithm) authentication.

It consist of two main parts: 
- Generating authentication QR code that can be used with [Google authenticator](https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2)
- Verification of a TOTP code with the needed credentials

### Project dependencies

The project is written in [Lumen](https://lumen.laravel.com/) framework and it has the following dependencies: 

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- MySql  >= 5 / MariaDB  >= 10

### Running the project
 
1. Everything from the "project dependencies" should be present on the machine you want to run the project.
2. Clone the project from the repository
3. Execute `composer install` to download all dependency libraries 
4. Set the environment variables based on the structure in the `.env.example`. For quick setup copy the `.env.example` and rename it `.env`. Make sure the database credentials are correct and you have a database with the name like the value of`DB_DATABASE`. 
5. Execute `php artisan migrate` to execute all db migration
6. To serve the project locally, you may use the following command: `php -S localhost:8000 -t public` and it will be accessible on  `http://localhost:8000` address
