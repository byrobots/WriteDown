# WriteDown
A simple Markdown blogging platform.

## DO NOT USE
WriteDown is currently in development. There will be breaking changes until a
release is tagged.

## About this Frontend
This is the simplest frontend. It allows WriteDown to be run in one PHP hosting
environment.

## Installation
These instructions are temporary. Before any release candidate is tagged they'll
likely be tidied up and simplified.

1. `git clone git@github.com:byrobots/writedown.git && cd writedown` - Clone the
repository and move into the directory.
2. `cp .env.sample .env` - Copies the blank config file to what will be the
live, in use one. Edit accordingly. Config value descriptions are available
below.
3. `npm install && composer install` - Install frontend build tools and PHP
dependencies.
4. `./vendor/bin/phinx migrate` - Run database migrations. This will create the
tables necessary for WriteDown to work.
5. `./vendor/bin/phinx seed:run` - Populates WriteDown with initial required
data. This will generate your admin user based on information set in `.env`.
6. `grunt default` - Builds frontend assets.

### Config Values
These are values that can be set in the `.env` file.

- `ENVIRONMENT`: The environment this instance of WriteDown is running in.
- `DB_DATABASE`: The database to use. For now this contains the relative path
to the sqlite file.
- `DB_DRIVER`: For now only `sqlite` is supported.
- `MAX_ITEMS`: When paginating resources (e.g. posts) this is the maximum number
of items that will be displayed on one page.
- `SEED_USER_EMAIL`: Email that will be inserted as the first admin user when
seeding the database.
- `SEED_USER_PASSWORD`: Password for the user above.

## Basic Development Environment
WriteDown will happily run using PHP's built in web server. To use this, run the
following in your terminal:

`cd ~/path/to/writedown/public && php -S localhost:8000`

WriteDown will be available in your browser at `http://localhost:8000`.
