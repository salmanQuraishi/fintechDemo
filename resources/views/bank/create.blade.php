<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <!-- write your code here-->
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <!--list table-->
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">
                            {{ isset($bank) ? 'Edit Bank' : 'Add Bank' }}
                        </h4>

                        <div class="col-span-9 tab-content">
                            <!-- Personal Information -->
                            <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
                                <div class="2xl:col-span-8 xl:col-span-7">
                                    <form action="{{ isset($bank) ? route('banks.update', $bank->id) : route('banks.store') }}" method="POST">
                                        @csrf
                                        @if (isset($bank))
                                            @method('PUT')
                                        @endif
                                        <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                                            <div class="flex flex-col gap-2">
                                                <label for="account_holder_name" class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Account Holder Name *</label>
                                                <input type="text" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"  name="account_holder_name" value="{{ old('account_holder_name', $bank->account_holder_name ?? '') }}">
                                                <x-input-error :messages="$errors->get('account_holder_name')" class="mt-2" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label for="account_no" class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Account No. *</label>
                                                <input type="text" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"  name="account_no" value="{{ old('account_no', $bank->account_no ?? '') }}">
                                                <x-input-error :messages="$errors->get('account_no')" class="mt-2" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label for="ifsc" class="text-base text-bgray-600 dark:text-bgray-50  font-medium">IFSC *</label>
                                                <input type="text" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"  name="ifsc" value="{{ old('ifsc', $bank->ifsc ?? '') }}">
                                                <x-input-error :messages="$errors->get('ifsc')" class="mt-2" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label for="bank_name" class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Bank Name *</label>
                                                <input type="text" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"  name="bank_name" value="{{ old('bank_name', $bank->bank_name ?? '') }}">
                                                <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label for="account_type" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Account Type *</label>
                                                <select name="account_type" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                                    <option value="Saving" {{ old('account_type', $bank->account_type ?? '') == 'Saving' ? 'selected' : '' }}>Saving</option>
                                                    <option value="Current" {{ old('account_type', $bank->account_type ?? '') == 'Current' ? 'selected' : '' }}>Current</option>
                                                </select>                                                
                                                <x-input-error :messages="$errors->get('account_type')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="flex justify-start">
                                            <button class="rounded-lg bg-success-300 text-white font-semibold mt-4 py-3.5 px-4">
                                                {{ isset($bank) ? 'Update' : 'Save' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- write your code here-->
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

        <script src="{{ asset('/') }}assets/js/main.js"></script>
    @endpush
</x-app-layout>
