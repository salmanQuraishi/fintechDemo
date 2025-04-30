<x-app-layout>
  <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
      <!-- Layout Container -->
      
      <x-input-info :messages="$errors->all()" />
      <x-input-info :messages="session('error')" />

      <div class="grid grid-cols-1 xl:grid-cols-12 bg-white dark:bg-darkblack-600 rounded-xl">
        
        <aside class="col-span-3 border-r border-bgray-200 dark:border-darkblack-400">
          <div class="px-4 py-6">
            @php
              $hasMultipleCategories = count($category) > 1;
            @endphp
            
            @foreach ($category as $data)
              <div class="tab {{ $loop->first && $hasMultipleCategories ? 'active' : '' }} flex gap-x-4 p-4 rounded-lg transition-all cursor-pointer" data-tab="tab{{ $loop->iteration }}">
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">
                  {{ $data->name }}
                </h4>
              </div>
            @endforeach
          </div>
        </aside>

        <!-- Tab Content -->
        <div class="py-8 px-10 col-span-9 tab-content">
          
          @foreach ($category as $data)
            <div id="tab{{ $loop->iteration }}" class="tab-pane {{ $loop->first && $hasMultipleCategories ? 'active' : '' }}">
              <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-5">
                {{ $data->name }} Services
              </h3>
              {{-- <div class="grid lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-2 gap-3 lg:gap-4 xl:gap-6"> --}}
              <div class="grid 2xl:grid-cols-2 gap-3 lg:gap-4 xl:gap-6">
                @foreach ($data->services as $service)


                @php
                  $hasService = $userService->contains('service_id', $service->id);
                @endphp


                    <div class="bg-white dark:bg-bgray-900 rounded-lg p-6 relative">
                      <span class="absolute right-6 top-6 text-md text-bgray-600 dark:text-bgray-50">
                        {{ Number::currency($service->price,'INR') }}
                      </span>
                      <div class="space-x-5">
                        <div class="shrink-0">
                          <img src="{{ asset("/").$service->icon }}" alt="{{ $service->name }}" width="50px">
                        </div>
                      </div>
                      <h3 class="text-2xl text-bgray-900 dark:text-white font-bold">
                        {{ $service->name }}
                      </h3>
                      <p class="pb-5 text-sm text-bgray-600 dark:text-bgray-50">
                        {{ $service->description }}
                      </p>
                      @if ($hasService)
                        <button class="text-base w-full text-gray-500 font-medium h-12 rounded-md border border-gray-300 cursor-not-allowed bg-gray-200">
                            Coming Soon
                        </button>
                      @else
                        <form action="{{ route('buy.service', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to buy this?')">
                            @csrf
                            <button class="text-base w-full text-success-300 font-medium h-12 rounded-md border border-success-300 hover:text-white hover:bg-success-300 transition duration-300 ease-in-out">
                                Buy
                            </button>
                        </form>
                      @endif
                    </div>
                @endforeach
              </div>
            </div>
          @endforeach
          
        </div>
      </div>
  </main>

  @push('scripts')
    <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/') }}assets/js/aos.js"></script>
    <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
    <script src="{{ asset('/') }}assets/js/chart.js"></script>
    <script src="{{ asset('/') }}assets/js/main.js"></script>

    <script>
      AOS.init();

      $(document).ready(function () {
        $(".tab").click(function () {
          var tabID = $(this).data("tab");

          $(".tab").removeClass("active");
          $(this).addClass("active");

          $(".tab-pane").removeClass("active");
          $("#" + tabID).addClass("active");
        });
      });
    </script>
  @endpush
</x-app-layout>
