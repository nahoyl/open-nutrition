jQuery(document).ready(function () {

    $('.nomplat').click(function () {
        var nomPlats = $(this).html();
        $.ajax({
            url: 'http://192.168.0.48/open-nutrition/OpenNutrition/index.php/Welcome/getAllergeneIngredient/'+nomPlats,
            type: 'get',
            dataType: 'html', // On désire recevoir du HTML
            success: function (code_html, statut) { // code_html contient le HTML renvoyé
                $('#dialog').html(code_html);
                var dialog = document.querySelector('#dialog');

                if (!dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                dialog.showModal();
                
                $('.fermerDialog').click(function () {
                    dialog.close();
                    $('dialog').html('');
                });
            },
            error: function (resultat, statut, erreur) {
                alert('erre ajax');
            }
        });
    })




});
function ajouterClickDialog() {

    var dialog = document.querySelector('#dialog');
//    var closeButton = ;
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialog.showModal();
    var closeClickHandler = function (event) {
        dialog.close();
        $('dialog').html('');
    };
}

function fermerDialog() {

    $('.fermerDialog').click(function () {
        dialog.close();
        $('dialog').html('');
    });
}


