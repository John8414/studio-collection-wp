jQuery(document).ready(function ($) {
    toggleFavorite = (event) => {
        event.preventDefault();
        let btn = $(event.currentTarget);
        let productId = btn.data('product-id');
        if (productId) {
            $.ajax({
                type: 'POST',
                url: favorite_ajax.ajax_url,
                data: {
                    action: 'toggle_favorite',
                    product_id: productId,
                    nonce: favorite_ajax.nonce,
                },
                beforeSend: () => {
                    btn.prop('disabled', true);
                },
                success: function (response) {
                    if (response.success) {
                        btn.prop('disabled', false);
                        // Toggle the icon based on favorite status
                        if (response?.data?.favorite) {
                            $(`[data-product-id=${productId}]`).html('<i class="fa fa-heart" style="color: #E91919" aria-hidden="true"></i>');
                        } else {
                            $(`[data-product-id=${productId}]`).html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
                        }

                        // Update the favorite count in the header
                        if (response?.data?.favorite_count > 0) {
                            $("[data-id=favorite-count-number]").html('<i class="fa fa-heart" style="color: #E91919" aria-hidden="true"></i>')
                        } else {
                            $("[data-id=favorite-count-number]").html('<i class="fa fa-heart-o" aria-hidden="true"></i>')
                        }
                    }
                },
                error: function () {
                    console.log('Error toggling favorite');
                    btn.prop('disabled', false);

                },


            });
        }
    }
});
