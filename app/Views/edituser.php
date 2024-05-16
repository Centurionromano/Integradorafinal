<div class="container">

   
    <h2>Actualizar usuario nuevo</h2>
    <form action="ad/edit" method="post" enctype="multipart/form-data" >







       <input type="hidden" name="id" value="<?=$post['id']?>">

       <div class="form-group">
           <label for="name">Nombre:</label>
           <input id="name" value="<?=old('name', $post['name'])?>" class="form-control" type="text" name="name">
       </div>

       
      
       <div class="form-group">
           <label for="login">Login:</label>
           <input id="login" value="<?=old('login', $post['login'])?>" class="form-control" type="text" name="login">
       </div>

       <div class="form-group">
       <label for="password">Contraseña:</label>
       <input id="password" value="<?=old('password', $post['password'])?>" class="form-control" type="password" name="password">
       </div>



        
        <button type="submit" class="btn btn-primary">Actualizar</button>

        
        <a href="<?=base_url('newad');?>" class="btn btn-info">Cancelar</a>
    </form>
    <br>
   
</div>
