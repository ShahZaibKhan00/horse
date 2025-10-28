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
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="user_admin_asstes/unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KSRGFXM6ZT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-KSRGFXM6ZT');
    </script>
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('layouts.user_menu')

            @yield('content')
            <footer class="footer position-absolute">
                <div class="row g-0 justify-content-between align-items-center h-100">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 mt-2 mt-sm-0 text-900">Copyright <span class="text-primary">{{ $Web_name }}</span>. All Rights Reserved</p>
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
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/list.js/list.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/dayjs/dayjs.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/assets/js/phoenix.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/vendors/echarts/echarts.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/unpkg.com/%40googlemaps/markerclusterer%402.0.15/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbaQGvhe7Af-uOMJz68NWHnO34UjjE7Lo&amp;callback=revenueMapInit" async></script>
    <script src="{{ getenv('APP_URL') }}/user_admin_asstes/assets/js/ecommerce-dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </script>

</body>

</html>
