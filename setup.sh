#! /bin/bash

echo "----Starting the setup process-----"

echo "Do you want have composer already installed ? (0 for yes / 1 for no)"
read boolean
if [ $boolean -eq 0 ];
then 
    echo "Ok..installing dependecies."
elif [ $boolean -eq 1 ];
then
	echo "Installing Composer"
    curl -s https://getcomposer.org/installer | php

	echo '----Enter your system password(for sudo privilages)---- : '
    sudo mv composer.phar /usr/local/bin/composer
	composer install
	composer update
	composer dump-autoload
fi

echo "----Cheking for config file.----"

if test -f "config/config.php"; 
then
	cd public
    echo "Server will run at 8000 port."
	php -S localhost:8000
else

    touch config/config.php

	$DB_HOST 
	$DB_PORT 
	$DB_NAME 
	$DB_USERNAME
	$DB_PASSWORD

    echo 'Enter The Following Details : '
	echo 'DB_HOST:'
	read DB_HOST
	echo 'DB_PORT:'
	read DB_PORT 
	echo 'DB_NAME:'
	read DB_NAME 
	echo 'DB_USERNAME:'
	read DB_USERNAME
	echo 'DB_PASSWORD:'
	read DB_PASSWORD

	
	echo '<?php'>>config/config.php
	echo '$DB_HOST= "'$DB_HOST'";'>>config/config.php
	echo '$DB_PORT= "'$DB_PORT'";'>>config/config.php
	echo '$DB_NAME= "'$DB_NAME'";'>>config/config.php
	echo '$DB_USERNAME= "'$DB_USERNAME'";'>>config/config.php
	echo '$DB_PASSWORD= "'$DB_PASSWORD'";'>>config/config.php
	echo '?>'>>config/config.php

	mysql -u $DB_USERNAME -p $DB_NAME < schema/schema.sql

	echo "Starting server at port 8000"
	cd public
	php -S localhost:8000
fi

	