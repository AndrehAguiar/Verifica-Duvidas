<div id="cadastro" style="display:none;">
	<hr />    
	<h2><i class="fa fa-drivers-license"> </i> Dados de cadastro </h2>
	<div id="info">
		<label for="name"> Forma&ccedil;&atilde;o:
		<input readonly name="name" value="<?php echo $row_User['formacao']; ?>" class="leitura"/> </label>
		
		<label for="name"> Nome:
		<input readonly name="name" value="<?php echo $_SESSION['user_name']; ?>" class="leitura"/> </label>


		<label for="sobre_nome"> Sobrenome:
		<input readonly name="sobre_nome" value="<?php echo $row_User['sobrenome']; ?>" class="leitura"/></label>


		<label for="sobrenome"> E&#45;mail &frasl; Login:
		<input readonly name="sobre_nome" value="<?php echo $row_User['email']; ?>" class="leitura"/></label>
		
		<label for="telefone"> Telefone:
		<input readonly name="telefone" value="<?php echo $row_cdUser['telefone']; ?>" placeholder="Informe o Telefone" class="leitura"/> </label>
		<hr>
		<?php if($row_cdUser['telefone'] == "" || $row_cdUser['telefone'] == ""){?>		
			<button type="button" class="form-control solicita" id="botao" onClick="MM_goToURL('parent','?p=cadastro&user=<?php  echo($_SESSION['user_id']); ?>&perfil=novo');return document.MM_returnValue">Completar cadastro</button>	
		<?php }else{?>		
			
			<button type="button" class="form-control solicita" id="botao" onClick="MM_goToURL('parent','?p=cadastro&user=<?php echo $_SESSION['user_id']; ?>&ed_perfil=<?php echo($row_cdUser['id']);?>');return document.MM_returnValue">Editar cadastro</button>
		<?php }?>
			
			<button type="button" class="form-control solicita" id="botao" onClick="MM_goToURL('parent','?p=cadastro&ed_user=<?php echo($_SESSION['user_id']);?>');return document.MM_returnValue">Editar login</button>
	 </div>
	<div id="info">
		
		<label for="endereco"> Endere&ccedil;o:
		<input readonly name="endereco" value="<?php echo $row_cdUser['endereco']; ?>" placeholder="Informe o Rua/Av" class="leitura"/> </label>


		<label for="numero"> Numero:
		<input readonly name="numero" value="<?php echo $row_cdUser['numero']; ?>" placeholder="Informe o N&uacute;mero" class="leitura"/></label>


		<label for="complemento"> Complemento:
		<input readonly name="complemento" value="<?php echo $row_cdUser['complemento']; ?>" placeholder="Informe o Complemento" class="leitura"/></label>


		<label for="bairro">Bairro:
		<input readonly name="bairro" value="<?php echo $row_cdUser['bairro']; ?>" placeholder="Informe o Bairro" class="leitura"/></label>


		<label for="cidade">Cidade:
		<input readonly name="cidade" value="<?php echo $row_cdUser['cidade']; ?>" placeholder="Informe a Cidade" class="leitura"/></label>
		
		<label for="estado"> Estado:
		<input readonly name="estado" value="<?php echo $row_cdUser['estado']; ?>" placeholder="Informe o Estado" class="leitura"/> </label>


		<label for="pais"> Pais:
		<input readonly name="pais" value="<?php echo $row_cdUser['pais']; ?>" placeholder="Informe o Pa&iacute;s" class="leitura"/></label>


		<label for="cep"> CEP:
		<input readonly name="cep" value="<?php echo $row_cdUser['cep']; ?>" placeholder="CEP" class="leitura"/></label>
	 </div>
	 <hr style="width: 100%;">
</div>