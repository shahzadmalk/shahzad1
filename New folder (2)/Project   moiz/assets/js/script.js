const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");
const slider = document.querySelector(".slider");

let counter = 0;
const slideWidth = 20; // Width of each slide (percentage)
const numSlides = 3; // Total number of slides

prevBtn.addEventListener("click", () => {
    counter--;
    if (counter < 0) {
        counter = numSlides - 1;
    }
    updateSlider();
});

nextBtn.addEventListener("click", () => {
    counter++;
    if (counter >= numSlides) {
        counter = 0;
    }
    updateSlider();
});

function updateSlider() {
    slider.style.transform = `translateX(-${counter * slideWidth}%)`;
}


function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

   // Initialize the carousel when the page loads
   document.addEventListener("DOMContentLoaded", function () {
    var carousel = new bootstrap.Carousel(document.getElementById("carouselExampleControls"));
  });

  window.onscroll = function() {
    scrollFunction();
  };

  function scrollFunction() {
    var button = document.getElementById("backToTopBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      button.style.display = "block";
    } else {
      button.style.display = "none";
    }
  }

  // Smooth scrolling to the top when the button is clicked
  document.getElementById("backToTopBtn").addEventListener("click", function() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  });






  document.addEventListener("DOMContentLoaded", function() {
    // Smooth scrolling for navbar links
    $('a.nav-link').on('click', function(event) {
      if (this.hash !== "") {
        event.preventDefault();
        const hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 100, function() { // Reduced animation duration to 500 milliseconds
          window.location.hash = hash;
        });
      }
    });

    // Highlight active navbar link
    $(window).on('scroll', function() {
      const scrollDistance = $(window).scrollTop();
      $('section').each(function() {
        const sectionTop = $(this).offset().top - 50;
        const sectionBottom = sectionTop + $(this).outerHeight();
        const sectionId = $(this).attr('id');

        if (scrollDistance >= sectionTop && scrollDistance <= sectionBottom) {
          $('a.nav-link').removeClass('active');
          $(`a.nav-link[href="#${sectionId}"]`).addClass('active');
        }
      });
    });
  });

