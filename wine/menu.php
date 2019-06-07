<?php
include_once("clases/usuario.php");
 ?>
<nav class="container-navegador">
  <div id="logo">
    <h2 class="marca"><a href="index.php">WINE</a></h2>
  </div>
  <div id="menu">
    <div class="control-menu">
      <a href="#menu" class="open"><span>Menu</span></a>
      <a href="#" class="close"><span>Cerrar</span></a>
    </div>
    <ul class="list-menu">
      <?php foreach ($menuNav as $posicion => $dato): ?>
        <?php if (isset($usuario)): ?>
          <?php if ($posicion == 2 || $posicion == 3 || $posicion == 4): ?>
            <?php continue; ?>
          <?php endif; ?>
          <li>
           <a href="<?php echo $dato["sitio"] ?>"><?php echo $dato["nombre"]; ?></a>
        </li>
        <?php else: ?>
          <li>
           <a href="<?php echo $dato["sitio"] ?>"><?php echo $dato["nombre"]; ?></a>
        </li>
      <?php endif; ?>
      <?php endforeach; ?>
      <?php if (isset($usuario)): ?>
        <li>
           <a style="color: red; text-align: right;" href="perfil.php">Bienvenido <?= $usuario->getNombre()?></a>
        </li>
        <li>
           <a style="color: red; text-align: right;" href="logout.php"><?= "Cerrar sesion" ?></a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
