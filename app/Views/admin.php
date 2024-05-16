<div class="container">
    <h2>Solo administradores</h2>
    <form action="Ad/login" method="post">
        <div class="form-group">
            <Label for= "login">Usuario de administrador</label>
            <input class="form-control" name="login">
</div>
<div class="form-group">
    <label for="password">Contraseña de administrador</label>
    <input type="password" class="form-control" name="password">
</div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    <a href="<?=base_url('home');?>" class="btn btn-danger">Regresar</a>
</form>

</div>

<div class="container">


    <?php if(isset(session()->login_error)) {?>
    <div class="alert alert-danger" role="alert">
    <?=session()->login_error?>
    </div>
   <?php }?>

  
  

  