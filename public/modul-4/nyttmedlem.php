<!-- Oppgave 4 -->

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registrere nytt medlem</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="/modul-4/style.css">
</head>
<body>
  
<h1>Registrere nytt medlem</h1>

<div class="registrer-medlem">
<form action="" method="get">

<div class="form-row">
<div class="form-group">
<label for="fornavn">Fornavn: </label>
<input type="text" class="form-control" name="fornavn" />
</div>

<div class="form-group ">
<label for="etternavn">Etternavn: </label>
 <input type="text" class="form-control" name="etternavn" />
</div>
</div>

<div class="form-group ">
<label for="email">Email: </label>
<input type="email" class="form-control" name="epost" />
</div>

<div class="form-group">
<label for="mobilnummer">Mobilnummer: </label>
<input type="tel" class="form-control" name="mobilnummer" pattern="[0-9]{8}" />
</div>

<div class="form-group">
<label for="dato">Fødselsdato: </label>
<input type="date" class="form-control" name="dato" />
</div>

<div class="form-group col">
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="hann" name="kjonn" class="custom-control-input">
  <label class="custom-control-label" for="hann">Mann</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="hunn" name="kjonn" class="custom-control-input">
  <label class="custom-control-label" for="hunn">Kvinne</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="annet" name="kjonn" class="custom-control-input">
  <label class="custom-control-label" for="annet">Annet</label>
</div>
</div>

<div class="form-row">
<div class="form-group ">
<label for="gateadresse">Gateadresse: </label>
<input type="text" class="form-control" name="gateadresse" />
</div>

<div class="form-group ">
<label for="postnummer">Postnummer: </label>
<input type="text" class="form-control" name="postnummer" pattern="[0-9]{4}" required/>
</div>

<div class="form-group ">
<label for="poststed">Poststed: </label>  
<input type="text" class="form-control" name="poststed" />
</div>
</div>

<div class="form-group">
    <button class="btn btn-primary btn-block" type="submit">Registrer</button>
</div>

</div>
</div>
</div>
</div>
</form>

<?php
echo "<p> ". $_GET['fornavn'] ." </p>";

$medlem = array();
$ikkeutfylt = array();

if (isset($_POST['fornavn'])) {
  array_push($medlem, $_POST['fornavn']);
} else{
  array_push($ikkeutfylt, $verdi="Fornavn");
}
if (isset($_POST['etternavn'])) {
  array_push($medlem, $_POST['etternavn']);
} else{
  array_push($ikkeutfylt, $verdi="Etternavn");
}
if (isset($_POST['telefonnummer'])) {
  array_push($array, $_POST['telefonnummer']);
} else{
  array_push($ikkeutfylt, $verdi="Telefonnummer");
}

if(isset($_POST['submit']) && !empty($ikkeutfylt)){
  echo "Følgende felt mangler verdi: " .  implode(", ", $array);
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>