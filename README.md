My Pet Project : 
This project is built using the Laravel framework and follows the MVC (Model-View-Controller) pattern.  
It is a simple app where users can register, login and create,edit,and delete pets (CRUD create/read/update/delete) I will do this using Laravel’s Eloquent models and Blade views.

LARAVEL :
Laravel is a framework for building web applications using PHP.PHP runs on the server to handle data and logic, while Laravel helps structure the code, manage the database, and build pages efficiently.Laravel makes building web applications easier and more organised using the model view controller pattern (mvc). The Model represents my data and logic, for example my pet table which will hold all my pet information like name,specie etc. The View is what the user sees and interacts with. This shows the front end pages html using blade templates. The Controller is the logic that makes the model and view work together.This handles the requests and data and sends the recieved data to the view.For example my petController.
Laravel uses migrations which allow tables to be created and updated.Seeders are then used to fill the database with sample data for testing.Eloquent is Laravel’s way of talking to the database using PHP functions instead of SQL

App development 
ERD:
In the first week I created an ERD diagram to set up my tables and relationships.I decided to do my project on a pet system.This includes a main pet table that I will work on for this assigment.

Project setup:
I then set up and instlalled laravel,composer and node.js to create my project.I focused on implemeting user authentication.I installed laravel breeze with blade templates to handle all views and routes automatically. This provides the structure for registration,login and logout. 
During the setup i selected mySQL as my database. I ran a migration for my pet table and added a resouce controller to manage CRUD (petController). I then genrated a seeder to populate the database with data. I created the views that show the list of pets,create page,show pet and edit page.

This process showed me how it all connects, the controller manages the requests,the model interacts with the database and the views display to the user.This set up the foundation of my project.

View all Pets:
To view all pets in the database i set up my routes page in web.php. Routes define how my app respons to url requests and tells laravel which code to run when a url is clicked. In my petcontroller the /pets route triggers the index() method.My pet data is then passed to my index.blade.php view and displayed to the user. I created a pet card componant to fomrat and style each pet. This is how laravel helps to organise and present repeating elements.This created a html page by looping through my pets and showing each pet card. 

Blade componants: 
I created a custom Blade component to improve the styling and organisation of my page. This is a reasuable piece of code that makes it easier to maintain my views.
I created a Pet-card componant that displayes all its attributes (name,specie,age,description,image).I can then reuse this for different pages like the view all or show individual pet.Breeze uses tailwind css styling which allows me to style the componant quickly. I explored different styling options on sites such as https://nerdcave.com/tailwind-cheat-sheet to give me some idea of my style options.This step prepared the project for more complex layouts and interactive UI elements while keeping the code clean and maintainable.

Show pets:
Once I had my view all pets working I then moved on to implemting a page for individual pets.When the user clicks on a pet it should bring you to a seporate page with the details for that one pet. Each pet will have a link attached that will direct the page to the detail page using a pets.show route.I added the show() method to the PetController, which retrieves the selected pet and passes it to the pets/show.blade.php view. To make the page visually appealing and maintain a consistent design I then created a pet-details component, like the pet-card componant but this particular component formats the pets’s information in a reusable and asthetic layout.By creating these two components, I learned how Laravel components can adapt to different use cases while still being reusable and maintainable. Each component serves a distinct purpose in the application but follows the same design and coding conventions, making the codebase cleaner and easier to manage.
This step really showed me how routes and controllers all worked together to format an interactalble page while looking good also.

Create & Store :

To create a new pet, the user adds a pet through a form and saves the entry. If successful, a success message appears. I started this process by adding the routes (pets.create and pets.store) in web.php to handle navigation when the user clicks “Add New Pet.”
The PetController’s create() method loads the create view, which displays a form for entering pet details. To make the form reusable (for both creating and editing pets), I created a petForm component. When the form is submitted, the store() method in PetController validates the input, inserts the new pet into the database, and redirects the user back to the index page.
I implemented validation in the store() method to ensure all required fields are correctly filled and that the data is in the proper format. This prevents invalid or incomplete data from being saved. I used Laravel’s old() helper in the form fields to retain the user’s previously entered input if validation fails, so users don’t have to retype everything. I tested all fields to ensure the validation worked as expected.
For the success message component, the store() method sets a session flash message after inserting a new pet. The component checks for the success message and displays it with Tailwind CSS styling (green box). This approach passes temporary data between requests using Laravel’s session flash messages. By implementing this component, I ensured that after a user creates a pet, they are instantly informed of success, and the logic for displaying the message is cleanly separated from the main page content.
While adding this functionality, I also learned about mass assignment protection in Laravel. Laravel blocks fields from being saved automatically for security reasons, so I had to list the attributes in the Pet model that are allowed to be saved.

Edit & Delete:
To edit my pet details I started by adding my routes, edit and update route to handle the edit form and the submission of the edited form.
On my index page i added an edit button for each pet linking the pets.edit route.The PetController’s edit() method retrieves the selected pet and passes it to the pets/edit.blade.php view.When creating a new pet, the form routes to pets.store and uses the POST method. POST is used to submit new data to the server.When editing an existing pet, the form routes to pets.update and uses the PUT/PATCH method instead of POST. PUT and PATCH are HTTP methods used to update existing data on the server.At first, I had trouble understanding the difference between POST and PUT/PATCH because they all involve sending data to the server.However trying to understand this distinction helped me see how Laravel separates creating and updating resources, and why it’s important to use the correct method to avoid conflicts or errors in the application.
After submitting the edit form, the user is redirected back to the index page with a success message. While implementing this, I encountered some challenges because the same form component was used for both creating and editing pets. One issue was the image field requiring a new upload even when the user didn’t want to change it.When updating a pet, I implemented logic to handle optional image uploads. This ensures that if the user doesn’t choose a new image, the old image is retained, but if a new image is uploaded, it replaces the old one.If the pet already has an image and the file exists in the public/images folder, it is deleted using unlink(). This prevents old images from taking up space unnecessarily.I done some research on this - https://laravel.com/docs/10.x/filesystem#storing-uploaded-files, 
https://laravel.com/docs/10.x/eloquent#updating-models and also some youtube tutorials.

I also added the delete button on the index page to delete pets. In my web.php there is a resource route that automatically has a destroy route.I added a confirmation to the form as an extra safety method.
Once this was done I tested all my crud methods and can now move on to further styling.


Filtering:
I implemented a species filter and styled components using Tailwind CSS. This improved usability and made the UI more interactive and visually appealing.The form uses GET to send the selected species to the pets.index route as a query parameter. The <select> dropdown lists all species options, and the current selection is retained using {{ request('species') == 'Cat' ? 'selected' : '' }}. When the user clicks Go, the form submits the choice, which the controller uses to filter pets displayed on the page. Tailwind CSS classes style the form neatly.I understand that this filter is hard-coded and would not automatically include new species added to the database, but this is the only way I currently understand how to implement it.For more complex projects I will try and devlop on this.

Styling:
For styling, I used Tailwind CSS to make the app visually appealing. I added images, logos, and adjusted layouts to improve the look of the pages. I also customized the dashboard and welcome page to match the design of my pet project.
While doing this, I ran into challenges with user-specific content. To handle this, I used the Blade directive @guest to show certain elements only to visitors who are not logged in, ensuring the dashboard and welcome page displayed correctly depending on authentication. I also had to carefully overwrite some styles on the show page to maintain a consistent appearance.
These experiences helped me understand how to combine Blade directives and Tailwind styling to manage different user views and layouts effectively.

While styling I also added a cancel button on my edit page to give the user an oppurtunity to go back to the show page and not save any changes made.

What I learned:
Throughout this project, I learned how Laravel’s MVC structure connects every part of an application. I learned how routes handle user navigation, controllers manage logic, models interact with the database, and Blade views display the results. I became more confident working with CRUD operations.I also learned about form validation, using old() to retain user input, and how session flash messages can give users instant feedback. Implementing features like image upload and deletion taught me how Laravel handles files securely and efficiently. Most importantly, this project helped me understand how each layer of Laravel works together to build a complete, functional web app, from data handling to user experience and design.

One thing I also learned during this project is the importance of making incremental commits. Initially, I only committed once at the end of each day and synced my work, rather than explaining each step in my commit messages. I now understand that commits should clearly describe the changes made at each stage of development, which helps with tracking progress and makes collaboration easier. Moving forward, I will make smaller, descriptive commits regularly.


References :
https://laravel.com/docs/5.5/middleware
https://tailwindcss.com/docs/installation/using-vite
https://flowbite.com/docs/components/buttons/?utm_source=chatgpt.com
https://tailwindcss.com/plus/ui-blocks
https://nerdcave.com/tailwind-cheat-sheet
https://laravel.com/docs/12.x/eloquent