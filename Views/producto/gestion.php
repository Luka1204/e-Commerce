<h1>Gestionar productos</h1>


<a href="<?= base_url ?>producto/crear" class="button button-small">Crear Producto</a>

<!---VALIDACION SESION PRODUCTO CREADO-->
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'completed') : ?>
    <div class="container-alert">
        <strong class="alert_green">El producto se ha guardado correctamente!</strong>
    </div>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed') : ?>
    <div class="container-alert">
        <strong class="alert_red">Hubo un error!, Por favor intente nuevamente</strong>
    </div>
<?php endif; ?>
<?php Utils::deleteSession('producto')?>
<!---FIN VALIDACION SESION PRODUCTO CREADO-->

<!---VALIDACION DE LA SESSION DELETE-->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed') : ?>
    <div class="container-alert">
        <strong class="alert_green">El producto fue eliminado!</strong>
    </div>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed') : ?>
    <div class="container-alert">
        <strong class="alert_red">Hubo un error!, Por favor intente nuevamente</strong>
    </div>
<?php endif; ?>
<?php Utils::deleteSession('delete')?>
<!---FIN VALIDACION DE LA SESSION DELETE-->
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Operacion</th>
    </tr>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
            <td><a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="fas fa-edit"></a></td>
            <td><a href="<?=base_url?>producto/borrar&id=<?=$pro->id?>" class="far fa-trash-alt"></a></td>
        </tr>
    <?php endwhile; ?>
</table>