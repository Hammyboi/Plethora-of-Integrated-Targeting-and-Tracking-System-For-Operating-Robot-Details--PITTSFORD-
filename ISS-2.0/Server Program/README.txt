Prerequisites:
'pip install django whitenoise mysqlclient django-cors-headers'
Will add the rest later.

Setup:
Modify settings in server/server/settings.toml to set up connection to mysql database
    You can change this using server/server/settings.py 
Create a new database that matches the name set in settings.py and you don't have to worry about creating the tables
Every year, add a new table to the database using the server/api/models.py file
Then, run 'python server/server.py makemigrations' and 'python server/server.py migrate' to create the necessary database tables
'python backend.py' runs the server
You can run the backend and the mysql database on separate servers, or use a tool like xampp to run both from same machine (recommended)

TODO:
Make a homepage
Improve the Frontend and get an image for the pfp
Create signup page and admin page for viewing and accepting/rejecting signups
Show status of server homepage and api, status of db on db page
Add a way to export from db page to excel, csv, etc.