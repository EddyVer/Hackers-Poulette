# Hachers poulette

## The mission

The company _Hackers Poulette ™_ sells Raspberry Pi accessory kits to build
your own. They want to allow their users to contact their support team. Your
mission is to create a fully-functioning online "contact support" form, in _PHP_. It must _display a contact form_ and _process the received answer_ (sanitize, validate, answer the user).


## 🌱 Must-have features

-   Use of PHP
-   Database with PDO connection
-   The form's html code _must_ be semantically validand accessible
-   In case of wrong input, the form should display a useful visual clue about the error, below the input field.
-   The error message must be readable and helpful to users.
-   The data has to be _sanitised_ and _validated_ (server side)
-   Once the form is validated, the data should be send to the database.
-   Spam prevention using honeypot or captcha

### 🌼 Nice-to-have

If you have ticked all the above boxes, you can add some of the following features:

-   Client side validation with _JavaScript_
-   Work on a good and clear _user experience_ (UX)
-   If all required inputs are valid, the script should respond by email to a given address, confirming the reception of the message. (you can use your own address for testing purposes)
-   Discover  composer and use it to install a PHP library such as SwiftMailer to send the email or to validate the form with library such as rakit/validation, valitron or symfony/mailer
-   Protect your form against the most common attacks (CSRF, XSS, SQL injection, etc.)
-   Create a dashboard to display the received messages (admin side) which allow to manage the messages status (handled, not handled, response, etc..) (this is a big one I know, you probably won't have time to do it all, but it's a good exercise to learn how to manage a database and a dashboard)

<a href = "http://formeddy.epizy.com/?i=1">Acces to Form </a>
