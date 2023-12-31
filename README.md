# Customer CRUD developed in native PHP by @tomdvazq

This is a simple example of a Customer CRUD (Create, Read, Update, Delete) application developed using native PHP.

## Prerequisites

To run this application, you need to have the following software installed on your system:

- PHP (version 7 or higher)
- MySQL (or any other compatible database management system)
- Web server (e.g., Apache, Nginx)

## Installation

1. Clone or download the project to your local machine.
2. Import the included `contactos.sql` file into your MySQL database to create the necessary table.
3. Update the database connection settings in the `config.php` file with your own database credentials.
4. Start your web server and make sure it's configured to serve PHP files.
5. Open the application in your web browser, for example, `http://localhost/customer-crud/index.php`.

## Usage

The application allows you to perform the following operations on customer data:

- **Create**: Click on the "Add Customer" button to create a new customer. Fill in the required information in the form and submit it.
- **Read**: The list of existing customers is displayed on the main page. You can view the details of each customer by clicking on the "View" button next to their name.
- **Update**: To update customer information, click on the "Edit" button next to the customer you want to modify. Make the necessary changes in the form and save them.
- **Delete**: To delete a customer, click on the "Delete" button next to their name. A confirmation prompt will appear, and upon confirmation, the customer will be removed from the database.
- **Search**: You can search for a specific customer by entering their name or other details in the search bar provided on the main page. The application will display the matching results based on your search query.