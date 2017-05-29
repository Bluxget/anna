<script>

</script>

<style>

</style>

<h1>Liste des apprentis du CFAI84</h1>

<!-- Bouton ajouter nouvel apprenti, redirige vers méthode ajouter -->
<form action="?module=apprentis&action=ajouter" method="post">
<input type="image" src="contents/img/ajouter.png" width="50" height="50">
</form>

<!-- Bouton import csv, redirige vers méthode  -->
<form  action="?module=apprentis&action=importer" method="post">
<input type="image" src="contents/img/csv.jpg" width="50" height="50">
</form>


<table>
	<tr>
		<th>Option</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Adresse Mail</th>
		<th>Modification</th>
		<th>Suppression</th>
	</tr>

<?php foreach($datas['apprentices'] as $apprentice): ?>
	<tr>
		<td><?=$apprentice->getOption(); ?></td>
		<td><?=$apprentice->getFirstName(); ?></td>
		<td><?=$apprentice->getLastName(); ?></td>
		<td><?=$apprentice->getEmail(); ?></td>
		<td>
			<!-- Bouton modifier apprenti, redirige vers méthode modifier -->
			<form  action="?module=apprentis&action=modifier" method="POST">
				<input type="hidden" value="<?=$apprentice->getIdApprentice(); ?>" name="id_apprentice" />
				<input type="image" src="contents/img/modifier.png" width="50" height="50" />
			</form>
		</td>
		<td>
			<!-- Bouton supprimer apprenti, redirige vers méthode supprimer -->
			<form action="?module=apprentis&action=supprimer" method="POST">
			<input type="hidden" value='<?=$apprentice->getIdApprentice(); ?>' name="id_apprentice" />
			<input type="image" src="contents/img/supprimer.png" width="50" height="50" />
			</form>
		</td>
	</tr>
<?php endforeach; ?>

</table>