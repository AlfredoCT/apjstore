<!DOCTYPE HTML>
<html lang = "es">
    <head>
        <meta charset="utf-8" />
        <title>APJ Store</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
        <link  rel="icon"   href="<?=base_url?>assets/img/favicon.ico" type="image/png" />
    </head>
    <body>
        <div id="container">
            <!--CABECERA-->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/logo.png" alt="Logo APJ store" />
                    <a href="<?=base_url?>">
                        Tienda de regalos
                    </a>
                </div>
            </header>

            <!--MENU(CATEGORIAS)-->
            <?php $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>">Inicio</a>
                    </li>
                    <?php while($cat = $categorias->fetch_object()): ?>
                        <li>
                            <a href="#"><?=$cat->nombres?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </nav>

            <!--BARRA LATERAL(LOGIN/REGISTER)-->
            <div id="content">