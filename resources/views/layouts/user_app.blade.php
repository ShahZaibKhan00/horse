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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ getenv('APP_URL') }}/assets/js/jquery-3.6.3.min.js"></script>
    {{-- <link href="{{ getenv('APP_URL') }}/user_admin_asstes/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default"> --}}

</head>
<style>
    .border_box_one {
        background: #fff;
        padding: 25px 30px;
        border-radius: 12px;
    }

    .main_heading_dashboard {
        font-size: 45px;
        margin: 0;
        background: linear-gradient(to right, #ae8e3b 45%, #FFFFFF 70%, #ae8e3b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 400;
        padding: 0px 0px 30px 0px;
        text-transform: uppercase;
        text-align: center;
    }

    form#myForm, form.row.g-3.mb-6 {
        background: #1c2039;
        padding: 30px;
    }

    .textarea {
        font-size: 0.8rem;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #EBEBEB;
        outline: none;
        background: #EBEBEB;
    }

    .form-check-input {
        width: 1em;
        height: 1em;
        margin-top: .245em;
        vertical-align: top;
        background-color: #9fa6bc;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        border: 1px solid #9fa6bc;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        print-color-adjust: exact
    }

    .form-check-input[type=checkbox] {
        border-radius: .25em
    }

    .form-check-input[type=radio] {
        border-radius: 50%
    }

    .form-check-input:checked {
        background-color: #597290 !important;
        border-color: #597290 !important;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: .5rem 1rem;
        font-size: 0.8rem;
        font-weight: 600;
        line-height: 1.49;
        color: var(--phoenix-gray-900);
        background-color: var(--phoenix-input-bg);
        background-clip: padding-box;
        border: 1px solid var(--phoenix-input-border-color);
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: .375rem;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0);
        -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        -o-transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    }

    .gen_input {
        width: 100%;
        height: 55px !important;
        border: 2px solid #1d2139;
        border-radius: 8px !important;
    }

    .form-check-input:checked[type=checkbox] {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e");
    }

    .form-check-input[type=radio] {
        border-radius: 3px !important;
        background: #D9D9D9;
        border: 0;
    }

    .form-check-input:checked[type=radio] {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
    }

    .gen_input_one {
        width: 100%;
        height: 55px;
        border-radius: 8px;
        background: #EBEBEB;
        border: 0;
    }

    .form-check-label {
        color: #9D9BA9 !important;
        font-size: 14px !important;
    }

    .text-muted {
        --phoenix-text-opacity: 1;
        color: #090909 !important;
        font-size: 15px !important;
    }

    .submit_btn_one,
    .submit_btn_one:hover {
        width: 150px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #B09240;
        background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 73%);
        font-size: 16px;
        color: #000 !important;
        font-weight: 700;
        border: 0;
        padding: 0 5px;
    }

    .add_url_btn {
        width: 190px;
        height: 40px;
        background: #1d2139;
        border-radius: 5px;
        color: #fff !important;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 0;
        font-weight: 600;
    }

    .upload__box p {
        color: #ccc;
    }

    .upload__box a {
        color: #000;
    }

    .upload__inputfile {
        width: 100%;
        height: 100%;
        opacity: 0;
        position: absolute;
        z-index: 99;
        top: 0;
        left: 0;
    }
</style>

<body>
    <section class="user_dashboard">
        @include('layouts.user_menu')
        @yield('content')
    </section>
    <div class="modal fade" id="packageWarningModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Action Required</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Body -->
                <div class="modal-body text-center">
                    <p class="mb-3">
                        <strong>You haven't purchased any package.</strong>
                    </p>
                    <p>
                        Before proceeding, please purchase a package.<br>
                        Thank you.
                    </p>
                </div>
                <!-- Footer -->
                <div class="modal-footer justify-content-center">
                    <a href="{{ url('/list-management') }}" class="btn btn-primary">
                        Purchase Package
                    </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="custome_popup" id="customModal">
        <div class="modal_content">
            <div class="horse-form">
                <div class="horse-container">
                    <h1 class="title">Please let us know whether your horse sold or if you are withdrawing it.</h1>

                    <div class="info-section">
                        <ul>
                            <li>If <strong>SOLD</strong>, check <strong>"Horse Sold"</strong> and enter the <strong>sale
                                    price</strong>.</li>
                            <li>If <strong>withdrawing</strong>, check <strong>"withdraw"</strong> and ender a reason.</li>
                        </ul>
                    </div>

                    <p class="warning-text">Submitting will immediately end your ad subscription and stop future billing.
                    </p>

                    <p class="description-text">Providing a sale price allows your horse to be used as a comparable on our
                        sales page, helping other sellers price their horses accurately. Thank you for choosing Horse Action
                        Network!</p>

                    <div class="options-container">
                        <div class="option">
                            <label for="horseSold">Horse Sold</label>
                            <input type="radio" id="horseSold" name="action" value="sold">
                        </div>
                        <div class="option">
                            <label for="withdraw">Withdraw</label>
                            <input type="radio" id="withdraw" name="action" value="withdraw" checked>
                        </div>
                    </div>

                    <div class="sale-price" id="salePrice">
                        <label>Sold Price:</label>
                        <input type="text" placeholder="Enter price" class="thousand_separator">
                    </div>

                    <div class="form-group" id="withdrawReason">
                        <label for="reasonSelect">Withdraw Reason:</label>
                        <select id="reasonSelect">
                            <option value="" selected disabled>SELECT A REASON FROM DROPDOWN</option>
                            <option value=""> Seller decided to keep</option>
                            <option value="">Seasonal timing (withdrawing until show record updates, competition season, or
                                better market window)</option>
                            <option value="">Withdrawn for veterinary reasons (health/soundness concern or needs rest)
                            </option>
                            <option value="">Withdrawal due to training or conditioning needs</option>
                            <option value="">Rather not say</option>
                        </select>
                    </div>

                    <div class="button-container">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="custome_popup" id="deleteModal">
        <div class="modal_content">
            <div class="horse-form text-center">
                <div class="horse-container">
                    <h1 class="title">ARE YOU SURE YOU WANT TO <br> DELETE YOUR AD?</h1>

                    <p class="description-text"> We're sad to see you go! Deleting your ad will end your subscription
                        and delete your ad—no further monthly charges will apply.
                        The ad won’t be saved, and re-listing means starting fresh.
                        Thank you for choosing Horse Auction Network!</p>

                    <div class="button-container">
                        <button class="btn-cancel btn-cancel-delete">Cancel</button>
                        <button class="btn-submit">Yes! Delete my Ad</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ getenv('APP_URL') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/swiper-bundle.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
