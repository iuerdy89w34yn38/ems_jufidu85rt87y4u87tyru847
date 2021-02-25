

for (var i = 1; i <= 1000 ; i++) {

var $star_rating = $('.star'+i+' .fa');
var $star_ratingdiv = $('.star'+i);
var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseFloat($star_rating.siblings('input.rating-value').val()) >= parseFloat($(this).data('rating'))) {
      num = parseFloat($star_rating.siblings('input.rating-value').val());
     $(this).removeClass('fa-star-o').addClass('fa-star');
     if(num % 1 != 0){
     	//$star_rating.siblings(" :last").removeClass('fa-star-o').addClass('fa fa-star-half');
     	cd = parseInt(num);
     	cd=cd+2;
     	$(".star"+i+" :nth-child("+cd+")").removeClass('fa-star-o').addClass('fa fa-star-half '+cd);
     }
     //if(num % 1 != 0) return $('.star'+i+' .fa-star-o').last().addClass('hidden'); 

    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};
SetRatingStar();
$(document).ready(function() {
});

}



