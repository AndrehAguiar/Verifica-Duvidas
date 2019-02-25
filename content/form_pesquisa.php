<script type="text/javascript">
	(function($){
	  $(document).ready(function(){
		$('#show-modal').click(function(){
		  $('#modal-termo-uso').show();
		});
	  });
	  $('#modal-termo-uso .close-modal').click(function(){
		$('#modal-termo-uso').hide();
	  });

	  modalPesqUsab = '';
	  modalPesqUsab +=  '<div id="modal-pesquisa-usabilidade">';
	  modalPesqUsab +=    '<div class="modal-content">';
	  modalPesqUsab +=      '<center>';
	  modalPesqUsab +=        '<h3>Obrigado por testar a plataforma!</h3>';
	  modalPesqUsab +=        '<h4>Nos ajude respondendo algumas perguntas, é rápido!</h4>';
	  //modalPesqUsab +=        '<h4><a href="https://docs.google.com/forms/d/e/1FAIpQLScjAyZsOzROZc-nIoOfpirbUnZ8-rp52UzQ8v72G7PAMIFWng/viewform" target="_blank">Clique aqui e diga-nos o que achou.</a></h4>';
	  modalPesqUsab +=        '<iframe src="https://docs.google.com/forms/d/e/1FAIpQLScjAyZsOzROZc-nIoOfpirbUnZ8-rp52UzQ8v72G7PAMIFWng/viewform" width="100%" height="300"></iframe>';
	  modalPesqUsab +=        '<div class="close-modal">Depois</div>';
	  modalPesqUsab +=      '</center>';
	  modalPesqUsab +=    '</div>';
	  modalPesqUsab +=  '</div>';

	  $('body #site #content').append(modalPesqUsab);

	  $('#modal-pesquisa-usabilidade .close-modal').click(function(){
		$('#modal-pesquisa-usabilidade').hide();
	  });

	  setTimeout(function() {
		$('#modal-pesquisa-usabilidade').show();
	  }, 10000);

	})(jQuery);
</script>