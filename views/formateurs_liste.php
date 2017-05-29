<script>

</script>

<style>

</style>

<h1>Liste des formateurs du CFAI84</h1>

<!-- Bouton ajouter nouvel formateur, redirige vers méthode ajouter -->
<form  action="?module=formateurs&action=ajouter" method="post">
<input type="image" src="contents/img/ajouter.png" width="50" height="50">
</form>


<table>
	<tr>
		<th>Rang</th>
		<th>Nom</th>
		<th>Mot de passe</th>
		<th>Modification</th>
		<th>Suppression</th>
	</tr>

<?php foreach($datas['formers'] as $former): ?>
	<tr>
		<td><?=$former->getRank(); ?></td>
		<td><?=$former->getName(); ?></td>
		<td><?=$former->getPassword(); ?></td>
		<td>
			<!-- Bouton modifier formateur, redirige vers méthode modifier -->
			<form  action="?module=formateurs&action=modifier" method="POST">
				<input type="hidden" value="<?=$former->getIdFormer(); ?>" name="id_former" />
				<input type="image" src="contents/img/modifier.png" width="50" height="50" />
			</form>
		</td>
		<td>
			<!-- Bouton supprimer formateur, redirige vers méthode supprimer -->
			<form action="?module=formateurs&action=supprimer" method="POST">
			<input type="hidden" value='<?=$former->getIdFormer(); ?>' name="id_former" />
			<input type="image" src="contents/img/supprimer.png" width="50" height="50" />
			</form>
		</td>
	</tr>
<?php endforeach; ?>

</table>