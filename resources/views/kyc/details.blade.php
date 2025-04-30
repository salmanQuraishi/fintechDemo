<div id="businessdetails" class="tab-pane {{ Route::currentRouteName() == 'business.details' ? 'active' : '' }}">
  <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
    <div class="2xl:col-span-8 xl:col-span-7">
      <h3 class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
        Business Details
      </h3>

      
      <form class="space-y-6" action="{{ route('business.Detailssubmit') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="grid gap-4">

          @php
            $decodedDocuments = isset($BusinessKyc) ? json_decode($BusinessKyc->documents ?? '{}', true) : [];
          @endphp

          @foreach ($documents as $doc)
            @php
              $name = $doc->field_name;
              $value = old($name, $decodedDocuments[$name] ?? '');
            @endphp

            <div class="flex flex-col gap-2 mt-2.5">
              <label for="{{ $name }}" class="text-sm text-bgray-500 dark:text-bgray-50">{{ $doc->label }}</label>

              <input 
                type="{{ $doc->type }}" 
                name="{{ $name }}" 
                id="{{ $name }}" 
                @if($doc->type !== 'file') value="{{ $value }}" @endif
                class="text-base border h-14 w-full rounded-lg px-4 py-3.5 dark:bg-darkblack-500 dark:text-white"
                placeholder="{{ $doc->label }}"
              >

              @if($doc->type === 'file' && $value)
                @php
                  $ext = strtolower(pathinfo($value, PATHINFO_EXTENSION));
                  $isImg = in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
                @endphp

                {!! $isImg 
                  ? "<img src='" . asset($value) . "' class='w-24 mt-2 rounded-md'>" 
                  : "<a href='" . asset($value) . "' target='_blank' class='text-blue-600 text-sm underline mt-1'>View File</a>" !!}
              @endif

              <x-input-error :messages="$errors->get($name)" class="mt-1" />
            </div>
          @endforeach

          <div class="flex flex-col gap-2">
            <label for="address" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">
              Address *
            </label>
            <textarea 
              name="address" 
              id="address"
              class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-36 focus:border focus:border-success-300 focus:ring-0 dark:text-white dark:bg-darkblack-600 dark:border-darkblack-400 resize-none"
            >{{ old('address', isset($BusinessKyc) ? $BusinessKyc->address : '') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>

          <div class="flex flex-col gap-2">
            <label for="pincode" class="text-sm text-bgray-500 dark:text-bgray-50 block mt-2.5 text-left">
              Pincode *
            </label>
            <input 
              type="text" 
              name="pincode" 
              id="pincode" 
              class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base" 
              placeholder="Enter Pincode *" value="{{ old('pincode', isset($BusinessKyc) ? $BusinessKyc->pincode : '') }}">
            <x-input-error :messages="$errors->get('pincode')" class="mt-2" />
          </div>

          <div class="flex flex-col gap-2 mb-3">
            <label for="state" class="text-sm text-bgray-500 dark:text-bgray-50 block mt-2.5 text-left">State *</label>
            <select 
              name="state" 
              id="select2"
              class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
              <option selected disabled>Select State</option>
              @foreach ($states as $data)
                <option value="{{ $data->id }}"
                  {{ old('state', isset($BusinessKyc) ? $BusinessKyc->state : null) == $data->id ? 'selected' : '' }}>
                  {{ $data->name }}
                </option>                          
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('state')" />
          </div>

          <div class="flex flex-col gap-2 mb-3">
            <label for="city" class="text-sm text-bgray-500 dark:text-bgray-50 block mt-2.5 text-left">City *</label>
            <select 
              name="city" 
              id="select3"
              class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
              <option selected disabled>Select City</option>
            </select>
            <x-input-error :messages="$errors->get('city')" />
          </div>

          @if (isset($BusinessKyc) && $BusinessKyc->status === 'pending' || $BusinessKyc->status === 'reject')
            <div class="flex justify-end">
              <button class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
                Submit
              </button>
            </div>
          @endif
        
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
  
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
      var cityId = {!! json_encode(old('city', $BusinessKyc->city ?? auth()->user()->city ?? 0)) !!};
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