<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <!-- write your code here-->
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <!--list table-->
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">

                        <div
                            class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h3 class="text-bgray-900 dark:text-white text-xl font-bold">
                                Collection wallet to Main Wallet
                            </h3>
                        </div>


                        <div class="table-content w-full overflow-x-auto">
                            <table id="FundTransfer" class="display w-full">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td class="py-5 px-6 xl:px-0 w-[250px] lg:w-auto">
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">
                                                #</span>
                                        </td>
                                        <th class="py-5 px-6 xl:px-0 text-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">User</span>
                                            <span>
                                        </th>                                        
                                        <th class="py-5 px-6 xl:px-0">
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Amount</span>
                                        </th>
                                        <th class="py-5 px-6 xl:px-0">
                                            <div class="w-full flex space-x-2.5 items-center">
                                                <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Note</span>
                                            </div>
                                        </th>
                                        <th class="py-5 px-6 xl:px-0">
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span>
                                        </th>
                                        <th class="py-5 px-6 xl:px-0">
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Date</span>
                                        </th>
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


    @push('scripts')
        <!--scripts -->
        <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>

        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

        <script>
            $(document).ready(function() {
                $('#FundTransfer').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('GetTransferData') }}',
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    columns: [
                        { data: 'id', name: 'id' },
                        { 
                            data: 'user.name',
                            name: 'user.name',
                            render: function (data, type, row) {
                                return data ?? '';
                            }
                        },
                        { data: 'amount', name: 'amount' },
                        { data: 'note', name: 'note' },
                        { 
                            data: 'status', 
                            name: 'status',
                            render: function (data, type, row) {
                                let badgeClass = data === 'approved' ? 'bg-green-500' : 'bg-yellow-500';
                                return `<span class="px-2 py-1 rounded text-white ${badgeClass}">${data}</span>`;
                            }
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: function (data) {
                                const date = new Date(data);
                                return date.toLocaleDateString('en-US', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });
                            }
                        }

                    ],
                    createdRow: function (row, data, dataIndex) {
                        $('td', row).each(function () {
                            $(this).addClass("text-center font-medium text-sm text-bgray-900 dark:text-bgray-50");
                        });
                    }
                });
            });
        </script>
        <script>
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