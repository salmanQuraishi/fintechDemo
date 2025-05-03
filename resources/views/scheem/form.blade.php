<x-app-layout>

    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <!-- write your code here-->
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <!--list table-->
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                      
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Set Scheem</h4>

                        <div class=" col-span-9 tab-content">
                            
                            <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
                                <div class="2xl:col-span-8 xl:col-span-7">
                                    
                                    <form action="{{ isset($scheme) ? route('admin.schemes.update', $scheme->id) : route('admin.schemes.store') }}" method="POST">
                                        @csrf
                                        @if(isset($scheme))
                                            @method('PUT')
                                        @endif
                                    
                                        <input type="hidden" name="userid" value="{{ $userId }}">
                                    
                                        <div class="grid 2xl:grid-cols-3 grid-cols-1 gap-6">
                                            <!-- Charge ID -->
                                            <div class="flex flex-col gap-2">
                                                <label for="charge_id" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Charges *</label>
                                                <select name="charge_id" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                                    @foreach ($DefaultCharges as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ (old('charge_id') ?? ($scheme->charge_id ?? '')) == $data->id ? 'selected' : '' }}>
                                                            {{ $data->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    
                                            <!-- Type -->
                                            <div class="flex flex-col gap-2">
                                                <label for="type" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Type *</label>
                                                <select name="type" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                                                    <option value="percent" {{ (old('type') ?? ($scheme->type ?? '')) == 'percent' ? 'selected' : '' }}>Percent</option>
                                                    <option value="flat" {{ (old('type') ?? ($scheme->type ?? '')) == 'flat' ? 'selected' : '' }}>Flat</option>
                                                </select>
                                            </div>
                                    
                                            <!-- Value -->
                                            <div class="flex flex-col gap-2">
                                                <label for="value" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Value*</label>
                                                <input type="text" 
                                                       class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0" 
                                                       id="value" 
                                                       name="value" 
                                                       value="{{ old('value') ?? ($scheme->value ?? '') }}" 
                                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                <x-input-error :messages="$errors->get('value')" class="mt-2" />
                                            </div>
                                        </div>
                                    
                                        <div class="flex justify-start">
                                            <button class="rounded-lg bg-success-300 text-white font-semibold mt-2 py-3.5 px-4">
                                                {{ isset($scheme) ? 'Update' : 'Create' }}
                                            </button>
                                        </div>
                                    </form>
                                                                       
                                </div>
                            </div>
                        </div>

                        <div class="table-content w-full overflow-x-auto">
                            <table class="w-full">
                                <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                    <td class="py-5 px-6 xl:px-0 w-[250px] lg:w-auto inline-block">
                                        <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Scheem</span>                                         
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <span class="text-base font-medium text-bgray-600 dark:text-gray-50">Type</span>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <span class="text-base font-medium text-bgray-600 dark:text-gray-50">Value</span>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <span class="text-base font-medium text-bgray-600 dark:text-gray-50">Action</span>
                                    </td>
                                </tr>

                                @foreach ($allScheme as $data)
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                {{$loop->iteration}}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                {{$data->charge->name}}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                {{$data->type}}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                {{$data->value}}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <a href="{{ route('admin.schemes.edit', ['scheme' => $data->id, 'user' => $userId]) }}" class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold leading-[22px] text-success-400 dark:bg-darkblack-500">Edit</a>                                          
                                        </td>
                                    </tr>
                                @endforeach
                           
                            </table>
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