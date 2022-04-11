<!DOCTYPE HTML>

<html lang ="es">
    <head>
        <meta charset="UTF-8">
        <title>E-Shirts</title>
        <link rel="stylesheet" href="<?=base_url?>Assets/CSS/styles.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <!--CABECERA-->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>Assets/IMG/camiseta.png" alt="alt"/>
                    <a href="<?=base_url?>index.php">
                        E-Shirts
                    </a>

                </div>
            </header>
            <!--MENU-->
            <?php $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li><a href="<?=base_url?>index.php">Inicio</a></li>
                  <?php while($cat = $categorias->fetch_object()):?>
                    <li><a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>

                    <?php endwhile; ?>
                </ul>

            </nav>

            <div id="content">