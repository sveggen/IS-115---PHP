<!-- Oppgave 5 -->

<?php

include './include/header.inc.php';
$title = "Endre medlem";

include './include/feltValidering.inc.php';

// array som inneholder all dummy-medlemsdata
$medlem = array(
    "fornavn" => "Markus",
    "etternavn" => "Sveggen",
    "epost" => "m.k@gmail.com",
    "mobilnummer" => 98121102,
    "dato" => "1998-12-03",
    "kjonn" => "mann",
    "medlemsnr" => 123139,
    "kontigent" => "betalt",
    "innmeldt" => "2010-10-10",
    "gateadresse" => "Fjellveien 12",
    "postnummer" => "4563",
    "poststed" => "Kristiansand",
    "interesser" => array(
        "klatring",
        "gaming"
    ),
    "kursaktiviteter" => array(
        "lederkurs"
    )
);

//sjekker om alle felt er utfylt
alleFeltUtfylt();

/**
 * Populerer felt med verdi fra $medlem arrayet.
 */
function setVerdi($felt)
{
    global $medlem;
    $value = "value =" . $medlem[$felt];
    echo (string)$value;
}

?>
<div class="registrer-medlem">
    <form action="" method="post" id="oppdater" name="oppdater">
        <div class="form-group">
            <h3>Medlemskap</h3>
        </div>

        <?php

        /**
         * Sjekker om endringer er blitt gjort og oppdaterer evt. '
         * array og printer tilhørende beskjed.
         */
        if (isset($_POST['submit']) && alleFeltUtfylt() == true) {
            $endringer_gjort = false;
            if ($medlem['interesser'] != $_POST['interesser']
                or $medlem['kursaktiviteter'] != $_POST['kursaktiviteter']
                or count(array_diff($medlem, $_POST)) >= 4) {
                $endringer_gjort = true;
                $medlem = array_replace($medlem, $_POST);
                echo '<small class="form-text text-success">Nye endringer ble lagret.</small><br>';
            } else {
                echo '<small class="form-text text-danger">Ingen nye endringer ble lagret.</small><br>';
            }
        }
        ?>

        <div class="form-row">
            <div class="form-group">
                <label for="fornavn">Fornavn: </label>
                <input type="text" class="form-control" name="fornavn" placeholder="Navn"
                    <?php echo (!empty($medlem['fornavn'])) ? ('value = "' . $medlem["fornavn"] . '"') : "value = \"\""; ?> />
                <?php if (empty($_POST['fornavn']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Fyll inn et fornavn.</small>
                <?php } ?>
            </div>
            <div class="form-group ">
                <label for="etternavn">Etternavn: </label>
                <input type="text" class="form-control" name="etternavn" placeholder="Navnesen"
                    <?php echo (!empty($medlem['etternavn'])) ? ('value = "' . $medlem["etternavn"] . '"') : "value = \"\""; ?> />
                <?php if (empty($_POST['etternavn']) && isset($_POST['submit'])) {
                    ?>
                    <small class="form-text text-danger">Fyll inn et etternavn.</small>
                <?php } ?>
            </div>
        </div>
        <div class="form-group ">
            <label for="email">Email: </label>
            <input type="email" class="form-control" name="epost"
                   placeholder="ola@mail.no" <?php setVerdi("epost") ?> />
            <?php if (empty($_POST['epost']) && isset($_POST['submit'])) { ?>
                <small class="form-text text-danger">Fyll inn en gyldig epostadresse.</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="mobilnummer">Mobilnummer: </label>
            <input type="tel" class="form-control" name="mobilnummer" pattern="[0-9]{8}"
                   placeholder="12345678" <?php setVerdi("mobilnummer") ?> />
            <?php if (empty($_POST['mobilnummer']) && isset($_POST['submit'])) { ?>
                <small class="form-text text-danger">Fyll inn et mobilnummer med 8 tall.</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="dato">Fødselsdato: </label>
            <input type="date" class="form-control" name="dato" min="1900-01-01"
                   max="2010-01-01" <?php date("d.m.Y", strtotime(setVerdi("dato"))) ?> placeholder/>
            <?php if (empty($_POST['dato']) && isset($_POST['submit'])) { ?>
                <small class="form-text text-danger">Fyll inn en gyldig fødselsdato.</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="mann" name="kjonn" value="mann" class="custom-control-input"
                    <?php if (($medlem['kjonn']) == "mann") { ?> checked=true <?php } ?> />
                <label class="custom-control-label" for="mann">Mann</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="dame" name="kjonn" value="dame" class="custom-control-input"
                    <?php if (($medlem['kjonn']) == "dame") { ?> checked=true <?php } ?> />
                <label class="custom-control-label" for="dame">Dame</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="annet" name="kjonn" value="annet" class="custom-control-input"
                    <?php if (($medlem['kjonn']) == "annet") { ?> checked=true <?php } ?> />
                <label class="custom-control-label" for="annet">Annet</label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group ">
                <label for="gateadresse">Gateadresse: </label>
                <input type="text" class="form-control" name="gateadresse" placeholder="Grindvegen 47"
                    <?php echo (!empty($medlem['gateadresse'])) ? ('value = "' . $medlem["gateadresse"] . '"') : "value = \"\""; ?> />
                <?php if (empty($_POST['gateadresse']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Fyll inn en gateadresse.</small>
                <?php } ?>
            </div>
            <div class="form-group ">
                <label for="postnummer">Postnummer: </label>
                <input type="text" class="form-control" name="postnummer" pattern="[0-9]{4}"
                       placeholder="1431" <?php setVerdi("postnummer") ?> />
                <?php if (empty($_POST['postnummer']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Fyll inn et gyldig postnummer.</small>
                <?php } ?>
            </div>
            <div class="form-group ">
                <label for="poststed">Poststed: </label>
                <input type="text" class="form-control" name="poststed"
                       placeholder="Stabekk" <?php setVerdi("poststed") ?> />
                <?php if (empty($_POST['poststed']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Fyll inn et poststed.</small>
                <?php } ?>
            </div>
        </div>

        <?php

        /**
         * Populerer valgte interesser med en 'checkmark'.
         */
        function valgteInteresser($interesse)
        {
            global $medlem;
            if (isset($medlem['interesser']) && in_array($interesse, $medlem['interesser'])) {
                $checked = "checked";
            } else {
                $checked = "";
            }
            echo (string)$checked;
        }

        ?>

        <div class="form-group ">
            <label for="checkboxes">Interesser:</label>
            <div class="checkboxes" id="sjekkbokser">
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="ballsport" <?php valgteInteresser("ballsport") ?>>
                    <label class="form-check-label" for="ballsport">Ballsport</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="dans" <?php valgteInteresser("dans") ?>>
                    <label class="form-check-label" for="dans">Dans</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="sminke" <?php valgteInteresser("sminke") ?>>
                    <label class="form-check-label" for="sminke">Sminke</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="programmering" <?php valgteInteresser("programmering") ?>>
                    <label class="form-check-label" for="programmering">Programmering</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="klatring" <?php valgteInteresser("klatring") ?>>
                    <label class="form-check-label" for="klatring">Klatring</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="gaming" <?php valgteInteresser("gaming") ?>>
                    <label class="form-check-label" for="gaming">Gaming</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="musikk" <?php valgteInteresser("musikk") ?>>
                    <label class="form-check-label" for="musikk">Musikk</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="matlaging" <?php valgteInteresser("matlaging") ?>>
                    <label class="form-check-label" for="matlaging">Matlaging</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="trening" <?php valgteInteresser("trening") ?>>
                    <label class="form-check-label" for="trening">Trening</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="interesser[]" class="form-check-input"
                           value="sminke" <?php valgteInteresser("sminke") ?>>
                    <label class="form-check-label" for="sminke">Sminke</label>
                </div>
                <?php if (empty($_POST['interesser']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Velg minst en interesse.</small>

                <?php }

                /**
                 * Markerer alle valgte kurs i nedtrekksmenyen.
                 */
                function valgteKurs($kurs)
                {
                    global $medlem;
                    if (isset($medlem['kursaktiviteter']) && in_array($kurs, $medlem['kursaktiviteter'])) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    echo (string)$selected;
                }

                ?>

            </div>
        </div>
        <div class="form-group">
            <label for="kursaktiviteter">Kursaktiviteter:</label>
            <select name="kursaktiviteter[]" class="form-control kurs-select" id="kurs" multiple>
                <option <?php valgteKurs("klatrekurs") ?> value="klatrekurs">Klatrekurs</option>
                <option <?php valgteKurs("lederkurs") ?> value="lederkurs">Lederkurs</option>
                <option <?php valgteKurs("gitarkurs") ?> value="gitarkurs">Gitarkurs</option>
                <option <?php valgteKurs("matlagingskurs") ?> value="matlagingskurs">Matlagingskurs</option>
                <option <?php valgteKurs("sangkurs") ?> value="sangkurs">Sangkurs</option>
                <option <?php echo (isset($_POST['kursaktiviteter']) && in_array('sminkekurs', $_POST['kursaktiviteter'])) ? "selected" : "" ?>
                        value="sminkekurs">Sminkekurs
                </option>
            </select>
        </div>
        <h4>Medlemsopplysninger: </h4>
        <div class="form-group">
            <label for="medlemsnr" class="disabled">Medlemsnummer: </label>
            <input type="text" id="medlemsnr" class="form-control" disabled
                   placeholder=<?php echo $medlem['medlemsnr'] ?>>
            </span>
        </div>
        <div class="form-group">
            <label for="kontigent" class="disabled">Kontigentstatus: </label>
            <input type="text" id="kontigent" class="form-control" disabled
                   placeholder=<?php echo ucfirst($medlem['kontigent']) ?>>
        </div>
        <div class="form-group">
            <label for="innmeldt" class="disabled">Dato for innmelding: </label>
            <input type="text" id="innmeldt" class="form-control" disabled
                   placeholder=<?php echo date("d.m.Y", strtotime($medlem['innmeldt'])) ?>>
            </span>
        </div>

        <script> readOnly(); </script>

        <div class="form-group" id="submitButton" style="visibility: none">
            <button class="btn btn-primary btn-block" id="submitBtn" name="submit" style="background-color: green"
                    type="submit">Lagre
            </button>
        </div>
        <div class="form-group">
            <button type="button" id="endreButton" onclick=hideAndWritable() class="btn btn-primary btn-block">Endre
            </button>
        </div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>

<script>
    hide(document.getElementById('submitButton'));
</script>

<?php include './include/footer.inc.php'; ?>