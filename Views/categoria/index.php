<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">Crear Categoria</a>

<table>
     <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Operacion</th>
    </tr>
<?php while($cat = $categorias->fetch_object()) : ?>
    <tr>
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>     
        <td><a href="<?=base_url?>categoria/editar"class="fas fa-edit"></a></td>
        <td><a href="<?=base_url?>categoria/borrar"class="far fa-trash-alt"></a></td>  
    </tr>
    <?php endwhile; ?>   
</table>