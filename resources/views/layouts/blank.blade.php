<!DOCTYPE html>
<html>
<head>
    <title>Quick View</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/slick-theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/reponsive.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/fonts/fonts.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body { background: #f8f9fa; padding-top: 0 !important; }
        .view_detail_page { padding: 20px 0px !important; }
        /* Hide any scrollbars inside iframe body as modal handles it */
        /* body::-webkit-scrollbar { display: none; } */
    </style>
</head>
<body>
    <div class="modal-content-wrapper">
        @yield('content')
    </div>

    <!-- Scripts needed for detail page features -->
    <script src="{{ getenv('APP_URL') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/jquery.fancybox.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/scrollsmoother.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        // Initialize Fancybox for images inside iframe
        if (typeof Fancybox !== 'undefined') {
            Fancybox.bind("[data-fancybox]", {});
        }

        $(document).ready(function() {
            // Shared function to handle the UI toggle and AJAX
            function handleFavoriteToggle($card) {
                var $button = $card.find('.fvrt_btn');
                var $checkbox = $card.find('.heartCheckbox');
                var $heartIcon = $card.find('.icon_heart');
                var $form = $card.find('.favorite-form');
                
                if (!$form.length || $button.prop('disabled')) return;

                // 1. Determine current state
                var isCurrentlyFavorited = $checkbox.prop('checked');
                
                // 2. OPTIMISTIC UI UPDATE (Immediate visual change)
                if (isCurrentlyFavorited) {
                    $button.html('Favorite <i class="fa fa-heart-o"></i>');
                    $heartIcon.removeClass('fa-heart filled').addClass('fa-heart-o');
                    $checkbox.prop('checked', false);
                } else {
                    $button.html('Favorited <i class="fa fa-heart" style="color: #e74c3c;"></i>');
                    $heartIcon.removeClass('fa-heart-o').addClass('fa-heart filled');
                    $checkbox.prop('checked', true);
                }

                // 3. Send AJAX in background
                $button.prop('disabled', true);
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: { _token: $form.find('input[name="_token"]').val() },
                    success: function(response) {
                        if (response.success) {
                            if (response.status === 'removed') {
                                $button.html('Favorite <i class="fa fa-heart-o"></i>');
                                $heartIcon.removeClass('fa-heart filled').addClass('fa-heart-o');
                                $checkbox.prop('checked', false);
                            } else {
                                $button.html('Favorited <i class="fa fa-heart" style="color: #e74c3c;"></i>');
                                $heartIcon.removeClass('fa-heart-o').addClass('fa-heart filled');
                                $checkbox.prop('checked', true);
                            }
                            toastr.success(response.message);
                        } else {
                            toastr.warning(response.message);
                            setTimeout(() => location.reload(), 1500);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 419) {
                            alert("Session expired. Please Login.");
                            location.reload();
                        } else {
                            var errorMsg = 'Something went wrong.';
                            if (xhr.status === 401 && xhr.responseJSON && xhr.responseJSON.message) {
                                errorMsg = xhr.responseJSON.message;
                            }
                            toastr.error(errorMsg);
                            
                            // Revert UI on error (Heart and Favorite text reset)
                            if (isCurrentlyFavorited) {
                                $button.html('Favorited <i class="fa fa-heart" style="color: #e74c3c;"></i>');
                                $heartIcon.removeClass('fa-heart-o').addClass('fa-heart filled');
                                $checkbox.prop('checked', true);
                            } else {
                                $button.html('Favorite <i class="fa fa-heart-o"></i>');
                                $heartIcon.removeClass('fa-heart filled').addClass('fa-heart-o');
                                $checkbox.prop('checked', false);
                            }
                        }
                    },
                    complete: function() {
                        $button.prop('disabled', false);
                    }
                });
            }

            // Triggered by the Button
            $(document).on('click', '.favorite-form .fvrt_btn', function(e) {
                e.preventDefault();
                handleFavoriteToggle($(this).closest('.horse_list_card, .detail_left, .product_clm, .custome_listing_col'));
            });

            // Triggered by the Heart Icon on Image
            $(document).on('change', '.heartCheckbox', function() {
                var isChecked = $(this).prop('checked');
                $(this).prop('checked', !isChecked); 
                handleFavoriteToggle($(this).closest('.horse_list_card, .detail_left, .product_clm, .custome_listing_col'));
            });
        });
    </script>
</body>
</html>
