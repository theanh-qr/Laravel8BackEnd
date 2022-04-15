$(document).ready(function(){
	// $('#button-menu').click(function(){
	// 	var checkMenuShow = $('#menu').is(':visible');
	// 	if(checkMenuShow == true){
	// 		$('#menu').hide();
	// 	}else{
	// 		$('#menu').show();
	// 	}
	// });


	$('.img-food-hide').hide();
	$('.btn-show-img-food').click(function(){
		$('.img-food-hide').show();
	});

	$('.btn-hide-img-food').click(function(){
		$('.img-food-hide').hide();
	});
	//nút back top ẩn khi ở trên đầu trang web
	$(window).scroll(function(){
		if($(this).scrollTop()){
			$('#button-back-top').fadeIn();
		}else{
			$('#button-back-top').fadeOut();
		}
	});
	//khi ấn nut back top thì đi lên đầu trang
	$('#button-back-top').click(function(){
		//Đưa màn hình lên vị trí 0 trên đầu trang trong 1 giây (1000 = 1 giây)
		$('html, body').animate({scrollTop: 0},1000);
	});
});