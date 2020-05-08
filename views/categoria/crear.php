<?php if(isset($edit)): ?>
    <h1>Editar categoria</h1>
<?php else: ?>
    <h1>Crear nueva categoria</h1>
<?php endif; ?>
<a href="<?=base_url?>categoria/gestion" class="button button-small">Volver</a>

<form action="<?=base_url?>categoria/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <input type="submit" value="guardar" />
</form>
