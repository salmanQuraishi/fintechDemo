<x-app-layout>
<style>
    .swal2-actions button{
        background: #a5dc86;
        color: white;
    }
</style>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Linked Banks Request</h4>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="linked-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                        </td>

                                        @if (auth()->user()->hasAnyRole(['admin', 'super-admin', 'staff']))
                                            <td>
                                                <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">User</span>
                                            </td>
                                        @endif

                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Bank</span>
                                        </td>
                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span>
                                        </td>
                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Date</span>
                                        </td>

                                        @if (auth()->user()->hasAnyRole(['admin', 'super-admin', 'staff']))
                                            <td>
                                                <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Action</span>
                                            </td>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DataTables will populate this -->
                                </tbody>
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

        <script>
            $(document).ready(function () {
                var userRoles = @json(auth()->user()->getRoleNames());
                var hasAdminAccess = userRoles.some(role => ['admin', 'super-admin', 'staff'].includes(role));

                const columns = [
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + 1;
                        }
                    }
                ];
                if (hasAdminAccess) {
                    columns.push({
                        data: 'user',
                        name: 'user.details',
                        render: function (data, type, row) {
                            if (!data) {
                                return '<span class="text-bgray-400">No User Info</span>';
                            }

                            let userId = data.id || 'No ID';
                            let name = data.name || 'Unknown';
                            let mobile = data.mobile || 'No Mobile';
                            let email = data.email || 'No Email';

                            return `
                                <div>
                                    <strong>UserId: ${userId}</strong><br>
                                    <small>${name}</small><br>
                                    <small>Mobile: ${mobile}</small><br>
                                    <small>Email: ${email}</small>
                                </div>
                            `;
                        }
                    });
                }
                columns.push(
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            if (row.bank_links_details && row.bank_links_details.length > 0) {
                                return row.bank_links_details.map(bankLink => {
                                    return `<div class="flex items-center space-x-2 mb-2">
                                                <img src="{{ asset('/') }}${bankLink.icon}" alt="${bankLink.title}" class="w-8 h-8 rounded" />
                                                <span class="font-medium">${bankLink.title}</span>
                                            </div>`;
                                }).join('');
                            }
                            return 'No linked bank details';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data) {
                            if (data === "pending") {
                                return `<span class="rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold text-warning-300 dark:bg-darkblack-500">Pending</span>`;
                            } else if (data === "approved") {
                                return `<span class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500">Approved</span>`;
                            } else if (data === "rejected") {
                                return `<span class="rounded-md bg-[#FAEFEE] px-4 py-1.5 text-sm font-semibold text-[#FF4747] dark:bg-darkblack-500">Rejected</span>`;
                            }
                            return '';
                        }
                    },
                    {
                        data: 'created_at',
                        render: function(data) {
                            if (!data) return '';
                            const date = new Date(data);
                            return new Intl.DateTimeFormat('en-CA').format(date);
                        }
                    },
                );

                if (hasAdminAccess) {
                    columns.push({
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            let actionButtons = '';
                            if (row.status === "pending") {
                                actionButtons += `<a href="javascript:void(0)" 
                                                    class="approve-btn rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500" 
                                                    data-id="${row.id}">Approve</a>`;
                                actionButtons += `<a href="javascript:void(0)" 
                                                    class="reject-btn rounded-md bg-error-50 px-4 py-1.5 text-sm font-semibold text-error-300 dark:bg-darkblack-500 ml-2" 
                                                    data-id="${row.id}">Reject</a>`;
                            }
                            return actionButtons;
                        }
                    });
                }

                $('#linked-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('linkedbanksRequestslist') }}",
                    columns: columns,
                    createdRow: function (row, data, dataIndex) {
                        $('td', row).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                    }
                });

// Approve Button
$(document).on('click', '.approve-btn', function () {
    const requestId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to approve this request.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#38a169', // green
        cancelButtonColor: '#e53e3e',  // red
        confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/bank-request/${requestId}/approve`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Approved!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        buttonsStyling: true,
                        customClass: {
                            confirmButton: 'bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700'
                        }
                    });

                    $('#linked-table').DataTable().ajax.reload();
                },
                error: function(xhr) {

                    Swal.fire({
                        title: 'Error!',
                        text: xhr.responseJSON?.message || 'Something went wrong',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        buttonsStyling: false, // disable SweetAlert default styles
                        customClass: {
                            confirmButton: 'bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700'
                        }
                    });

                }
            });
        }
    });
});

// Reject Button
$(document).on('click', '.reject-btn', function () {
    const requestId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This request will be rejected.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e53e3e',
        cancelButtonColor: '#718096',
        confirmButtonText: 'Yes, reject it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/bank-request/${requestId}/reject`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire('Rejected!', response.message, 'success');
                    $('#linked-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    Swal.fire('Error!', xhr.responseJSON?.message || 'Something went wrong', 'error');
                }
            });
        }
    });
});

            });
        </script>
    @endpush
</x-app-layout>