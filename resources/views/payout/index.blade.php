<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Payout List</h4>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="payouts-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                            <span>
                                        </td>
                                        @if (auth()->user()->hasAnyRole(['admin|super-admin|staff']))
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">User</span>
                                            <span>
                                        </td>
                                        @endif
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Bank Details</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">TXN Id</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Amount</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Open bal.</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Closing bal.</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span>
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
            $(document).ready(function () {

                var userRoles = @json(auth()->user()->getRoleNames());
                const allowedRoles = ['admin', 'super-admin', 'staff'];
                const hasAccess = userRoles.some(role => allowedRoles.includes(role));

                const columns = [
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                ];

                // If user has access, show user name column
                if (hasAccess) {
                    columns.push({
                        data: 'user.name',
                        name: 'user.name',
                        render: function (data, type, row) {
                            return data ?? '';
                        }
                    });
                }

                columns.push(
                    {
                        data: 'account_no',
                        name: 'account_no',
                        render: function (data, type, row) {
                            return `Account No. : ${row.account_no}<br>IFSC : ${row.ifsc}<br>Bank Ref. : ${row.bank_ref}`;
                        }
                    },
                    { data: 'txn_id', name: 'txn_id' },
                    { data: 'amount', name: 'amount' },
                    { data: 'opening_bal', name: 'opening_bal' },
                    { data: 'closing_bal', name: 'closing_bal' },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            let statusClass = '';
                            let statusText = row.status;

                            if (row.status === "pending") {
                                statusClass = 'bg-[#FDF9E9] text-warning-300';
                            } else if (row.status === "success") {
                                statusClass = 'bg-success-50 text-success-400';
                            } else if (row.status === "failed") {
                                statusClass = 'bg-[#FAEFEE] text-[#FF4747]';
                            }

                            return `<a class="rounded-md ${statusClass} px-4 py-1.5 text-sm font-semibold leading-[22px] dark:bg-darkblack-500">${statusText}</a>`;
                        }
                    },
                    {
                        data: 'created_at',
                        render: function (data) {
                            if (!data) return '';
                            const date = new Date(data);
                            return new Intl.DateTimeFormat('en-CA').format(date);
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            let actionButtons = '';
                            @can('check payout')
                            if (row.status === "pending") {
                                actionButtons += `
                                    <a href="javascript:void(0)" 
                                        id="check-btn" 
                                        data-token="${row.txn_id}" 
                                        data-id="${row.id}"
                                        class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500">
                                        Check
                                    </a>`;
                            }
                            @endcan
                            return actionButtons;
                        }
                    }
                );

                $('#payouts-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('get.payouts') }}",
                    columns: columns,
                    createdRow: function (row, data, dataIndex) {
                        $('td', row).each(function () {
                            $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                        });
                    }
                });

                $('#payouts-table').on('click', '#check-btn', function() {
                    const tokenId = $(this).data('token');
                    // alert(tokenId);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Your want to check this request!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#52a34a',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `/check/payout/${tokenId}`,
                                method: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (response) {
                                    
                                    $('#payouts-table').DataTable().ajax.reload();
                                    
                                    Swal.fire({
                                        icon: 'success',
                                        text: response.message,
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true
                                    });

                                },
                                error: function (xhr, status, error) {

                                    Swal.fire({
                                        icon: 'error',
                                        text: xhr.responseJSON?.message,
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true
                                    });
                                    
                                }
                            });
                        }
                    });
                    
                });

            });
        </script>
        
        
        

    @endpush
</x-app-layout>