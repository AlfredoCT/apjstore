<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'Usuario registrado con exito'): ?>
        <strong class="alert_green">Usuario registrado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'Algo fallo, intentalo nuevamente'): ?>
        <strong class="alert_red">Algo fallo, intentalo nuevamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombres">Nombre</label>
    <input type="text" name="nombre"  />

    <label for="apellidos">Apellido</label>
    <input type="text" name="apellido"  />

    <label for="email">Correo</label>
    <input type="email" name="email"  />

    <label for="password">Contraseña</label>
    <input type="password" name="password"  />

    <input type="submit" value="registrarse" />
</form>