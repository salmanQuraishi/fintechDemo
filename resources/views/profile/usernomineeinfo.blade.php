<div id="usernomineeinfo" class="tab-pane {{ Route::currentRouteName() == 'usernomineeinfo' ? 'active' : '' }}">
    <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
      <div class="2xl:col-span-8 xl:col-span-7">
        <h3
          class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
          Nominee Info
        </h3>
        <div class="mt-8">
          <form action="{{ route('updatenominee') }}" method="POST">
            @csrf

            <div class="2xl:col-span-8 xl:col-span-7">
              
              <div class="grid 2xl:grid-cols-1 grid-cols-1 gap-6">
                <div class="flex flex-col gap-2 mb-4">
                  <label for="relationship"
                    class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Relationship*</label>
                  <select id="relationship" name="relationship"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                    <option selected disabled>Select Relationship</option>
                      @foreach(['husband', 'wife', 'mother', 'father', 'son', 'daughter', 'brother', 'sister', 'guardian', 'others'] as $relation)
                        <option value="{{ $relation }}" {{ (isset($nominee->relationship) && $nominee->relationship == $relation) ? 'selected' : '' }}>
                          {{ ucfirst($relation) }}
                        </option>
                      @endforeach
                  </select>
                  <x-input-error :messages="$errors->first('relationship')" />
                </div>
              </div>
              <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                
                <div class="flex flex-col gap-2">
                  <label for="name" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Name*</label>
                  <input type="text" id="name" name="name"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('name', $nominee->name ?? '') }}">
                    <x-input-error :messages="$errors->first('name')" />
                </div>
                <div class="flex flex-col gap-2">
                  <label for="dob" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Date of
                    Birth*</label>
                  <input type="date" id="dob" name="dob"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('dob', $nominee->dob ?? '') }}">
                    <x-input-error :messages="$errors->first('dob')" />
                </div>
                <div class="flex flex-col gap-2 mb-3">
                  <label for="state" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">State*</label>
                  <select name="state" id="select4"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                    <option selected disabled>Select State</option>
                      @foreach ($states as $data)
                        <option value="{{ $data->id }}" {{ isset($nominee->state) && $nominee->state == $data->id ? 'selected' : '' }}>
                          {{ $data->name }}
                        </option>
                      @endforeach
                  </select>
                  <x-input-error :messages="$errors->get('state')" />
                </div>
                <div class="flex flex-col gap-2 mb-3">
                  <label for="city" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">City*</label>
                  <select name="city" id="select5"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                    <option selected disabled>Select City</option>
                  </select>
                  <x-input-error :messages="$errors->get('city')" />
                </div>
                <div class="flex flex-col gap-2">
                  <label for="pincode"
                    class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Pincode*</label>
                  <input type="text" id="pincode" name="pincode"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('pincode', $nominee->pincode ?? '') }}">
                    <x-input-error :messages="$errors->first('pincode')" />
                </div>
                <div class="flex flex-col gap-2">
                  <label for="address"
                    class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Address*</label>
                  <input type="text" id="address" name="address"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('address', $nominee->address ?? '') }}">
                    <x-input-error :messages="$errors->first('address')" />
                </div>
                <div class="flex flex-col gap-2">
                  <label for="email" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Email</label>
                  <input type="email" id="email" name="email"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('email', $nominee->email ?? '') }}">
                    <x-input-error :messages="$errors->first('email')" />
                </div>
                <div class="flex flex-col gap-2">
                  <label for="mobile"
                    class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Mobile</label>
                  <input type="text" id="mobile" name="mobile"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('mobile', $nominee->mobile ?? '') }}">
                    <x-input-error :messages="$errors->first('mobile')" />
                </div>

              </div>

            </div>

            <div class="flex justify-start">
              <button type="submit" class="rounded-lg bg-success-300 text-white font-semibold mt-4 py-3.5 px-4">
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
  $(document).ready(function () {

    $('#select4').select2();
    $('#select5').select2();

    $('#select4').on('change', function () {
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
        var $select = $('#select5');

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
      $('#select5').empty().append('<option value="">Select City</option>');
    }
    });

    function loadCity2() {
      var stateId = $("#select4").val();
      var cityId = {!! json_encode($nominee->city ?? 0) !!};

      if (stateId) {
        $.ajax({
          url: '{{ route('getCity') }}',
          type: 'POST',
          data: {
            id: stateId,
            _token: '{{ csrf_token() }}'
          },
          success: function (response) {
            if (response.status === "success") {
              var $select = $('#select5');
              $select.empty();
              $select.append('<option value="">Select City</option>');
              response.data.forEach(function (item) {
                let selected = (cityId == item.id) ? "selected" : "";
                $select.append('<option ' + selected + ' value="' + item.id + '">' + item.name + '</option>');
              });
              $select.trigger('change');
            } else {
              console.error('Error: ' + response.message);
            }
          },
          error: function (xhr, status, error) {
            console.error('Error occurred: ' + error);
          }
        });
      } else {
        $('#select5').empty().append('<option value="">Select City</option>');
      }
    }
    loadCity2();

  });
</script>