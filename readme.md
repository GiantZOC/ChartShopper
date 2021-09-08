This app is hosted on DigitalOcean https://chart-shopper-r2xgp.ondigitalocean.app


This project was created with the starter kit cretueusebiu/laravel-vue-spa
Main features of the kit:
- Laravel 8
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- Socialite integration (allows social logins)
- Bootstrap 5 + Font Awesome 5
- Hot module replacement
- Eloquent Syntax


This was to help reduce the initial overhead of creating the project from scratch.  I chose Laravel, Vue and Bootstrap because they are some of my favorite tools.  This project is an SPA by request.

This website uses a MySQL database for the backend.


The users available for login are:
1. user: test1@test.com password: password
2. user: test2@test.com password: password
3. user: test3@test.com password: password


Additional features this application could use are a better frontend, including the shopping cart on all pages, allowing guests to purchase charts.


Files and Folders of note for those unfamiliar with laravel:
- resources/js/pages contains the vue.js pages I added
- resources/js/router/routes.js contains the vue router endpoints for the frontend
- routes/api/php contains the api endpoints that are available
- app/http/controllers contains the controllers for the api
- app/http/models contains the object models
- database/migrations has the code that creates the database structure
- database/seeders contains the code that inserts the initial data for the database


Assuming you have laravel and composer on your machine this project can be run locally
it is necessary to setup the mysql database with a name, user, password which is set in the .env file

```
composer install
npm install
php artisan migrate
php artisan db:seed
php artisan serve

//dev
npm run dev

//prod
npm run build
```