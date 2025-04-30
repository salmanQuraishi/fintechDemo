<x-app-layout>

    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <!-- write your code here-->
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <!--list table-->
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">

                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">User List</h4>
                        
                        <div class="table-content w-full overflow-x-auto">
                        <table id="user-table" style="width: 100%">
                               <thead>
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
                                            <div class="w-full flex space-x-2.5 items-center">
                                                <span
                                                    class="text-base font-medium text-bgray-600 dark:text-bgray-50">Email</span>
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
                                                    class="text-base font-medium text-bgray-600 dark:text-bgray-50">Roles</span>
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
                                                <!-- <span>
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
                                                </span> -->
                                            </div>
                                        </td>
                                    </tr>
                               </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- write your code here-->
    </main>

    <div class="modal hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center" id="multi-step-modal">
        <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content flex justify-center w-full px-4 items-center mx-auto">
          <!-- Step 1 -->
          <div class="step-content step-1">
            <div class="max-w-[752px] rounded-lg bg-white dark:bg-darkblack-600 p-6 pb-10 transition-all relative">
              <button id="step-1-cancel" class="flex justify-center items-center absolute top-6 right-6">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.9492 7.05029L7.04972 16.9498" stroke="#22C55E" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                  <path d="M7.0498 7.05029L16.9493 16.9498" stroke="#22C55E" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                </svg>
              </button>
              <header class="text-center">
                <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-3">Verify Email</h3>
              </header>
    
              <div class="flex flex-row py-3" id="success-message" style="display: none;">
                <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                <div class="flex-1">
                  <p class="text-bgray-800 dark:text-white text-[#9AA2B1] pl-3 lg:text-base text-xs lg:leading-7"
                    id='textadd'></p>
                </div>
              </div>
    
              <form id='emailForm'>
    
                <textarea name="otp" id="otp" rows="6" cols="50"
                  class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                  placeholder="Enter otp"></textarea>
    
                <button
                  class="bg-success-300 hover:bg-success-400 text-white font-semibold text-base py-4 flex justify-center items-center rounded-lg w-full mt-2">
                  Verify
                </button>
              </form>
    
              
            </div>
        </div>
    </div>
</div>

    @push('scripts')
        <!--scripts -->
        <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    
    $(document).ready(function () {
                $('#user-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('users.getUsers') }}",
                    columns: [
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        { data: 'name' },
                        { data: 'email' },
                        { data: 'role' },
                        {
                            data: 'created_at',
                            render: function (data) {
                                if (!data) return '';
                                const date = new Date(data);
                                return new Intl.DateTimeFormat('en-CA').format(date);
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                        }
                    ],
                    createdRow: function (row, data, dataIndex) {
                        $('td', row).each(function () {
                            $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                        });
                    }
                });
            });

</script>
        <script>
            // min-calender
            $("#min-calender").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                inline: true,
            });
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

    @endpush

</x-app-layout>





