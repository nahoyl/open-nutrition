$(document).ready(function () {
    gestionPanier();
});
function gestionPanier() {

    $(document).on('click', 'input[type=radio][name=Plat]', function (e) {
//    $("input[type=radio][name=Plat]").click(function () {
        var platChecked = $("input[type=radio][name=Plat]:checked").val();
        var platPrixEltChecked = $("#" + platChecked + " .mdl-list__item-sub-title").text();
        var platNomEltChecked = $("#" + platChecked + " .nomplat").text();
        var platNote = $("#" + platChecked + " .note").text();

        platSelectonner(platChecked, platPrixEltChecked, platNomEltChecked, platNote, 'Plat')
    });
    $(document).on('click', 'input[type=radio][name=Dessert]', function (e) {
//    $("input[type=radio][name=Dessert]").click(function () {
        var dessertChecked = $("input[type=radio][name=Dessert]:checked").val();
        var dessertPrixEltChecked = $("#" + dessertChecked + " .mdl-list__item-sub-title").text();
        var dessertNomEltChecked = $("#" + dessertChecked + " .nomplat").text();
        var dessertNote = $("#" + dessertChecked + " .note").text();

        platSelectonner(dessertChecked, dessertPrixEltChecked, dessertNomEltChecked, dessertNote, 'Dessert')
    });
    $(document).on('click', 'input[type=radio][name=Entree]', function (e) {
//    $("input[type=radio][name=Entree]").click(function () {
        var entreeChecked = $("input[type=radio][name=Entree]:checked").val();
        var entreePrixEltChecked = $("#" + entreeChecked + " .mdl-list__item-sub-title").text();
        var entreeNomEltChecked = $("#" + entreeChecked + " .nomplat").text();
        var entreeNote = $("#" + entreeChecked + " .note").text();

        platSelectonner(entreeChecked, entreePrixEltChecked, entreeNomEltChecked, entreeNote, 'Entree');
    });




}


function possibleSupprimerLePanier() {
//    $(document).on('click', 'i.material-icons.float-right', function (e) {
    $('i.material-icons.float-right').click(function () {
//        console.log(this);
//        $(this).checked = false;
        var par = ($(this).parents('li')).attr('class');
        var res = par.replace(/ /g, '.');
        $(res).remove();
        if ($('.mdl-list__item.mdl-list__item--two-line.width-auto.padding-bottom-top-0px').size() == 0) {
            $('.mdl-card__title.mdl-card--expand').html(faiteVotreChoix());
            window.componentHandler.upgradeDom();
        }
    });

}

function faiteVotreChoix() {
    var choix = '<h2 class="mdl-card__title-text">Faites votre choix</h2>';
    return choix;
}


function platSelectonner(eltChecked, prixEltChecked, nom, note, type) {
    if (existPanier())
    {
        if ($('.mdl-list__item.mdl-list__item--two-line.width-auto.padding-bottom-top-0px.' + type).size()) {
            var eltPanier = '<span class="mdl-list__item-primary-content">';
            eltPanier += '<p class ="note note' + note + '">' + note + '</p>';
            eltPanier += '<span class="span_nom">' + nom + '</span>';
            eltPanier += '<span class="mdl-list__item-sub-title">' + prixEltChecked + '<i class="material-icons float-right">cancel</i></span></span>';
            $('.mdl-list__item.mdl-list__item--two-line.width-auto.padding-bottom-top-0px.' + type).html(eltPanier);
        } else {
            $('.mdl-list__item.mdl-list__item--two-line.width-auto.padding-bottom-top-0px:last-child').after(ajouterElementPanier(nom, prixEltChecked, note, type));
        }

    } else
    {
        var panier = ajoutEntetePanier();
        panier += ajouterElementPanier(nom, prixEltChecked, note, type);
        panier += ajoutFinPanier();
        $('.mdl-card__title.mdl-card--expand').html(panier);

    }
    possibleSupprimerLePanier();
    

}



function existPanier() {
    var existPanier = false;
    if ($('.mdl-card__title.mdl-card--expand').children('.panier-card-wide.mdl-card.mdl-shadow--4dp').size())
    {
        existPanier = true;
    }


    return existPanier;
}






function ajoutEntetePanier() {
    var panier = '<div class="panier-card-wide mdl-card mdl-shadow--4dp">';
    panier += ' <div class="mdl-card__title">';
    panier += '<h2 class="mdl-card__title-text">Menu</h2></div>';
    panier += '<div class="mdl-card__supporting-text padding-bottom-top-0px">';
    panier += '<ul class="demo-list-control mdl-list width-auto padding-bottom-top-0px">';
    return panier;

}

function ajouterElementPanier(nom, prix, note, type) {
    var eltPanier = '<li class=" mdl-list__item mdl-list__item--two-line width-auto padding-bottom-top-0px ' + type + '">';
    eltPanier += '<span class="mdl-list__item-primary-content">';
    eltPanier += '<p class ="note note' + note + '">' + note + '</p>';
    eltPanier += '<span class="span_nom">' + nom + '</span>';
    eltPanier += '<span class="mdl-list__item-sub-title">' + prix;
    eltPanier += '<i class="material-icons float-right">cancel</i></span></span></li>';

    return eltPanier;
}
function ajoutFinPanier() {
    var finPanier = '</ul> </div> </div>';

    return finPanier;

}






