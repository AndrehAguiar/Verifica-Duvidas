<?php	
	include("settings/settings.php");
	include(SETTINGS_PATH."controller.php");
?>
<html>
	<head>
	   <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119401336-1"></script>
		
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-119401336-1');
		</script>

	   <meta charset='utf-8'>
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Verifica D&uacute;vidas Online</title>
       
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>responsive_style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>menu_styles.css">
	</head>
	
	<body>	
      <!--.preloader
      <div class="preloader"> <i class="fa fa-gear fa-spin"></i></div>
      <!--/.preloader--> 
		<container id="site">
			<header id="header">
				<?php include(MODULES_PATH."header.php"); ?>
			</header>
			<nav id="cssmenu">
				<?php include(MODULES_PATH."menu.php"); ?>
			</nav>
			<content id="content">
                <?php (isset($page)) ? include(CONTENT_PATH.$page) : include(CONTENT_PATH."home.php"); ?>
			</content>			
			<footer id="footer">
				<?php include(MODULES_PATH."footer.html"); ?>
			</footer>
		</container>
 		
  		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("preload.js") ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("script.js") ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("cep.js") ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("jquery.js") ?>"></script> 
		<script type="text/javascript" src="<?php echo JS_PATH.("jquery.validate.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("SpryValidationTextField.js") ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("showDiv.js") ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("valida_celular.js") ?>"></script>
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		
		<script type="text/javascript">
			
			function MM_goToURL() { //v3.0
			  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
			  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
			}

			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			  if (restore) selObj.selectedIndex=0;
			}
						
			function MM_showHideLayers() { //v9.0
			var i, p, v, obj, args = MM_showHideLayers.arguments;
				for ( i = 0; i < ( args.length - 2 ); i += 3 )
					with( document ) if ( getElementById && ( ( obj = getElementById( args[ i ] ) ) != null ) ) {
						v = args[ i + 2 ];
						b = args[ i + 2 ];
					if ( obj.style ) {
						obj = obj.style;
						v = ( v == 'show' ) ? 'visible' : ( v == 'hide' ) ? 'hidden' : v;
						b = ( b == 'show' ) ? 'block' : ( b == 'hide' ) ? 'none' : b;
					}
					obj.visibility = v;
					obj.display = b;
				}
			}
			
			$("#file").on('change', function () {
				if (typeof (FileReader) != "undefined") {
					var arquivo = $("#arquivo");
					var image_holder = $("#image-holder");
					image_holder.empty();

					var reader = new FileReader();
					reader.onload = function (e) {
						$("<img />", {
							"src": e.target.result,
							"class": "thumb-image",
						}).appendTo(image_holder);
						$("<input />", {
							"value": e.target.result,
							"name": "image64",
							"type": "hidden"
						}).appendTo(arquivo);
					}					
					image_holder.show();
					reader.readAsDataURL($(this)[0].files[0]);	
				} else{
					alert("Este navegador nao suporta FileReader.");
				}	
			});
			
		</script>
		
	</body>
</html>