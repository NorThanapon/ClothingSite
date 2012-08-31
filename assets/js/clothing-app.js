$(document).ready(function() {
	$('#error-close-button').click(function () {
        $('.error-box').hide();
    });
    //add noimage
    $('img').error(function() {
        src = $(this).attr('src');
        src = src.substring(0, src.indexOf('/assets/')+8) + 'img/noimage.png';
        $(this).attr('src',src);
    });
    
    
});


