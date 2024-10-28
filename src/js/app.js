$(document).ready(function () {
  // Scale zoom in image //
  $(".img-scale").each(function () {
    const img = $(this).find("img");

    $(this).on("mousemove", function (e) {
      const rect = this.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const xPercent = (x / rect.width) * 100;
      const yPercent = (y / rect.height) * 100;

      img.css("transform-origin", `${xPercent}% ${yPercent}%`);
    });

    $(this).on("mouseleave", function () {
      img.css("transform-origin", "center center");
    });
  });

  // add search input //
  $(".search-header").on("click", function () {
    if ($(".search-enable").hasClass("d-none")) {
      $(".search-enable").removeClass("d-none").addClass("d-flex");
    } else {
      $(".search-enable").removeClass("d-flex").addClass("d-none");
    }

    if ($(".menu-outer").hasClass("d-none")) {
      $(".menu-outer").removeClass("d-none").addClass("d-block");
    } else {
      $(".menu-outer").removeClass("d-block").addClass("d-none");
    }
  });

  $(".slick-slider").each(function () {
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
            dots: true,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          },
        },
      ],
    });
  });

  $(".prev-btn").on("click", function () {
    var targetSlider = $(this).data("slider-id");
    $("#" + targetSlider).slick("slickPrev");
  });

  $(".next-btn").on("click", function () {
    var targetSlider = $(this).data("slider-id");
    $("#" + targetSlider).slick("slickNext");
  });

  // Product outlet

  $(".slider-show-3").each(function () {
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
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  });

  //image picker

  $(".image-picker").each(function () {
    const $picker = $(this);
    const $mainImage = $picker.find(".main-image");
    const $thumbnails = $picker.find(".thumbnails img");

    $thumbnails.on("click", function () {
      $(".thumbnail").removeClass("item-border");
      $(this).parent().addClass("item-border");
      const newSrc = $(this).attr("src");
      $mainImage.attr("src", newSrc);
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
  const element = $(".scroll-header");

  $(window).on("scroll", function () {
    const scrollTop = $(this).scrollTop(); // Lấy vị trí cuộn

    if (scrollTop > lastScrollTop && scrollTop > 180) {
      element.addClass("scroll-down").removeClass("scroll-up ");
    } else {
      element.addClass("scroll-up").removeClass("scroll-down");
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Cập nhật vị trí cuộn
  });

  $(".carousel-banner").slick({
    dots: true,
    infinite: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
  });

  handleChangeColor = (price, salePrice, color, url) => {
    $(".thumbnail").removeClass("item-border");
    $(".color-tags").removeClass("item-border");
    $(`[data-color=${color}]`).addClass("item-border");
    $(".main-image").attr("src", url);
    $(".sale-price").text(salePrice);
    $(".original-price").text(price);
  };

  handleChangeImage = (price, salePrice, url, key) => {
    $(".color-tags").removeClass("item-border");
    $(".thumbnail").removeClass("item-border");
    $(".sale-price").text(salePrice);
    $(".original-price").text(price);
    $(`[data-image=${key}]`).addClass("item-border");
    $(".main-image").attr("src", url);
  };

  // toggle mobile header

  $("#mobileMenuToggle").on("click", function () {
    $("#mobileNav").toggleClass("show-menu");
  });

  // Close the menu when clicking outside of the mobile header
  document.addEventListener("click", function (event) {
    const isClickInsideMenu = mobileNav.contains(event.target);
    const isClickInsideToggle = mobileMenuToggle.contains(event.target);
    if (!isClickInsideMenu && !isClickInsideToggle) {
      mobileNav.classList.remove("show-menu");
    }
  });

  // zoom image
  let lens = $('<div class="img-zoom-lens"></div>');
  imageZoom = (imgID, resultID) => {
    let img = $("#" + imgID);
    let result = $("#" + resultID);

    // Insert lens into DOM
    img.before(lens);

    // Calculate the ratio between result DIV and lens
    let cx = result.width() / lens.width();
    let cy = result.height() / lens.height();

    // Set background properties for the result DIV
    result.addClass("d-block").removeClass("d-none");
    result.css("backgroundImage", 'url("' + img.attr("src") + '")');
    result.css(
      "backgroundSize",
      img.width() * cx + "px " + img.height() * cy + "px"
    );

    // Function to move lens on mouse or touch event
    function moveLens(e) {
      e.preventDefault();
      let pos = getCursorPos(e);
      let x = pos.x - lens.width() / 2;
      let y = pos.y - lens.height() / 2;

      // Prevent lens from being positioned outside the image
      if (x > img.width() - lens.width()) {
        x = img.width() - lens.width();
      }
      if (x < 0) {
        x = 0;
      }
      if (y > img.height() - lens.height()) {
        y = img.height() - lens.height();
      }
      if (y < 0) {
        y = 0;
      }

      // Set the position of the lens
      lens.css({ left: x + "px", top: y + "px" });

      // Display what the lens "sees"
      result.css("backgroundPosition", "-" + x * cx + "px -" + y * cy + "px");
    }

    // Get cursor's x and y position relative to the image
    function getCursorPos(e) {
      let a = img[0].getBoundingClientRect();
      let x = e.pageX - a.left - window.pageXOffset;
      let y = e.pageY - a.top - window.pageYOffset;
      return { x: x, y: y };
    }

    // Mousemove and touchmove event listeners
    lens.on("mousemove touchmove", moveLens);
    img.on("mousemove touchmove", moveLens);
  };
  handleHideLens = () => {
    $(".img-zoom-lens").remove();
    $("#myresult")
      .css("backgroundImage", "none")
      .removeClass("d-block")
      .addClass("d-none");
  };

  $("#reset-button").on("click", function () {
    window.location.href = window.location.pathname + "#productList";
  });
  $("#toggleFilter").on("click", function () {
    window.location.reload();
  });

  handleUpdateSearchParams = (
    paramsToToggle = {},
    isToggle = false,
    isCheckbox = false
  ) => {
    let url = new URL(window.location.href);
    let searchParams = new URLSearchParams(url.search);
    let hash = "#productList";
    $.each(paramsToToggle, function (key, value) {
      let currentValue = searchParams.get(key);
      if (isToggle && currentValue) {
        let valuesArray = currentValue.split(",");
        valuesArray = valuesArray.filter(
          (val) => val.trim() !== value.toString()
        );

        if (valuesArray.length > 0) {
          searchParams.set(key, valuesArray.join(","));
        } else {
          searchParams.delete(key);
        }
      } else if (isCheckbox && currentValue) {
        let valuesArray = currentValue.split(",");
        if (valuesArray.includes(value.toString())) {
          valuesArray = valuesArray.filter((val) => val !== value.toString());
        } else {
          valuesArray.push(value.toString());
        }
        if (valuesArray.length > 0) {
          searchParams.set(key, valuesArray.join(","));
        } else {
          searchParams.delete(key);
        }
      } else {
        searchParams.set(key, value);
      }
    });

    url.search = searchParams.toString();
    url.hash = hash;
    window.location.href = url.toString();
  };

  $("#priceFilter").on("click", function () {
    let min = $("#minPrice").val();
    let max = $("#maxPrice").val();
    handleUpdateSearchParams({ min, max });
  });





  ///mobile mega
  $('.has-mega-menu .mega-menu-toggle').on('click', function() {
    $(this).closest('.has-mega-menu').toggleClass('show-mega-mobile');
  });

});
