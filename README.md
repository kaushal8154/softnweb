# Complaint Management System - Kaushal Test


URL: http://localhost/cms/public

API URL: http://localhost/cms/public/api


----------------------------------------------------------------------------------------------

Database

DB Name: cmpsys2
user: root
pwd:


sql file is given in Detail folder in the root project folder
----------------------------------------------------------------------------------------------

Users Accounts


Admin
email: admin@adminmail.com
pass: 123456



Customer (user)
email: rohit@gmail.com
pass: 123456



Technician (techie)
email: virat@gmail.com
pass: 123456
----------------------------------------------------------------------------------------------

Run below artisan commands to help setup (if need)

php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan o:clear
php artisan config:cache

----------------------------------------------------------------------------------------------



set global env variable (url) in given postman collection
After sign in, please set the bearer token in collection authorization header.

For testing purpose, pagination limit is set to 5 records per page.

Kindly run php artisan queue:work command  to process the backround queues


----------------------------------------------------------------------------------------------

