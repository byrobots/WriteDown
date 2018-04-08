<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>WriteDown</title>

    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
    <div class="container login-container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6 col-lg-2 offset-lg-3">
                <header class="login-header">
                    <h2 class="logo-header">
                        <img alt="By Robots" src="/img/logo-small.png" srcset="/img/logo-small@2x.png 2x">
                    </h2>
                    <h1 class="title-header h3">WriteDown</h1>
                </header>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <form class="login-form" action="/admin/login" method="post">
                    <input type="hidden" name="csrf" value="<?= $csrf ?>">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/admin.js"></script>
</body>
</html>
