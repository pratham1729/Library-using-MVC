#!/bin/bash

if [[ -f config/config.php ]]; then
    
    composer install
    composer dump-autoload
    cd public
    php -S localhost:8000

else

    echo "Enter the Details"

    echo "Enter host"
    read DB_HOST

    echo "Enter Port"
    read DB_PORT

    echo "Enter New Database Name"
    read DB_NAME

    echo "Enter your username"
    read DB_USERNAME

    echo "Enter your password"
    read DB_PASSWORD

    touch config/config.php

    echo '<?php' > config/config.php
    echo '$DB_HOST="'$DB_HOST'";'>> config/config.php
    echo '$DB_PORT="'$DB_PORT'";'>> config/config.php
    echo '$DB_NAME="'$DB_NAME'";'>> config/config.php
    echo '$DB_USERNAME="'$DB_USERNAME'";'>> config/config.php
    echo '$DB_PASSWORD="'$DB_PASSWORD'";'>> config/config.php
    echo '?>' >> config/config.php

    mysql -u $DB_USERNAME -p$DB_PASSWORD -e "create database $DB_NAME"
    if [ $? -eq 0 ]; then
        mysql -u $DB_USERNAME -p$DB_PASSWORD $DB_NAME < schema/schema.sql
        if [ $? -eq 0 ]; then        
            composer install
            composer dump-autoload
            cd public
            php -S localhost:8000
        else 
            echo "Connection to Database Failed, please check your credentials"
            rm config/config.php
            exit
        fi
    else
        echo "Connection to Database Failed, please check your credentials"
        rm config/config.php
        exit      
    fi
fi