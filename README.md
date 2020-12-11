# PHPTest Application / Api 🐘
You can check the project running [here](https://wribeiiro.com/php-test)

### Tecnologies

- PHP (Laravel)
- MySQL
- JavaScript with Jquery
- Authentication with JWT
- Bootstrap 4

### List of resource components and identifiers
Enpoint Auth
| resource                    |type| description                         |
|:----------------------------|:--:| :------------------------------------|
| `/auth/logout`              | POST  | logout user                         |
| `/auth/me`                  | POST  | returns logged userdata             |

Enpoint Speakers
| resource                    |type|  description                         |
|:----------------------------|:--:|------------------------------------|
| `/speakers`                 | GET  | returns all speakers                |
| `/speakers/{id}`            | GET  | return a speaker                    |
| `/speakers/update/{id}`     | PUT  |update a speaker                    |
| `/speakers/create`          | POST  | create a speaker                    |
| `/speakers/delete/{id}`     | DELETE  | delete a speaker                    |

Enpoint Events
| resource                    |type| description                         |
|:----------------------------|:--:|------------------------------------|
| `/events`                   | GET  | return all events                   |
| `/events/{id}`              | GET | return a speaker                    |
| `/events/update/{id}`       | PUT  | update a speaker                    |
| `/events/create`            | POST  | create a speaker                    |
| `/events/delete/{id}`       | DELETE  | delete a speaker                    |

Enpoint Lectures
| resource                    |type| description                         |
|:----------------------------|:--:|------------------------------------|
| `/lectures`                 | GET  |  returns all lectures                |
| `/lectures/{id}`            | GET  | returns a lecture                   |
| `/lectures/update/{id}`     | PUT  |  update a lecture                    |
| `/lectures/create`          | POST  |  create a lecture                    |
| `/lectures/delete/{id}`     | DELETE  |  delete a lecture                    |
