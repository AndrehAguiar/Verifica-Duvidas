

<hr />
<div id="linha" class="titulo">
	<div id="cel">
		<a>
			&Aacute;rea
		</a>
	</div>
	<div id="cel">
		<a>
			Materias
		</a>
	</div>
	<div id="cel">
		<a>
			Perg.
		</a>
	</div>
	<div id="cel">
		<a>
			Perg. Resp.
		</a>
	</div>
	<div id="cel">
		<a>
			Situa&ccedil;&atilde;o
		</a>
	</div>
</div>	

<hr />

<?php while($row_categorias = mysqli_fetch_assoc($sl_categ)){ 
	$idCategoria = $row_categorias['id']; 
	$categoria = $row_categorias['categoria'];
	include(SQL_PATH."conta_perguntasCateg.php");?>
	
	<div id="linha">
		<div id="cel">
			<a>
				<?php echo ($row_categorias['categoria']); ?>
			</a>
		</div>
		<div id="cel">
			<?php while ($row_RsQtdMaterias = mysqli_fetch_assoc($RsQtdMateriasCateg)){ ?>
				<a>
					<?php echo ($row_RsQtdMaterias['qtd_materiasCateg']); ?>
				</a>
			<?php } ?>
		</div>			
		<div id="cel">
			<?php while ($row_RsQtdPerguntas = mysqli_fetch_assoc($RsQtdPerguntasCateg)){ ?>
				<a>
					<?php echo ($row_RsQtdPerguntas['qtd_perguntasCateg']); ?>
				</a>
			<?php } ?>
		</div>			
		<div id="cel">
			<?php while ($row_RsPerguntasRespondidas = mysqli_fetch_assoc($RsPerguntasRespondidas)){ ?>
				<a>
					<?php echo ($row_RsPerguntasRespondidas['perg_respondidas']); ?>
				</a>				
			<?php } ?>
		</div>		
		<?php					
			include(CONTENT_PATH."media_perg_respostas.php");
		?>
	</div>
<?php } ?>