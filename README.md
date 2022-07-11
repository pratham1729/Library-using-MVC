# Library-MVC

> Library Management System using MVC architecture. Written in PHP using ToroPHP. Twig is the templating engine used. 

## Setup

1. Clone the repository and `cd` into it.

1. Install composer using:
    ```console
    > curl -s https://getcomposer.org/installer | php
    > sudo mv composer.phar /usr/local/bin/composer
    ```

1. Install dependencies and dump-autoload:
    ```console
    > composer install
    > composer dump-autoload
    ```

1. Copy `config/sample.config.php` as `config/config.php` and edit it accordingly:
    ```console
    > cp config/sample.config.php config/config.php
    # Edit the file using your mysql database credentials
    ```

1. Import schema present in `schema/schema.sql` in your database.
    ```console
    > mysql -u [username] -p [database] < schema/schema.sql
    ```

1. Serve the public folder at any port (say 8000):
    ```console
    > cd public
    > php -S localhost:8000
    ```

## Usage

1. You will first face the screen where you'll have to choose your login/registration mode ie. `Admin` or `Client`
2. Upon selecting `Client`, you can simply login/ register on the next screen. 
3. On logging in as `Client`, you will see the options to go to the `Request Portal` to Request Books, `Issued Books Page` from where you can return the books and `Requested Books Page`, from where you can cancel your requests if you change your mind.
4. If you're an `Admin` you can log in using the `Admin Login Portal`, to register as an Admin, you need the approval of one of the existing admins.
5. Once an `Admin`, you can approve/decline the Issue Request, approve the return requests and Add/Remove books to the Library.
