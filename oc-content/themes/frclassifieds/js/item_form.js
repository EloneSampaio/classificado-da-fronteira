
var is_loading = true ;

function fill_subcategory_select ( id ) {
var category    = $("select.category") ;
var subcategory = $("select.subcategory") ;

// reset subcategory select
subcategory.html("") ;

console.log(frc_theme.categories["id_" + id]) ;
//make sure the selected item in subcategory is visible
$(function(){
    $(".subcat").find('span').text($(this).find("select.subcategory option:selected" ).text());
});
// check that the category has subcategories
if( typeof frc_theme.categories["id_" + id] === "undefined" ) {
    console.log("[fill_subcategory_select] hide subcategory") ;
    subcategory.append( $("<option>").attr('value', id) ) ;
    subcategory.css("display", "none") ;
    $("select.subcategory").trigger('change') ;
    $('select.subcategory').parent().find('span').text('Select a subcategory...');
    $('select.subcategory').prop('disabled', true);
    $('.subcat .form-control').addClass('disabled');
    return true;
}

subcategory.html()
subcategory.append( $("<option>").attr('value', id).html(frc_theme.text_select_subcategory) ) ;
$.each(frc_theme.categories["id_" + id], function(key, value) {
    console.log("[fill_subcategory_select] subcategory { id: " + value.id + ", slug: " + value.slug + ", name: " + value.name + " }") ;
    subcategory.append( $("<option>").attr('value', value.id).html(value.name) ) ;
}) ;
subcategory.css("display", "") ;
$('select.subcategory').prop('disabled', false);
$('.subcat .form-control').removeClass('disabled');
return true;
}
$(document).ready(function() {
    $("select.category").bind("change", function(event) {
        fill_subcategory_select( $(this).val()) ;

        $('select.subcategory').parent().find('span').text('Select a subcategory...');
    });

    if( frc_theme.category_selected_id !== "null" ) {
        $("select.category").val(frc_theme.category_selected_id) ;
        fill_subcategory_select( frc_theme.category_selected_id ) ;
    }
    $("select.subcategory").val(frc_theme.subcategory_selected_id);
    $("select.category").parent().find('span').text($(this).find("select.category option:selected" ).text());
    $("select.subcategory").parent().find('span').text($(this).find("select.subcategory option:selected" ).text());

    /*pricing input*/
    var free = $('.form-pricing #free');
    var checkSeller = $('.form-pricing #checkSeller');
    var price = $('.input-group.amount');
    var priceInput = $('.input-group.amount input');
    var active = $('.btn-group .btn');
    var checked = $('.btn-group .btn input');
    var val ='';
    price.click(function(){
      active.removeClass('active');
      checked.prop( "checked", false );
      priceInput.val('');
    });
    free.parent().click(function(){
         val = free.val();
         priceInput.val(val);
    });
    checkSeller.parent().click(function(){
        val = checkSeller.val();
        priceInput.val(val);
    });
    /* Plugins hooks end */
    $("select.subcategory").trigger('change') ;
    $('select.subcategory').parent().find('span').text('Select a subcategory...');
}) ;