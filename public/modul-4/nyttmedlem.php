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

<?php

$medlem = array();

function bool_verdier(){
  if (!empty($_POST['fornavn']) && !empty($_POST['etternavn']) 
  && !empty($_POST['epost']) && !empty($_POST['mobilnummer']) 
  && !empty($_POST['dato']) && !empty($_POST['kjonn']) 
  && !empty($_POST['gateadresse']) && !empty($_POST['postnummer'])
  && !empty($_POST['poststed']) && !empty($_POST['interesser'])){
    return true;
  }
}

if (isset($_POST['submit']) && bool_verdier() == true) {
  $medlem['fornavn'] = $_POST['fornavn'];
  $medlem['etternavn'] = $_POST['etternavn'];
  $medlem['epost'] = $_POST['epost'];
  $medlem['dato'] = $_POST['dato'];
  $medlem['kjonn'] = $_POST['kjonn'];
  $medlem['gateadresse'] = $_POST['gateadresse'];
  $medlem['postnummer'] = $_POST['postnummer'];
  $medlem['poststed'] = $_POST['poststed'];
  $medlem['medlemsnr'] = random_int(1000000, 9999999);
  $medlem['kontigent'] = "Ikke betalt";
  $medlem['innmeldt'] = date("d.m.Y");
  $medlem['interesser'] = $_POST['interesser'];
  if (isset($_POST['kursaktiviteter'])){
    $medlem['kursaktiviteter'] = $_POST['kursaktiviteter'];
  }
  ?>

  <div class="medlembakgrunn">
  <div class="medlemdata">
    <h3>Nytt medlem har blitt registrert:</h3>
    <br>
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
<div class="datafelt">
 <label for="kursaktiviteter">Kursaktiviteter: </label>
 <span id="kursaktiviteter"><?php if (isset($medlem['kursaktiviteter'])){ 
   echo implode(", ", $medlem['kursaktiviteter']);
   } else {
     echo "Ingen kurs registrert";
   }
  ?>
</span> 
</div>
<div class="datafelt">
 <label for="interesser">Interesser: </label>
 <span id="interesser"><?php echo implode(", ", $medlem['interesser']) ?>
</span>
</div>
<button class="btn btn-primary btn-block" onclick="goBack()">Gå tilbake</button>
<script>
function goBack() {
  window.history.back();
}
</script>
</div>
</div>

<?php
} else {
  if(empty($_POST['gateadresse']) && isset($_POST['submit'])){
    $manglerfelt = "Følgende felt mangler: "
?>
<script>
alert('<?php echo $manglerfelt . implode(", ", $ikkeutfylt); ?>');
</script>
<?php
  }
?>

<div class="registrer-medlem">
<form action="" method="post">
  <div class="form-group">
<h3>Registrere nytt medlem</h3>
  </div>
<div class="form-row">
<div class="form-group">
<label for="fornavn">Fornavn: </label>
<input type="text" class="form-control" name="fornavn" placeholder="Ola"/>
<?php if (empty($_POST['fornavn']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et fornavn.</small>
<?php }?>
</div>
<div class="form-group ">
<label for="etternavn">Etternavn: </label>
 <input type="text" class="form-control" name="etternavn" placeholder="Nordmann"/>
 <?php if (empty($_POST['etternavn']) && isset($_POST['submit'])){
   $mangler_verdier = true;
   ?>
  <small class="form-text text-danger">Fyll inn et etternavn.</small>
<?php }?>
</div>
</div>
<div class="form-group ">
<label for="email">Email: </label>
<input type="email" class="form-control" name="epost" placeholder="ola@mail.no"/>
<?php if (empty($_POST['epost']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn en gyldig epostadresse.</small>
<?php }?>
</div>
<div class="form-group">
<label for="mobilnummer">Mobilnummer: </label>
<input type="tel" class="form-control" name="mobilnummer" pattern="[0-9]{8}" placeholder="12345678"/>
<?php if (empty($_POST['mobilnummer']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et mobilnummer med 8 tall.</small>
<?php }?>
</div>
<div class="form-group">
<label for="dato">Fødselsdato: </label>
<input type="date" class="form-control" name="dato" />
<?php if (empty($_POST['dato']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn en fødselsdato.</small>
<?php }?>
</div>
<div class="form-group">
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
<?php if (empty($_POST['kjonn']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Velg ditt kjønn.</small>
<?php }?>
</div>
<div class="form-row">
<div class="form-group ">
<label for="gateadresse">Gateadresse: </label>
<input type="text" class="form-control" name="gateadresse" placeholder="Grindvegen 47"/>
<?php if (empty($_POST['gateadresse']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn en gateadresse.</small>
<?php }?>
</div>
<div class="form-group ">
<label for="postnummer">Postnummer: </label>
<input type="text" class="form-control" name="postnummer" pattern="[0-9]{4}" placeholder="1321"/>
<?php if (empty($_POST['postnummer']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et gyldig postnummer.</small>
<?php }?>
</div>
<div class="form-group "> 
<label for="poststed">Poststed: </label>  
<input type="text" class="form-control" name="poststed" placeholder="Stabekk"/>
<?php if (empty($_POST['poststed']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et poststed.</small>
<?php }?>
</div>
</div>
<div class="form-group "> 
<label for="checkboxes">Interesser:</label>
<div class="checkboxes">
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="ballsport">
    <label class="form-check-label" for="ballsport">Ballsport</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="dans">
    <label class="form-check-label" for="dans">Dans</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="sminke">
    <label class="form-check-label" for="sminke">Sminke</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="programmering">
    <label class="form-check-label" for="programmering">Programmering</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="klatring">
    <label class="form-check-label" for="klatring">Klatring</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" id="gaming">
    <label class="form-check-label" for="gaming">Gaming</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="musikk">
    <label class="form-check-label" for="musikk">Musikk</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="matlaging">
    <label class="form-check-label" for="matlaging">Matlaging</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="trening">
    <label class="form-check-label" for="trening">Trening</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="sminke">
    <label class="form-check-label" for="sminke">Sminke</label>
</div>
<?php if (empty($_POST['interesser']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Velg minst en interesse.</small>
<?php }?>
</div>
</div>
<div class="form-group"> 
<label for="kursaktiviteter">Kursaktiviteter:</label>
<select name="kursaktiviteter[]" class="form-control kurs-select" multiple>
    <option value="klatrekurs">Klatrekurs</option>
    <option value="lederkurs">Lederkurs</option>
    <option value="gitarkurs">Gitarkurs</option>
    <option value="matlagingskurs">Matlagingskurs</option>
    <option value="sangkurs">Sangkurs</option>
    <option value="sminkekurs">Sminkekurs</option>
</select>
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
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>