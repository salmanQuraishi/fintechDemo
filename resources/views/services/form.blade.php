<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">
                            {{ isset($service) ? 'Edit Service' : 'Create Service' }}
                        </h4>

                        <div class="col-span-9 tab-content">
                            <div id="tab1" class="tab-pane active">
                                <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
                                    <div class="2xl:col-span-8 xl:col-span-7">
                                        <form action="{{ isset($service) ? route('service.update', $service->id) : route('service.store') }}" 
                                            method="POST" enctype="multipart/form-data">
                                          @csrf
                                          @if(isset($service))
                                              @method('PUT')
                                          @endif

                                          <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6 mb-4">
                                              <div class="flex flex-col gap-2">
                                                  <label for="name" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Name</label>
                                                  <input type="text" name="name"
                                                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                                                      value="{{ old('name', $service->name ?? '') }}">
                                                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                              </div>
                                              <div class="flex flex-col gap-2">
                                                  <label for="price" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Price</label>
                                                  <input type="text" name="price"
                                                      class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                                                      value="{{ old('price', $service->price ?? '') }}"
                                                      oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                  <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                              </div>
                                              <div class="flex flex-col gap-2">
                                                <label for="icon" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Icon</label>
                                                <input type="file" id='fileInput' name="icon" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                                <img id='previewImage' src="{{ old('icon', isset($service->icon) ? asset("/".$service->icon) : "") }}" alt="Icon" width='100px'>
                                               </div>
                                               <div class="flex flex-col gap-2 mb-4">
                                                   <label for="description" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Description</label>
                                                   <textarea name="description"
                                                       class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">{{ old('description', $service->description ?? '') }}</textarea>
                                                   <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                               </div>
                                               <div class="flex flex-col gap-2">
                                                   <label for="category" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Category</label>
                                                   <select name="category"
                                                       class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                                       @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" @selected(old('category_id', $service->category_id ?? '') == $category->id)>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                   
                                                   </select>
                                               </div>
                                               <div class="flex flex-col gap-2">
                                                   <label for="status" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Status</label>
                                                   <select name="status"
                                                       class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                                       <option value="active" {{ (old('status', $service->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                                                       <option value="inactive" {{ (old('status', $service->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                                   </select>
                                               </div>
                                          </div>

                                          <div class="flex justify-start">
                                              <button class="rounded-lg bg-success-300 text-white font-semibold mt-10 py-3.5 px-4">
                                                  {{ isset($service) ? 'Update' : 'Save' }}
                                              </button>
                                          </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Tab Content -->
                    </div>
                </div>
            </section>
        </div>
    </main>
    @push('scripts')
    <!--scripts -->
    <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
    <script>
        // min-calender
        $("#min-calender").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            inline: true,
        });
    </script>
    <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
    <script>
        $(".card-slider").slick({
            dots: true,
            infinite: true,
            autoplay: true,
            speed: 500,
            fade: true,
            cssEase: "linear",
            arrows: false,
        });
    </script>

<script>
    $(document).ready(function () {

      $("#fileInput").change(function (event) {
        var file = event.target.files[0];
  
        if (file) {
          console.log("File selected:", file.name);
  
          var reader = new FileReader();
          reader.onload = function (e) {
            $("#previewImage").attr("src", e.target.result);
            console.log("Image updated!");
          };
          reader.readAsDataURL(file);
        } else {
          console.log("No file selected");
        }
      });
    });
</script>

    <script src="{{ asset('/') }}assets/js/main.js"></script>
@endpush
</x-app-layout>
