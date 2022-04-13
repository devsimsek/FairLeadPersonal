<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page->title ?? "Home" ?> | <?= $app->name ?></title>

    <!-- SEO Tags -->

    <!-- Application Styles -->
    <link rel="stylesheet" href="/assets/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <style>
        .list-group .list-group-item {
            background-color: var(--bs-dark);
            color: var(--bs-light);
        }

        .list-group .list-group-item:hover {
            background-color: var(--bs-gray-dark);
        }
    </style>
    <?= $scripts ?? null ?>
</head>
<body>