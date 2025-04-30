<x-app-layout>

    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
      <!-- write your code here-->
      <div class="grid grid-cols-1 xl:grid-cols-12 bg-white dark:bg-darkblack-600 rounded-xl">
        <!-- Sidebar -->
        <!--Tab Content -->
        <div class="py-8 px-10 col-span-12 tab-content">
          <!-- Personal Information -->
          <div id="tab1" class="tab-pane active">
            <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
              <div class="2xl:col-span-12 xl:col-span-7">
                <h3 class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
                  Web Settings
                </h3>
                <div class="mt-8">
                  
                    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-2 mb-4">
                            <label for="title" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Title</label>
                            <input type="text" name="title" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0" 
                                value="{{ old('title', $settings->title ?? '') }}">
                                <x-input-error :messages="session('title')" />
                              </div>
                            <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                                
                              <div class="flex flex-col gap-2">
                                  <label for="logo_light" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Logo Light</label>
                                  <input type="file" name="logo_light" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                  @if(!empty($settings->logo_light))
                                  <img src="{{ asset('/' . $settings->logo_light) }}" alt="Logo Light" class="h-10 mt-2">
                                  @endif
                                <x-input-error :messages="session('logo_light')" />
                            </div>
                    
                            <div class="flex flex-col gap-2">
                                <label for="logo_dark" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Logo Dark</label>
                                <input type="file" name="logo_dark" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                @if(!empty($settings->logo_dark))
                                    <img src="{{ asset('/' . $settings->logo_dark) }}" alt="Logo Dark" class="h-10 mt-2">
                                @endif
                                <x-input-error :messages="session('logo_dark')" />
                            </div>
                    
                            <div class="flex flex-col gap-2">
                                <label for="light_icon" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Light Icon</label>
                                <input type="file" name="light_icon" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                @if(!empty($settings->light_icon))
                                    <img src="{{ asset('/' . $settings->light_icon) }}" alt="light_icon" class="h-10 mt-2" width="100px">
                                @endif
                                <x-input-error :messages="session('light_icon')" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="dark_icon" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Dark Icon</label>
                                <input type="file" name="dark_icon" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                @if(!empty($settings->dark_icon))
                                    <img src="{{ asset('/' . $settings->dark_icon) }}" alt="dark_icon" class="h-10 mt-2" width="100px">
                                @endif
                                <x-input-error :messages="session('dark_icon')" />
                            </div>
                        </div>
                    
                        <div class="flex justify-end">
                            <button type="submit" class="rounded-lg bg-success-300 text-white font-semibold mt-10 py-3.5 px-4">
                                Save Settings
                            </button>
                        </div>
                    </form>                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- write your code here-->
    </main>
  

    @push('scripts')
      <!--scripts -->
      <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
      <script src="{{ asset('/') }}assets/js/aos.js"></script>
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
        AOS.init();
      </script>
      <script src="{{ asset('/') }}assets/js/quill.min.js"></script>
      <script src="{{ asset('/') }}assets/js/chart.js"></script>
      <script src="{{ asset('/') }}assets/js/main.js"></script>
    @endpush
</x-app-layout>