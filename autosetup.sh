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

    read -s -p "Enter your password" DB_PASSWORD
    echo
    
    touch config/config.php

    echo '<?php' > config/config.php
    echo '$DB_HOST="'$DB_HOST'";'>> config/config.php
    echo '$DB_PORT="'$DB_PORT'";'>> config/config.php
    echo '$DB_NAME="'$DB_NAME'";'>> config/config.php
    echo '$DB_USERNAME="'$DB_USERNAME'";'>> config/config.php
    echo '$DB_PASSWORD="'$DB_PASSWORD'";'>> config/config.php
    echo '?>' >> config/config.php

    MYSQL_PWD=$DB_PASSWORD mysql -u $DB_USERNAME -e "create database if not exists $DB_NAME"
    if [ $? -eq 0 ]; then
        MYSQL_PWD=$DB_PASSWORD mysql -u $DB_USERNAME $DB_NAME < schema/schema.sql
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