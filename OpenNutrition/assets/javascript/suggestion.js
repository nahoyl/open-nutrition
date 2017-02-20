$(document).on('click', '.lien', function (e) {
    if (existPanier()) {
        var idSelected = $(this).attr('href');
        if (idSelected == "#fixed-tab-1") {
            var baliseUL = $(idSelected + ' .listePlat');
            chargerListe(getPlatMenu(), 'Plat', baliseUL);
//			console.log(baliseUL);
        } else if (idSelected == "#fixed-tab-2") {
            var baliseUL = $(idSelected + ' .listeEntree');
            chargerListe(getPlatMenu(), 'Entree', baliseUL);
//			console.log(baliseUL);

        } else if (idSelected == "#fixed-tab-3") {
            var baliseUL = $(idSelected + ' .listeDessert');
            chargerListe(getPlatMenu(), 'Dessert', baliseUL);
//			consoleC.log(baliseUL);

        }
//                console.log(baliseUL);
    }
});




function getPlatMenu() {
    var nbElemtent = nbElemtentDansLePannier();
    if (nbElemtent == 1) {
        return $('#fixed-tab-1 .demo-list-control.mdl-list.width-auto.padding-bottom-top-0px .mdl-list__item-primary-content span:first').text();
    } else if (nbElemtent == 2) {
        var arrayPlat = "";
        $('#fixed-tab-1 .demo-list-control.mdl-list.width-auto.padding-bottom-top-0px li .span_nom').each(function () {
            arrayPlat += $(this).text() + "/";
        })
        return arrayPlat;

    } else if (nbElemtent == 3) {

    }


}

function chargerListe(plat, type, baliseUL) {
    var nbElement = nbElemtentDansLePannier();
//	console.log("nbElement : "+ nbElement);
    if (nbElement == 1) {
        chargerListAvecUnPlat(plat + '/null/', type, baliseUL);
    } else if (nbElement == 2) {
        chargerListAvecUnPlat(plat, type, baliseUL);
    } else if (nbElement == 3) {

    }
}


function nbElemtentDansLePannier() {
    if (existPanier()) {
        return $('.demo-list-control.mdl-list.width-auto.padding-bottom-top-0px').children('li').size() / 3;
    }
    return 0;
}

function chargerListAvecUnPlat(plat, type, baliseUL) {
    var ulrAjax = baseURL() + '/Welcome/getListeTrier/' + plat + '' + type;
//	console.log(ulrAjax);
    $.ajax({
        url: ulrAjax, // La ressource ciblée
        type: 'GET', // Le type de la requête HTTP.
        dataType: 'html',
        success: function (code_html, statut) { // success est toujours en place, bien sûr !
            if (existPanier()) {
                $(baliseUL).html(code_html);
                window.componentHandler.upgradeDom();

                gestionPanier();
                gestionDialog();
            }
        },
        error: function (resultat, statut, erreur) {
            alert('error');

        }

    });


}

