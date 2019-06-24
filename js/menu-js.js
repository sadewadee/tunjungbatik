/*
---------------------------------------------------------------------------------------
    jQuery Initializing JavaScripts
---------------------------------------------------------------------------------------
*/
jQuery(function () {

    /*
    ---------------------------------------------------------------------------------------
        Main menu adjustment for twitter bootstrap dropdown menu
    ---------------------------------------------------------------------------------------
    */
    jQuery('.nav .dropdown').each( function(){
        jQuery(this).find('> a').addClass('dropdown-toggle').attr('data-toggle', 'dropdown');
        if ( jQuery(this).find('> a').find('span.caret').length <= 0 ) {
            jQuery(this).find('> a').append('<span class="caret"></span>');
        }
        jQuery(this).find('> ul.sub-menu').removeClass('sub-menu').addClass('dropdown-menu');
    } );
});