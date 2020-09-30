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
<form action="" method="post">

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
  <input type="radio" id="mann" name="kjonn" value="mann" class="custom-control-input">
  <label class="custom-control-label" for="mann">Mann</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="dame" name="kjonn" value="dame" class="custom-control-input">
  <label class="custom-control-label" for="dame">Dame</label>
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
    <button class="btn btn-primary btn-block" name="submit" type="submit">Registrer</button>
  </div>
</div>
</div>
</div>
</div>
</div>
</form>



<?php

$medlem = array();
$ikkeutfylt = array();

if (!empty($_POST['fornavn'])) {
  $medlem['fornavn'] = $_POST['fornavn'];
} else{
  array_push($ikkeutfylt, $verdi="Fornavn");
}
if (!empty($_POST['etternavn'])) {
  $medlem['etternavn'] = $_POST['etternavn'];
} else{
  array_push($ikkeutfylt, $verdi="Etternavn");
}
if (!empty($_POST['mobilnummer'])) {
  $medlem['mobilnummer'] = $_POST['mobilnummer'];
} else{
  array_push($ikkeutfylt, $verdi="Mobilnummer");
}
if (!empty($_POST['dato'])) {
  $medlem['dato'] = $_POST['dato'];
} else{
  array_push($ikkeutfylt, $verdi="Fødselsdato");
}
if (!empty($_POST['kjonn'])) {
  $medlem['kjonn'] = $_POST['kjonn'];
} else{
  array_push($ikkeutfylt, $verdi="Kjønn");
}
if (!empty($_POST['gateadresse'])) {
  $medlem['gateadresse'] = $_POST['gateadresse'];
} else{
  array_push($ikkeutfylt, $verdi="Gateadresse");
}
if (!empty($_POST['postnummer'])) {
  $medlem['postnummer'] = $_POST['postnummer'];
} else{
  array_push($ikkeutfylt, $verdi="Postnummer");
}
if (!empty($_POST['poststed'])) {
  $medlem['poststed'] = $_POST['poststed'];
} else{
  array_push($ikkeutfylt, $verdi="Poststed");
}



if(!empty($ikkeutfylt) && isset($_POST['submit'])){
  echo 'Følgende felt mangler verdi: ' .  implode(", ", $ikkeutfylt);
} 
elseif (isset($_POST['submit']) && !empty($medlem)) {
  $medlem['medlemsnr'] = random_int(1000000, 9999999);
  $medlem['kontigent'] = "ikke betalt";
  $medlem['innmeldt'] = date("d.m.Y");

  echo '
  <div class="medlembakgrunn">
  <div class="medlemdata">
    <h3>Nytt medlem har blitt registrert:</h3>
    <br>
    <h4>Personalia: </h4>
    <div class="datafelt">
    <label for="fornavn">Fornavn: </label>
    <span id="fornavn">'. $medlem['fornavn'] .
   '</span>
   </div>

   <div class="datafelt">
   <label for="etternavn">Etternavn: </label>
   <span id="etternavn">'. $medlem['etternavn'] .
  '</span>
  </div>

 <div class="datafelt">
 <label for="mobilnummer">Mobilnummer: </label>
 <span id="mobilnummer">'. $medlem['mobilnummer'] .
'</span>
</div>

<div class="datafelt">
 <label for="dato">Fødselsdato: </label>
 <span id="dato">'. $medlem['dato'] .
'</span>
</div>

<div class="datafelt">
 <label for="kjonn">Kjønn: </label>
 <span id="kjonn">'. $medlem['kjonn'] .
'</span>
</div>

<br>
<h4>Medlemsopplysninger: </h4>

<div class="datafelt">
 <label for="medlemsnr">Medlemsnummer: </label>
 <span id="medlemsnr">'. $medlem['medlemsnr'] .
'</span>
</div>

<div class="datafelt">
 <label for="kontigent">Kontigentstatus: </label>
 <span id="kontigent">'. $medlem['kontigent'] .
'</span>
</div>

<div class="datafelt">
 <label for="innmeldt">Dato for innmelding: </label>
 <span id="innmeldt">'. $medlem['innmeldt'] .
'</span>
</div>

<br>
<h4>Adresse: </h4>
<div class="datafelt">
 <label for="postnummer">Gateadresse: </label>
 <span id="postnummer">'. $medlem['gateadresse'] .
'</span>
</div>

<div class="datafelt">
 <label for="postnummer">Postnummer: </label>
 <span id="postnummer">'. $medlem['postnummer'] .
'</span>
</div>

<div class="datafelt">
 <label for="poststed">Poststed: </label>
 <span id="poststed">'. $medlem['poststed'] .
'</span>
</div>



</div>
</div>'; 
}
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>