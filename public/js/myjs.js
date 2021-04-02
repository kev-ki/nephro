function showHideUro() {
    if (document.getElementById('nom_maladie').value === 'oeudeme'){
        document.getElementById('nombre_episode').style.display = 'block';
        document.getElementById('oeudemesiege').style.display = 'block';
        document.getElementById('traitement_recu').style.display = 'block';
        document.getElementById('ifevolution').style.display = 'block';
    }else {
        document.getElementById('nombre_episode').style.display = 'none';
        document.getElementById('oeudemesiege').style.display = 'none';
        document.getElementById('traitement_recu').style.display = 'none';
        document.getElementById('ifevolution').style.display = 'none';
    }

    if (document.getElementById('nom_maladie').value === 'proteinurie') {
        document.getElementById('nombre_episode').style.display = 'block';
        document.getElementById('traitement_recu').style.display = 'block';
        document.getElementById('ifevolution').style.display = 'block';
    }else {
        if (document.getElementById('nom_maladie').value != 'oeudeme') {
            document.getElementById('nombre_episode').style.display = 'none';
            document.getElementById('traitement_recu').style.display = 'none';
            document.getElementById('ifevolution').style.display = 'none';
        }
    }

    if (document.getElementById('nom_maladie').value === 'hematurie') {
        document.getElementById('type_hematurie').style.display = 'block';
        document.getElementById('signe_accompagnement').style.display = 'block';
    }else {
        document.getElementById('type_hematurie').style.display = 'none';
        document.getElementById('signe_accompagnement').style.display = 'none';
    }

    if (document.getElementById('nom_maladie').value === 'troublemictiondiurese') {
        document.getElementById('type_trouble').style.display = 'block';
        document.getElementById('traitement_trouble').style.display = 'block';
    }else {
        document.getElementById('type_trouble').style.display = 'none';
        document.getElementById('traitement_trouble').style.display = 'none';
    }

    if (document.getElementById('nom_maladie').value === 'oeudeme' || document.getElementById('nom_maladie').value === 'proteinurie') {
        if (document.getElementById('evolution').value === 'rechute') {
            document.getElementById('rechute_nombre').style.display = 'block';
        }else {
            document.getElementById('rechute_nombre').style.display = 'none';
        }
    }

    if (document.getElementById('nom_maladie').value === 'proteinurie' && document.getElementById('traitement').value === 'corticoide') {
        document.getElementById('dose_corticoide').style.display = 'block';
        document.getElementById('duree_corticoide').style.display = 'block';
    }else {
        document.getElementById('dose_corticoide').style.display = 'none';
        document.getElementById('duree_corticoide').style.display = 'none';
    }

    if (document.getElementById('nom_maladie').value === 'proteinurie' && document.getElementById('traitement').value === 'autre') {
        document.getElementById('precision_traitement').style.display = 'block';
    }else {
        document.getElementById('precision_traitement').style.display = 'none';
    }

    if (document.getElementById('nom_maladie').value === 'troublemictiondiurese' && document.getElementById('type_trouble').value === 'autre') {
        document.getElementById('precision_autre_trouble').style.display = 'block';
    }else {
        document.getElementById('precision_autre_trouble').style.display = 'none';
    }
}

function showHideInfection(that) {
    document.getElementById('type_vih').style.display= 'none';
    document.getElementById('precision_autre').style.display= 'none';
    if (that.value === 'infectionfocale' || that.value === 'infectionurinaire'|| that.value === 'infectionvirale') {
        document.getElementById('typeInfection').style.display = 'block';
        document.getElementById('episode').style.display = 'block';
        if (that.value === 'infectionfocale' || that.value === 'infectionurinaire') {
            document.getElementById('datedernierepisode').style.display = 'block';
        }else {
            document.getElementById('datedernierepisode').style.display = 'none';
        }
    }else {
        document.getElementById('typeInfection').style.display = 'none';
        document.getElementById('episode').style.display = 'none';
        document.getElementById('datedernierepisode').style.display = 'none';
    }

    if (that.value === 'infectionvirale' || that.value === 'bilharziose' || that.value === 'tuberculose') {
        document.getElementById('siege_infection').style.display = 'block';
        document.getElementById('decouverte').style.display = 'block';
    }else {
        document.getElementById('siege_infection').style.display = 'none';
        document.getElementById('decouverte').style.display = 'none';
    }

    if (that.value === 'paludisme') {
        document.getElementById('nombreacces').style.display = 'block';
    }else {
        document.getElementById('nombreacces').style.display = 'none';
    }

    if (that.value === 'tuberculose') {
        document.getElementById('duree_tuberculose').style.display = 'block';
    }else {
        document.getElementById('duree_tuberculose').style.display = 'none';
    }
}
function infectiontype(){
    if (document.getElementById('type').value === 'vih') {
        document.getElementById('type_vih').style.display= 'block';
    }else {
        document.getElementById('type_vih').style.display= 'none';
    }

    if (document.getElementById('type').value === 'autre') {
        document.getElementById('precision_autre').style.display= 'block';
    }else {
        document.getElementById('precision_autre').style.display= 'none';
    }
}

function maladieGenerale(that) {
    if (that.value === 'drepanocytose') {
        document.getElementById('type_hemoglobine').style.display = 'block';
        document.getElementById('decouverte_mgenerale').style.display = 'none';
    }else {
        document.getElementById('type_hemoglobine').style.display = 'none';
        document.getElementById('decouverte_mgenerale').style.display = 'block';
    }

    if (that.value === 'hypertension_arterielle') {
        document.getElementById('frequence_traitement').style.display = 'block';
    }else {
        document.getElementById('frequence_traitement').style.display = 'none';
    }

    if (that.value === 'diabete') {
        document.getElementById('type_diabete').style.display = 'block';
    }else {
        document.getElementById('type_diabete').style.display = 'none';
    }
}

function affectionIMM(that) {
    if (that.value === 'autre') {
        document.getElementById('precision_imm').style.display = 'block';
    }else {
        document.getElementById('precision_imm').style.display = 'none';
    }
}

function examGeneralAmai(that) {
    if (that.value === 'amaigrissement') {
        document.getElementById('amaigrissement').style.display = 'flex';
    }else {
        document.getElementById('amaigrissement').style.display = 'none';
    }
}
function examGeneralAutre(that) {
    if (that.value === 'autre') {
        document.getElementById('lesion_langue').style.display = 'block';
    }else {
        document.getElementById('lesion_langue').style.display = 'none';
    }
}

function examAppareil(that) {
    if (that.value === 'autre') {
        document.getElementById('nom_autre').style.display = 'block';
    }else {
        document.getElementById('nom_autre').style.display = 'none';
    }
}

function fonctionParaclinic(that) {
    if (that.checked) {
        document.getElementById('autre_para').style.display = 'block';
    }else {
        document.getElementById('autre_para').style.display = 'none';
        document.getElementById('resultat').value = null;
        document.getElementById('resultat1').value = null;
        document.getElementById('nom_autre').value = null;
        document.getElementById('nom_autre1').value = null;
    }
}

function parasitologie(that) {
    if (that.checked) {
        document.getElementById('autre_parasitologie').style.display = 'block';
    }else {
        document.getElementById('autre_parasitologie').style.display = 'none';
        document.getElementById('resultat').value = null;
        document.getElementById('resultat1').value = null;
        document.getElementById('nom_autre').value = null;
        document.getElementById('nom_autre1').value = null;
    }
}

function hospisearch(that) {
    if (that.value === "date_entree" || that.value === "date_sortie") {
        document.getElementById('rechercher').type = 'date';
    }else {
        document.getElementById('rechercher').type = 'text';
    }
}

function serologieHbc(that) {
    if (that.value === 'positif') {
        document.getElementById('charge_hbc').style.display = 'block';
    }else {
        document.getElementById('charge_hbc').style.display = 'none';
    }
}

function serologieHbs(that) {
    if (that.value === 'positif') {
        document.getElementById('charge_hbs').style.display = 'block';
    }else {
        document.getElementById('charge_hbs').style.display = 'none';
    }
}

//==============================================================================================
