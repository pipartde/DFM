//-------------------------------------------------------//
// affichage selon accès autorisé
//-------------------------------------------------------//
function toggleShowAdmin() {
    $(document).find(".superadmin").each(function () {
        $(this).addClass("hide");
    })
}

function toModify(pk){
    var classe = ".mod"+pk;
    $(document).find(classe).each(function (){
        $(this).prop("disabled", false);
    })
    $(document).find(classe+'.vidange').each(function (){
        $(this).attr("value","");
    })
    $(document).find('.offModify').each(function (){
        $(this).addClass("hide");
    })
    $(document).find('.onModify').each(function (){
        $(this).removeClass("hide");
    })
}

function forModify(pk){
    var classe = ".mod"+pk;
    $(document).find(classe).each(function (){
        $(this).prop("disabled", true);
    })
    $(document).find('.offModify').each(function (){
        $(this).removeClass("hide");
    })
    $(document).find('.onModify').each(function (){
        $(this).addClass("hide");
    })


    var id = $(document).find('.modifyAdmin').data("form");
    // on récupère le bloc formulaire
    var form = $("form[data-form=" + id + "]");
    // on récupère son url
    var url = form.attr("action");
    // on appele notre fonction de check
    ajaxForm(form, url);

}
// Fonction d'ajax
function ajaxForm(form, url) {

    var form = $(form);
    var id_form = form.data("form");
    // on passe les input du formulaire via la fonction serialize dans une variable
    var fields = form.serialize();
    // appel ajax
    $.ajax({
        // methode post
        type: "POST",
        // on passe notre variable avec le contenu du formulaire
        data: fields,
        // on appelle le fichier php (renseigné sur le formulaire)
        url: url,
        success: function(data) {
            // si le check php est un succès on apelle la fonction de succès et on enleve la class 'disabled' du bouton
            afterSendOk(id_form);
        },
        error: function(response) {
            // si le check php comporte une erreur on apelle la fonction de d'erreur en lui passant la réponse du php et on enleve la class 'disabled' du bouton

            //afterSendNotOk(response['responseText'], id_form);
        }
    });
}
function afterSendOk(form) {
    switch (form) {
        // si notre data-form est 'register'
        case "register":
            // on affiche le message finale et on cache le form
            $(".sended").show();
            $(".not_sended").hide();

            // on cache/affiche les infos voulue puis on réalise un timeout (ici 6secondes) avant un redirect vers la pageAdmin.php
            location.replace("pageAdmin.php");

            break;
    }
}