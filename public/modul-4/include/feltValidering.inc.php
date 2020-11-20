<?php

function alleFeltUtfylt(){
    if (!empty($_POST['fornavn']) && !empty($_POST['etternavn'])
        && !empty($_POST['epost']) && !empty($_POST['mobilnummer'])
        && !empty($_POST['dato']) && !empty($_POST['kjonn'])
        && !empty($_POST['gateadresse']) && !empty($_POST['postnummer'])
        && !empty($_POST['poststed']) && !empty($_POST['interesser'])){
        return true;
    }



}