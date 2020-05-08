<h1>Gestion de categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">Crear categoria</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>Acciones</th>
    </tr>
    <?php while($cat = $categorias->fetch_object()): ?>
        <tr>
            <td><?=$cat->id;?></td>
            <td><?=$cat->nombres;?></td>
            <td>
                <a href="<?=base_url?>categoria/crear" class="button">Editar</a>
                <a href="<?=base_url?>categoria/delete&id=<?=$cat->id?>" class="button button-categoria button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>