<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <div class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Manage Payout APIs</h4>
                            <!-- <button type="button" class="modal-open rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold text-warning-300 dark:bg-darkblack-500">Add New Scheem</button> -->
                        </div>
                        <div class="table-content w-full overflow-x-auto">
                            <table id="default-scheem-table">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <th>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                            <span>
                                        </th>
                                        <th>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">API Name</span>
                                            <span>
                                        </th>
                                        <th>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span>
                                            <span>
                                        </th>
                                        <th>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Action</span>
                                            <span>
                                        </th>
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

    <script>
        $(document).ready(function () {

            var columns = [
                { data: null, render: (data, type, row, meta) => meta.row + 1 },
                { data: 'name' },
                {
                    data: 'status',
                    render: data => {
                    let cls = data === 'active' ? 'bg-success-50 text-success-400' :  'bg-[#FDF9E9] text-warning-300';
                        return `<span class="rounded-md ${cls} px-4 py-1.5 text-sm font-semibold dark:bg-darkblack-500">${data}</span>`;
                    }
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        let actionButtons = ''
                        if(row.status == 'inactive')
                        actionButtons +=`<a href="javascript:void(0)"
                                    data-id="${row.id}"
                                    class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500 activate-api-btn">
                                    Activate
                                </a>`;
                        
                        return actionButtons;
                    }
                }
            ];

            $('#default-scheem-table').DataTable({
                processing: true,
                serverSide: true,
                searching: false,      // 🔍 Disable search box
                info: false,           // ℹ️ Disable "Showing X of Y entries"
                lengthChange: false,   // 📏 Hides the entries-per-page dropdown
                ajax: "{{ route('manage.payout.data') }}",
                columns: columns,
                // createdRow: function (row, data, dataIndex) {
                //     $('td', row).each(function () {
                //         $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                //     });
                // }
                createdRow: function (row, data, dataIndex) {
                    $('td', row).each(function () {
                        $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50 text-center align-middle");
                    });
                }
            });

            $('#default-scheem-table').on('click', '.activate-api-btn', function() {
                const id = $(this).data('id');
         
                // Fetch charge data for editing
                $.ajax({
                    url: `/manage/payout/activate/${id}`,
                    type: 'PUT',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#default-scheem-table').DataTable().ajax.reload(null, false);
                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });

                        } else {
                            // Handle error
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        
                        // Handle error
                        Swal.fire({
                            icon: 'error',
                            text: xhr.responseJSON.message,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                });
            });

        });
    </script>
    @endpush
</x-app-layout>
