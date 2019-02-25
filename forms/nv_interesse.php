<form method="post" name="nv_interesse" action="<?php echo (SQL_PATH); ?>insert.php">
  <?php if (isset($_GET['interesse']) == "novo") { 
	
		if (isset($_GET['area']) == '') {	
			include (SQL_PATH."select.php");?> 
			<tr valign="baseline">
				<td nowrap>&Aacute;rea
					<select name="id_categ" class="form-control" id="categ" onchange="MM_jumpMenu('parent',this,0)" required>
						<option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
						<?php while ($row_sl_categ = mysqli_fetch_assoc($sl_categ)){ ?>
							<option  value="?p=perfil&user=<?php echo $user ?>&interesse=novo&area=<?php echo ($row_sl_categ['id']); ?>"><?php echo ($row_sl_categ['categoria']); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<?php }else{ 
				$area = $_GET['area'];	
				include (SQL_PATH."select.php");?>
				<select id="nivel" name="nivel" class="form-control" required>
					<option value="">Selecione o n&iacute;vel</option>
					 <option value="B&aacute;sico">B&aacute;sico</option>
					 <option value="M&eacute;dio">M&eacute;dio</option>                     
					 <option value="Universit&aacute;rio">Universit&aacute;rio</option>
				  </select>

				   <select id="mater" name="id_mater" class="form-control" required>
						<option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
						<?php while ($row_sl_mater = mysqli_fetch_assoc($sl_mater)){ ?>
							<option value="<?php echo ($row_sl_mater['id']); ?>"><?php echo ($row_sl_mater['materia']); ?></option>
						<?php } ?>
					</select>

			  <button id="botao" class="form-control confirma" type="submit" name="interesse" value="Gravar">Gravar</button>

			  <?php } ?>
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_email']; ?>">
			<button name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=perfil&user=<?php echo ($_SESSION['user_id']); ?>');return document.MM_returnValue" value="Cancelar">Cancelar</button>
    <?php } ?>
</form>

