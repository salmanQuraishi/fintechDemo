  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .offcanvas3 {
      position: fixed;
      top: 0;
      right: 0;
      height: 100%;
      width: 400px;
      background-color: #fff;
      box-shadow: -2px 0 8px rgba(0,0,0,0.1);
      transform: translateX(100%);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 1050;
    }

    .offcanvas3.show {
      transform: translateX(0);
      opacity: 1;
      visibility: visible;
    }

    .offcanvas-backdrop3 {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease;
      z-index: 1040;
    }

    .offcanvas-backdrop3.show {
      opacity: 1;
      visibility: visible;
    }

    .containerBankDetails {
      max-width: 500px;
      margin: auto;
      text-align: center;
      height: 90vh;
      overflow: auto;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }

    .containerBankDetails::-webkit-scrollbar {
      display: none;
    }

  .containerBankDetails .bank-info {
    background-color: #F8F4F4;
    padding: 1rem;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1rem;
  }

  .containerBankDetails .bank-info-text {
    text-align: left;
    max-width: 85%;
    font-size: 0.95rem;
  }

  .containerBankDetails .bank-info strong {
    display: block;
    font-size: 1rem;
    color: #000;
  }

  .containerBankDetails .access-options {
    display: flex;
    justify-content: space-around;
    margin: 1rem 0;
  }

  .containerBankDetails .access {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 120px;
  }

  .containerBankDetails .access-icon {
    background-color: #E6E6E6;
    border-radius: 12px;
    padding: 12px;
    margin-bottom: 0.5rem;
    font-size: 24px;
  }

  .containerBankDetails .illustration img {
    width: 100%;
    max-width: 200px;
    margin: 1rem auto;
  }

  .containerBankDetails .cta-text {
    font-size: 0.95rem;
    margin-bottom: 1rem;
    color: #333;
  }

  .containerBankDetails .cta-button {
    padding: 0.7rem 1.5rem;
    background-color: #F4F6FF;
    border: 2px solid #1A2EFF;
    color: #1A2EFF;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: 0.3s;
  }

  .containerBankDetails .cta-button:hover {
    background-color: #E0E5FF;
  }

  @media (max-width: 480px) {
    .access-options {
      gap: 1.5rem;
    }
  }
</style>
  <div class="offcanvas3">
    <div class="offcanvas-body">
      
      <div class="containerBankDetails">
        <div style="display: flex;align-items: anchor-center;">
          <svg class="bank-close-btn" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="22" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M296 91.6c2.6-2.3 6-3.4 9.9-3.4s10 1.8 18.1 5.4 14.7 8.8 19.8 15.6 7.6 11.8 7.6 15-1.1 6-3.4 8.2l-114.5 127L349.8 379c2.3 2.3 3.4 5 3.4 8.2s-2.6 8.3-7.6 15.3c-5.1 7-11.7 12.3-19.8 15.9s-14.2 5.4-18.1 5.4-7.3-1.3-9.9-4l-131-145.2c-5.3-5.3-7.9-10-7.9-14.2 0-4.1 1.9-8.1 5.7-11.9z" fill="#1a2eff" opacity="1" data-original="#000000"></path></g></svg>
          <h3 class="text-xl font-bold" style="color: #1A2EFF">Adding Current Account</h3>
        </div>
        <input type="hidden" id="bankInfoPlaceholder" readonly>
      <div>
    
        <div class="bank-info">
          <div class="bank-info-text">
            <strong id="title"></strong>
            <span id="short_description"></span>
          </div>
          <img id="icon" alt="checkmark" width="50px" />
        </div>
    
        <div class="access-options">
          <div class="access">
            <div class="access-icon">
              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Layer 2"><path d="M12 18.53a11.71 11.71 0 0 1-7.44-2.65l-3.09-2.53a1.74 1.74 0 0 1 0-2.7l3.09-2.53a11.78 11.78 0 0 1 14.88 0l3.09 2.53a1.74 1.74 0 0 1 0 2.7l-3.09 2.53A11.69 11.69 0 0 1 12 18.53zM12 7a10.22 10.22 0 0 0-6.49 2.28l-3.09 2.53a.25.25 0 0 0 0 .38l3.09 2.53a10.27 10.27 0 0 0 13 0l3.09-2.53a.25.25 0 0 0 0-.38l-3.11-2.53A10.24 10.24 0 0 0 12 7z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M12 18.25A6.25 6.25 0 1 1 18.25 12 6.25 6.25 0 0 1 12 18.25zm0-11A4.75 4.75 0 1 0 16.75 12 4.75 4.75 0 0 0 12 7.25z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M15 12a3 3 0 1 1-2.2-2.89 1.47 1.47 0 0 0-.3.89 1.5 1.5 0 0 0 1.5 1.5 1.47 1.47 0 0 0 .89-.3 3 3 0 0 1 .11.8z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></g></svg>
            </div>
            <span class="text-xs font-bold">Viewing Access</span>
          </div>
          <div class="access">
            <div class="access-icon" style="padding: 17px;">
              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 401.998 401.998" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M326.62 91.076c-1.711-1.713-3.901-2.568-6.563-2.568h-48.82c-3.238-15.793-9.329-29.502-18.274-41.112h66.52c2.669 0 4.853-.856 6.57-2.565 1.704-1.712 2.56-3.903 2.56-6.567V9.136c0-2.666-.855-4.853-2.56-6.567C324.334.859 322.15 0 319.481 0H81.941c-2.666 0-4.853.859-6.567 2.568-1.709 1.714-2.568 3.901-2.568 6.567v37.972c0 2.474.904 4.615 2.712 6.423s3.949 2.712 6.423 2.712h41.399c40.159 0 65.665 10.751 76.513 32.261H81.941c-2.666 0-4.856.855-6.567 2.568-1.709 1.715-2.568 3.901-2.568 6.567v29.124c0 2.664.855 4.854 2.568 6.563 1.714 1.715 3.905 2.568 6.567 2.568h121.915c-4.188 15.612-13.944 27.506-29.268 35.691-15.325 8.186-35.544 12.279-60.67 12.279H81.941c-2.474 0-4.615.905-6.423 2.712-1.809 1.809-2.712 3.951-2.712 6.423v36.263c0 2.478.855 4.571 2.568 6.282 36.543 38.828 83.939 93.165 142.182 163.025 1.715 2.286 4.093 3.426 7.139 3.426h55.672c4.001 0 6.763-1.708 8.281-5.141 1.903-3.426 1.53-6.662-1.143-9.708-55.572-68.143-99.258-119.153-131.045-153.032 32.358-3.806 58.625-14.277 78.802-31.404 20.174-17.129 32.449-39.403 36.83-66.811h47.965c2.662 0 4.853-.854 6.563-2.568 1.715-1.709 2.573-3.899 2.573-6.563V97.646c0-2.669-.858-4.856-2.573-6.57z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="text-xs font-bold">Transactional Access</span>
          </div>
        </div>
    
        <div class="illustration">
          <img src="https://static.instantpay.in/assets/accounts/link/ac_link.svg" alt="illustration" />
        </div>
    
        <p class="cta-text" id="short_description_2"></p>
    
        <input type="hidden" id="setRequestId" />
        <button class="cta-button" id='setRequest'>Request Callback</button>

      </div>

      </div>
        
    </div>
  </div>

  <div class="offcanvas-backdrop3"></div>

<script>
  $(document).ready(function () {
    const offcanvas3 = $(".offcanvas3");
    const backdrop3  = $(".offcanvas-backdrop3");

    function openBankDetails() {
      offcanvas3.addClass("show").css({ transform: "translateX(0)", opacity: "1", visibility: "visible" });
      backdrop3.addClass("show").css({ opacity: "1", visibility: "visible" });
    }

    function closeBankDetails() {
      offcanvas3.css({ transform: "translateX(100%)", opacity: "0" });
      backdrop3.css({ opacity: "0" });

      setTimeout(() => {
        offcanvas3.removeClass("show").css("visibility", "hidden");
        backdrop3.removeClass("show").css("visibility", "hidden");
      }, 300);
    }

    $(".toggle-Banks-Details").click(function () {
      const uniqueId = $(this).data("id");

      openBankDetails();

      $.ajax({
        url: "{{route('getbankdetailsforRequest')}}",
        method: "POST",
        data: { _token: $("meta[name='csrf-token']").attr("content"),uniqueId: uniqueId },
        success: function (response) {
          $('#setRequestId').val(response.data.id);
          $("#title").text(response.data.title);
          $("#short_description").text(response.data.short_description);
          $("#short_description_2").text(response.data.short_description_2);
          $('#icon').attr('src', response.data.icon);
        },
        error: function () {
          $("#bankDetailsContent").html("<p style='color: red;'>Failed to load bank details. Please try again.</p>");
        }
      });
    });

    $("#setRequest").click(function () {
    let RequestId = $("#setRequestId").val();

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to send this request?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, send it!",
        cancelButtonText: "No, cancel",
        reverseButtons: true,
        customClass: {
          confirmButton: 'rounded-lg bg-success-300 text-white font-semibold py-3 px-4',  // Bootstrap green button + margin
          cancelButton: 'rounded-lg bg-error-300 text-white font-semibold py-3 px-4'
        },
        buttonsStyling: false  // Required when using customClass
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Sending...",
                text: "Please wait...",
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "{{route('userbanklinkedrequest')}}",
                type: "POST",
                data: { _token: $("meta[name='csrf-token']").attr("content"),id: RequestId },
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message || "Request sent successfully!",
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                          confirmButton: 'rounded-lg bg-success-300 text-white font-semibold py-3 px-4'
                        },
                        buttonsStyling: false
                    });
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: "Error!",
                        text: xhr.responseJSON?.message || error || "Something went wrong.",
                        icon: "error",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: 'rounded-lg bg-bamber-300 text-bamber-500 font-semibold py-3 px-4'
                        },
                        buttonsStyling: false
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: "Cancelled",
                text: "Your request was not sent.",
                icon: "info",
                confirmButtonText: "OK",
                customClass: {
                  confirmButton: 'rounded-lg bg-error-300 text-white font-semibold py-3 px-4'
                },
                buttonsStyling: false
            });
        }
    });
});




    $(".bank-close-btn").click(closeBankDetails);
  });
</script>  