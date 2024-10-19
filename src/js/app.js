

$(document).ready(function () {



  // Scale zoom in image //
  const imageContainers = document.querySelectorAll('.img-scale');

  imageContainers.forEach((imageContainer) => {
    const img = imageContainer.querySelector('img');

    const handleMouseMove = (e) => {
      const rect = imageContainer.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const xPercent = (x / rect.width) * 100;
      const yPercent = (y / rect.height) * 100;

      img.style.transformOrigin = `${xPercent}% ${yPercent}%`;
    };

    const handleMouseLeave = () => {
      img.style.transformOrigin = 'center center';
    };

    imageContainer.addEventListener('mousemove', handleMouseMove);
    imageContainer.addEventListener('mouseleave', handleMouseLeave);

    const removeZoomEffect = () => {
      imageContainer.removeEventListener('mousemove', handleMouseMove);
      imageContainer.removeEventListener('mouseleave', handleMouseLeave);
    };

  });
  // Scale zoom in image //

  // add search input //
  $('.search-header').on('click', function () {
    $('.search-enable').toggleClass('d-flex');
    $('.search-enable').toggleClass('d-none');
    $('.menu-outer ').toggleClass('d-none');
    $('.menu-outer ').toggleClass('d-block');
  });



  $('.slick-slider').each(function () {
    $(this).slick({
      dots: false,
      infinite: false,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });

  $('.prev-btn').on('click', function () {
    var targetSlider = $(this).data('slider-id');
    $('#' + targetSlider).slick('slickPrev');
  });

  $('.next-btn').on('click', function () {
    var targetSlider = $(this).data('slider-id');
    $('#' + targetSlider).slick('slickNext');
  });

  // Product outlet

  // tags
  $('.tag').each(function () {
    $(this).on('click', function () {
      $(this).toggleClass('clicked');
    });
  });

  $('.slider-show-3').each(function () {
    $(this).slick({
      dots: false,
      infinite: false,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });


  function toggleImage(button) {
    const img = button.querySelector('img');
    const plus = 'plus.svg';
    const minus = 'minus.svg';
    img.src = img.src.endsWith(plus) ? `images/${minus}` : `images/${plus}`;
  }

  // toggle up and down

  function toggleImageUpDown(button) {
    const img = button.querySelector('img');
    const up = 'arr-down-thin.svg';
    const down = 'arr-up-thin.svg';
    img.src = img.src.endsWith(up) ? `images/${down}` : `images/${up}`;
  }

  //image picker

  document.querySelectorAll('.image-picker').forEach(picker => {
    const mainImage = picker.querySelector('.main-image');
    const thumbnails = picker.querySelectorAll('.thumbnails img');

    thumbnails.forEach(thumbnail => {
      thumbnail.addEventListener('click', () => {
        const newSrc = thumbnail.getAttribute('src');
        mainImage.src = newSrc;
      });
    });
  });

  /**
  * back to top
  */
  $("#backToTop").on("click", function () {
    $("body,html").animate({ scrollTop: 0 }, "slow");
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 60) {
      $(".to-top").addClass("d-block");
    } else {
      $(".to-top").removeClass("d-block");
    }
  });

  let lastScrollTop = 0;
  const element = $('.scroll-header');

  $(window).on('scroll', function () {
    const scrollTop = $(this).scrollTop(); // Lấy vị trí cuộn

    if (scrollTop > lastScrollTop && scrollTop > 180) {
      element.addClass('scroll-down').removeClass('scroll-up ');
    } else {
      element.addClass('scroll-up').removeClass('scroll-down');
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Cập nhật vị trí cuộn
  });

  $('.carousel-banner').slick({
    dots: true,
    infinite: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
  });

  //sticky header
  // let lastScrollTop = 0;
  // const element = document.querySelector('.scroll-header');

  // window.addEventListener('scroll', function() {
  //   const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  //   if (scrollTop > lastScrollTop && scrollTop > 180) {
  //     element.classList.add('scroll-down');
  //     element.classList.remove('scroll-up');
  //   } else {
  //     element.classList.add('scroll-up');
  //     element.classList.remove('scroll-down');
  //   }

  //   lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  // });


});

