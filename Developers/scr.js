$('.carousel').carousel('cycle')
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

/*$(document).ready(function() {
  		 $("#carouselExampleIndicators").swiperight(function() {
    		  $(this).carousel('prev');
	    		});
		   $("#carouselExampleIndicators").swipeleft(function() {
		      $(this).carousel('next');
	   });
	});
*/

$(".carousel").swipe({

  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});
