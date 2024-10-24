

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

  //image picker

  $('.image-picker').each(function () {
    const $picker = $(this);
    const $mainImage = $picker.find('.main-image');
    const $thumbnails = $picker.find('.thumbnails img');

    $thumbnails.on('click', function () {
      $('.thumbnail').removeClass('item-border');
      $(this).parent().addClass('item-border');
      const newSrc = $(this).attr('src');
      $mainImage.attr('src', newSrc);
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

  handleChangeColor = (price, salePrice, color, url) => {
    $('.thumbnail').removeClass('item-border');
    $('.color-tags').removeClass('item-border')
    $(`[data-color=${color}]`).addClass('item-border')
    $('.main-image').attr('src', url);
    $('.sale-price').text(salePrice);
    $('.original-price').text(price);
  }

  handleChangeImage = (price, salePrice) => {
    $('.color-tags').removeClass('item-border');
    $('.sale-price').text(salePrice);
    $('.original-price').text(price);
  }

  // toggle mobile header

  $('#mobileMenuToggle').on('click', function () {
    $('#mobileNav').toggleClass('show-menu');
  });

  // Close the menu when clicking outside of the mobile header
  document.addEventListener('click', function (event) {
    const isClickInsideMenu = mobileNav.contains(event.target);
    const isClickInsideToggle = mobileMenuToggle.contains(event.target);
    if (!isClickInsideMenu && !isClickInsideToggle) {
      mobileNav.classList.remove('show-menu');
    }
  });

  // zoom image
  let lens = $('<div class="img-zoom-lens"></div>');
  imageZoom = (imgID, resultID) => {
    let img = $('#' + imgID);
    let result = $('#' + resultID);

    // Insert lens into DOM
    img.before(lens);

    // Calculate the ratio between result DIV and lens
    let cx = result.width() / lens.width();
    let cy = result.height() / lens.height();

    // Set background properties for the result DIV
    result.css('backgroundImage', 'url("' + img.attr('src') + '")');
    result.css('backgroundSize', (img.width() * cx) + "px " + (img.height() * cy) + "px");

    // Function to move lens on mouse or touch event
    function moveLens(e) {
      e.preventDefault();
      let pos = getCursorPos(e);
      let x = pos.x - (lens.width() / 2);
      let y = pos.y - (lens.height() / 2);

      // Prevent lens from being positioned outside the image
      if (x > img.width() - lens.width()) { x = img.width() - lens.width(); }
      if (x < 0) { x = 0; }
      if (y > img.height() - lens.height()) { y = img.height() - lens.height(); }
      if (y < 0) { y = 0; }

      // Set the position of the lens
      lens.css({ left: x + "px", top: y + "px" });

      // Display what the lens "sees"
      result.css('backgroundPosition', '-' + (x * cx) + 'px -' + (y * cy) + 'px');
    }

    // Get cursor's x and y position relative to the image
    function getCursorPos(e) {
      let a = img[0].getBoundingClientRect();
      let x = e.pageX - a.left - window.pageXOffset;
      let y = e.pageY - a.top - window.pageYOffset;
      return { x: x, y: y };
    }

    // Mousemove and touchmove event listeners
    lens.on('mousemove touchmove', moveLens);
    img.on('mousemove touchmove', moveLens);
  }
  handleHideLens = () => {
    $('.img-zoom-lens').remove();
    $('#myresult').css('backgroundImage', 'none');
    console.log('first')
  }

  $('input[name="option"]').on('change', function () {
    let selectedOption = $(this).attr('id');
    let sortValue = '';
    sortValue = selectedOption
    // Reload page with sort parameter and scroll to #productList
    window.location.href = window.location.pathname + '?sort=' + sortValue + '#productList';
  });


});

