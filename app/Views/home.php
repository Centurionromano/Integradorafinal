<div class="container">
    <h2>Iniciar sesión</h2>
    <form action="user/login" method="post">
        <div class="form-group">
            <Label for= "login">Nombre de usuario</label>
            <input class="form-control" name="login">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">
</div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>
</div>



<div class="container">
    <?php if(isset(session()->login_error)) {?>
    <div class="alert alert-danger" role="alert">
    <?=session()->login_error?>
    </div>
   <?php }?>
   <h1>Página de inicio</h1>

   <a href="<?=base_url('admin');?>" class="btn btn-info">Administrador</a>
