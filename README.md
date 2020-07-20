# E-Cards

Fully Responsive Digital Card Contact (E-Cards) Website. With QR Scanner and QR code for each profile Get all your Business contacts where ever when ever you want.

# Website Testing

Download the latest database.sql file.
Few Accouts have already been created for Testing and Demo purpose.

Step 1: Create a database called e-cards and import everything from database.sql file. Next check your db.php file for database connection configuration
Step2: Now you login as candidate with following details
```php
Email: test@test.com
Password: testtest
```
Sign-In.

When you try to Sign-in with your Email-Id A Email will be sent to your Registered E-mail to activate your account.

Candidates Email Confirmation:
>You CANNOT send emails from localhost server. So when you create a new candidate account it will not send any emails. So you must go to database, find that user and set ```active=1``` in order to make that account login. 

