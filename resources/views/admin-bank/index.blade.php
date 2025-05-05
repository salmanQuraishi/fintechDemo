<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <div class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Admin Bank List</h4>
                            <a href="{{route('bank.getAdminBankcreate')}}" class="rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">
                                Add Bank
                            </a>
                        </div>
                        <div class="table-content w-full overflow-x-auto">
                            <table id="Banks-table">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span></th>
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">A/c Holder</span></th>
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">A/c</span></th>
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">IFSC</span></th>
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Bank Name</span></th>
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Account Type</span></th>
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span></th>
                                        <th><span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @push('scripts')
    <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
    <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
    <script src="{{ asset('/') }}assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <script>
        $(document).ready(function () {
            var userRoles = @json(auth()->user()->getRoleNames());
            const allowedRoles = ['admin', 'super-admin', 'staff'];
            const hasAccess = userRoles.some(role => allowedRoles.includes(role));

            const columns = [
                { data: null, render: (data, type, row, meta) => meta.row + 1 },
                { data: 'acc_holder_name', name: 'acc_holder_name' },
                { data: 'account_no', name: 'account_no' },
                { data: 'ifsc', name: 'ifsc' },
                { data: 'bank_name', name: 'bank_name' },
                // { data: 'type', name: 'type' },
                {
                    data: 'type',
                    render: data => {
                        return `<span class="rounded-md bg-[#FDF9E9] text-[#FDF9E9] px-4 py-1.5 text-sm font-semibold dark:bg-darkblack-500">${data}</span>`;
                    }
                },
                {
                    data: 'status',
                    render: data => {
                        let cls = data === 'pending' ? 'bg-[#FDF9E9] text-warning-300' :
                                  data === 'success' ? 'bg-success-50 text-success-400' :
                                  'bg-[#FAEFEE] text-[#FF4747]';
                        return `<span class="rounded-md ${cls} px-4 py-1.5 text-sm font-semibold dark:bg-darkblack-500">${data}</span>`;
                    }
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        const editUrl = "{{ route('bank.getAdminBankedit', ':id') }}".replace(':id', data);
                        
                        return `
                            <a href="${editUrl}" class="rounded-md g-success-50 text-success-400 px-4 py-1.5 text-sm font-semibold dark:bg-darkblack-500" data-id="${data}">Edit</a>
                        `;
                    },
                    orderable: false,
                    searchable: false
                }

            ];

            if (!hasAccess) {
                columns.splice(1, 1);
            }

            $('#Banks-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('bank.getAdminBanks') }}",
                dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                columns: columns,
                createdRow: function (row, data, dataIndex) {
                    $('td', row).each(function () {
                        $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                    });
                },
                error: function (xhr, error, thrown) {
                    console.error("Error loading data:", error);
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
