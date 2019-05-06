# WriteDown

A simple Markdown blogging platform.

## DO NOT USE

WriteDown is currently in development. There will be breaking changes until a
release is tagged.

## Config Values

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

## Development

### Test Environment

Frontend assets can be served with
[webpack-dev-server](https://webpack.js.org/configuration/dev-server/) which
will allow for live reload as you work.

`cd ~/path/to/writedown && npm run dev`

Note that the `ENVIRONMENT` value must be set to `development` for this to work.

WriteDown will happily run using PHP's built in web server. To use this, run the
following in your terminal:

`cd ~/path/to/writedown/public && php -S localhost:8000`

WriteDown can then be accessed in your browser at `http://localhost:8000`. Note
that both of the above should be running at the same time when developing
locally.

### Debug

WriteDown uses [Kint](https://github.com/kint-php/kint) to make dumping
variables a bit nicer. Use `d($var)` to output the contents of `$var`.

### Linting

#### JavaScript

WriteDown's JavaScript follows the [Standard JS](https://standardjs.com/) code
style. To lint the code run:

`cd ~/path/to/writedown && npm run lint`

Some mistakes can be corrected automatically with:

`cd ~/path/to/writedown && npm run fix`
