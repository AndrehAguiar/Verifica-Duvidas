<?php include(SQL_PATH."select.php");
	?>
	<ul>
		<li class="active menu" onclick="MM_goToURL('parent','?p=recentes');return document.MM_returnValue">
			<a><i class="fa fa-bullhorn"> </i> Perguntas</a>
			<hr>
		</li>
		<?php while ($row_RsCategorias = mysqli_fetch_assoc($RsCategorias)){ 
		$idCategoria = $row_RsCategorias['id'];?>
			<li class="active has-sub">
				<a> <i class="fa fa-book"> </i> <?php echo $row_RsCategorias['categoria']; ?></a>
				<ul>
					<?php include(MODULES_PATH."sub_menu.php"); ?>
				</ul>
				<hr>
			</li>
		<?php } ?>
	</ul>
	<?php if (isLoggedIn()){ ?>
		<button type="button" class="form-control solicita" id="botao" onclick="MM_goToURL('parent','?p=cadastro&nv_materia=nova');return document.MM_returnValue">Nova Mat&eacute;ria</button>
<?php } ?>
