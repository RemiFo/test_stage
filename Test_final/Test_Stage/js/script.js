function surligne(champ, erreur) {  //erreur = true ou false
    if (erreur) {
        champ.style.backgroundColor = "#fba";
    } else {
        champ.style.backgroundColor = "";
    }
}

function surligneRadio(champ, erreur) { //erreur = true ou false
    if (erreur) {
        champ.style.boxShadow = "0px 0px 10px red";
    } else {
        champ.style.boxShadow = "";
    }
}

function VerifNom(champ) {
    if (champ.value.length < 2) {
        surligne(champ, true);
        return false;
    } else {
        surligne(champ, false);
        return true;
    }
}

function VerifMetier(champ) {
    var choix = document.getElementById("metier").value;
    if (choix === "null") {
        surligne(champ, true);
        return false;
    } else {
        surligne(champ, false);
        return true;
    }
}

function VerifRadio() {
    var radio1;
    var radio2;
    var compteur = 0;
    var i;
    for (i = 1; i <= 5; i += 1) {
        radio1 = document.getElementById("oui" + i);
        radio2 = document.getElementById("non" + i);
        surligneRadio(radio1, !(radio1.checked || radio2.checked));
        surligneRadio(radio2, !(radio1.checked || radio2.checked));
        if (radio1.checked || radio2.checked) { //si radio1 et radio2 = false
            compteur += 1;
        }
    }
    if (compteur === 5) {
        return true;
    }
    return false;
}



function VerifForm(f) {
    var nomOk = VerifNom(f.username);
    var metierOk = VerifMetier(f.metier);
    var radioOk = VerifRadio();

    if (nomOk && metierOk && radioOk) {
        alert("Formulaire envoyé !");
        return true;
    } else {
        alert("Veuillez remplir correctement tous les champs");
        var erreur = document.getElementById("erreur");
        erreur.textContent = "Erreur ! Veuillez renseigner tous les champs !";
        erreur.style.color = "red";
        return false;
    }
}