<?php 
	$apprentice = $datas['apprentice']; 
?>

<script>

</script>

<style>

</style>

<h1>Modifier les informations d'un apprenti</h1>

<!-- Après appui sur Modifier renvoie vers validation_modification.php -->
<form action="?module=apprentis&action=modifier" method="POST" />
	Option</br></br>
	<input type="hidden" value='<?=$apprentice->getIdApprentice(); ?>' name="id" />
	<!-- Vérifie quelle option est sélectionnée -->
<?php foreach($datas['options'] as $option): ?>
	<input type="radio" value='<?=$option->getIdOption(); ?>' name="option"<?php if($apprentice->getIdOption() == $option->getIdOption()) echo ' checked'; ?>><?=$option->getName(); ?></input>
<?php endforeach; ?>
	<br/><br/>
	Nom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input type="text" value="<?=$apprentice->getFirstName(); ?>" name="nom" /></br></br>
	Prénom</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input type="text" value="<?=$apprentice->getLastName(); ?>" name="prenom" /></br></br>
	Adresse mail</br>
	<!-- Champ de saisie qui sera enregistré dans la base de données -->
	<input type="mail" value="<?=$apprentice->getEmail(); ?>" name="email" ></br></br>
	<input type="submit" name="modifier" value="Modifier" />
</form>