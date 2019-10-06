# Klavye Delikanlıları Digital Library

Book Exchange Program and Digital Library

## Requirements

- PHP >=7.1.3
- Composer
- NPM
- Git

## Install Requirements

```sh
$ sudo apt update
$ sudo apt install php-7.2
$ curl -sS https://getcomposer.org/installer -o composer-setup.php
$ sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
$ sudo apt install npm
$ sudo apt install git
```

## Installation

```sh
$ git clone https://github.com/derectus/kd-library.git
$ cd kd-library
$ composer install
$ npm install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link
```
and fill required env variables in the **.env** file and run following command for filling database.

`$ php artisan migrate --seed`

## Deploy to live
See this document: [https://laravel.com/docs/5.8/deployment]()

## Similar Projects
See the [https://github.com/arkakapi/digital-library]( Arka Kapı Digital Library )

## License
 This software is licensed under [GNU AGPL v3](https://www.gnu.org/licenses/agpl-3.0.html). For details, please read LICENSE file.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.
