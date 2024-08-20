# Use Transaction in PHP with Commit and Rollback to Maintain Data Consistency
Use Transaction in PHP with Commit and Rollback to Maintain Data Consistency so that in case of any unexpected error, you can rollback the changes in the database.
This application is about demonstrating PHP transaction using commit and rollback in MySQL. It uses an html form. On submission, it inserts the form data into two database tables using two successive 
insert statements. We have used begin_transaction() so that two SQL statements will be considered as a single transaction. So, either both of them will be commited or none of them at all in case of error.
1) Download the repository from https://github.com/sundarsau/php_transaction
2) Extract all the files in a folder under xampp/htdocs
3) Create the tables in "test" database in MySQL by running sql files
4) Run index.php in the browser with folder name where the files were extracted
# License
This is an MIT license, you can modify the code according to your requirements
