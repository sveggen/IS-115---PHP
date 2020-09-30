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
<div class="bakgrunn">
<div class="registrer-medlem">
<form action="" method="get">

  <div class="form-group">
<h3>Registrere nytt medlem</h3>
  </div>
<div class="form-row">
<div class="form-group">
<label for="fornavn">Fornavn: </label>
<input type="text" class="form-control" name="fornavn" placeholder="Ola"/>
</div>

<div class="form-group ">
<label for="etternavn">Etternavn: </label>
 <input type="text" class="form-control" name="etternavn" placeholder="Nordmann"/>
</div>
</div>

<div class="form-group ">
<label for="email">Email: </label>
<input type="email" class="form-control" name="epost" placeholder="ola@mail.no"/>
</div>

<div class="form-group">
<label for="mobilnummer">Mobilnummer: </label>
<input type="tel" class="form-control" name="mobilnummer" pattern="[0-9]{8}" placeholder="12345678"/>
</div>

<div class="form-group">
<label for="dato">Fødselsdato: </label>
<input type="date" class="form-control" name="dato" />
</div>

<div class="form-group col">
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="hann" name="kjonn" value="hann" class="custom-control-input">
  <label class="custom-control-label" for="hann">Mann</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="hunn" name="kjonn" value="hunn" class="custom-control-input">
  <label class="custom-control-label" for="hunn">Kvinne</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="annet" name="kjonn" value="annet" class="custom-control-input">
  <label class="custom-control-label" for="annet">Annet</label>
</div>
</div>

<div class="form-row">
<div class="form-group ">
<label for="gateadresse">Gateadresse: </label>
<input type="text" class="form-control" name="gateadresse" placeholder="Grindvegen 47"/>
</div>

<div class="form-group ">
<label for="postnummer">Postnummer: </label>
<input type="text" class="form-control" name="postnummer" pattern="[0-9]{4}" required placeholder="1321"/>
</div>

<div class="form-group ">
<label for="poststed">Poststed: </label>  
<input type="text" class="form-control" name="poststed" placeholder="Stabekk"/>
</div>
</div>

<div class="form-group">
<label for="interesser">Interesser: </label>
<input type="text" class="form-control" name="interesser" placeholder="Fotball, taekwondo, gaming"/>

</div>

<div class="form-group">
    <button class="btn btn-primary btn-block" type="submit">Registrer</button>
</div>

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

if (!empty($_GET['fornavn'])) {
  array_push($medlem, $_GET['fornavn']);
} else{
  array_push($ikkeutfylt, $verdi="Fornavn");
}
if (!empty($_GET['etternavn'])) {
  array_push($medlem, $_GET['etternavn']);
} else{
  array_push($ikkeutfylt, $verdi="Etternavn");
}
if (!empty($_GET['mobilnummer'])) {
  array_push($medlem, $_GET['mobilnummer']);
} else{
  array_push($ikkeutfylt, $verdi="Mobilnummer");
}
if (!empty($_GET['dato'])) {
  array_push($medlem, $_GET['dato']);
} else{
  array_push($ikkeutfylt, $verdi="Fødselsdato");
}
if (!empty($_GET['kjonn'])) {
  array_push($medlem, $_GET['kjonn']);
} else{
  array_push($ikkeutfylt, $verdi="Kjønn");
}
if (!empty($_GET['gateadresse'])) {
  array_push($medlem, $_GET['gateadresse']);
} else{
  array_push($ikkeutfylt, $verdi="Gateadresse");
}
if (!empty($_GET['postnummer'])) {
  array_push($medlem, $_GET['postnummer']);
} else{
  array_push($ikkeutfylt, $verdi="Postnummer");
}
if (!empty($_GET['poststed'])) {
  array_push($medlem, $_GET['poststed']);
} else{
  array_push($ikkeutfylt, $verdi="Poststed");
}



if(!empty($ikkeutfylt)){
  echo 'Følgende felt mangler verdi: ' .  implode(", ", $ikkeutfylt);
} else {
  echo "Medlem har blitt registrert med følgende opplysninger:\n" . implode(", ", $medlem);
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>