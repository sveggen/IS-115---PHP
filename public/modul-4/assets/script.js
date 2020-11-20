
// Gjør alle input field til read only
function readOnly(){
    const form = document.oppdater;
    let elements = form.elements;
    let i = 0;
    let len = elements.length;
    for (; i < len; ++i) {
        elements[i].readOnly = true;
    }
    const radios = document.oppdater.kjonn;
    for (; i < len; i++) {
        radios[i].disabled = true;
    }
    document.getElementById("sjekkbokser");
    elements = form.elements;
    i = 0;
    len = elements.length;
    for (; i < len; i++) {
        elements[i].disabled = true;
    }
    const options = document.getElementById("kurs");
    elements = form.elements;
    i = 0;
    len = elements.length;
    for (; i < len; i++) {
        options[i].disabled = true;
    }
}

//Gjør det mulig å endre data i input-field
function readAndWriteOnly(){
    const form = document.oppdater;
    let elements = form.elements;
    let i = 0;
    let len = elements.length;
    for (; i < len; ++i) {
        elements[i].readOnly = false;
    }
    const radios = document.oppdater.kjonn;
    i = 0;
    len = radios.length;
    for (; i < len; i++) {
        radios[i].disabled = false;
    }
    document.getElementById("sjekkbokser");
    elements = form.elements;
    for (; i < len; i++) {
        elements[i].disabled = false;
    }
    const options = document.getElementById("kurs");
    elements = form.elements;
    i = 0;
    len = elements.length;
    for (; i < len; i++) {
        options[i].disabled = false;
    }
}

// Gjør element usynlig
function hide (elements) {
    elements = elements.length ? elements : [elements];
    for (let index = 0; index < elements.length; index++) {
        elements[index].style.display = 'none';
    }
}

// Gjør element synlig
function show() {
    let elements = document.getElementById('submitButton');
    elements = elements.length ? elements : [elements];
    for (let index = 0; index < elements.length; index++) {
        elements[index].style.display = 'unset';
    }
}

// Kaller på funksjonene hide() og writable()
function hideAndWritable(){
    show();
    hide(document.getElementById('endreButton'));
    readAndWriteOnly();
}