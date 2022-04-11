<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>

    </tr>
    <?php foreach ($carrito as $index => $elemento) :
        $producto = $elemento['producto'];
    ?>

        <tr>
            <td> <?php if ($producto->imagen != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="alt" class="img-cart" />
                <?php else : ?>
                    <img src="<?= base_url ?>Assets/IMG/camiseta.png" alt="alt" class="img-cart" />
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= base_url ?>producto/verProducto&id=<?= $producto->id ?>"> <?= $producto->nombre ?></a>
            </td>
            <td>
                <?= $producto->precio ?>
            </td>
            <td>
                <?= $elemento['unidades'] ?>
            </td>

        </tr>
    <?php endforeach; ?>
</table>

<div class="final-pedido">
    <?php $stats = Utils::statsCarrito() ?>
    <h2 class="total-price">Precio Total:<?= $stats['total'] ?>$ </h2>
    <a href="<?= base_url ?>" class="button button-pedido"> Hacer pedido</a>
</div>