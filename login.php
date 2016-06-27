<!-- Program Header:
 - Name: Benjamin Li
 - Student ID: 1000919426
 - Class and Section: CSE 4392-002
 - Project Assignment#: 6
 - Assignment Due: December 1, 2015 @ 11:59 pm
 
 Programmers Notes:
 - Access phpMyAdmin by "localhost:8080" which is the local apache home page.

The goal of this project is to learn server-side web programming using PHP and a relational database system (MySQL). 
More specifically, you will create a message board where registered users can post messages. 

This project must be done individually. No copying is permitted. 
Note: We will use a system for detecting software plagiarism, called Moss, which is an automatic system for determining the similarity of programs. 
That is, your program will be compared with the programs of the other students in class as well as with the programs submitted in previous years. 
This program will find similarities even if you rename variables, move code, change code structure, etc. 

Note that, if you use a Search Engine to find similar programs on the web, we will find these programs too. 
So don't do it because you will get caught and you will get an F in the course (this is cheating). 
Don't look for code to use for your project on the web or from other students (current or past). 
Just do your project alone using the help given in this project description and from your instructor and GTA only. 
Finally, you should not post your code nor deploy your project on a public web site. 

Platform

As in the previous projects, you will develop this project on your PC/laptop using XAMPP and you will test it using using your Mozilla Firefox web browser. 
Download project6.zip and unarchive the files inside your web server document root directory. 
The project6 directory contains the file createDB.sql, which contains the SQL description of the tables: users and posts, that have the following schema: 
users ( username, password, fullname, email )
posts ( id, postedby, datetime, message )

Primary keys: users.username and posts.id
 Foreign key: posts.postedby->users.username.
 To create the database, start the Apache Web Server and the MySQL Database on your PC using the XAMPP manager console.
 Run phpMyAdmin on your browser, create a new database with name board by clicking on New.
 After you create it, select this database (under the name board), go to the SQL tab, and cut and paste the SQL code in createDB.sql and push Go.
 This will create your schema. You can test your setup on your web browser by using the URL address http://localhost/project6/board.php 

The project6 directory contains the file board.php that uses the PDO extension of PHP to insert a new user and to query the users table using MySQL. 

Please read The PHP Data Objects (PDO) extension, especially the PDO class. 

Project Requirements

You need to write two PHP scrips login.php and board.php.
The login.php script generates a form that has two text windows for username and password and a "Login" button.

The board.php has a "Logout" button, a textarea to write a message, a "Post" button, and the printout of all messages.

From the login script, if the user enters a wrong username/password and pushes "Login", it should go to the login script again.
If the user enters a correct username/password and pushes "Login", it should go to the board script.

From the board script, if the user pushes "Logout", it should logout and go to the login script.
The board script must always make sure that only authorized used (users who have logged-in properly) can view and post messages.

From the board script, if the user fills out the textarea and pushes the "Post" button, it will insert the new message in the database and will go to the board script again. 

The board script prints the all the messages in the database ordered by date/time (newest first, oldest last). 
For each posted message, it prints: 
• The message ID. 
• The username and the fullname of the person who posted the message. 
• The date and time when this message was posted. 
• The message text. 

Hints: Use md5 to encode passwords in PHP. Use uniqid to generate a unique id in PHP. Use the MySQL function now() to return the current date and time. 
-->

<html>
<head><title>Log in</title></head>
<body>
<h1> Log in to Message Board: </h1>
<form action="board.php" method="GET">
  <p> User Name: <input type="text" name="username" /> </p>
  <p> Password: <input type="password" name="password" /> </p>
  <p> <input type="submit" name="Login" value="Login"/> </p> 
</body>
</html>
