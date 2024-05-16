<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Publicaciones</title>
</head>
<body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Publicaciones MVC</a>
        </li>
       <?php if(isset(session()->user)) { ?>
       </li>
       <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?=session()->name?></a>
       </li>
       <li>
        <a class="nav-link" href="<?=base_url('logout')?>">Salir</a>
       </li>
    <?php } ?>

    </ul>



