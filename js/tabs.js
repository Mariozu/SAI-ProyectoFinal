$(document).on('ready',function(){
	$('.tabs-nav li:first').addClass('active');
	//$('.content').hide();
	//$('.content:first').show();

	$('.tabs-nav li').click(function(){
		$('.tabs-nav li').removeClass('active');
		$(this).addClass('active');
		$('.content').hide();

		var activeTab = $(this).find('a').attr('href');
		$(activeTab).fadeIn(1000);
		console.log();
	})
});


function caja1In(){
    $('.content:first').hide();
    $('#tab1').fadeIn(1000);
    $('#tab2').fadeOut(1000);
    $('#tab3').fadeOut(1000);

}

function caja2In(){
    $('.content:first').hide();
    $('#tab2').fadeIn(1000);
    $('#tab1').fadeOut(1000);
    $('#tab3').fadeOut(1000);

}
function caja3In(){
    $('.content:first').hide();
    $('#tab3').fadeIn(1000);
    $('#tab1').fadeOut(1000);
    $('#tab2').fadeOut(1000);
}
