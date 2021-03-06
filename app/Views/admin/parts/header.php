<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>WriteDown - <?= $pagetitle ?></title>

    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow" id="masthead">
    <a href="https://www.by-robots.com">
        <img alt="By Robots" src="/img/logo-tiny.png" srcset="/img/logo-tiny@2x.png 2x">
    </a>
    <h2 class="my-0 mr-md-auto font-weight-normal">WriteDown</h2>

    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/admin/posts">Posts</a>
        <a class="p-2 text-dark" href="/admin/tags">Tags</a>
        <a class="p-2 text-dark" href="/admin/users">Users</a>
        <a class="btn btn-outline-warning" href="/admin/logout">Logout</a>
    </nav>
</div>

<div class="container">
    <div class="row">
        <h1 class="col-12 col-sm-6"><?= $pagetitle ?></h1>

        <div class="col-12 col-sm-6">
            <nav class="nav nav-pills nav-justified subnav">
                <?= isset($subnav) ? $subnav : '' ?>
            </nav>
        </div>
    </div>

    <?php if (isset($success) and !empty($success)) { ?>
        <span class="alert alert-success"><?= $success ?></span>
    <?php } ?>

    <?php if (isset($error) and !empty($error)) { ?>
        <span class="alert alert-danger"><?= $error ?></span>
    <?php } ?>

    <?php if (isset($errors) and count($errors) > 0) { ?>
        <span class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $fieldErrors) {
                    foreach ($fieldErrors as $singleError) { ?>
                        <li><?= $singleError ?></li>
                    <?php }
                } ?>
            </ul>
        </span>
    <?php } ?>
