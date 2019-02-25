
(function($) {

  $.fn.menumaker = function(options) {
      
      var cssmenu = $(this), settings = $.extend({
        title: "Menu",
        format: "dropdown",
        sticky: false
      }, options);

      return this.each(function() {
        cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
        $(this).find("#menu-button").on('click', function(){
          $(this).toggleClass('menu-opened');
          var mainmenu = $(this).next('ul');
          if (mainmenu.hasClass('open')) { 
            mainmenu.hide().removeClass('open');
          }
          else {
            mainmenu.show().addClass('open');
            if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
            }
          }
        });

        cssmenu.find('li ul').parent().addClass('has-sub');

        multiTg = function() {
          cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
          cssmenu.find('.submenu-button').on('click', function() {
            $(this).toggleClass('submenu-opened');
            if ($(this).siblings('ul').hasClass('open')) {
              $(this).siblings('ul').removeClass('open').hide();
            }
            else {
              $(this).siblings('ul').addClass('open').show();
            }
          });
        };

        if (settings.format === 'multitoggle') multiTg();
        else cssmenu.addClass('dropdown');

        if (settings.sticky === true) cssmenu.css('position', 'fixed');

        resizeFix = function() {
          if ($( window ).width() > 850) {
            cssmenu.find('ul').show();
          }

          if ($(window).width() <= 850) {
            cssmenu.find('ul').hide().removeClass('open');
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };
})(jQuery);

(function($){

	$(document).ready(function() {
	  $("#cssmenu").menumaker({
		title: "Menu",
		format: "multitoggle"
	  });

	  $("#cssmenu").prepend("<div id='menu-line'></div>");

	var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

	$("#cssmenu > ul > li").each(function() {
	  if ($(this).hasClass('active')) {
		activeElement = $(this);
		foundActive = true;
	  }
	});

	if (foundActive === false) {
	  activeElement = $("#cssmenu > ul > li").first();
	}

	defaultWidth = lineWidth = activeElement.width();

	defaultPosition = linePosition = activeElement.position().left;

	menuLine.css("width", lineWidth);
	menuLine.css("left", linePosition);

	$("#cssmenu > ul > li").hover(function() {
	  activeElement = $(this);
	  lineWidth = activeElement.width();
	  linePosition = activeElement.position().left;
	  menuLine.css("width", lineWidth);
	  menuLine.css("left", linePosition);
	}, 
	function() {
	  menuLine.css("left", defaultPosition);
	  menuLine.css("width", defaultWidth);
	});

});
})(jQuery);

//(function($){
//  $(document).ready(function(){
//    $('#show-modal').click(function(){
//      $('#modal-termo-uso').show();
//    });
//  });
//  $('#modal-termo-uso .close-modal').click(function(){
//    $('#modal-termo-uso').hide();
//  });
//})(jQuery);

//(function($){
//  $(document).ready(function(){
//	$('#show-modal').click(function(){
//	  $('#modal-termo-uso').show();
//	});
//  });
//  $('#modal-termo-uso .close-modal').click(function(){
//	$('#modal-termo-uso').hide();
//  });

//  modalPesqUsab = '';
//  modalPesqUsab +=  '<div id="modal-pesquisa-usabilidade">';
//  modalPesqUsab +=    '<div class="modal-content">';
// modalPesqUsab +=      '<center>';
//  modalPesqUsab +=        '<h3>Obrigado por testar a plataforma!</h3>';
//  modalPesqUsab +=        '<h4>Nos ajude respondendo algumas perguntas, é rápido!</h4>';
  //modalPesqUsab +=        '<h4><a href="https://docs.google.com/forms/d/e/1FAIpQLScjAyZsOzROZc-nIoOfpirbUnZ8-rp52UzQ8v72G7PAMIFWng/viewform" target="_blank">Clique aqui e diga-nos o que achou.</a></h4>';
//  modalPesqUsab +=        '<iframe src="https://docs.google.com/forms/d/e/1FAIpQLScjAyZsOzROZc-nIoOfpirbUnZ8-rp52UzQ8v72G7PAMIFWng/viewform" width="100%" height="100%"></iframe>';
//  modalPesqUsab +=        '<div class="close-modal">Depois</div>';
//  modalPesqUsab +=      '</center>';
// modalPesqUsab +=    '</div>';
//  modalPesqUsab +=  '</div>';

//  $('body #site #content').append(modalPesqUsab);

//  $('#modal-pesquisa-usabilidade .close-modal').click(function(){
//	$('#modal-pesquisa-usabilidade').hide();
//  });

//  setTimeout(function() {
//	$('#modal-pesquisa-usabilidade').show();
//  }, 10000);

})(jQuery);