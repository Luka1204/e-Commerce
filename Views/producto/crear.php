<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar Producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url . "producto/save&id=".$pro->id; ?>
<?php else : ?>
    <h1>Crear Producto</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif ?>

<div class="form_container">
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="txtNombre">Nombre</label>
        <input type="text" name="txtNombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>">

        <label for="txtDesc">Descripción</label>
        <textarea name="txtDesc" value="<?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?>"></textarea>

        <label for="txtPrecio">Precio</label>
        <input type="number" name="txtPrecio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>">

        <label for="txtStock">Stock</label>
        <input type="number" name="txtStock"value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>">

        <label for="txtCat">Categoria</label>
        <?php
        $categorias = Utils::showCategorias() ?>
        <select name="txtCat">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>"<?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '';?>>
                    <?= $cat->nombre ?>
                </option>

            <?php endwhile; ?>
        </select>

        <label for="txtFecha">Fecha</label>
        <input type="date" name="txtFecha">

        <label for="imagen">Imagen</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb">
            <?php endif; ?>
        <input type="file" name="imagen">

        <?php if (isset($edit)) : ?>
            <input type="submit" value="Guardar Cambios">
        <?php else : ?>
            <input type="submit" value="Crear">
        <?php endif; ?>

    </form>
</div>