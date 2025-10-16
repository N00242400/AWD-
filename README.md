My Pet Project : 
This project is built using the Laravel framework and follows the MVC (Model-View-Controller) pattern.  
It is a simple app where users can register, login and create,edit,and delete pets (CRUD create/read/update/delete) I will do this using Laravel’s Eloquent models and Blade views.

LARAVEL :
Laravel is a framework for building web applications using PHP.PHP runs on the server to handle data and logic, while Laravel helps structure the code, manage the database, and build pages efficiently.Laravel makes building web applications easier and more organised using the model view controller pattern (mvc). The Model represents my data and logic, for example my pet table which will hold all my pet information like name,specie etc. The View is what the user sees and interacts with. This shows the front end pages html using blade templates. The Controller is the logic that makes the model and view work together.This handles the requests and data and sends the recieved data to the view.For example my petController.
Laravel uses migrations which allow tables to be created and updated.Seeders are then used to fill the database with sample data for testing.Eloquent is Laravel’s way of talking to the database using PHP functions instead of SQL

App development 
ERD:
In the first week I created an ERD diagram to set up my tables and relationships.I decided to do my project on a pet system.This includes a main pet table with a many to many relationship to 

Project setup:
I then set up and instlalled laravel,composer and node.js to create my project.I focused on implemeting user authentication.I installed laravel breeze with blade templates to handle all views and routes automatically. This provides the structure for registration,login and logout. 
During the setup i selected mySQL as my database. I ran a migration for my pet table and added a resouce controller to manage CRUD (petController). I then genrated a seeder to populate the database with data. I then created the views that show the list of pets,create page,show pet and edit page.

This process showed me how it all connects, the controller manages the requests,the model interacts with the database and the views display to the user.This set up the foundation of my project.
