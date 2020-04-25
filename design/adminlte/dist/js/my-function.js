function  check_all()
{
    $('input[class="item_checkbox"]:checkbox').each(function ()
    {
        if($('input[class="check_all"]:checkbox:checked').length == 0)
        {
            $(this).prop('checked',false);
        }else {
            $(this).prop('checked',true);
        }
    });
}//check_all

// start page settings------------
$(document).on('click','.btn_crete_new_row_settings',function ()
{
    $('#createNewSettings').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();

});
// start page frontends------------
$(document).on('click','.btn_crete_new_row_frontends',function ()
{
    $('#createNewFrontends').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();

});
// start page sliders------------
$(document).on('click','.btn_crete_new_row_sliders',function ()
{
    $('#createNewSliders').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();

});
// start page Admin------------
$(document).on('click','.btn_crete_new_row_admin',function ()
{
    $('#createNewRow').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();

});
// start page Users----------
$(document).on('click','.btn_crete_new_row_users',function ()
{
    //  alert('testg');
    $('#createNewUser').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// End page Users------------

// start page countreis----------
$(document).on('click','.btn_crete_new_row_countreis',function ()
{
    //  alert('testg');
    $('#createNewCountreis').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// End page countreis------------
// start page trademarks----------
$(document).on('click','.btn_crete_new_row_trademarks',function ()
{
     $('#createNewTrademarks').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// End page Trademarks------------
// start page manufacts----------
$(document).on('click','.btn_crete_new_row_manufacts',function ()
{
     $('#createNewmanufacts').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// End page manufacts------------


// start page departments----------
$(document).on('click','.btn_crete_new_row_departments',function ()
{
    //  alert('testg');
    $('#createNewDepartments').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// start page products----------
$(document).on('click','.btn_crete_new_row_products',function ()
{
    //  alert('testg');
    $('#createNewProducts').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// End page products------------

// start page shipping----------
$(document).on('click','.btn_crete_new_row_shipping',function ()
{
    $('#createNewshipping').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// End page shipping------------

// start page mall----------
$(document).on('click','.btn_crete_new_row_mall',function ()
{
    $('#createNewmall').modal('show');
    $(".message_error").fadeOut();
    $(".modal_massage .message_error").fadeIn();
});
// End page mall------------

// $(document).on('click','.btn_edit_row',function ()
// {
//      // alert('test');
//        $('#editRow').modal('show');


// });//crete_new_row

function  delete_all()
{
    $(document).on('click','.del_all',function ()
    {
        $('#form_data').submit();
    });//del_all

    $(document).on('click','.delBtn',function ()
    {
        //--------------------------------
        var item_checked = $('input[class="item_checkbox"]:checkbox').filter(':checked').length;
        if (item_checked > 0)
        {
            $('.record_count').text(item_checked);
            $('.not_empty_record').removeClass('hidden');
            $('.empty_record').addClass('hidden');
        }else {
            $('.record_count').text('');
            $('.not_empty_record').addClass('hidden');
            $('.empty_record').removeClass('hidden');
        }
        //--------------------------------
        $('#mutlipleDelete').modal('show');
    });//delBTn
}//delete_all

// start public code
$(document).ready(function(){
    $(".button_close_alert_eroor").click(function(){
        $(".content_alert_eroor").fadeOut(700);
    });
});

