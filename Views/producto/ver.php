<?php if (isset($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>
    <div id="detail-product">
        <div class="image-product">
            <?php if ($pro->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="alt" />
            <?php else : ?>
                <img src="<?= base_url ?>Assets/IMG/camiseta.png" alt="Imagen no disponible" />
            <?php endif; ?>
        </div>
        <div class="info">
            <h2 class="name"><?= $pro->nombre ?></h2>
            <p class="desc"><?= $pro->descripcion ?></p>
            <b class="price"><?= $pro->precio ?>$</b>
            <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>El producto no existe!</h1>

<?php endif; ?>