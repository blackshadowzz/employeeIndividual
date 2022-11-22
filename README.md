<h3>Individual Assignment</h3>
<hr>

How to open this project 
1. Run command: composer install
2. Run command: config .env file and database 
3. Run command: php artisan key:generate
4. Run command: php artisan migrate 
5. Run command: php artisan serve 

<hr>
<h4>database table</h4>
+ employees
	- id
	- first_name
	- last_name
	- fullname[ optional ]
	- gender
	- phone
	- email
	- address
	- city
	- province
	- image_path
	- position_id

+ positions
	- id
	- name
	- Roll
	- department_id
+ department
	- id
	- name 
	- description