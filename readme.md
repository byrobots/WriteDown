# WriteDown
A simple Markdown blogging platform.

## DO NOT USE
WriteDown is currently in development. There will be breaking changes until a
release is tagged.

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

### Debug
WriteDown uses [Kint](https://github.com/kint-php/kint) to make dumping
variables a bit nicer. Use `d($var)` to use it.

WriteDown will be available in your browser at `http://localhost:8000`.
