<?php
	require 'settings/check.php';

	
	$user = $_SESSION['user_id'];
	include(SQL_PATH."slc_usuario.php");

	if(isset($_GET['cadastro'])=='erro')
	{
		echo "E&#45;mail j&aacute; cadastrado!";?>
		<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&ed_user=<?php echo($user);?>" >
	<?php }
		elseif (isset($_GET['user'])=='atualizado')
	{
		echo "Usu&aacute;rio atualizado com sucesso!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=perfil&user=<?php echo ($user); ?>" >
<?php }
	else
	{
	while ($row_sl_user = mysqli_fetch_assoc($sl_user)){ ?>

	<h2><i class="fa fa-edit"> </i> Edita Usu&aacute;rio</h2> 
	<hr/>
    <form method="post" name="ed_usuario" action="<?php echo (SQL_PATH); ?>update.php">
      <table align="center">
		<tr valign="baseline">
		  <td nowrap align="right">Forma&ccedil;&atilde;o:</td>
		  <td><select class="form-control" name="formacao" placeholder="Nome" required>
			<option value="<?php echo $row_sl_user['formacao']; ?>"><?php echo $row_sl_user['formacao']; ?></option>
			<option value="Estudante">Estudante</option>
			<option value="Profissional">Profissional</option>
			<option value="Mestre">Mestre</option>
		  </select></td>
		</tr>
        <tr valign="baseline">
          <td nowrap align="right">Nome:</td>
          <td><input class="form-control" type="text" name="name" value="<?php echo ($row_sl_user['name']); ?>" size="35" required="required"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Sobrenome:</td>
          <td><input class="form-control" type="text" name="sobrenome" value="<?php echo ($row_sl_user['sobrenome']); ?>" size="35" required="required"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Email:</td>
          <td><input class="form-control" type="email" name="email" value="<?php echo ($row_sl_user['email']); ?>" size="35" required="required"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Password:</td>
          <td><input class="form-control" type="password" name="password" value="" placeholder="Senha" size="35" required="required"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">
				<button name="reset" type="button" class="form-control alerta" id="botao"  onclick="MM_goToURL('parent','?p=perfil&user=<?php echo ($user); ?>');return document.MM_returnValue">Cancelar</button>
			</td>
          <td>
			<button id="botao" class="form-control confirma" type="submit" name="edit_user" value=""><big><i class="fa fa-edit"></i> </big>Atualizar</button>
			<button name="reset" value="" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=cadastro&ex_user=<?php echo ($user); ?>');return document.MM_returnValue">Excluir</button></td>
        </tr>
        	<input name="user" type="hidden" value="<?php echo $user; ?>">
      </table>
    </form>
<?php }
}
?>


