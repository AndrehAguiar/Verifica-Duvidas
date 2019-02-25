<?php if(isset($_GET['cadastro'])=='erro'){
		   echo "E&#45;mail de usu&aacute;rio j&aacute; cadastrado!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&user=novo" >
			
	<?php }elseif(isset($_GET['usuario'])== "cadastrado"){
		echo "Usu&aacute;rio cadastrado com sucesso!";?>
		<meta http-equiv="Refresh" content="3;URL=index.php" >
		
<?php }else{?>
	<form method="post" id="nv_usuario" name="in_user" action="<?php echo (SQL_PATH); ?>insert.php">
		<h2>Cadastro</h2>
		<hr/>
	  <table align="center">
		<tr valign="baseline">
		  <td nowrap align="right">Forma&ccedil;&atilde;o:</td>
		  <td><select class="form-control" name="formacao" placeholder="Nome" required>
			<option value="">Selecione um n&iacute;vel</option>
			<option value="Estudante">Estudante</option>
			<option value="Profissional">Profissional</option>
			<option value="Mestre">Mestre</option>
		  </select></td>
		</tr>
		<tr valign="baseline">
		  <td nowrap align="right">Nome:</td>
		  <td><input class="form-control" type="text" name="name" value="" placeholder="Nome" size="32" required="required"></td>
		</tr>
		<tr valign="baseline">
		  <td nowrap align="right">Sobrenome:</td>
		  <td><input class="form-control" type="text" name="sobrenome" value="" placeholder="Sobre Nome" size="32" required="required"></td>
		</tr>
		<tr valign="baseline">
		  <td nowrap align="right">E-mail:</td>
		  <td><input class="form-control" type="email" name="email" value="" placeholder="E-mail" size="32" required="required"></td>
		</tr>
		<tr valign="baseline">
		  <td nowrap align="right">Senha:</td>
		  <td><input class="form-control" type="password" name="password" value="" placeholder="Senha" size="32" required="required"></td>
		</tr>
		<tr valign="baseline">
		  <td colspan="2" nowrap align="center">
			<input type="checkbox" name="termo_uso" required="required"> Li e aceito os 
			<span id="show-modal"><a onclick="MM_showHideLayers('modal-termo-uso','','show')"> termos de uso </a></span>.
			</td>
		</tr>
		<tr valign="baseline">
		  <td nowrap align="right">&nbsp;</td>
		  <td><input id="botao" class="form-control confirma" type="submit" name="usuario" value="Gravar"></td>
		</tr>
	  </table>
	</form>
<?php 
	include(CONTENT_PATH."termo_uso.php");
} ?>

