# PHPTest App / Api 🐘
Small crud developed for testing. In crud I chose to reuse the same methods used in the "api" enpoint to carry out the operations.

# Screenshot
![image](https://user-images.githubusercontent.com/20648572/112701685-5b261280-8ea2-11eb-9205-10d9f9ca7f0e.png)

You can check the project(crud) running on [endpoint](https://wribeiiro.com/php-test) and API running on [endpoint](https://www.wribeiiro.com/php-test/api/v1/speakers)

### Tecnologies

- PHP (Laravel)
- MySQL
- JavaScript with Jquery
- Authentication with JWT
- Bootstrap 4

### Getting started

Clone the repository
```bash
$ git clone https://github.com/wribeiiro/php-test
```
Switch to the repo folder
```bash
$ cd php-test
```
Install all the dependencies using composer
```bash
$ composer install
```
Generate a new application key
```bash
$ php artisan key:generate
```
Generate a new JWT authentication secret key
```bash
$ php artisan jwt:generate
```
Run the database migrations and, populate tables (Set the database params connection in .env before migrating)
```bash
$ php artisan migrate
$ php artisan db:seed
```
Start the local development server
```bash
$ php artisan serve
```

### User data test
email: admin@admin.com
pass: password

### List of resources API (Bearer Token required)
Enpoint Auth
| resource                    |type| description                          | fields|
|:----------------------------|:--:| :------------------------------------|:--:|
| `/api/v1/auth/login`               | POST  | auth user and return bearer token| [email:string, password:string] |
| `/api/v1/auth/logout`              | GET  | logout user| |
| `/api/v1/auth/me`                  | GET  | returns logged userdata| |

Enpoint Speakers
| resource                    |type|  description                         |fields|
|:----------------------------|:--:|------------------------------------|:--:|
| `/api/v1/speakers`                 | GET  | returns all speakers                | |
| `/api/v1/speakers/{id}`            | GET  | return a speaker                    | |
| `/api/v1/speakers/update/{id}`     | PUT  |update a speaker                    | |
| `/api/v1/speakers/create`          | POST  | create a speaker                    |[ name:string]|
| `/api/v1/speakers/delete/{id}`     | DELETE  | delete a speaker                   | |

Enpoint Events
| resource                    |type| description                         |fields|
|:----------------------------|:--:|------------------------------------|:--:|
| `/api/v1/events`                   | GET  | return all events                   ||
| `/api/v1/events/{id}`              | GET | return a speaker                    ||
| `/api/v1/events/update/{id}`       | PUT  | update a speaker                    ||
| `/api/v1/events/create`            | POST  | create a speaker                    |[title:string, start_date:date, end_date:date, description:string]|
| `/api/v1/events/delete/{id}`       | DELETE  | delete a speaker                  | |

Enpoint Lectures
| resource                    |type| description                         |fields|
|:----------------------------|:--:|------------------------------------|:--:
| `/api/v1/lectures`                 | GET  |  returns all lectures               | |
| `/api/v1/lectures/{id}`            | GET  | returns a lecture                  | |
| `/api/v1/lectures/update/{id}`     | PUT  |  update a lecture                  |  |
| `/api/v1/lectures/create`          | POST  |  create a lecture                  |[title:string, date:date, event_id:int, start_time:time, end_time:time, description:string, speaker_id:int]  |
| `/api/v1/lectures/delete/{id}`     | DELETE  |  delete a lecture   |                 |
