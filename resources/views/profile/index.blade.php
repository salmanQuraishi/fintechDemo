<x-app-layout>

  <style>
    .container {
      overflow: auto;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }

    .container::-webkit-scrollbar {
      display: none;
    }

    .datamanage {
      display: flex;
      align-items: center;
    }

    .container .day-row {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 15px;
    }

    .container .day-row input[type="checkbox"] {
      width: 18px;
      height: 18px;
    }

    .container .day-label {
      width: 50px;
      font-weight: bold;
      /* color: #ff0000; */
    }

    .container .time-box {
      background-color: #f5f5f5;
      padding: 5px 10px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      font-size: 16px;
    }

    .container .time-box label {
      font-size: 12px;
      /* color: #666; */
    }

    .container .time-box input[type="time"] {
      border: none;
      background: transparent;
      font-size: 16px;
      text-align: center;
      width: 100%;
    }

    .container button {
      margin-top: 20px;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    /* .container button:hover {
      background-color: #45a049;
    } */
  
    .dropdown-container {
      position: relative;
      width: 100%;
    }

    .dropdown-input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 2px solid rgb(34 197 94);
      border-radius: 6px;
      outline: none;
      color: #333;
      cursor: pointer;
    }

    .dropdown-list {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      max-height: 200px;
      overflow-y: auto;
      background-color: white;
      border: 1px solid #ccc;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      z-index: 100;
      display: none;
    }

    .dropdown-item {
      display: flex;
      align-items: center;
      padding: 10px;
      cursor: pointer;
    }

    .dropdown-item:hover {
      background-color: #f1f1f1;
    }

    .dropdown-item img {
      width: 24px;
      height: 24px;
      margin-right: 10px;
    }
    [type='text']:focus, [type='email']:focus, [type='url']:focus, [type='password']:focus, [type='number']:focus, [type='date']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='week']:focus, [multiple]:focus, textarea:focus, select:focus{
      border-color: #45a049;
      --tw-ring-color: #45a049;
    }
  </style>
  <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
    <!-- write your code here-->
    <div class="grid grid-cols-1 xl:grid-cols-12 bg-white dark:bg-darkblack-600 rounded-xl">
      <!-- Sidebar -->
      @include('profile.aside')
      <!--Tab Content -->
      <div class="py-8 px-10 col-span-9 tab-content">

        @if (Route::currentRouteName() == 'user.profile.edit')
          @include('profile.userProfile')
        @endif
        @if (Route::currentRouteName() == 'userbusiness')
          @include('profile.userbusiness')
        @endif
        @if (Route::currentRouteName() == 'usernomineeinfo')
          @include('profile.usernomineeinfo')
        @endif
        @if (Route::currentRouteName() == 'userblinkedaccounts')
          @include('profile.userblinkedaccounts')
        @endif
        @if (Route::currentRouteName() == 'usersecutiry')
          @include('profile.secutiry')        
        @endif
        @if (Route::currentRouteName() == 'useractivity')
          @include('profile.activity')  
        @endif

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