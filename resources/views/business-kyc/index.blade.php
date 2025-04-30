<x-app-layout>
    <style>
        .swal2-actions button {
            background: #a5dc86;
            color: white;
        }

        .swal2-container {
            z-index: 9999 !important;
        }
    </style>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">

                        <div
                            class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h3 class="text-bgray-900 dark:text-white text-xl font-bold">
                                Business KYCs
                            </h3>
                        </div>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="bus-kyc-table" style="width: 100%">
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
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Business
                                                Type</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Business
                                                Category</span>
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
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="multi-step-modal2">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
          <div class="step-content step-1 relative">
            <div class="relative max-w-[550px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                    View Business Kyc Details
                  </h3>
                </div>
                <div>
                  <button type="button" id="step-1-cancel2" class="rounded-md focus:outline-none w-8 h-8 bg-bgray-200 dark:bg-darkblack-500 hover:bg-red-500 hover:text-white text-bgray-700 inline-flex justify-center items-center">
                    <span class="sr-only">Close</span>
                    <svg class="fill-bgray-900 dark:fill-darkblack-300" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.68746 10.609C9.94199 10.8636 10.3547 10.8636 10.6092 10.609C10.8638 10.3545 10.8638 9.94174 10.6092 9.6872L6.92202 5.99993L10.6093 2.31268C10.8638 2.05813 10.8638 1.64542 10.6093 1.39087C10.3547 1.13631 9.94199 1.13631 9.68746 1.39087L6.00019 5.07809L2.31292 1.39087C2.05837 1.13632 1.64566 1.13632 1.39111 1.39087C1.13656 1.64543 1.13656 2.05814 1.39111 2.3127L5.07835 5.99993L1.39112 9.6872C1.13657 9.94174 1.13657 10.3544 1.39112 10.609C1.64567 10.8636 2.05838 10.8636 2.31293 10.609L6.00019 6.92177L9.68746 10.609Z"></path>
                      </svg>
                  </button>
                </div>
              </div>
              <div class="flex flex-col">
                <div>
                  <form class="space-y-6 pt-8" id="update-business-kyc-form">

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    @push('scripts')
        <!-- Your other scripts -->
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script>

        <script>
            $(document).ready(function () {
                // DataTable initialization
                $('#bus-kyc-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('business_kyc.get_kyc') }}",
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
                        { data: 'business_type' },
                        { data: 'business_category' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                let statusClass = '';
                                let statusText = row.status;

                                if (row.status === "pending") {
                                    statusClass = 'bg-[#FDF9E9] text-warning-300';
                                } else if (row.status === "approve") {
                                    statusClass = 'bg-success-50 text-success-400';
                                } else if (row.status === "reject") {
                                    statusClass = 'bg-[#FAEFEE] text-[#FF4747]';
                                }

                                return `<span class="${statusClass} px-4 py-2 text-sm font-semibold dark:bg-darkblack-500">${statusText}</span>`;
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
                                return `<button data-id="${row.id}" class="edit-business-kyc-btn bg-success-50 px-4 py-1.5 text-sm text-success-300 rounded-md">Edit</button>`;
                                return '';
                            }
                        }
                    ],
                    createdRow: function (row, data, dataIndex) {
                        $('td', row).each(function () {
                            $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                        });
                    }
                });

                $('#step-1-cancel2').on('click', function () {
                    $('#multi-step-modal2').addClass('hidden');
                });

                $(document).on('click', '.edit-business-kyc-btn', function () {
                    const id = $(this).data('id');

                    console.log(id); 
                    $('#multi-step-modal2').removeClass('hidden');
                    $('#multi-step-modal2 .modal-body').html('<p>Loading...</p>');

                    $.ajax({
                        url: "/business-kyc/"+id,
                        type: 'GET',
                        data: {id:id},
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);

                            if (response.status === 'success') {
                                const data = response.data;

                                // Parse documents JSON string
                                let documents = {};
                                try {
                                    documents = JSON.parse(data.documents);
                                } catch (e) {
                                    console.error("Invalid documents JSON", e);
                                }

                                const isApproved = data.status === 'approve';

                                const content = `
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">Business Type:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${data.business_type.name}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">Business Category:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${data.business_category.name}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">Business Sub Category:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${data.sub_category.name}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">Business Name:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${documents.businessname || ''}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">PAN Signatory:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${documents.pansignatory || ''}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">PAN Owner Name:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${documents.panownername || ''}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">Address:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${data.address}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">Pincode:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${data.pincode}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">State:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${data.states.name}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">City:</span>
                                            <span class="font-medium text-sm text-gray-700 dark:text-white">${data.citys.name}</span>
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <label for="Status" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Status *</label>
                                            <select name="Status" id="Status" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white rounded-lg border-0 focus:border focus:border-success-300 focus:ring-0" ${isApproved ? 'disabled' : ''}>
                                                <option value="pending" ${data.status === 'pending' ? 'selected' : ''}>pending</option>
                                                <option value="approve" ${data.status === 'approve' ? 'selected' : ''}>approve</option>
                                                <option value="reject" ${data.status === 'reject' ? 'selected' : ''}>reject</option>
                                            </select>
                                        </div>
                                        ${!isApproved ? `
                                        <div class="flex justify-end">
                                            <span class="w-100 bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-1 px-3 submit-kyc-btn">Submit</span>
                                        </div>` : ''}
                                    </div>
                                `;

                                $('#update-business-kyc-form').html(content);
                            } else {
                                $('#update-business-kyc-form').html('<p>Unable to fetch business KYC details.</p>');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', error);
                            $('#multi-step-modal2 .modal-body').html('<p>Error loading KYC data.</p>');
                        }
                    });


                });

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });

                $(document).on('click', '.submit-kyc-btn', function () {
                    const id = $('.edit-business-kyc-btn').data('id');
                    const newStatus = $('#Status').val();

                    $.ajax({
                        url: '/business-kyc/update-status',
                        type: 'POST',
                        data: {
                            id: id,
                            status: newStatus
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            if (response.status === 'success') {
                                $('#multi-step-modal2').addClass('hidden');
                                $('#bus-kyc-table').DataTable().ajax.reload();
                                $('#update-business-kyc-form').empty();
                                Toast.fire({
                                    icon: 'success',
                                    title: response.message || 'Status updated successfully!'
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message || 'Failed to update status.'
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Update Error:', error);
                            alert('An error occurred while updating the status.');
                        }
                    });
                });

                
            });

        </script>
    @endpush
</x-app-layout>