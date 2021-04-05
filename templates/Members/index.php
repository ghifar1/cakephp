<?php
$this->disableAutoLayout();
$session = $this->request->getSession();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Hello, world!
    </title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Struktur
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)
              </span>
                </a>
            </li>
            <?php if($session->check('Auth.user')) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build('/edit', ['fullBase' => true]); ?>">Edit
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build('/login', ['fullBase' => true]); ?>">Login
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="text-center">
        <?= $this->Html->image('logohimti.png', array('alt' => 'logohimti', 'width' => '100px')); ?>
        <h1>Struktur HIMTI 2022
        </h1>
    </div>
    <div class="bagan rounded p-3 mt-4" style="background-color: #d6d6d6;">
        <div class="d-flex justify-content-center m-2">
            <div class="text-center border border-primary rounded" style="width: 200px;">
                <h3>
                    <b>Ketua
                    </b>
                </h3>
                <hr>
                <?php foreach ($members as $index => $data) { ?>
                <h5>
                    <?php if($data->role == 'ketua') {
                        echo $data->name;
                    } ?>
                </h5>
                <?php } ?>
            </div>
        </div>
        <div class="d-flex justify-content-center m-2">
            <div class="text-center border border-primary rounded" style="width: 200px;">
                <h3>
                    <b>Wakil
                    </b>
                </h3>
                <hr>
                <?php foreach ($members as $index => $data) { ?>
                    <h5>
                        <?php if($data->role == 'wakil') {
                            echo $data->name;
                        } ?>
                    </h5>
                <?php } ?>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-around m-2">
            <div class="text-center border border-primary rounded m-1" style="width: 200px;">
                <h3>
                    <b>Divisi Kreatif
                    </b>
                </h3>
                <hr>
                <?php foreach ($members as $index => $data) { ?>
                    <h6>
                        <?php if($data->role == 'divkreatif') {
                            if($data->position == 'koordinator')
                            {
                                echo '<b>'.$data->name.'</b>';
                            } else {
                                echo $data->name;
                            }
                        } ?>
                    </h6>
                <?php } ?>
            </div>

            <div class="text-center border border-primary rounded m-1" style="width: 200px;">
                <h3>
                    <b>Divisi Litbang
                    </b>
                </h3>
                <hr>
                <?php foreach ($members as $index => $data) { ?>
                    <h6>
                        <?php if($data->role == 'divlitbang') {
                            if($data->position == 'koordinator')
                            {
                                echo '<b>'.$data->name.'</b>';
                            } else {
                                echo $data->name;
                            }
                        } ?>
                    </h6>
                <?php } ?>
            </div>

            <div class="text-center border border-primary rounded m-1" style="width: 200px;">
                <h3>
                    <b>Divisi HR
                    </b>
                </h3>
                <hr>
                <?php foreach ($members as $index => $data) { ?>
                    <h6>
                        <?php if($data->role == 'divhr') {
                            if($data->position == 'koordinator')
                            {
                                echo '<b>'.$data->name.'</b>';
                            } else {
                                echo $data->name;
                            }
                        } ?>
                    </h6>
                <?php } ?>
            </div>

            <div class="text-center border border-primary rounded m-1" style="width: 200px;">
                <h3>
                    <b>Divisi Humas
                    </b>
                </h3>
                <hr>
                <?php foreach ($members as $index => $data) { ?>
                    <h6>
                        <?php if($data->role == 'divhumas') {
                            if($data->position == 'koordinator')
                            {
                                echo '<b>'.$data->name.'</b>';
                            } else {
                                echo $data->name;
                            }
                        } ?>
                    </h6>
                <?php } ?>
            </div>

            <div class="text-center border border-primary rounded m-1" style="width: 200px;">
                <h3>
                    <b>Divisi TI
                    </b>
                </h3>
                <hr>
                <?php foreach ($members as $index => $data) { ?>
                    <h6>
                        <?php if($data->role == 'divti') {
                            if($data->position == 'koordinator')
                            {
                                echo '<b>'.$data->name.'</b>';
                            } else {
                                echo $data->name;
                            }
                        } ?>
                    </h6>
                <?php } ?>
            </div>

        </div>

    </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>
