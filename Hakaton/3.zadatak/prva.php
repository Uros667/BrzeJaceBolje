<?php require_once "konekcija.php" ?>
Upis

<form action="" method="post">
	Ime<input type="text" name="ime_upis" required=""><br>
	Prezime<input type="text" name="prezime_upis" required><br>
	Mejl<input type="text" name="mejl_upis" required=""><br>
	Grad<input type="text" name="grad_upis" required=""><br>
	<input type="submit" name="upisi">

</form>


<?php
if(isset($_POST['upisi'])){
$ime_upis_form = $_POST['ime_upis']	;
$prezime_upis_form = $_POST['prezime_upis']	;
$mejl_upis_form = $_POST['mejl_upis'];
$grad_upis_form = $_POST['grad_upis'];


$upisi = "INSERT INTO tabela_uros (ime, prezime, mejl, grad) VALUES ('$ime_upis_form','$prezime_upis_form','$mejl_upis_form','$grad_upis_form')";
$kveriupisa = mysqli_query($konekcija,$upisi);
header("Location: prva.php");

}

?>


<br><br><br>
<hr>
Prikaz
<table width="600" border="1">
	<tr>
		<td>ime</td>
		<td>Prezime</td>
		<td>mejl</td>
		<td>Grad</td>
		<td>Izmeni</td>
		<td>Obrisi</td>
	</tr>
	
<?php
$uzmi = "SELECT * FROM tabela_uros ";
$sql = mysqli_query($konekcija,$uzmi);
while($red=mysqli_fetch_array($sql)){
$id_promenljiva=$red['id'];
$ime_promenljiva=$red['ime'];
$prezime_promenljiva=$red['prezime'];
$mejl_promenljiva = $red['mejl'];
$grad_promenljiva = $red['grad'];


?>
<tr>
<td><?php echo $ime_promenljiva ?></td>
<td><?php echo $prezime_promenljiva ?></td>
<td><?php echo $mejl_promenljiva ?></td>
<td><?php echo $grad_promenljiva ?></td>
<td><a href="prva.php?prikaz=<?php echo $id_promenljiva ?>">Izmeni</a></td>
<td><a href="prva.php?brisi=<?php echo $id_promenljiva ?>">Obrisi</a></td>
</tr>


<?php
}

?>




<?php
if(isset($_GET['prikaz'])){
$id_izmene = $_GET['prikaz'];

$izmeni_db = "SELECT * FROM tabela_uros WHERE id = '$id_izmene' " ;
$kveri_izmene = mysqli_query($konekcija,$izmeni_db);

while($red2=mysqli_fetch_array($kveri_izmene)){
$ime_prikaz = $red2['ime'];	
$prezime_prikaz = $red2['prezime'];	
$mejl_prikaz = $red2['mejl'];	
$grad_prikaz = $red2['grad'];	


?>





<table>
	<br><br><br><br>
	izmena<br>





<form action="" method="post">
	Ime <input type="text" name="ime_form" value="<?php echo $ime_prikaz ?>">	<br>
	Prezime <input type="text" name="prezime_form" value="<?php echo $prezime_prikaz ?>">	<br>
	Mejl <input type="text" name="mejl_form" value="<?php echo $mejl_prikaz ?>">	<br>
	Grad <input type="text" name="grad_form" value="<?php echo $grad_prikaz ?>">	<br>
	<input type="submit" name="submit">
</form>
<?php
}

}

?>

<?php
if(isset($_POST['submit'])){

$promena_imena = $_POST['ime_form'];
$promena_prezimena = $_POST['prezime_form'];
$promena_mejla = $_POST['mejl_form'];
$promena_grad = $_POST['grad_form'];


$sql = "UPDATE tabela_uros SET ";
$sql .=" ime='$promena_imena', prezime='$promena_prezimena', mejl='$promena_mejla', grad='$promena_grad' WHERE id = '$id_izmene' ";
$upis = mysqli_query($konekcija,$sql);
header("Location: prva.php");

}

?>



<?php
if(isset($_GET['brisi'])){

$brisanje = $_GET['brisi'];

$brisi_tab = "DELETE FROM tabela_uros WHERE id = '$brisanje' ";
$kveri_bris = mysqli_query($konekcija,$brisi_tab);
header("Location: prva.php");
}

?>