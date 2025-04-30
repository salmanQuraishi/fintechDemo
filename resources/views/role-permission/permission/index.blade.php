<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Permissions</h4>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="permissions-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Name</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Date</span>
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
$(document).ready(function() {
    $('#permissions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('get.permissions') }}",
        columns: [
            { 
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'name', name: 'name' },
            {
                data: 'created_at',
                render: function(data) {
                    if (!data) return '';
                    const date = new Date(data);
                    return new Intl.DateTimeFormat('en-CA').format(date);
                }
            },
            { 
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    let actionButtons = '';

                    @can('update permission')
                    actionButtons += `<a href="/permissions/${row.id}/edit"
                        class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500">
                        Edit
                    </a> `;
                    @endcan

                    @can('delete permission')
                    actionButtons += ` &nbsp; <a href="/permissions/${row.id}/delete"
                        onclick="return confirm('Are you sure you want to delete this permission?');"
                        class="rounded-md bg-[#FAEFEE] px-4 py-1.5 text-sm font-semibold text-[#FF4747] dark:bg-darkblack-500">
                        Delete
                    </a>`;
                    @endcan

                    return actionButtons;
                }
            }
        ],
        createdRow: function(row, data, dataIndex) {
            $('td', row).each(function() {
                $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
            });
        }
    });
});

        </script>       
        
    @endpush
</x-app-layout>