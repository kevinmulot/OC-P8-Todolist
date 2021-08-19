# ToDoList

My eighth OpenClassRooms Project with PHP/Symphony.

[![Maintainability](https://api.codeclimate.com/v1/badges/ee13f5da60e8aefe708f/maintainability)](https://codeclimate.com/github/kevinmulot/OC-P8-Todolist/maintainability)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/4bb2a9a45a5041a084d04b77d660116d)](https://www.codacy.com/gh/kevinmulot/OC-P8-Todolist/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=kevinmulot/OC-P8-Todolist&amp;utm_campaign=Badge_Grade)
![OenClassRooms](https://img.shields.io/badge/OpenClassRooms-DA_PHP/SF-blue.svg)
![Project](https://img.shields.io/badge/Project-8-blue.svg)

---

## Installation

### Prerequisites

Install GitHub (<https://gist.github.com/derhuerst/1b15ff4652a867391f03>) \
Install Composer (<https://getcomposer.org>) \

Symfony 4.4 requires PHP 7.1.3 or higher to run.\
Prefer MySQL 5.6 or higher.

### Download

[![Repo Size](https://img.shields.io/github/repo-size/kevinmulot/OC-P8-Todolist?label=Repo+Size)](https://github.com/kevinmulot/OC-P7-BileMo) \
Execute the following command line to download the project into your chosen directory :

```shell
git clone https://github.com/kevinmulot/OC-P8-Todolist.git
```

Install dependencies by running the following command :

```shell
composer install
```

### Database

Set your database connection in the **.env** file (l.28).

```shell
DATABASE_URL=mysql://username:password@127.0.0.1:3306/todolist?serverVersion=5.7
```

Create database:

```shell
php bin/console doctrine:database:create
```

Build the database structure using the following command:

```shell
php bin/console doctrine:migrations:migrate
```

Load the data fixtures

```shell
php bin/console doctrine:fixtures:load
```

### Run the application

Launch the Apache/Php runtime environment by using :

```shell
php bin/console server:run
```

### Default Admin credentials

Default username ```admin```\
Default password for the Admin is ```admin```

### Default User credentials

Default username ```user#```\
Default password for the user is ```user#```

## Support

ToDoList has continuous support !

[![Project Maintained](https://img.shields.io/maintenance/yes/2021.svg?label=Maintained)](https://github.com/kevinmulot/OC-P8-Todolist)
[![GitHub Last Commit](https://img.shields.io/github/last-commit/kevinmulot/OC-P8-Todolist.svg?label=Last+Commit)](https://github.com/kevinmulot/OC-P8-Todolist/commits/master)

## Issues

Issues can be created here.

[![GitHub Open Issues](https://img.shields.io/github/issues/kevinmulot/OC-P8-Todolist.svg?label=Issues)](https://github.com/kevinmulot/OC-P8-Todolist/issues)

## Pull Requests

Pull Requests can be created here.

[![GitHub Open Pull Requests](https://img.shields.io/github/issues-pr/kevinmulot/OC-P8-Todolist.svg?label=Pull+Requests)](https://github.com/kevinmulot/OC-P8-Todolist/pulls)

## Copyright

Code released under the MIT License.

[![GitHub License](https://img.shields.io/github/license/kevinmulot/OC-P8-Todolist.svg?label=License)](https://github.com/kevinmulot/OC-P8-Todolist/blob/master/LICENSE.md)
