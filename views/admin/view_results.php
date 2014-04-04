<h3 class="main"><?php echo lang('module_vote_results'); ?> : <?php echo $vote['name'] ?></h3>
<div id="resultats">
	<?php foreach($results as $result) : ?>
	<div class="resultat">
		Keyword : <?php echo $result['keyword']; ?> - Résultat : <?php echo $result['nb']; ?>
	</div>
	<?php endforeach; ?>
</div>