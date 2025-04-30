<x-guest-layout>
    <section class="bg-white dark:bg-darkblack-500">
        <div class="flex flex-col lg:flex-row justify-between min-h-screen">
            <!-- Left -->
            <div class="lg:w-1/2 px-5 xl:pl-12 pt-10">
                    <header>
                        <a href="{{route('dashboard')}}" class="">
                            <img src="{{ asset('/') }}{{$settings->logo_dark}}" class="block dark:hidden"
                                alt="Logo">
                            <img src="{{ asset('/') }}{{$settings->logo_light}}" class="hidden dark:block"
                                alt="Logo">
                        </a>
                    </header>      
  
                <div class="max-w-[460px] m-auto pt-24 pb-16">
                    <header class="mb-8">
                        <h2 class="text-bgray-900 dark:text-white text-4xl font-semibold font-poppins mb-2">
                            Verify OTP
                        </h2>
                    </header>
                    <form method="POST" action="{{ route('verify') }}">
                        @csrf
                        <div class="mb-4">
                            <input type="text"
                                class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                                placeholder="Enter otp here" name="otp" maxlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
                                <input type="hidden" name="mobile" value="{{session('mobile')}}">
                        </div>
                        <input type="submit" class="py-3.5 text-center text-white font-bold bg-success-300 hover:bg-success-400 transition-all rounded-lg w-full" value="verify otp">
                    </form>
  
  
                </div>
            </div>
            <!-- Right -->
            <div class="lg:w-1/2 lg:block hidden bg-[#F6FAFF] dark:bg-darkblack-600 p-20 relative">
                <ul>
                    <li class="absolute top-10 left-8">
                        <img src="{{ asset('/') }}assets/images/shapes/square.svg" alt="">
                    </li>
                    <li class="absolute right-12 top-14">
                        <img src="{{ asset('/') }}assets/images/shapes/vline.svg" alt="">
                    </li>
                    <li class="absolute bottom-7 left-8">
                        <img src="{{ asset('/') }}assets/images/shapes/dotted.svg" alt="">
                    </li>
                </ul>
                <div class="mb-10">
                    <img src="{{ asset('/') }}assets/images/illustration/signup.svg" alt="">
                </div>
                <div>
                    <div class="text-center max-w-lg px-1.5 m-auto">
                        <h3 class="text-bgray-900 dark:text-white font-semibold font-popins text-4xl mb-4">
                            Speady, Easy and Fast
                        </h3>
                        <p class="text-bgray-600 dark:text-darkblack-300 text-sm font-medium">
                            BankCo. help you set saving goals, earn cash back offers, Go to
                            disclaimer for more details and get paychecks up to two days
                            early. Get a
                            <span class="text-success-300 font-bold">$20</span> bonus when
                            you receive qualifying direct deposits
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </x-guest-layout>