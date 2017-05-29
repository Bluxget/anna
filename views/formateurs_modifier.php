<?php 
	$former = $datas['former']; 
?>

<script>

</script>

<style>

</style>

<h1>Modifier les informations d'un formateur</h1>

<!-- Après appui sur Modifier renvoie vers validation_modification.php -->
<form action="?module=formateurs&action=modifier" method="POST" />
	Rang</br></br>
	<input type="hidden" value='<?=$former->getIdFormer(); ?>' name="id" />
	<!-- Vérifie quel rang est sélectionné -->
<?php foreach($datas['ranks'] as $rank): ?>
	<input type="radio" value='<?=$rank->getIdRank(); ?>' name="rang"<?php if($former->getIdRank() == $rank->getIdRank()) echo ' checked'; ?>><?=$rank->getName(); ?></input>
<?php endforeach; ?>
	<br/><br/>
	Nom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input type="text" value="<?=$former->getName(); ?>" name="nom" /></br></br>
	Mot de passe</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input type="mail" value="<?=$former->getPassword(); ?>" name="password" ></br></br>
	<input type="submit" name="modifier" value="Modifier" />
</form>