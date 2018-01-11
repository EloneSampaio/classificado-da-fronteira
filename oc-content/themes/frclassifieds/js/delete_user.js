$(document).ready(function(){
    $(".opt_delete_account a").click(function(){
        $("#dialog-delete-account").dialog('open');
    });

    $("#dialog-delete-account").dialog({
        autoOpen: false,
        modal: true,
        buttons: [
            {
                text: frclassifieds.langs.delete,
                click: function() {
                    window.location = frclassifieds.base_url + '?page=user&action=delete&id=' + frclassifieds.user.id  + '&secret=' + frclassifieds.user.secret;
                }
            },
            {
                text: frclassifieds.langs.cancel,
                click: function() {
                    $(this).dialog("close");
                }
            }
        ]
    });
});