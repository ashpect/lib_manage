# Library_Management_System

> Application to help manage all users, admins and issue/return requests along with the fines administered for a library

## FEATURES :

1.A client portal and an admin portal (including authentication and authorization (hashed salted passwords)).

2.Admins can 

    1.list the books available in the library.

    2.update that list(add/remove books).

    3.approve/deny checkin/checkout requests made by the clients.

    4.impose fine on late check-in.

3.Clients can 

    1.view all books and issue a checkout request.

    2.view the list of issued books as well as the pending checkin/checkout requests.

    3.request admin to check-in books.

4.Books can have

    1.multiple copies
    
    2.mutiple users can request to issue the book untill copies are exhausted.



## DATABASE STRUCTURE :

1. ### MAIN DATABASE : dbtest1
Tables_in_dbtest1 are :
    `1.admin`
    `2.books`
    `3.checkouts`
    `4.user`

2. ### Relation between tables :
     ![This is an image](#updateimage)

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

1. Serve the public folder at any port (say 8000):
    ```console
	> cd public
    > php -S localhost:8000
    ```
