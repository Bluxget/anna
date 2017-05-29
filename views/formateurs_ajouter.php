<script>

</script>

<style>

</style>

<h1>Ajouter un nouveau formateur</h1>

<!-- Après appui sur Ajouter renvoie vers validation_creation.php -->
<form action="?module=formateurs&action=ajouter" method="POST" />
	Rang<br/>
	<!-- Le checked permet de vérifier la valeur sur la base d'un booléen -->
<?php foreach($datas['ranks'] as $rank): ?>
	<input type="radio" value='<?=$rank->getIdRank(); ?>' name="rang"><?=$rank->getName(); ?></input>
<?php endforeach; ?>
	<br/><br/>
	Nom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input type="text" value="" name="nom" /></br></br>
	Mot de passe</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input type="text" value="" name="password" /></br></br>
	<input type="submit" name="ajouter" value="Ajouter" />
</form>