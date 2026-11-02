// Open Sub Menu
$('.drp_btn').click(function(){
  $(this).siblings('.sub_menu').slideToggle();
})

// Preloader JS

function preloader_fade() {
  $("#preloader").fadeOut('slow');
}

$(document).ready(function() {
  window.setTimeout("preloader_fade();", 500); //call fade in .5 seconds
}
)


// All Slider Js

$('#frmae_slider').owlCarousel({
    loop:true,
    margin:10,
    autoplay: true,
    smartSpeed: 1500,
    nav:false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

$('#company_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay: true,
    smartSpeed: 1500,
    dots: true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


$('#testimonial_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay: true,
    smartSpeed: 2500,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


$('#testimonial_slider1').owlCarousel({
    loop:true,
    margin:80,
    nav:false,
    autoHeight: true,
    autoplay: true,
    smartSpeed: 2500,
   	dots: false,
	  nav: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


$('#screen_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: true,
    autoplay: true,
    smartSpeed: 2500,
    center: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


// newsletter subscription popup

// // Open Popup after 5 seconds
//     setTimeout(() => {
//         document.getElementById("popup").classList.add("active");
//     }, 5000);
//
//     // Close Popup Function
//     function closePopup() {
//         document.getElementById("popup").classList.remove("active");
//     }


// Number Count
window.addEventListener('scroll', function() {
	var element = document.querySelector('#counter');
	var position = element.getBoundingClientRect();

	// checking whether fully visible
	if(position.top >= 0 && position.bottom <= window.innerHeight) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
	}

	if(position.top < window.innerHeight && position.bottom >= 0) {
		//console.log('Element is partially visible in screen');
	}else{
    //console.log('Element is not visible');
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = 0;
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 100,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
  }
});



// text List Flow
$('#text_list_flow').owlCarousel({
  loop: true,
  margin: 0,
  nav: false,
  dots: false,
  center: true,
  autoplay: true,
  slideTransition: 'linear',
  autoplayTimeout: 4000,
  autoplaySpeed: 6000,
  autoWidth: true,
  responsive: {
    0: {
      items: 2
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
})



// about images slider
$('#about_slider').owlCarousel({
  loop: true,
  margin: 20,
  nav: false,
  dots: false,
  center: true,
  autoplay: true,
  slideTransition: 'linear',
  autoplayTimeout: 4000,
  autoplaySpeed: 4000,
  autoWidth: true,
  responsive: {
    0: {
      items: 2
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
})


// --------Magnify-popup

$(function() {
    $('.popup-youtube').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});


// Pricing Section Year Month Jquery
$(document).ready(function () {

    $(".tog_block").click(function () {
      $(".tog_btn").toggleClass('month_active');
      $('.month').toggleClass('active');
      $('.years').toggleClass('active');

      $('.monthly_plan').toggleClass('active');
      $('.yearly_plan').toggleClass('active');

    })

  });

  $(document).ready(function () {
    // Add minus icon for collapse element which is open by default
    $(".collapse.show").each(function () {
      $(this)
        .prev(".card-header")
        .find(".icon_faq")
        .addClass("icofont-minus")
        .removeClass("icofont-plus");
    });


    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on("show.bs.collapse", function () {
        $(this).prev(".card-header").find(".icon_faq").removeClass("icofont-plus").addClass("icofont-minus");
      })
      .on("hide.bs.collapse", function () {
        $(this).prev(".card-header").find(".icon_faq").removeClass("icofont-minus").addClass("icofont-plus");
      });

      $(".collapse").on("show.bs.collapse", function () {
        $(this).prev(".card-header").children('h2').children('.btn').addClass("active");
      })
      .on("hide.bs.collapse", function () {
        $(this).prev(".card-header").children('h2').children('.btn').removeClass("active");
      });
  });


// Scrool-top
$(document).ready(function() {
  var toTop = $('.go_top');
  toTop.on('click', function() {
    $('html, body').animate({scrollTop: $('html, body').offset().top,}, 400);
  });

  $(window).scroll(function() {
    // declare variable
    var topPos = $(this).scrollTop();

    // if user scrolls down - show scroll to top button
    if (topPos > 750) {
      $(toTop).css("opacity", "1");

    } else {
      $(toTop).css("opacity", "0");
    }

  });

});


// Fix Header Js
$(window).scroll(function(){
  if ($(window).scrollTop() >= 250) {
      $('header').addClass('fix_style');
  }
  else {
      $('header').removeClass('fix_style');
  }
  if ($(window).scrollTop() >= 260) {
      $('header').addClass('fixed');
  }
  else {
      $('header').removeClass('fixed');
  }
});



// Task tab section
    $(document).ready(function () {
      let cardBlock = document.querySelectorAll('.task_block');
      let topStyle = 120;

      cardBlock.forEach((card) => {
        card.style.top = `${topStyle}px`;
        topStyle += 30;
      })

    }
    );




//YOUTUBE VIDEO
$('.play-button').click(function(e){
  var iframeEl = $('<iframe>', { src: $(this).data('url') });
  $('#youtubevideo').attr('src', $(this).data('url'));
})

$('#close-video').click(function(e){
  $('#youtubevideo').attr('src', '');
});

$(document).on('hidden.bs.modal','#myModal', function () {
  $('#youtubevideo').attr('src', '');
});



// Tag animation

document.addEventListener("DOMContentLoaded", function () {
    let container = document.querySelector(".tags-container");
    let tags = document.querySelectorAll(".tag");

    let observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    tags.forEach((tag, index) => {
                        tag.style.animation = "none"; // Reset animation
                        void tag.offsetWidth; // Force reflow to restart animation
                        tag.style.animation = `fall 1s cubic-bezier(0.15, 0.8, 0.35, 1.5) ${index * 0.2}s forwards,
                                               bounce 0.6s ease-out ${1 + index * 0.2}s forwards`;
                    });
                }
            });
        },
        { threshold: 0.3 } // Trigger when 30% of the section is visible
    );

    observer.observe(container);
});



// Close btn on click

$(document).ready(function(){
  $('.navbar-toggler').click(function(){
    if($(this).children('span').children('.ico_menu').hasClass('icofont-navigation-menu')) {
      $(this).children('span').children('.ico_menu').removeClass('icofont-navigation-menu').addClass('icofont-close');
    } else {
      $(this).children('span').children('.ico_menu').removeClass('icofont-close').addClass('icofont-navigation-menu');
    }
  });
});

(function() {
  $('.toggle-wrap').on('click', function() {
    $(this).toggleClass('active');
    $('aside').animate({width: 'toggle'}, 200);
  });
})();


// INITIALIZE AOS

AOS.init();

