<div id="businessoverview" class="tab-pane {{ Route::currentRouteName() == 'business.overview' ? 'active' : '' }}">
  <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
    <div class="2xl:col-span-8 xl:col-span-7">
      <h3 class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
        Business Overview
      </h3>
      <form class="space-y-6" method="post" action="{{ route('business.overviewrequest') }}">
        @csrf

        <div class="grid gap-4">
          
          <div class="flex flex-col gap-2">
            <label for="businessType" class="text-sm text-bgray-500 dark:text-bgray-50 block mt-2.5 text-left">Business Type *</label>
            <select name="businessType" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
              <option value="">Select Business Type</option>
              @foreach ($BusinessType as $BusinessTypes)
                <option value="{{ $BusinessTypes->id }}" 
                  @if(isset($BusinessKyc) && $BusinessKyc->business_type_id == $BusinessTypes->id) selected @endif>
                  {{ $BusinessTypes->name }}
                </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('businessType')" class="mt-2" />
          </div>

          <div class="flex flex-col gap-2">
            <label for="businessCategory" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Business Category *</label>
            <select name="businessCategory" id="businessCategory" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
              <option value="">Select Business Category</option>
              @foreach ($BusinessCategory as $BusinessCategorys)
                <option value="{{ $BusinessCategorys->id }}" 
                  @if(isset($BusinessKyc) && $BusinessKyc->business_category_id == $BusinessCategorys->id) selected @endif>
                  {{ $BusinessCategorys->name }}
                </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('businessCategory')" class="mt-2" />
          </div>

          <div class="flex flex-col gap-2">
            <label for="subCategory" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Sub Category *</label>
            <select name="subCategory" id="subCategory" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
              <option value="">Select Business Sub Category</option>
            </select>
            <x-input-error :messages="$errors->get('subCategory')" class="mt-2" />
          </div>

          <div class="flex flex-col gap-2">
            <label for="businessDescription" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Business Description</label>
            <textarea name="businessDescription" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-36 focus:border focus:border-success-300 focus:ring-0 dark:text-white dark:bg-darkblack-600 dark:border-darkblack-400 resize-none">{{ old('businessDescription', isset($BusinessKyc) ? $BusinessKyc->business_description : '') }}</textarea>
            <x-input-error :messages="$errors->get('businessDescription')" class="mt-2" />
          </div>

          <div class="text-sm text-bgray-500 dark:text-bgray-50 dark:text-white">
            <label class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">How do you wish to accept payments</label>
            <label class="inline-flex items-center mr-6 cursor-pointer">
              <input type="radio" name="paymentStatus" value="Without website/app" class="peer" 
                @if(isset($BusinessKyc) && $BusinessKyc->payment_status == 'Without website/app') checked @endif />
              <span class="peer-checked:text-blue-600"> Without website/app</span>
            </label>
            <br>
            <label class="inline-flex items-center cursor-pointer">
              <input type="radio" name="paymentStatus" value="On my website/app" class="peer" 
                @if(isset($BusinessKyc) && $BusinessKyc->payment_status == 'On my website/app') checked @endif />
              <span class="peer-checked:text-blue-600"> On my website/app</span>
            </label>
            <x-input-error :messages="$errors->get('paymentStatus')" class="mt-2" />
          </div>

          <div class="flex justify-end">
            <button class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
              Submit
            </button>
          </div>
        

        </div>
      </form>
    </div>
  </div>
</div>
@push('scripts')
<script>
  $(document).ready(function () {

    $('#businessCategory').select2();
    $('#subCategory').select2();

    $('#businessCategory').on('change', function () {
      var businessCategoryId = $(this).val();

      if (businessCategoryId) {
        $.ajax({
        url: '{{ route('getBusinessSubCategory') }}',
        type: 'POST',
        data: {
          id: businessCategoryId,
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          if (response.status == "success") {
          var $select = $('#subCategory');

          $select.empty();

          $select.append('<option value="">Select Business Sub Category</option>');

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
        $('#subCategory').empty().append('<option value="">Select Business Sub Category</option>');
      }
    });
    function loadBusiness(){
      var businessCategoryId = $("#businessCategory").val();
      var subCategoryId = {{ isset($BusinessKyc) ? $BusinessKyc->business_sub_category_id : 0 }};
      

      if (businessCategoryId) {
        $.ajax({
        url: '{{ route('getBusinessSubCategory') }}',
        type: 'POST',
        data: {
          id: businessCategoryId,
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          if (response.status == "success") {
          var $select = $('#subCategory');

          $select.empty();

          $select.append('<option value="">Select Business Sub Category</option>');

          response.data.forEach(function (item) {
            $select.append('<option value="' + item.id + '">' + item.name + '</option>');
          });

          response.data.forEach(function (item) {
            let selected = (subCategoryId == item.id) ? "selected" : "";
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
        $('#subCategory').empty().append('<option value="">Select Business Sub Category</option>');
      }
    }
    loadBusiness();

  });
</script>
@endpush