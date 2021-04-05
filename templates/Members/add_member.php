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

    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Struktur</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= $this->Url->build('/struktur', ['fullBase' => true]); ?>"">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if($session->check('Auth.user')) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build('/edit', ['fullBase' => true]); ?>">Edit</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build('/login', ['fullBase' => true]); ?>">Login</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 400px">
            <div class="card-body">
                <?php if($error) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                         <?= $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <?= $this->Form->create($member) ?>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="role">
                        <option selected></option>
                        <option value="ketua">Ketua</option>
                        <option value="wakil">Wakil</option>
                        <option value="divhr">Divisi HR</option>
                        <option value="divhumas">Divisi humas</option>
                        <option value="divkreatif">Divisi kreatif</option>
                        <option value="divti">Divisi TI</option>
                        <option value="divlitbang">Divisi litbang</option>
                    </select>
                </div>
                <div class="form-group" id="posisi">

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

</div>
<!-- Optional JavaScript; choose one of the two! -->
<script>
    $(function ()
    {
        $('#jabatan').on('change', function (){
            $('#posisi').empty()
            var value = $(this).val()
            if(value !== "ketua" && value !== "wakil")
            {
                $('#posisi').html(`<label for="exampleFormControlSelect1">Posisi</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="position">
                        <option selected></option>
                        <option value="koordinator">Koordinator</option>
                        <option value="anggota">Anggota</option>
                    </select>`)
            } else {

            }
        })
    });
</script>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>
