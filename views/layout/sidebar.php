<aside id="lateral">
                    <div id="login" class="block_aside">

                        <?php if(!isset($_SESSION['identity'])): ?>
                        <h3>Login</h3>
                        <form action="<?=base_url?>usuario/login" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email" />
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" />
                            <input type="submit" value="enviar" />
                        </form>
                        <?php else: ?>
                            <h3><?=$_SESSION['identity']->nombres ?> <?=$_SESSION['identity']->apellidos ?></h3>
                        <?php endif; ?>
                        <!--ICONOS Y CONFIGUTRACION-->
                        <ul>
                            <?php if(isset($_SESSION['admin'])): ?>
                                <li><img src="<?=base_url?>assets/img/categorias.png" alt="categorias" /><a href="<?=base_url?>categoria/gestion">Gestion de Categorias</a></li>
                                <li><img src="<?=base_url?>assets/img/gproducto.png" alt="productos" /><a href="#">Gestion de Productos</a></li>
                                <li><img src="<?=base_url?>assets/img/gpedidos.png" alt="pedidos" /><a href="#">Gestion de pedidos</a></li>
                            <?php endif; ?>
                            
                            <?php if(isset($_SESSION['identity'])): ?>
                                <li><img src="<?=base_url?>assets/img/pedido.png" alt=" Mis pedidos" /><a href="#">Mis pedidos</a></li>
                                <li><img src="<?=base_url?>assets/img/cerrar-sesion.png" alt="salir" /><a href="<?=base_url?>usuario/logout">cerrar la sesión</a></li>
                            <?php endif; ?>
                            
                            <?php if(!isset($_SESSION['identity'])): ?>
                                <li><img src="<?=base_url?>assets/img/iniciar-sesion.png" alt="registrarse" /><a href="<?=base_url?>usuario/registro">Registrarse</a></li>
                            <?php endif; ?>
                        </ul>

                    </div>
                </aside>

                <!--CONTENIDO CENTRAL/VISTA PRODUCTOS-->
                <div id="central">