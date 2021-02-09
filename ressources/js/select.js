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