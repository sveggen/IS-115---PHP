<!-- Oppgave 5 -->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Endre medlem</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="/modul-4/style.css">
</head>
<body>
<div class="bakgrunn">
<div class="medlembakgrunn">
  <div class="medlemdata">
    <h3>Medlem</h3>
    <hr width=100%”>
    <h4>Personalia: </h4>
    <div class="datafelt">
    <label for="fornavn">Fornavn: </label>
    <span id="fornavn"><?php echo $medlem['fornavn'] ?>
   </span>
   </div>
   <div class="datafelt">
   <label for="etternavn">Etternavn: </label>
   <span id="etternavn"><?php echo $medlem['etternavn'] ?>
  </span>
  </div>
 <div class="datafelt">
 <label for="mobilnummer">Mobilnummer: </label>
 <span id="mobilnummer"><?php echo $medlem['mobilnummer'] ?>
</span>
</div>
<div class="datafelt">
 <label for="dato">Fødselsdato: </label>
 <span id="dato"><?php echo date("d.m.Y", strtotime($medlem['dato'])) ?>
</span>
</div>
<div class="datafelt">
 <label for="kjonn">Kjønn: </label>
 <span id="kjonn"><?php echo ucfirst($medlem['kjonn']) ?>
</span>
</div>
<br>
<h4>Medlemsopplysninger: </h4>
<div class="datafelt">
 <label for="medlemsnr">Medlemsnummer: </label>
 <span id="medlemsnr"><?php echo $medlem['medlemsnr'] ?>
</span>
</div>
<div class="datafelt">
 <label for="kontigent">Kontigentstatus: </label>
 <span id="kontigent"><?php echo $medlem['kontigent'] ?>
</span>
</div>
<div class="datafelt">
 <label for="innmeldt">Dato for innmelding: </label>
 <span id="innmeldt"><?php echo $medlem['innmeldt'] ?>
</span>
</div>
<br>
<h4>Adresse: </h4>
<div class="datafelt">
 <label for="postnummer">Gateadresse: </label>
 <span id="postnummer"><?php echo $medlem['gateadresse'] ?>
</span>
</div>
<div class="datafelt">
 <label for="postnummer">Postnummer: </label>
 <span id="postnummer"><?php echo $medlem['postnummer'] ?>
</span>
</div>
<div class="datafelt">
 <label for="poststed">Poststed: </label>
 <span id="poststed"><?php echo $medlem['poststed'] ?>
</span>
</div>
<div class="datafelt">
 <label for="interesser">Interesser: </label>
 <span id="interesser"><?php echo "hei"; ?>
</span>
</div>
<div class="datafelt">
 <label for="kursaktiviteter">Kursaktiviteter: </label>
 <span id="kursaktiviteter"><?php echo "hei"; ?>
</span>
</div>
<button class="btn btn-primary btn-block" onclick="goBack()">Endre medlem</button>
</div>
</div>



<?php

?>