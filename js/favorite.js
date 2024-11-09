jQuery(document).ready(function ($) {
  toggleFavorite = (event, isRefresh = false) => {
    event.preventDefault();
    let btn = $(event.currentTarget);
    let productId = btn.data("product-id");
    if (productId) {
      $.ajax({
        type: "POST",
        url: favorite_ajax.ajax_url,
        data: {
          action: "toggle_wishlist",
          product_id: productId,
          nonce: favorite_ajax.nonce,
        },
        beforeSend: () => {
          btn.prop("disabled", true);
        },
        success: async function (response) {
          if (response.success) {
            await btn.prop("disabled", false);
            if (response?.data?.status) {
              $(`[data-product-id=${productId}]`).html(
                '<i class="fa fa-heart-o" style="color: #E91919" aria-hidden="true"></i>'
              );
            } else {
              $(`[data-product-id=${productId}]`).html(
                '<i class="fa fa-heart-o" aria-hidden="true"></i>'
              );
            }

            if (response?.data?.count > 0) {
              $("[data-id=favorite-count-number] > span").removeClass("d-none");
            } else {
              $("[data-id=favorite-count-number] > span").addClass("d-none");
            }
            if (isRefresh)
              setTimeout(() => {
                window.location.reload();
              }, 1000);
          }
        },
        error: function () {
          console.log("Error toggling favorite");
          btn.prop("disabled", false);
        },
      });
    }
  };
});
