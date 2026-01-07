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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body>
    <section class="user_dashboard">
        @include('layouts.user_menu')
        @yield('content')
    </section>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ getenv('APP_URL') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/jquery-3.6.3.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/swiper-bundle.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    @if (Session::has('alert-success'))
        <script>
            swal(@json(Session::get('alert-success')['title']), @json(Session::get('alert-success')['detail']), "success");
        </script>
    @endif

    @if (Session::has('alert-danger'))
        <script>
            swal(@json(Session::get('alert-danger')['title']), @json(Session::get('alert-danger')['detail']), "Error");
        </script>
    @endif
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

    <script>
        const tabButtons = document.querySelectorAll('.custom_tab_btn_min');
        const tabContents = document.querySelectorAll('.tab_content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class
                button.classList.add('active');
                document.getElementById(button.dataset.tab).classList.add('active');
            });
        });
    </script>

    <script>
        document.querySelectorAll('.user_gen_card_one').forEach((card) => {
            const slider = card.querySelector('.user_card_slider');
            const nextBtn = card.querySelector('.user_arrow_right');
            const prevBtn = card.querySelector('.user_arrow_left');

            new Swiper(slider, {
                loop: true,
                navigation: {
                    nextEl: nextBtn,
                    prevEl: prevBtn,
                },
            });
        });
    </script>

    <script>
        const horseSoldRadio = document.getElementById('horseSold');
        const withdrawRadio = document.getElementById('withdraw');
        const salePriceDiv = document.getElementById('salePrice');
        const withdrawReasonDiv = document.getElementById('withdrawReason');

        horseSoldRadio.addEventListener('change', function() {
            if (this.checked) {
                salePriceDiv.style.display = 'flex';
                withdrawReasonDiv.style.display = 'none';
            }
        });

        withdrawRadio.addEventListener('change', function() {
            if (this.checked) {
                salePriceDiv.style.display = 'none';
                withdrawReasonDiv.style.display = 'block';
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const deleteModal = document.getElementById("deleteModal");

            // Open modal (supports multiple delete buttons)
            document.addEventListener("click", function(e) {
                if (e.target.closest(".dlt_btn")) {
                    e.preventDefault();
                    deleteModal.classList.add("active");
                    document.body.style.overflow = "hidden";
                }

                // Cancel button
                if (e.target.closest(".btn-cancel-delete")) {
                    closeDeleteModal();
                }

                // Overlay click
                if (e.target === deleteModal) {
                    closeDeleteModal();
                }
            });

            function closeDeleteModal() {
                deleteModal.classList.remove("active");
                document.body.style.overflow = "";
            }

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const openBtns = document.querySelectorAll(".withdraw_btn");
            const modal = document.getElementById("customModal");

            if (!modal || openBtns.length === 0) {
                console.error("Modal or withdraw buttons not found");
                return;
            }

            // Open modal from ANY withdraw button
            openBtns.forEach(btn => {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    modal.classList.add("active");
                    document.body.style.overflow = "hidden";
                });
            });

            // Close on overlay click
            modal.addEventListener("click", function(e) {
                if (e.target === modal || e.target.classList.contains("btn-cancel")) {
                    closeModal();
                }
            });

            function closeModal() {
                modal.classList.remove("active");
                document.body.style.overflow = "";
            }
        });
    </script>

    <script>
        const currentPage = window.location.pathname.split("/").pop();

        document.querySelectorAll(".side_menu_navs a").forEach(link => {
            const linkPage = link.getAttribute("href");

            if (linkPage === currentPage) {
                link.classList.add("active");
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const timers = document.querySelectorAll(".countdown_user_timer");

            function updateCountdown(timer) {
                const endTime = new Date(timer.dataset.endTime).getTime();
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    timer.querySelector(".days").textContent = 0;
                    timer.querySelector(".hours").textContent = 0;
                    timer.querySelector(".minutes").textContent = 0;
                    timer.querySelector(".seconds").textContent = 0;
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                timer.querySelector(".days").textContent = days;
                timer.querySelector(".hours").textContent = hours;
                timer.querySelector(".minutes").textContent = minutes;
                timer.querySelector(".seconds").textContent = seconds;
            }

            timers.forEach(timer => {
                updateCountdown(timer);
                setInterval(() => updateCountdown(timer), 1000);
            });

        });
    </script>

</body>

</html>
