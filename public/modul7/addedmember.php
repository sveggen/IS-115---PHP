<!-- Oppgave 2 -->
<?php

include './include/header.inc.php';
$title = "Member list";

require_once "models/MemberModel.php";



?>
<div class="bakgrunn">

<div class="medlembakgrunn">
    <div class="medlemdata">
        <h3>Nytt medlem har blitt registrert:</h3>
        <br>
        <h4>Personalia: </h4>
        <div class="datafelt">
            <label for="fornavn">Fornavn: </label>
            <span id="fornavn"><?php echo $member['fornavn'] ?>
   </span>
        </div>
        <div class="datafelt">
            <label for="etternavn">Etternavn: </label>
            <span id="etternavn"><?php echo $member['etternavn'] ?>
  </span>
        </div>
        <div class="datafelt">
            <label for="mobilnummer">Mobilnummer: </label>
            <span id="mobilnummer"><?php echo $member['mobilnummer'] ?>
</span>
        </div>
        <div class="datafelt">
            <label for="dato">Fødselsdato: </label>
            <span id="dato"><?php echo date("d.m.Y", strtotime($member['dato'])) ?>
</span>
        </div>
        <div class="datafelt">
            <label for="kjonn">Kjønn: </label>
            <span id="kjonn"><?php echo ucfirst($member['kjonn']) ?>
</span>
        </div>
        <br>
        <h4>Adresse: </h4>
        <div class="datafelt">
            <label for="postnummer">Gateadresse: </label>
            <span id="postnummer"><?php echo $member['gateadresse'] ?>
</span>
        </div>
        <div class="datafelt">
            <label for="postnummer">Postnummer: </label>
            <span id="postnummer"><?php echo $member['postnummer'] ?>
</span>
        </div>
        <div class="datafelt">
            <label for="poststed">Poststed: </label>
            <span id="poststed"><?php echo $member['poststed'] ?>
</span>
        </div>
        <br>
        <h4>Medlemsopplysninger: </h4>
        <div class="datafelt">
            <label for="medlemsnr">Medlemsnummer: </label>
            <span id="medlemsnr"><?php echo $member['medlemsnr'] ?>
</span>
        </div>
        <div class="datafelt">
            <label for="kontigent">Kontigentstatus: </label>
            <span id="kontigent"><?php echo $member['kontigent'] ?>
</span>
        </div>
        <div class="datafelt">
            <label for="innmeldt">Dato for innmelding: </label>
            <span id="innmeldt"><?php echo date("d.m.Y", strtotime($member['innmeldt'])) ?>
</span>
        </div>
        <div class="datafelt">
            <label for="interesser">Interesser: </label>
            <span id="interesser"><?php echo implode(", ", $member['interesser']) ?>
</span>
        </div>
    </div>
</div>
