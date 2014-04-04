<html>
<head>
	<script type="text/javascript">
		function redirect(){
			window.location = '<?php echo base_url() ?>';
		}
	</script>
</head>
<body onLoad="setTimeout('redirect()', 5000)">

<h2>Vote</h2>

<p>Merci pour votre participation. Vous allez être automatiquement redirigé vers la page d'accueil.</p>

<p><a href="<?php echo base_url() ?>">Retour</a></p>


</body>
</html>