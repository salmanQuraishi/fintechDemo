<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Bank</h4>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="Bank-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">A/c
                                                Holder</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">A/c</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">IFSC</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Bank
                                                Name</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Account Type</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Action</span>
                                            <span>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @push('scripts')
        <!-- Your other scripts -->
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script>
        <script>
            $(document).ready(function () {
                $('#Bank-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('get.banks') }}",
                    columns: [
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                // Displaying dynamic row number (meta.row gives the index of the row in the table)
                                return meta.row + 1;  // +1 because meta.row is zero-based
                            }
                        },
                        { data: 'account_holder_name', name: 'account_holder_name' },
                        { data: 'account_no', name: 'account_no' },
                        { data: 'ifsc', name: 'ifsc' },
                        { data: 'bank_name', name: 'bank_name' },
                        { data: 'account_type', name: 'account_type' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                let actionButtons = '';

                                @can('update bank')
                                            actionButtons += `<a href="/banks/${row.id}/edit"
                                        class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500">
                                        Edit
                                    </a> `;
                                @endcan

                        return actionButtons;
                            }
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

    @endpush
</x-app-layout>