<?php
require 'settings/check.php';
	
	$user = $_SESSION['user_id'];
	include(SQL_PATH."slc_usuario.php");
while ($row_sl_user = mysqli_fetch_assoc($sl_user))
{ ?>
	<h2>Excluir Usu&aacute;rio</h2>
   <hr>
   <h3>Deseja realmente excluir <?php echo $_SESSION['user_name'];?> <?php echo($row_sl_user['sobrenome']);?>?</h3>
    <form method="post" name="ex_usuario" action="<?php echo (SQL_PATH); ?>delete.php">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">Name:</td>
          <td><input class="form-control" type="text" name="name" readonly value="<?php echo ($row_sl_user['name']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Email:</td>
          <td><input class="form-control" type="email" name="email" readonly value="<?php echo ($row_sl_user['email']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Password:</td>
          <td><input class="form-control" type="password" name="password" readonly value="<?php echo ($row_sl_user['password']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input id="botao" class="form-control alerta" type="submit" name="excluir" value="Excluir"><button name="cancela" value="" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=cadastro&ed_user=<?php echo ($user); ?>');return document.MM_returnValue">Canelar</button></td>
        </tr>
        <input type="hidden" name="data" value="<?php date_default_timezone_set('America/Sao_Paulo'); echo date('Y-m-d H:i') ?>">
        <input type="hidden" name="usuario" value="<?php  echo $user ?>">
      </table>
    </form>
<?php } ?>
