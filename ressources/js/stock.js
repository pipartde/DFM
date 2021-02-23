

//-------------------------------------------------------//
// ajout feuille de style print.css onClick()
//-------------------------------------------------------//
function callPrintCss() {
    window.print();
}
// function callPrintCss() {
//     var print_css = document.createElement('link');
//     print_css.href = "../ressources/css/print.css";
//     print_css.rel = "stylesheet";
//     print_css.type = "text/css";
//     print_css.media = "print";
//     document.getElementsByTagName("head")[0].appendChild(print_css);
//     setTimeout(function () {window.print();},500) // 0.5 seconde
// }


//-------------------------------------------------------//
// mise en place des tags de recherches
//-------------------------------------------------------//
// Cache the target element
var $selectValueCategory = $('#select_value_category').find('strong');
var $selectValueType = $('#select_value_type').find('strong');
var $selectValueMarque = $('#select_value_marque').find('strong');
var $selectValueName = $('#select_value_name').find('strong');
var $selectValueStatus = $('#select_value_status').find('strong');
var $selectValueProject = $('#select_value_project').find('strong');
// Get initial value
$selectValueCategory.text($('#get_value_category').val());
$selectValueType.text($('#get_value_type').val());
$selectValueMarque.text($('#get_value_marque').val());
$selectValueName.text($('#get_value_name').val());
$selectValueStatus.text($('#get_value_status').val());
$selectValueProject.text($('#get_value_project').val());

// Initialize Selectric and bind to 'change' event
$('#get_value_category').selectric().on('change', function() {
    $selectValueCategory.text($(this).val());
    if(($('#get_value_category').prop('selectedIndex'))!==0){
        $('#toshow').removeClass("hide");
        switch ($('#get_value_category').val()) {
            case "1":
                $.get('ordinateur.php', function (data) {
                    $('#get_value_type').append(data).selectric();
                })
                break;
            case "2":
                var pk_cat = "2";
                $.ajax({
                    // methode post
                    type: "POST",
                    // on passe notre variable avec le contenu du pk de la category
                    data: pk_cat,
                    // on appelle le fichier php
                    url: 'cable.php',
                    success: function(data) {
                        // si le check php est un succès on apelle la fonction de succès et on enleve la class 'disabled' du bouton
                        $('#get_value_type').append(data).selectric();

                    },
                    error: function(response) {
                    }
                });
        }
    } else {
        $('#toshow').addClass("hide");
    }


});
$('#get_value_type').selectric().on('change', function() {
    $selectValueType.text($(this).val());
});
$('#get_value_marque').selectric().on('change', function() {
    $selectValueMarque.text($(this).val());
});
$('#get_value_name').selectric().on('change', function() {
    $selectValueName.text($(this).val());
});
$('#get_value_status').selectric().on('change', function() {
    $selectValueStatus.text($(this).val());
});
$('#get_value_project').selectric().on('change', function() {
    $selectValueProject.text($(this).val());
});




//------------------------------------------------------------------//
// reset des valeurs des champs de recherches (click sur les tags)
//------------------------------------------------------------------//
function resetSearch($getvalue,$selectvalue,$text) {
    $($getvalue).selectric();

    $($selectvalue).on('click', function () {
        $($getvalue).prop('selectedIndex', 0).selectric('refresh');
        $text.text('');
    });
}
resetSearch('#get_value_category', '#select_value_category',$selectValueCategory);
resetSearch('#get_value_type', '#select_value_type',$selectValueType);
resetSearch('#get_value_marque', '#select_value_marque',$selectValueMarque);
resetSearch('#get_value_name', '#select_value_name',$selectValueName);
resetSearch('#get_value_status', '#select_value_status',$selectValueStatus);
resetSearch('#get_value_project', '#select_value_project',$selectValueProject);


//-------------------------------------------------------//
// btn du menu
//-------------------------------------------------------//
function btn_menu() {
    var x = document.getElementById("myBoxNav");
    if (x.className === "box-nav") {
        x.className += " responsive";
    } else {
        x.className = "box-nav";
    }
}


//-------------------------------------------------------------------//
// affichage du nombre de résultat trouvé (nombre de TR du tableau)
//-------------------------------------------------------------------//
function TotalResearch() {
    var tbody = document.getElementById('checkNumber');
    var trNbr = tbody.getElementsByTagName('tr');
    var num = trNbr.length;
    var result = document.getElementById('nbrResult');
    result.innerHTML += num;
}
TotalResearch();