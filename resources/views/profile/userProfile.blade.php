<div id="profileTab" class="{{ Route::currentRouteName() == 'user.profile.edit' ? 'active' : '' }}">
    <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
      <div class="2xl:col-span-8 xl:col-span-7">
        <h3
          class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
          Personal Info
        </h3>
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="xl:grid grid-cols-12 gap-12 flex 2xl:flex-row flex-col-reverse">
            <div class="2xl:col-span-8 xl:col-span-7">
              <div class="mt-8">
                <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                  <div class="flex flex-col gap-2 mb-3">
                    <label for="name" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                    <x-input-error :messages="$errors->get('name')" />
                  </div>
                  <div class="flex flex-col gap-2 mb-3">
                    <label for="mobile" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Mobile
                      Number</label>
                    <input type="text" id="mobile" value="{{ auth()->user()->mobile }}"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                      disabled>
                    <x-input-error :messages="$errors->get('mobile')" />
                  </div>
                </div>
                <div class="flex flex-col gap-2 pt-5">
                  <div class="flex" style='justify-content: space-between;'>
                    <label for="email"
                      class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Email</label>
                    <label>
                      @php
          $fill = "#ffc107";
          $buttonData = "modal-open";
          if (auth()->user()->email_verified == 'verified') {
            $fill = "#22c55e";
            $buttonData = "";
          }
        @endphp
                      <button type="button"
                        class="{{$buttonData}} inline-flex items-center gap-x-1 text-sm font-medium rounded-full px-3 border border-bgray-200 text-bgray-900 dark:text-white"
                        id='sendEmail'>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                          xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="15" x="0" y="0"
                          viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve"
                          class="">
                          <g>
                            <path fill="{{$fill}}"
                              d="M44.68 19.295a8.11 8.11 0 0 1-1.653-1.475 7.576 7.576 0 0 1 .469-2.3c.516-1.75 1.16-3.927-.08-5.63-1.25-1.717-3.531-1.774-5.364-1.821a7.86 7.86 0 0 1-2.29-.246 7.783 7.783 0 0 1-.93-2.081C34.22 4 33.458 1.832 31.418 1.169c-1.98-.644-3.757.579-5.324 1.654A7.46 7.46 0 0 1 24 4a7.448 7.448 0 0 1-2.095-1.177C20.34 1.747 18.562.528 16.583 1.17c-2.04.663-2.802 2.83-3.414 4.572a7.935 7.935 0 0 1-.921 2.074 7.682 7.682 0 0 1-2.3.253c-1.833.047-4.114.105-5.363 1.822-1.24 1.704-.597 3.88-.08 5.63a7.79 7.79 0 0 1 .473 2.286 7.826 7.826 0 0 1-1.66 1.489C1.84 20.423 0 21.827 0 24s1.84 3.577 3.32 4.705a8.11 8.11 0 0 1 1.653 1.475 7.576 7.576 0 0 1-.469 2.3c-.516 1.75-1.16 3.927.08 5.63 1.25 1.716 3.531 1.774 5.364 1.821a7.86 7.86 0 0 1 2.29.246 7.783 7.783 0 0 1 .93 2.081c.613 1.742 1.374 3.91 3.415 4.573a3.593 3.593 0 0 0 1.12.18c1.536 0 2.938-.965 4.204-1.834A7.459 7.459 0 0 1 24 44a7.45 7.45 0 0 1 2.094 1.177c1.567 1.076 3.344 2.294 5.324 1.654 2.04-.663 2.802-2.83 3.414-4.572a7.935 7.935 0 0 1 .92-2.074 7.682 7.682 0 0 1 2.3-.253c1.833-.047 4.115-.105 5.364-1.822 1.24-1.704.597-3.88.08-5.63a7.79 7.79 0 0 1-.473-2.286 7.826 7.826 0 0 1 1.659-1.489C46.16 27.577 48 26.173 48 24s-1.84-3.577-3.32-4.705zm-11.766 1.12-10 10a2 2 0 0 1-2.828 0l-5-5a2 2 0 1 1 2.828-2.83l3.586 3.587 8.586-8.586a2 2 0 1 1 2.828 2.828z"
                              opacity="1" data-original="#ffc107" class=""></path>
                          </g>
                        </svg>
                        <span>Verify</span>
                      </button>
                    </label>

                  </div>


                  <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    disabled>
                  <x-input-error :messages="$errors->get('email')" />
                </div>

                <h4 class="pt-8 pb-6 text-xl font-bold text-bgray-900 dark:text-white">
                  Personal Address
                </h4>
                <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                  <div class="flex flex-col gap-2 mb-3">
                    <label for="select2"
                      class="text-base text-bgray-600 dark:text-bgray-50 font-medium">State</label>
                    <select name="state" id="select2"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                      <option selected disabled>Select State</option>
                      @foreach ($states as $data)
                        <option value="{{ $data->id }}" {{ (isset(auth()->user()->state) && auth()->user()->state == $data->id) ? 'selected' : '' }}>
                          {{ $data->name }}
                        </option>                          
                      @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('state')" />
                  </div>
                  <div class="flex flex-col gap-2 mb-3">
                    <label for="city" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">City</label>
                    <select name="city" id="select3"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                      <option selected disabled>Select City</option>
                    </select>
                    <x-input-error :messages="$errors->get('city')" />
                  </div>
                  <div class="flex flex-col gap-2 mb-3">
                    <label for="address"
                      class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Address</label>
                    <input type="text" id="address" name="address"
                      value="{{ old('address', auth()->user()->address) }}"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                    <x-input-error :messages="$errors->get('address')" />
                  </div>
                  <div class="flex flex-col gap-2 mb-3">
                    <label for="postcode" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Postal
                      Code</label>
                    <input type="text" id="postcode" name="postcode"
                      value="{{ old('postcode', auth()->user()->pincode) }}"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                    <x-input-error :messages="$errors->get('postcode')" />
                  </div>
                </div>

                <div class="flex justify-start">
                  <button type="submit"
                    class="rounded-lg bg-success-300 text-white font-semibold mt-10 py-3.5 px-4">
                    Save Profile
                  </button>
                </div>
              </div>
            </div>

            <!-- Profile Picture Upload Section -->
            <div class="2xl:col-span-4 xl:col-span-5 2xl:mt-24">
              <header class="mb-8">
                <h4 class="font-bold text-lg text-bgray-800 dark:text-white mb-2">
                  Update Profile Picture
                </h4>
                <div class="text-center m-auto w-40 h-40 relative">
                  <img id="profileImage"
                    src="{{ auth()->user()->profile ? asset('/' . auth()->user()->profile) : asset('assets/images/avatar/profile.png') }}"
                    alt="Profile Image" class="w-40 h-40 rounded-full object-cover">

                  <input type="file" name="profile" id="fileInput" accept="image/*" hidden>

                  <button type="button" id="uploadButton" class="absolute right-4 bottom-1">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <circle cx="14.2414" cy="14.2414" r="14.2414" fill="#22C55E"></circle>
                      <path
                        d="M14.6994 10.2363C15.7798 11.3167 16.8434 12.3803 17.9171 13.454C17.7837 13.584 17.6403 13.7174 17.5036 13.8574C15.5497 15.8114 13.5924 17.7653 11.6385 19.7192C11.5118 19.8459 11.3884 19.9726 11.2617 20.0927C11.2317 20.1193 11.185 20.1427 11.145 20.1427C10.1281 20.146 9.11108 20.1427 8.0941 20.146C8.02408 20.146 8.01074 20.1193 8.01074 20.0593C8.01074 19.049 8.01074 18.0354 8.01408 17.0251C8.01408 16.9784 8.03742 16.9217 8.06743 16.8917C9.26779 15.688 10.4682 14.4876 11.6685 13.2873C12.6655 12.2903 13.6591 11.2967 14.6561 10.2997C14.6761 10.2797 14.6861 10.253 14.6994 10.2363Z"
                        fill="white"></path>
                    </svg>
                  </button>
                </div>
              </header>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
<div class="modal hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center" id="multi-step-modal">
    <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
    <div class="modal-content flex justify-center w-full px-4 items-center mx-auto">
      <!-- Step 1 -->
      <div class="step-content step-1">
        <div class="max-w-[752px] rounded-lg bg-white dark:bg-darkblack-600 p-6 pb-10 transition-all relative">
          <button id="step-1-cancel" class="flex justify-center items-center absolute top-6 right-6">
            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.9492 7.05029L7.04972 16.9498" stroke="#22C55E" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"></path>
              <path d="M7.0498 7.05029L16.9493 16.9498" stroke="#22C55E" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"></path>
            </svg>
          </button>
          <header class="text-center">
            <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-3">Verify Email</h3>
          </header>

          <div class="flex flex-row py-3" id="success-message" style="display: none;">
            <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
            <div class="flex-1">
              <p class="text-bgray-800 dark:text-white text-[#9AA2B1] pl-3 lg:text-base text-xs lg:leading-7"
                id='textadd'></p>
            </div>
          </div>

          <form id='emailForm'>

            <textarea name="otp" id="otp" rows="6" cols="50"
              class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
              placeholder="Enter otp"></textarea>

            <button
              class="bg-success-300 hover:bg-success-400 text-white font-semibold text-base py-4 flex justify-center items-center rounded-lg w-full mt-2">
              Verify
            </button>
          </form>


        </div>
      </div>
    </div>
</div>
@push('scripts')

<script>
    $(document).ready(function () {
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $("#sendEmail").click(function (event) {
      event.preventDefault();
      $.ajax({
        url: "{{route('email.sendEmail')}}",
        type: "GET",
        processData: false,
        contentType: false,
        success: function (response) {
        var jsonObj = JSON.parse(response);
        if (jsonObj.status == true) {
          $("#textadd").html(jsonObj.message).fadeIn();
          $("#success-message").fadeIn();
        }
        },
        error: function (xhr) {
        alert("Something went wrong. Please try again.");
        }
      });
      });
    });
    </script>
    <script>
    $(document).ready(function () {
      $('#emailForm').submit(function (e) {
      e.preventDefault();

      let otp = $('#otp').val();

      $.ajax({
        url: "{{ route('email.verifyEmailotp') }}",
        type: "POST",
        data: {
        otp: otp,
        _token: "{{ csrf_token() }}"
        },
        beforeSend: function () {
        // You can show a loading spinner here
        },
        success: function (response) {
        var jsonObj = JSON.parse(response);
        if (jsonObj.status) {
          $("#textadd").html(jsonObj.message).fadeIn();
          $("#success-message").fadeIn();
          setTimeout(function () {
          location.href = '{{route("user.profile.edit")}}';
          }, 2000);
        } else {
          alert("Invalid OTP! Please try again.");
        }
        },
        error: function (xhr) {
        alert("Something went wrong.");
        }
      });
      });
    });
    </script>
    <script>
    $(document).ready(function () {

      $("#uploadButton").click(function () {
      console.log("Upload button clicked");
      $("#fileInput").click();
      });

      $("#fileInput").change(function (event) {
      var file = event.target.files[0];

      if (file) {
        console.log("File selected:", file.name);

        var reader = new FileReader();
        reader.onload = function (e) {
        $("#profileImage").attr("src", e.target.result);
        console.log("Image updated!");
        };
        reader.readAsDataURL(file);
      } else {
        console.log("No file selected");
      }
      });
    });
    </script>

    <script>
    $(document).ready(function () {

      
      $('#select3').select2();
      $('#select2').select2();

      $('#select2').on('change', function () {
      var stateId = $(this).val();

      if (stateId) {
        $.ajax({
        url: '{{ route('getCity') }}',
        type: 'POST',
        data: {
          id: stateId,
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          if (response.status == "success") {
          var $select = $('#select3');

          $select.empty();

          $select.append('<option value="">Select City</option>');

          response.data.forEach(function (item) {
            $select.append('<option value="' + item.id + '">' + item.name + '</option>');
          });

          $select.trigger('change');

          console.log(response.data);
          } else {
          console.error('Error: ' + response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error('Error occurred: ' + error);
        }
        });
      } else {
        console.log('No state selected');
        $('#select3').empty().append('<option value="">Select City</option>');
      }
      });

      function loadCity() {
        var stateId = $("#select2").val();
        var cityId = {!! json_encode(auth()->user()->city ?? 0) !!};

        if (stateId) {
          $.ajax({
            url: '{{ route('getCity') }}',
            type: 'POST',
            data: {
              id: stateId,
              _token: '{{ csrf_token() }}'
            },
            success: function (response) {
              if (response.status == "success") {
                var $select = $('#select3');
                $select.empty();
                $select.append('<option value="">Select City</option>');

                response.data.forEach(function (item) {
                  let selected = (cityId == item.id) ? "selected" : "";
                  $select.append('<option ' + selected + ' value="' + item.id + '">' + item.name + '</option>');
                });

                $select.trigger('change');
                console.log(response.data);
              } else {
                console.error('Error: ' + response.message);
              }
            },
            error: function (xhr, status, error) {
              console.error('Error occurred: ' + error);
            }
          });
        } else {
          console.log('No state selected');
          $('#select3').empty().append('<option value="">Select City</option>');
        }
      }

      loadCity();

    });
    </script>
    
@endpush