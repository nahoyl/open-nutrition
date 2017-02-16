jQuery(document).ready(function () {
    gestionDialog();
});

function gestionDialog() {
//    $('.nomplat').click(function () {
$(document).on('click','.nomplat',function(e){
        var nomPlats = $(this).html();
        $.ajax({
            url: 'http://192.168.0.48/open-nutrition/OpenNutrition/index.php/Welcome/getAllergeneCO2/' + nomPlats,
            type: 'get',
            dataType: 'html', // On désire recevoir du HTML
            success: function (code_html, statut) { // code_html contient le HTML renvoyé
                $('#dialog').html(code_html);
                var dialog = document.querySelector('#dialog');

                if (!dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                dialog.showModal();
//                  $(document).on('click','.fermerDialog',function(e){
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

}




