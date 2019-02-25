<?php	
	$user = $_SESSION['user_id'];
 	include(SQL_PATH."select.php");
?>
<h2>Cadastro de conte&uacute;do</h2>
<hr/>
<?php if(isset($_GET['cadastro'])=='erro'){
		   echo "Conte&uacute;do j&aacute; cadastrado!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&nv_materia=nova" >
	<?php }elseif(isset($_GET['materia'])=='cadastrada'){
		   echo "Conte&uacute;do cadastrado com sucesso!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&nv_materia=nova" >
	<?php }else{ ?>
<form method="post" name="nv_materia" action=<?php echo SQL_PATH."insert.php" ?>>
 
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Categoria:</td>
      
      <?php if (isset($_GET['area'])=="nova") {?>
      
      <td>
      	<input id="nova_categ" class="form-control" type="text" name="name" value="" placeholder="Area" size="32" required="required">
        </td>
            <tr valign="baseline">
              <td nowrap align="right"><input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Cancelar"></td>
              <td><input id="botao" class="form-control confirma" type="submit" name="categoria" value="Gravar"></td>
              
              <?php }else{ ?>
                   
                    <input type="checkbox" onclick="MM_goToURL('parent','?p=cadastro&nv_materia=nova&area=nova');return document.MM_returnValue" />
                    <small>Selecione a caixa para adicionar nova &aacute;rea</small>
                    <td>
                    
                    <select id="categ" class="form-control" name="id_categ" required>
                    <option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
                    
                    <?php while ($row_sl_categ = mysqli_fetch_assoc($sl_categ)){ ?>
                        <option value="<?php echo ($row_sl_categ['id']); ?>"><?php echo ($row_sl_categ['categoria']); ?></option>
                        
                    <?php } ?>
                    
                  </select>
              </td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Mat&eacute;ria:</td>
              <td><input class="form-control" type="text" name="mater" value="" placeholder="Mat&eacute;ria" size="32" required="required"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Sair"></td>
              <td><input id="botao" class="form-control confirma" type="submit" name="materia" value="Gravar"></td>
            </tr>
        <?php } ?>
      	<input name="id_user" type="hidden" value="<?php echo($user)?>">
  </table>
</form>
<?php } ?>