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

1. ### MAIN DATABASE : dblib
Tables_in_dblib are :
    `1.admins`
    `2.books`
    `3.checkouts`
    `4.users`

2. ### Relation between tables :
     ![This is an image](#updateimage)

## Setup

1. Make sure you create a mysql database based on given design above and mysql services are up and running.

2. Clone the repository and `cd` into it.

3. Setup config.php based on sample.config.php if familier with it.

4. Otherwise,Run setup.sh with sudo privilages.