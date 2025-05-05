<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        @php $isEdit = isset($bank); @endphp
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">
                            {{ $isEdit ? 'Edit Admin Bank' : 'Add Admin Bank' }}
                        </h4>
                        <form action="{{ $isEdit ? route('bank.getAdminBankupdate', $bank->id) : route('bank.getAdminBankstore') }}" method="POST">
                            @csrf
                            @if($isEdit)
                                @method('PUT')
                            @endif
                            <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                                <!-- Account Holder Name -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Account Holder Name</label>
                                    <input type="text" name="acc_holder_name" value="{{ old('acc_holder_name', $bank->acc_holder_name ?? '') }}"
                                           class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0" />
                                    <x-input-error :messages="$errors->get('acc_holder_name')" class="mt-2" />
                                </div>

                                <!-- Bank Name -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name', $bank->bank_name ?? '') }}"
                                           class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0" />
                                    <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                                </div>

                                <!-- Account Number -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Account No.</label>
                                    <input type="text" name="account_no" value="{{ old('account_no', $bank->account_no ?? '') }}"
                                           class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0" />
                                    <x-input-error :messages="$errors->get('account_no')" class="mt-2" />
                                </div>

                                <!-- IFSC -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">IFSC</label>
                                    <input type="text" name="ifsc" value="{{ old('ifsc', $bank->ifsc ?? '') }}"
                                           class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0" />
                                    <x-input-error :messages="$errors->get('ifsc')" class="mt-2" />
                                </div>

                                <!-- Account Type -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Account Type</label>
                                    <select name="type" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0">
                                        <option value="saving" {{ old('type', $bank->account_type ?? '') == 'saving' ? 'selected' : '' }}>Saving</option>
                                        <option value="current" {{ old('type', $bank->account_type ?? '') == 'current' ? 'selected' : '' }}>Current</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                                </div>

                                <!-- Status -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Status</label>
                                    <select name="status" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0">
                                        <option value="active" {{ old('status', $bank->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $bank->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex justify-start">
                                <button class="rounded-lg bg-success-300 text-white font-semibold mt-10 py-3.5 px-4">
                                    {{ $isEdit ? 'Update' : 'Save' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

@push('scripts')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <script>
        $("#min-calender").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            inline: true,
        });
    </script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
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
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush

</x-app-layout>
