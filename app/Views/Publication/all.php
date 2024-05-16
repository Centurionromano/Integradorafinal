
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
    <form action="publication/add" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"></textarea>
        </div>

        <div class="form-group">
           <label for="nombre">Nombre:</label>
           <input id="nombre" value="<?=old('nombre')?>" class="form-control" type="text" name="nombre">
       </div>
   
       <div class="form-group">
           <label for="imagen">Imagen:</label>
           <input id="imagen" class="form-control-file" type="file" name="imagen">
       </div>


        <button type="submit" class="btn btn-primary">Publicar</button>



    </form>
    <br>
   <?php }?>

   <?php foreach ($posts as $item):?>
<div class="card bg-light mb-3">
    <div class="card-body">
        <strong><?=$item['name'];?></strong>
        <small><?= strftime("%A, %d de %B de %Y %I:%M", strtotime($item['posted_time'])); ?></small>
        <p class="card-text"><?= $item['content']; ?></p>
        
        
                    <td>

                    <img class="img-thumbnail"
                     src="<?=base_url() ?>/uploads/<?=$item['imagen'];?>"
                      width="100" alt="">
                       
                    
                    </td>
                    <td><?=$item['nombre'];?></td>
           <br>


        <?php
        //comparamos el id en sesión y el id de la publicación
        //solo el usuario que creo la publicación la puede modificar o borrar
        if(session()->user === $item['user']){
            ?>
        <!-- Se añaden los botones para editar y borrar -->
        <a class="btn btn-primary" href="publication/edit/<?=$item['id']?>"role="button">Editar</a>
        <a class="btn btn-danger" href="publication/delete/<?=$item['id']?>"role="button">Borrar</a>
        <?php }  ?>
    
        </div>
</div>
<?php endforeach; ?>
        </div>