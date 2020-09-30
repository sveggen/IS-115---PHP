<!-- Oppgave 5 -->


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

<?php

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

?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>