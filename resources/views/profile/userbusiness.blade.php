<div id="userbusiness" class="tab-pane {{ Route::currentRouteName() == 'userbusiness' ? 'active' : '' }}">
    <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
      <div class="2xl:col-span-8 xl:col-span-7">
        <h3
          class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
          Business Info
        </h3>
        <div class="mt-8">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="xl:grid grid-cols-12 gap-12 flex 2xl:flex-row flex-col-reverse">
              <div class="2xl:col-span-8 xl:col-span-7">
                <h4 class="pb-6 text-xl font-bold text-bgray-900 dark:text-white">
                  General Info
                </h4>
                <div class="flex flex-col gap-2 mb-3">
                  <div class="flex" style='justify-content: space-between;'>
                    <label for="PAN" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">PAN</label>
                  </div>
                  <input type="PAN" id="PAN" name="pan"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                  <x-input-error :messages="$errors->get('pan')" />
                </div>
                <div class="flex flex-col gap-2 mb-3">
                  <div class="flex" style='justify-content: space-between;'>
                    <label for="trade_name" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Trade
                      Name</label>
                  </div>
                  <input type="trade_name" id="trade_name" name="trade_name"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                  <x-input-error :messages="$errors->get('trade_name')" />
                </div>
                <div class="flex flex-col gap-2 mb-3">
                  <div class="flex" style='justify-content: space-between;'>
                    <label for="legal_name" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Legal
                      Name</label>
                  </div>
                  <input type="legal_name" id="legal_name" name="legal_name"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                  <x-input-error :messages="$errors->get('legal_name')" />
                </div>
                <div class="flex flex-col gap-2 mb-3">
                  <div class="flex" style='justify-content: space-between;'>
                    <label for="business_category"
                      class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Business Category</label>
                  </div>
                  <input type="business_category" id="business_category" name="business_category"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                  <x-input-error :messages="$errors->get('business_category')" />
                </div>
                <div class="flex flex-col gap-2 mb-3">
                  <div class="flex" style='justify-content: space-between;'>
                    <label for="address"
                      class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Address</label>
                  </div>
                  <input type="address" id="address" name="address"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                  <x-input-error :messages="$errors->get('address')" />
                </div>

                <div class="dark:border-darkblack-400 border-b border-bgray-200 mt-4"></div>

                <h4 class="pt-4 pb-6 text-xl font-bold text-bgray-900 dark:text-white">
                  Additional Contacts
                </h4>
                <div class="xl:grid ">

                  <div class="flex flex-col gap-2 mb-3">
                    <input type="PAN" id="PAN" name="pan"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                      placeholder='Support Email (optional)'>
                    <x-input-error :messages="$errors->get('pan')" />
                  </div>
                  <div class="flex flex-col gap-2 mb-3">
                    <input type="finance" id="finance" name="finance"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                      placeholder='Finance Email (optional)'>
                    <x-input-error :messages="$errors->get('finance')" />
                  </div>
                  <div class="flex flex-col gap-2 mb-3">
                    <input type="risk" id="risk" name="risk"
                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                      placeholder='Risl Email (optional)'>
                    <x-input-error :messages="$errors->get('risk')" />
                  </div>
                </div>

                <div class="dark:border-darkblack-400 border-b border-bgray-200 mt-4"></div>

                <h4 class="pt-4 pb-6 text-xl font-bold text-bgray-900 dark:text-white">
                  Working Hours
                </h4>
                <div class="xl:grid ">
                  <div class="container">

                    <form id="working-hours-form">

                      <div class="day-row px-1">
                        <input type="checkbox" id="monday" />
                        <label for='monday'
                          class="text-base text-bgray-600 dark:text-bgray-50 font-medium">MON</label>
                        <div class="time-box">
                          <label for="monday-start">Open</label>
                          <input type="time" id="monday-start" disabled />
                        </div>
                        <div class="time-box">
                          <label for="monday-end">Close</label>
                          <input type="time" id="monday-end" disabled />
                        </div>
                      </div>

                      <div class="day-row px-1">
                        <input type="checkbox" id="tuesday" />
                        <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">TUE</label>
                        <div class="time-box">
                          <label for="tuesday-start">Open</label>
                          <input type="time" id="tuesday-start" disabled />
                        </div>
                        <div class="time-box">
                          <label for="tuesday-end">Close</label>
                          <input type="time" id="tuesday-end" disabled />
                        </div>
                      </div>

                      <div class="day-row px-1">
                        <input type="checkbox" id="wednesday" />
                        <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">WED</label>
                        <div class="time-box">
                          <label for="wednesday-start">Open</label>
                          <input type="time" id="wednesday-start" disabled />
                        </div>
                        <div class="time-box">
                          <label for="wednesday-end">Close</label>
                          <input type="time" id="wednesday-end" disabled />
                        </div>
                      </div>

                      <div class="day-row px-1">
                        <input type="checkbox" id="thursday" />
                        <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">THU</label>
                        <div class="time-box">
                          <label for="thursday-start">Open</label>
                          <input type="time" id="thursday-start" disabled />
                        </div>
                        <div class="time-box">
                          <label for="thursday-end">Close</label>
                          <input type="time" id="thursday-end" disabled />
                        </div>
                      </div>

                      <div class="day-row px-1">
                        <input type="checkbox" id="friday" />
                        <div class="text-base text-bgray-600 dark:text-bgray-50 font-medium">FRI</div>
                        <div class="time-box">
                          <label for="friday-start">Open</label>
                          <input type="time" id="friday-start" disabled />
                        </div>
                        <div class="time-box">
                          <label for="friday-end">Close</label>
                          <input type="time" id="friday-end" disabled />
                        </div>
                      </div>

                      <div class="day-row px-1">
                        <input type="checkbox" id="saturday" />
                        <div class="text-base text-bgray-600 dark:text-bgray-50 font-medium">SAT</div>
                        <div class="time-box">
                          <label for="saturday-start">Open</label>
                          <input type="time" id="saturday-start" disabled />
                        </div>
                        <div class="time-box">
                          <label for="saturday-end">Close</label>
                          <input type="time" id="saturday-end" disabled />
                        </div>
                      </div>

                      <div class="day-row px-1">
                        <input type="checkbox" id="sunday" />
                        <div class="text-base text-bgray-600 dark:text-bgray-50 font-medium">SUN</div>
                        <div class="time-box">
                          <label for="sunday-start">Open</label>
                          <input type="time" id="sunday-start" disabled />
                        </div>
                        <div class="time-box">
                          <label for="sunday-end">Close</label>
                          <input type="time" id="sunday-end" disabled />
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
                <button type="submit"
                  class="rounded-lg bg-success-300 text-white font-semibold mt-10 py-3.5 px-4">
                  update
                </button>
              </div>
              <div class="2xl:col-span-4 xl:col-span-5 2xl:mt-24">
                <header class="mb-8">
                  <div class="text-center m-auto w-40 h-40 relative">
                    <img id="businessImage" src="" alt="Image" class="w-40 h-40 object-cover">

                    <input type="file" name="image" id="businessfileInput" accept="image/*" hidden="">

                    <button type="button" id="businessuploadButton" class="absolute right-20 bottom-1">
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
</div>

<script>
  $(document).ready(function () {

    $("#businessuploadButton").click(function () {
    console.log("Upload button clicked");
    $("#businessfileInput").click();
    });

    $("#businessfileInput").change(function (event) {
    var file = event.target.files[0];

    if (file) {
      console.log("File selected:", file.name);

      var reader = new FileReader();
      reader.onload = function (e) {
      $("#businessImage").attr("src", e.target.result);
      console.log("Image updated!");
      };
      reader.readAsDataURL(file);
    } else {
      console.log("No file selected");
    }
    });
  });
</script>