# WriteDown
A simple Markdown blogging platform.

## DO NOT USE
WriteDown is currently in development. There will be breaking changes until a
release is tagged.

## Installation
These instructions are temporary.

1. `git clone git@github.com:byrobots/writedown.git`
2. `cd writedown`
3. `cp .env.sample .env` and edit accordingly.
4. `npm install && composer install`
5. `./vendor/bin/phinx migrate`
6. `./vendor/bin/phinx seed:run`
7. `grunt default`

## Migrations
Migrations are built using [Phinx](https://phinx.org/). Documentation is
available [here](http://docs.phinx.org/en/latest/index.html).


