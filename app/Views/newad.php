
<?php setlocale(LC_TIME, "esp.UTF-8"); ?>
<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
<meta charset="UTF-8">
</head>
<div class="container">


<?php
//Verificar que haya un usuario en sesión de lo contrario no se muestra el formulario
if(isset(session()->user)) {
    ?>
    <form action="Ad/add" method="post" enctype="multipart/form-data">


    
        

        <div class="form-group">
           <label for="name">Nombre:</label>
           <input id="name" value="<?=old('name')?>" class="form-control" type="text" name="name">
       </div>
   
      
       <div class="form-group">
           <label for="login">Login:</label>
           <input id="login" value="<?=old('login')?>" class="form-control" type="text" name="login">
       </div>

       <div class="form-group">
       <label for="password">Contraseña:</label>
       <input id="password" value="<?=old('password')?>" class="form-control" type="password" name="password">
       </div>


        <button type="submit" class="btn btn-primary">Crear usuario</button>



    </form>
    <br>
   <?php }?>

   <?php foreach ($posts as $item):?>
<div class="card bg-light mb-3">
    <div class="card-body">

    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Login</th>
            <th>Contraseña</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong><?=$item['id'];?></strong></td>
            <td><strong><?=$item['name'];?></strong></td>
            <td><strong><?=$item['login'];?></strong></td>
            <td><strong><?=$item['password'];?></strong></td>
        </tr>
    </tbody>
</table>

                  
           


        
        <!-- Se añaden los botones para editar y borrar -->
        <a class="btn btn-primary" href="Ad/edituser/<?=$item['id']?>"role="button">Editar</a>
        <a class="btn btn-danger" href="Ad/delete/<?=$item['id']?>"role="button">Borrar</a>
        <?php  ?>
    
        </div>
</div>
<?php endforeach; ?>
        </div>