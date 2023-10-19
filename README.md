<h1 align="center">Coronatime</h1>

### Contents:
* [Introduction](#introduction)
* [Prerequisites](#prerequisites)
* [Technical Requirements](#technical-requirements)
* [Getting Started](#getting-started)
* [Migration](#migration)
* [Development](#development)

### Introduction

Coronatime is a website where you can check the statistics of covid19 (including deaths, recoveres and new cases) across the world. The website has registration and login functionalities and a mail notification system. Using the command "command:getStatistics" we get the data from "https://devtest.ge/countries" (no longer availiable). And then the data can be checked on the countries dashboard. The data can also be sorted alphabetically or by quantity. The website supports two languages: English and Georgian.

This project was made for learning/practice purposes.

<p align="center"><img src="https://i.ibb.co/my9Y19C/Screenshot-from-2023-10-19-17-07-18.png" width="800"></p>

<p align="center"><img src="https://i.ibb.co/vZm3ttR/Screenshot-from-2023-10-19-17-07-49.png" width="800"></p>


### Prerequisites
 * PHP@8.0 and up
 * SQLite@3.0 and up
 * composer@2 and up

### Technical Requirements
 * [Laravel@8.x](https://github.com/laravel/laravel) - back-end framework

### Getting Started
1\. First of all you need to clone Movie Quotes repository from github:
```sh
git clone https://github.com/naa15/coronatime.git
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. Now we need to set our env file. You should provide **.env** file the necessary environment variables:
#
**SQLite:**
>DB_CONNECTION=sqlite

>FILESYSTEM_DRIVER=public

#
### Migration
if you've completed getting started section, then migrating database if fairly simple process, just execute:
```sh
php artisan migrate
```


#
### Development

Now you should link storage to public to display photos:

```sh
  php artisan storage:link
```

Then you should run the command:

```sh
  php artisan command:getStatistics
```


You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```