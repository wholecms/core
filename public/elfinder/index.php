<?php require_once __DIR__."/isAdmin.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ElFinder</title>
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">
		<style>
			* { margin:0; padding:0;}
		</style>
		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>
		<!-- elFinder translation (OPTIONAL) -->
		<script src="js/i18n/elfinder.ru.js"></script>
		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			
			 function getUrlParam(paramName) {
            var reParam = new RegExp('(?:[\?&]|&)' + paramName + '=([^&]+)', 'i') ;
            var match = window.location.search.match(reParam) ;

            return (match && match.length > 1) ? match[1] : '' ;
        }
			$(document).ready(function() {
				var funcNum = getUrlParam('CKEditorFuncNum');
				$('#elfinder').elfinder({
					url : 'php/connector.minimal.php'  // connector URL (REQUIRED)
					 , lang: 'tr'                    // language (OPTIONAL)
					 , getFileCallback : function(file) {						 
							if (typeof(window.opener.KCFinder) !== 'undefined' && window.opener.KCFinder !== null) {
								window.opener.KCFinder.callBack(file.url);
							}
							if (typeof(window.opener.CKEDITOR) !== 'undefined' && window.opener.CKEDITOR!== null) {
								window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
							}
							window.close();
					}
				
				});
			});
		</script>
	</head>
	<body>
		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>
	</body>
</html>
