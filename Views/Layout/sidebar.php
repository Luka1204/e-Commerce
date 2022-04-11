<!--BARRA LATERAL-->
<aside id="aside">
    <?php if (isset($_SESSION['identity'])) : ?>
        <div id="cart-div" class="block_aside">
            <h3>Mi Carrito</h3>
            <ul>
                <?php $stats = Utils::statsCarrito()?>
                <li><a href="<?= base_url ?>carrito/index">Productos (<?=$stats['count']?>)</a></li>
                <li><a href="<?= base_url ?>carrito/index">Total: <?=$stats['total']?>$ </a></li>
                <li><a href="<?= base_url ?>carrito/index">Ver el Carrito</a></li>
            </ul>
        </div>
    <?php endif; ?>
    <div id="login" class="block_aside">

        <?php if (!isset($_SESSION['identity'])) : ?>
            <h3>Entrar a la WEB</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="txtEmail">Email</label>
                <input type="email" name="txtEmail" id="txtEmail">

                <label for="txtEmail">Contraseña</label>
                <input type="password" name="txtPass" id="txtPass">

                <input type="submit" value="Ingresar">
            </form>

        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>
        <ul>
            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="">Gestionar Pedidos</a></li>
                <li><a href="<?= base_url ?>producto/gestion">Gestionar Productos</a></li>
                <li><a href="<?= base_url ?>categoria/index">Gestionar Categorias</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['identity'])) : ?>
                <li><a href="">Mis Pedidos</a></li>
                <li><a href="<?= base_url ?>usuario/logout">Cerrar Sesion</a></li>
            <?php else : ?>
                <li><a href="<?= base_url ?>usuario/registro">No tienes cuenta?Registrate!</a></li>
        </ul>
    <?php endif; ?>

    </div>
</aside>

<!--CONTENIDO CENTRAL-->
<div id="central">