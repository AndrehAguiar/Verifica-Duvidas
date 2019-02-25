

<hr />
<div id="linha" class="titulo">
	<div id="cel">
		<a>
			Mat&eacute;ria
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
			Resp. Aval.
		</a>
	</div>
	<div id="cel">
		<a>
			Soma &#124; M&eacute;dia
		</a>
	</div>
</div>	

<hr />

<?php while($row_sl_materias = mysqli_fetch_assoc($sl_materias)){ 
	$idMateria = $row_sl_materias['id']; 
	$materia = $row_sl_materias['materia'];
	include(SQL_PATH."conta_perguntasMateria.php");?>
	
	<div id="linha">
		<div id="cel">
			<a>
				<?php echo ($materia); ?>
			</a>
		</div>
		<div id="cel">
			<?php while ($row_RsQtdPerguntas = mysqli_fetch_assoc($RsQtdPerguntasMateria)){ ?>
				<a>
					<?php echo ($row_RsQtdPerguntas['qtd_perguntasMateria']); ?>
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
		<div id="cel">
			<?php while ($row_RsQtdRespostasAvalia = mysqli_fetch_assoc($RsQtdRespostasAvalia)){ ?>
				<a>
					<?php echo ($row_RsQtdRespostasAvalia['qtd_respostaAvalia']); ?>
				</a>				
			<?php } ?>
		</div>		
		<?php	
			include(CONTENT_PATH."media_avalia_respostas.php");
		?>
	</div>
<?php } ?>