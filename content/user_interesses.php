<?php 
$show = "none";
if(isset($_GET['interesse']) == "novo"){
	$show = "block";
}?>   
<div id="interesses" style="display: <?php echo $show; ?>">
	<hr /> 
	<h2>Interesses do usu&aacute;rio</h2>
	<?php while ($row_slInteresse = mysqli_fetch_assoc($slInteresse)){?>
		<div id="interesse">
			<input readonly name="titulo" value="<?php echo $row_slInteresse['nivel']; ?> " class="leitura"/>
			<input readonly name="materia" value="<?php echo $row_slInteresse['materia']; ?>" class="leitura"/>
		 </div>
	<?php } if (isset($_GET['interesse'])=="novo"){?>		
		<div id="interesse">
			<?php 
			if(isset($_GET['cadastro'])=="erro"){
				echo("Interesse j&aacute; cadastrado!");
			}include(FORMS_PATH."nv_interesse.php");?>
		</div>
	<?php }else{?>
		<div id="interesse">
			<button type="button" class="form-control solicita" id="botao" onClick="MM_goToURL('parent','?p=perfil&user=<?php echo $user; ?>&interesse=novo');return document.MM_returnValue">Novo interesse</button>
		</div>
	<?php } ?>
</div>