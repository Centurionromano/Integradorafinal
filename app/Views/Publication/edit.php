<div class="container">

    <?php
    //verificamos el id de usuario en sesión y el de la publicación
    if(session()->user === $post['user']) {
    ?>
    <h2>Actualizar publicación</h2>
    <form action="publication/edit" method="post" enctype="multipart/form-data" >

        <div class="form-group">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"><?=$post['content']?></textarea>
        </div>

        <input type="hidden" name="id" value="<?=$post['id']?>">

       <div class="form-group">
           <label for="my-input">Nombre:</label>
           <input id="nombre" value="<?=$post['nombre']?>" class="form-control" type="text" name="nombre">
       </div>
   
       <div class="form-group">
           <label for="imagen">Imagen:</label>
           <br/>
           
           <img class="img-thumbnail"
                     src="<?=base_url() ?>/uploads/<?=$post['imagen'];?>"
                      width="100" alt="">

           <input id="imagen" class="form-control-file" type="file" name="imagen">
       </div>



        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        
        <a href="<?=base_url('edit');?>" class="btn btn-info">Cancelar</a>
    </form>
    <br>
    <?php
    } else {
    ?>
    <div class="alert alert-danger" role="alert">
        No tienes permiso
    </div>
    <?php
    }
    ?>
</div>
