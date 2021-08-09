<?php

    include("vendor/autoload.php");

    use Helpers\Auth;
    
    $auth = Auth::check();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 40%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1 class="my-5">
        <?= $auth->name ?>
        <span class="fw-normal text-muted">(<?= $auth->role ?>)</span>
    </h1>
    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-warning">
            Cannot upload file
        </div>
    <?php endif ?>
    <?php if($auth->photo): ?>
        <img
        class="img-thumbnail mb-3"
        src="_actions/photos/<?= $auth->photo ?>"
        alt="Profile Photo" width="200">
    <?php endif ?>

    <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
        </div>
    </form>
    <ul class="list-group">
        <li class="list-group-item">
            <b>Email:</b> <?= $auth->email ?>
        </li>
        <li class="list-group-item">
            <b>Phone:</b> <?= $auth->phone ?>
        </li>
        <li class="list-group-item">
            <b>Address:</b> <?= $auth->address ?>
        </li>
    </ul>
    <br>
    <a href="admin.php">Manage Users</a> |
    <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
</body>
</html>