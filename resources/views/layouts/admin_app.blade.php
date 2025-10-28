<!doctype html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Horse Action Netwrok | Dashboard</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ getenv('APP_URL') }}/assets/images/favicon.png">

    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/simplebar/simplebar.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/assets/js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/choices/choices.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="{{ getenv('APP_URL') }}/user_admin_asstes/unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/assets/js/chart.min.js"></script>
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('layouts.admin_menu')

            @yield('content')
            <footer class="footer position-absolute">
                <div class="row g-0 justify-content-between align-items-center h-100">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 mt-2 mt-sm-0 text-900 copyright_text">Copyright <span class="text-primary">{{ $Web_name }}</span>. All Rights Reserved</p>
                    </div>
                </div>
            </footer>
        </div>
        </div>
    </main>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/popper/popper.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/anchorjs/anchor.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/is/is.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/fontawesome/all.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/list.js/list.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/dayjs/dayjs.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/tinymce/tinymce.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/dropzone/dropzone.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/choices/choices.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/assets/js/phoenix.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/echarts/echarts.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/unpkg.com/%40googlemaps/markerclusterer%402.0.15/dist/index.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/assets/js/ecommerce-dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        $(document).ready(function() {
            $('#imageUpload').change(function() {
                var formData = new FormData();
                formData.append('image', $('#imageUpload')[0].files[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/update-profile-image', // Controller route
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle success response here, e.g., update the preview image
                        $('#imagePreview').css('background-image', 'url(' + response.url + ')');
                        location.reload();
                    },
                    error: function(error) {
                        // Handle error response here
                        console.error(error);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#logoUpload').change(function() {
                var formData = new FormData();
                formData.append('image', $('#logoUpload')[0].files[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/update-logo-image', // Controller route
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle success response here, e.g., update the preview image
                        $('#imagePreview').css('background-image', 'url(' + response.url + ')');
                        location.reload();
                    },
                    error: function(error) {
                        // Handle error response here
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script>
        document.querySelectorAll(".img_box").forEach((box) => {
            let slider = box.querySelector(".horse_list_card_slider");

            // Initialize Swiper without autoplay initially
            let swiperInstance = new Swiper(slider, {
                loop: true,
                centeredSlides: true,
                navigation: {
                    nextEl: box.querySelector(".horse_arrow_right"),
                    prevEl: box.querySelector(".horse_arrow_left"),
                },
                pagination: {
                    el: box.querySelector(".swiper-pagination"),
                    clickable: true,
                },
                autoplay: false,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.breed-select').select2({
                placeholder: "Select an option",
            });

            // Set placeholder for search input when any select2 opens
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').placeholder = 'Type to search...';
            });
        });
    </script>
    @if (Session::has('alert-success'))
        <script>
            swal(@json(Session::get('alert-success')['title']), @json(Session::get('alert-success')['detail']), "success");
        </script>
    @endif

</body>

</html>
