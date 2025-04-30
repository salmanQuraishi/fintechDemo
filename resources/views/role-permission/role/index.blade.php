<x-app-layout>

    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <!-- write your code here-->
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <!--list table-->
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Role List</h4>

                        <div class="table-content w-full overflow-x-auto">
                            <table class="w-full">
                                <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                    <td class="py-5 px-6 xl:px-0 w-[250px] lg:w-auto inline-block">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">
                                                #</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Name</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="flex space-x-2.5 items-center">
                                            <span class="text-base font-medium text-bgray-600 dark:text-gray-50">
                                                Date</span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="flex space-x-2.5 items-center">
                                            <span class="text-base font-medium text-bgray-600 dark:text-gray-50">
                                                Action</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                @foreach ($roles as $role)
                                
                                <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                    <td class="py-5 px-6 xl:px-0">
                                        <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                            {{ $loop->iteration }}
                                        </p>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                            {{ $role->name }}
                                        </p>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                            {{ $role->created_at->format('Y-m-d') }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-5 xl:w-[165px] xl:px-0">
                                        <a href="{{ route('roles.addPermissionToRole',$role->id) }}"
                                            class="rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">add permission</a>
                                            <br>
                                            <br>
                                        
                                        @can('update role')
                                            <a href="{{ route('roles.edit',$role->id) }}"
                                                class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold leading-[22px] text-success-400 dark:bg-darkblack-500">Edit</a>
                                        @endcan
                                        
                                        @can('delete role')
                                            <a href="{{ route('roles.destroy',$role->id) }}" onclick="return confirm('Are you sure you want to delete this role?');"
                                                class="rounded-md bg-[#FAEFEE] px-4 py-1.5 text-sm font-semibold leading-[22px] text-[#FF4747] dark:bg-darkblack-500">Delete</a>
                                        @endcan
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