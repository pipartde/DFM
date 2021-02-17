//-------------------------------------------------------//
// affichage selon accès autorisé
//-------------------------------------------------------//
function testing() {
    $(document).find(".superadmin").each(function () {
        $(this).addClass("hide");
    })
}

function toModify(pk){
    var classe = ".mod"+pk;
    $(document).find(classe).each(function (){
        $(this).prop("disabled", false);
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
}