# Library_Management_System

> Application to help manage all users, admins and issue/return requests along with the fines administered for a library

## Setup :

1. Make sure you create a mysql database.

2. Give setup.sh the privilages and run it.
   ```console
   > chmod 755 setup.sh
   > ./setup.sh
   ```

OR manually :

1. Clone the repository and `cd` into it.

2. Install composer using:

   ```console
   > curl -s https://getcomposer.org/installer | php
   > sudo mv composer.phar /usr/local/bin/composer
   > composer install
   ```

3. Install dependencies and dump-autoload:

   ```console
   > composer install
   > composer update
   > composer dump-autoload
   ```

4. Copy config/sample.config.php as config/config.php and edit it accordingly:

   ```console
   > cp config/sample.config.php config/config.php
   > # Edit the file using your mysql database credentials
   ```

5. Import schema present in schema/schema.sql in your database.

   ```console
   > mysql -u $DB_USERNAME -p $DB_NAME < schema/schema.sql
   ```

6. Serve the public folder at any port (say 8000):
   ```console
   > cd public
   > php -S localhost:8000
   ```

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

## DEPENDENCIES :

> It is built on the ToroPHP web framework and the templating engine used is twig version 3.0.

> It usses Composer verison 2.3.10, MySQL version 8.0.29 and nginx version 1.23.0. The version of PHP used is 7.4.3.

> The lms was developed on mac os Monterey but is expected to run on most of the lower updates as well.``

> You can refer its documentation on the following links: 1. ToroPHP - https://github.com/anandkunal/ToroPHP 2. Twig - https://twig.symfony.com/doc/

## DATABASE STRUCTURE :

1. ### MAIN DATABASE : mvcdata
   Tables_in_dblib are :
   `1.admins`
   `2.books`
   `3.checkouts`
   `4.users`
   The specificd details like default values are set to minimalise effort and take in values when certain parameters are missing.You can set them as you like in your db.
   ![This is an image](https://cdn.discordapp.com/attachments/918561473008123954/996979057545719909/Screen_Shot_2022-07-14_at_8.48.07_AM.png)

> NOTE : There is no admin register portel as we do not expect to freely distribute admin powers.Hence use the admins given in db to test admin login and other features.The password for db admins is the same as their usernames.

2. ### Relation between tables :

   1. The user_id in checkouts tableis the foreign key connected with username in users table as the primary key.
   2. The book_id in checkouts tableis the foreign key connected with bookid in books table as the primary key.The use of doing so allows for ease of storage and view since the title of books may be complicated.

3. ### Working :

   1. When user requests for issuing the book , user_id and bookid are filled in checkouts along with the auto increment id.
   2. Then, when the admin approves the issue request and the user can finally take the book, checkout_time is updated along with checkout_admin which stores the admin who approved the book , so that you can visit it later in case of lost of books.
   3. Then when the user return the book, checkin_time is updated.
   4. Finally, checkin_admin is updated by the id of admin who approved the checkin request.
   5. If difference between checkin_time and checkout_time is greater than 7 days, the fine is calculated using the formula $2\*(difference bw dates - 7days).
