<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ !empty($settings->title) ? $settings->title : config('app.name') }}</title> 
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/font-awesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/quill.core.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/quill.snow.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/aos.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/jsvectormap.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/output.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
    <link rel="icon" type="image/png" href="{{ !empty($settings->light_icon) ? $settings->light_icon : "assets/images/logo/logo-short-white.png" }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  </head>
  <body>
<style>
table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
    background-color: transparent;
}
table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
    background-color: transparent;
}
table.dataTable.display tbody tr.even>.sorting_1, table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
    background-color: transparent;
}
table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
    background-color: transparent;
}
.dropdown {
    width: 150px;
    display: inline-block;
    position: relative;
}
.dropdown.toggle > input {
    display: none;
}
.dropdown > a,
.dropdown.toggle > label {
    border-radius: 2px;
    box-shadow: 0 6px 5px -5px rgba(0,0,0,0.3);
}
.dropdown > a::after,
.dropdown.toggle > label::after {
    content: "";
    float: right;
    margin: 15px 15px 0 0;
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 10px solid #CCC;
}
.dropdown ul {
    list-style-type: none;
    display: block;
    margin: 0;
    padding: 0;
    position: absolute;
    right: 160px;
    top: 0;
    width: 100%;
    box-shadow: 0 6px 5px -5px rgba(0,0,0,0.3);
    overflow: hidden;
}
.dropdown a,
.dropdown.toggle > label {
    display: block;
    padding: 0 0 0 10px;
    text-decoration: none;
    line-height: 40px;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: bold;
    color: #999;
    background-color: #FFF;
}
.dropdown li {
    height: 0;
    overflow: hidden;
    transition: all 500ms;
}
.dropdown.hover li {
    transition-delay: 300ms;
}
.dropdown li:first-child a {
    border-radius: 2px 2px 0 0;
}
.dropdown li:last-child a {
    border-radius: 0 0 2px 2px;
}
.dropdown a:hover,
.dropdown.toggle > label:hover,
.dropdown.toggle > input:checked ~ label {
    background-color: #EEE;
    color: #666;
}
.dropdown > a:hover::after,
.dropdown.toggle > label:hover::after,
.dropdown.toggle > input:checked ~ label::after {
    border-top-color: #AAA;
}
.dropdown li:first-child a:hover::before {
    border-bottom-color: #EEE;
}
.dropdown.hover:hover li,
.dropdown.toggle > input:checked ~ ul li {
    height: 40px;
}
.select2-container--default .select2-selection--single {
  background-color: rgb(35 38 43 / var(--tw-bg-opacity))  !important;
  border: 1px solid #aaa;
  border-radius: 4px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
  --tw-text-opacity: 1 !important;
  color: rgb(255 255 255 / var(--tw-text-opacity)) !important;
}
.select2-container--default .select2-selection--single{
  border: 0px !important;
}
    .switch {
      display: inline-block;
      width: 52px;
      height: 24px;
      position: relative;
    }
    
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: #ccc;
      transition: 0.4s;
      border-radius: 34px;
    }
    
    .slider:before {
      content: "";
      position: absolute;
      height: 18px;
      width: 18px;
      left: 4px;
      bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:checked + .slider:before {
      transform: translateX(26px);
    }

.swal2-actions button{
    background: #a5dc86;
    color: white;
}
.swal2-container {
    z-index: 9999 !important;
}
table.dataTable thead th, table.dataTable thead td {
    --tw-border-opacity: 1;
    border-color: rgb(226 232 240 / var(--tw-border-opacity));
}
.dataTables_wrapper .dataTables_length select {
    width: 70px;
    color: white;
}
.dataTables_wrapper .dataTables_length select option{
    width: 70px;
    color: black;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    --tw-text-opacity: 1;
    color: rgb(250 250 250 / var(--tw-text-opacity));
}
table.dataTable tbody tr {
    background-color:transparent;
}
.dataTables_empty {
    color:white !important;
}

.dataTables_wrapper .dataTables_processing {
    background: transparent !important;
    box-shadow: none !important;
    border: none !important;
}

.success-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.success-text {
    color: #3eb655;
    font-size: 20px;
    font-weight: bold;
    margin-top: 10px;
}
/* Offcanvas Menu */
.offcanvas {
    position: fixed;
    top: 0;
    right: 0;
    width: 500px; /* Default width */
    height: 100%;
    color: white;
    display: flex;
    flex-direction: column;
    box-shadow: -2px 0px 10px rgba(0, 0, 0, 0.3);
    transform: translateX(100%);
    visibility: hidden;
    opacity: 0;
    transition: transform 0.4s ease-in-out, opacity 0.3s ease-in-out;
    z-index: 1051;
}

@media (max-width: 480px) {
    .offcanvas {
        width: 350px;
    }
}

@media (max-width: 320px) {
    .offcanvas {
        width: 300px;
    }
}

/* Show Offcanvas */
.offcanvas.show {
    transform: translateX(0);
    visibility: visible;
    opacity: 1;
}

.offcanvas-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    z-index: 1050;
}

.offcanvas-backdrop.show {
    visibility: visible;
    opacity: 1;
}

.select2-container .select2-selection--single {
    height: inherit !important;
}
.select2-container--default .select2-selection--single {
    padding: 13px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 55px !important;
}
.select2-container--default{
    width: 100% !important;
}

</style>
    <!-- layout start -->
    <div class="w-full layout-wrapper active">
      <div class="w-full flex relative">

        @include('layouts.sidebar')

        <div class="body-wrapper dark:bg-darkblack-500 flex-1 overflow-x-hidden">

          @include('layouts.navbar')
          
          {{$slot}}
          

        </div>
      </div>
    </div>



    <div class="modal hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center" id="multi-step-modal">
        
    </div>


    <!-- Offcanvas Menu -->
    <div class="offcanvas bg-white dark:bg-darkblack-600">
      <div class="offcanvas-body">
        <section class="">
          <div class="rounded-lg mb-4">
            <div class="flex px-5 py-3 justify-between items-center border-b border-bgray-300 dark:border-darkblack-400">
              <h3 class="text-bgray-900 dark:text-white text-xl font-bold">kyc</h3>
              <button class="btn-close">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 507.2 507.2" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><circle cx="253.6" cy="253.6" r="253.6" style="" fill="#f15249" data-original="#f15249" class=""></circle><path d="M147.2 368 284 504.8c115.2-13.6 206.4-104 220.8-219.2L367.2 148l-220 220z" style="" fill="#ad0e0e" data-original="#ad0e0e"></path><path d="M373.6 309.6c11.2 11.2 11.2 30.4 0 41.6l-22.4 22.4c-11.2 11.2-30.4 11.2-41.6 0l-176-176c-11.2-11.2-11.2-30.4 0-41.6l23.2-23.2c11.2-11.2 30.4-11.2 41.6 0l175.2 176.8z" style="" fill="#ffffff" data-original="#ffffff" class=""></path><path d="M280.8 216 216 280.8l93.6 92.8c11.2 11.2 30.4 11.2 41.6 0l23.2-23.2c11.2-11.2 11.2-30.4 0-41.6L280.8 216z" style="" fill="#d6d6d6" data-original="#d6d6d6"></path><path d="M309.6 133.6c11.2-11.2 30.4-11.2 41.6 0l23.2 23.2c11.2 11.2 11.2 30.4 0 41.6L197.6 373.6c-11.2 11.2-30.4 11.2-41.6 0l-22.4-22.4c-11.2-11.2-11.2-30.4 0-41.6l176-176z" style="" fill="#ffffff" data-original="#ffffff" class=""></path></g></svg>
              </button>
            </div>
          </div>
          
          <div class="otpSection"></div>

            @if (auth()->user()->kyc_verified === "unverified")
                <form class="px-[18px]" id="aadharForm">

                    <input type="text" id="aadharNumber" maxlength="12"
                    class="w-full bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    placeholder="Enter Aadhar Number" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    

                    <p id="aadharError" class="text-red-500 text-sm mt-1 hidden">Invalid Aadhar number.</p>
                    
                    <!-- OTP Input (Hidden Initially) -->
                    <div id="otpSection" class="mt-4 hidden">
                        <input type="text" id="otpInput" maxlength="6"
                        class="border border-gray-300 rounded-lg w-full px-4 py-3 text-gray-700 focus:ring-0 focus:border-green-500"
                        placeholder="Enter OTP">
                        
                        <p id="otpError" class="text-red-500 text-sm mt-1 hidden">Invalid OTP.</p>
                        <p id="otpMessage" class="text-bgray-800 dark:text-white text-sm mt-1 hidden">OTP sent successfully.</p>
                        <p id="aadharVerification" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>

                    <!-- Buttons -->
                    <button type="button" id="sendOtpBtn"
                    class="w-[166px] h-[56px] flex justify-center items-center rounded-lg bg-warning-300 hover:bg-warning-200 transition duration-300 ease-in-out bg-green-500 text-white font-semibold py-3 rounded-lg w-full mt-4" >
                        Send OTP
                    </button>

                    <button type="button" id="verifyOtpBtn"
                    class="w-[166px] h-[56px] flex justify-center items-center rounded-lg bg-warning-300 hover:bg-warning-200 transition duration-300 ease-in-out bg-green-500 text-white font-semibold py-3 rounded-lg w-full mt-4 hidden" >
                    Verify OTP
                    </button>
                    
                </form>
            @else 
                <div class="success-container" style="height:600px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 512 512">
                        <g>
                            <path fill="#3eb655" d="m484.773 298.404-.149.074c-17.55 13.459-24.986 36.362-18.739 57.556l.074.149c9.964 33.686-14.723 67.668-49.823 68.561h-.148c-22.16.595-41.643 14.723-49.005 35.619v.074c-11.75 33.165-51.755 46.178-80.682 26.174-17.962-12.265-41.707-12.905-60.605 0h-.074c-28.926 19.929-68.933 6.99-80.608-26.249a53.44 53.44 0 0 0-49.004-35.619h-.149c-35.098-.893-59.787-34.875-49.822-68.561l.074-.149c6.245-21.194-1.191-44.097-18.739-57.556l-.149-.074c-27.886-21.417-27.886-63.356 0-84.772l.149-.074c17.548-13.459 24.984-36.363 18.665-57.556v-.149c-10.04-33.685 14.723-67.669 49.822-68.561h.149c22.085-.595 41.642-14.724 49.004-35.619v-.074c11.674-33.165 51.682-46.178 80.608-26.174h.074c18.218 12.567 42.311 12.567 60.605 0 29.218-20.177 69.001-6.792 80.682 26.174v.074c7.362 20.821 26.844 35.025 49.005 35.619h.148c35.099.892 59.787 34.876 49.823 68.561l-.074.149c-6.247 21.193 1.189 44.097 18.739 57.556l.149.074c27.886 21.416 27.886 63.356 0 84.773z"></path>
                            <circle cx="256" cy="256" r="138.517" fill="#8bd399"></circle>
                            <path d="M362.355 167.333c-23.959-19.71-54.612-31.557-88.028-31.557-76.5 0-138.55 62.05-138.55 138.55 0 33.416 11.847 64.069 31.556 88.028-30.441-25.393-49.831-63.59-49.831-106.356 0-76.501 61.997-138.497 138.497-138.497 42.766 0 80.963 19.39 106.356 49.832z" opacity="0.1"></path>
                            <path fill="#ffffff" d="m223.045 310.226-30.631-32.588c-8.022-8.536-7.608-21.957.925-29.979 8.533-8.032 21.96-7.601 29.975.929l14.622 15.55 62.153-71.038c7.704-8.816 21.104-9.71 29.927-1.995 8.816 7.715 9.706 21.111 1.995 29.927l-77.555 88.635c-8.262 9.433-22.843 9.68-31.411.559z"></path>
                        </g>
                    </svg>
                    <p class="success-text">Aadhar Verified Successfully!</p>
                </div>
            @endif

        </section>
      </div>
  </div>

  <div class="offcanvas-backdrop"></div>

    @stack('scripts')
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        function showToast(message, type = "success") {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
    
            Toast.fire({
                icon: type,
                title: message
            });
        }
    </script>
    
    @if(session('success'))
        <script>
            showToast("{{ session('success') }}", "success");
        </script>
    @endif
    
    @if(session('error'))
        <script>
            showToast("{{ session('error') }}", "error");
        </script>
    @endif
    
    @if(session('info'))
        <script>
            showToast("{{ session('info') }}", "info");
        </script>
    @endif
    <script>
      $(document).ready(function () {
          const offcanvas = $(".offcanvas");
          const backdrop = $(".offcanvas-backdrop");

          // Open Offcanvas
          function openMenu() {
              offcanvas.addClass("show").css({ transform: "translateX(0)", opacity: "1", visibility: "visible" });
              backdrop.addClass("show").css({ opacity: "1", visibility: "visible" });
          }

          // Close Offcanvas with animation
          function closeMenu() {
              offcanvas.css({ transform: "translateX(100%)", opacity: "0" });

              backdrop.css({ opacity: "0" });

              setTimeout(() => {
                  offcanvas.removeClass("show").css("visibility", "hidden");
                  backdrop.removeClass("show").css("visibility", "hidden");
              }, 300); // Wait for animation to finish
          }

          // Button Click Event to Open
          $(".toggle-menu").click(openMenu);

          // Close Button Click Event
          $(".btn-close").click(closeMenu);
      });
  </script>
<script>
$(document).ready(function () {
    let generatedOtp = null;

    function validateAadhar(aadhar) {
        return /^\d{12}$/.test(aadhar);
    }

    function generateOtp() {
        return Math.floor(100000 + Math.random() * 900000);
    }

    $("#sendOtpBtn").click(function () {
        let aadhar = $("#aadharNumber").val().trim();

        if (!validateAadhar(aadhar)) {
            $("#aadharError").removeClass("hidden");
            return;
        }
        $("#aadharError").addClass("hidden");

        $.ajax({
            url: "{{route('send.otp')}}",
            type: "POST",
            data: {
                _token: $("meta[name='csrf-token']").attr("content"),
                aadhar: aadhar
            },
            success: function (response) {
                if (response.status == true) {

                    $("#otpSection").removeClass("hidden");
                    $("#otpMessage").removeClass("hidden");
                    $("#verifyOtpBtn").removeClass("hidden");
                    $("#sendOtpBtn").addClass("hidden");
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {

                let errorMessage = "Something went wrong. Please try again.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $("#aadharError").removeClass("hidden").text(errorMessage);
                // alert(errorMessage); // Show the actual API error message
                $("#sendOtpBtn").text("Send OTP").prop("disabled", false);
            }
        });
    });

    $("#verifyOtpBtn").click(function () {
        let enteredOtp = $("#otpInput").val().trim();
        let aadhar = $("#aadharNumber").val().trim();

        $("#aadharVerification").addClass("hidden");
        $("#otpMessage").addClass("hidden");

        $.ajax({
            url: "{{route('verify.otp')}}",
            type: "POST",
            data: {
                _token: $("meta[name='csrf-token']").attr("content"),
                enteredOtp: enteredOtp,
                aadhar: aadhar
            },
            success: function (response) {
                if (response.status == true) {

                    setTimeout(function() {
                        $("#aadharForm").remove();
                    }, 1000);

                    setTimeout(function() {
                        $(".otpSection").html(`
                            <div class="success-container" style="height:600px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 512 512">
                                    <g>
                                        <path fill="#3eb655" d="m484.773 298.404-.149.074c-17.55 13.459-24.986 36.362-18.739 57.556l.074.149c9.964 33.686-14.723 67.668-49.823 68.561h-.148c-22.16.595-41.643 14.723-49.005 35.619v.074c-11.75 33.165-51.755 46.178-80.682 26.174-17.962-12.265-41.707-12.905-60.605 0h-.074c-28.926 19.929-68.933 6.99-80.608-26.249a53.44 53.44 0 0 0-49.004-35.619h-.149c-35.098-.893-59.787-34.875-49.822-68.561l.074-.149c6.245-21.194-1.191-44.097-18.739-57.556l-.149-.074c-27.886-21.417-27.886-63.356 0-84.772l.149-.074c17.548-13.459 24.984-36.363 18.665-57.556v-.149c-10.04-33.685 14.723-67.669 49.822-68.561h.149c22.085-.595 41.642-14.724 49.004-35.619v-.074c11.674-33.165 51.682-46.178 80.608-26.174h.074c18.218 12.567 42.311 12.567 60.605 0 29.218-20.177 69.001-6.792 80.682 26.174v.074c7.362 20.821 26.844 35.025 49.005 35.619h.148c35.099.892 59.787 34.876 49.823 68.561l-.074.149c-6.247 21.193 1.189 44.097 18.739 57.556l.149.074c27.886 21.416 27.886 63.356 0 84.773z"></path>
                                        <circle cx="256" cy="256" r="138.517" fill="#8bd399"></circle>
                                        <path d="M362.355 167.333c-23.959-19.71-54.612-31.557-88.028-31.557-76.5 0-138.55 62.05-138.55 138.55 0 33.416 11.847 64.069 31.556 88.028-30.441-25.393-49.831-63.59-49.831-106.356 0-76.501 61.997-138.497 138.497-138.497 42.766 0 80.963 19.39 106.356 49.832z" opacity="0.1"></path>
                                        <path fill="#ffffff" d="m223.045 310.226-30.631-32.588c-8.022-8.536-7.608-21.957.925-29.979 8.533-8.032 21.96-7.601 29.975.929l14.622 15.55 62.153-71.038c7.704-8.816 21.104-9.71 29.927-1.995 8.816 7.715 9.706 21.111 1.995 29.927l-77.555 88.635c-8.262 9.433-22.843 9.68-31.411.559z"></path>
                                    </g>
                                </svg>
                                <p class="success-text">Aadhar Verified Successfully!</p>
                            </div>
                        `);
                    }, 1500);


                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {

                let errorMessage = "Something went wrong. Please try again.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $("#aadharVerification").removeClass("hidden").text(errorMessage);
            }
        });
    });

    $("#aadharNumber, #otpInput").on("input", function () {
        $("#aadharError, #otpError").addClass("hidden");
    });
});

</script>
  <!-- JavaScript to close the toggle menu if user clicks outside -->
  <script>
    document.addEventListener('click', function(event) {
        document.querySelectorAll('.dropdown.toggle').forEach(function(toggle) {
            const input = toggle.querySelector('input');
            if (input.checked && !toggle.contains(event.target)) {
            input.checked = false;
            }
        });
    });
  </script>
  </body>
</html>
