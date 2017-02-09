require(['jquery'], function() {
jQuery('.tabs > .tab').click(function(){
    if (jQuery(this).hasClass('signin')) {
        jQuery('.tabs .tab').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.cont').hide();
        jQuery('.signin-cont').show();
    } 
    if (jQuery(this).hasClass('signup')) {
        jQuery('.tabs > .tab').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.cont').hide();
        jQuery('.signup-cont').show();
    }
});
jQuery('.popup_container .bg').mousemove(function(e){
    var amountMovedX = (e.pageX * 1/200 );
    var amountMovedY = (e.pageY * -1/400 );
    jQuery(this).css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
});
});