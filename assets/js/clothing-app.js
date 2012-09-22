$(document).ready(function() {
	$('#error-close-button').click(function () {
        $('.error-box').hide();
    });
	$('#header-nav span.nav-cat-top .submenu .left-submenu a').hover(
		function(e){
			var cat_id = $(e.srcElement).attr("cat_id");
			//console.log(cat_id);
			$("#header-nav span.nav-cat-top .submenu .right-submenu").css("display","block");
			$("#header-nav span.nav-cat-top .submenu .left-submenu").css("border-right","dashed 1px #999");
			$("#header-nav span.nav-cat-top .submenu").css("min-width","312px");
			$("#header-nav span.nav-cat-top .submenu .right-submenu .sub-cat").hide();
			$("#header-nav span.nav-cat-top .submenu .right-submenu .sub-cat[sup_cat_id="+cat_id+"]").show();
		
		},
		function(e){
			var cat_id = $(e.srcElement).attr("cat_id");
			//$("#header-nav span.nav-cat-top .submenu .right-submenu").css("display","none");
			//$("#header-nav span.nav-cat-top .submenu .left-submenu").css("border-right","0");
			//$("#header-nav span.nav-cat-top .submenu").css("min-width","250px");
			//$("#header-nav span.nav-cat-top .submenu .right-submenu .sub-cat[sup_cat_id="+cat_id+"]").hide();
		}		
	);
	$('#header-nav span.nav-cat-top .submenu .right-submenu a').hover(
		function(e){
			//var cat_id = $(e.srcElement).attr("cat_id");
			//console.log(cat_id);
			$("#header-nav span.nav-cat-top .submenu .right-submenu").css("display","block");
			$("#header-nav span.nav-cat-top .submenu .left-submenu").css("border-right","dashed 1px #999");
			$("#header-nav span.nav-cat-top .submenu").css("min-width","312px");
			//$("#header-nav span.nav-cat-top .submenu .right-submenu .sub-cat[sup_cat_id="+cat_id+"]").show();
		},
		function(e){
			//var cat_id = $(e.srcElement).attr("cat_id");
			$("#header-nav span.nav-cat-top .submenu .right-submenu").css("display","none");
			$("#header-nav span.nav-cat-top .submenu .left-submenu").css("border-right","0");
			$("#header-nav span.nav-cat-top .submenu").css("min-width","250px");
			//$("#header-nav span.nav-cat-top .submenu .right-submenu .sub-cat[sup_cat_id="+cat_id+"]").hide();
		}
	);
		
	$('#header-nav span.nav-cat-top .submenu').hover(
		function(e){},
		function(e){
			$("#header-nav span.nav-cat-top .submenu .right-submenu").css("display","none");
			$("#header-nav span.nav-cat-top .submenu .left-submenu").css("border-right","0");
			$("#header-nav span.nav-cat-top .submenu").css("min-width","250px");
		}
	);
    //add noimage
    $('img').error(function() {
        src = $(this).attr('src');
        src = src.substring(0, src.indexOf('/assets/')+8) + 'img/noimage.png';
        $(this).attr('src',src);
    });
    
    
});


