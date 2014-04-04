<html>
<head>
	<script type="text/javascript">
		function redirect(){
			window.location = '<?php echo base_url() ?>/festival';
		}
	</script>
</head>
<body onLoad="setTimeout('redirect()', 5000)">

<h2>Vote</h2>

<p>Merci pour votre participation. Vous allez être automatiquement redirigé vers la page d'accueil du festival.</p>

<p><a href="<?php echo base_url() ?>">Retour à l'accueil du festival</a></p>


</body>
</html>