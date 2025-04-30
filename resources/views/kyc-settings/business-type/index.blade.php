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
                                Business Type
                            </h3>
                            <button data-target="#multi-step-modal" type="button"
                                class="modal-open rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">
                                Add
                            </button>
                        </div>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="business-type-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
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

    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="multi-step-modal">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
            <div class="step-content step-1 relative">
                <div class="relative max-w-[530px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                                Business
                            </h3>
                        </div>
                        <div>
                            <button type="button" id="step-1-cancel"
                                class="rounded-md focus:outline-none w-8 h-8 bg-bgray-200 dark:bg-darkblack-500 hover:bg-red-500 hover:text-white text-bgray-700 inline-flex justify-center items-center">
                                <span class="sr-only">Close</span>
                                <svg class="fill-bgray-900 dark:fill-darkblack-300" width="12" height="12"
                                    viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.68746 10.609C9.94199 10.8636 10.3547 10.8636 10.6092 10.609C10.8638 10.3545 10.8638 9.94174 10.6092 9.6872L6.92202 5.99993L10.6093 2.31268C10.8638 2.05813 10.8638 1.64542 10.6093 1.39087C10.3547 1.13631 9.94199 1.13631 9.68746 1.39087L6.00019 5.07809L2.31292 1.39087C2.05837 1.13632 1.64566 1.13632 1.39111 1.39087C1.13656 1.64543 1.13656 2.05814 1.39111 2.3127L5.07835 5.99993L1.39112 9.6872C1.13657 9.94174 1.13657 10.3544 1.39112 10.609C1.64567 10.8636 2.05838 10.8636 2.31293 10.609L6.00019 6.92177L9.68746 10.609Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <form class="space-y-6" id="add-business-type-form">
                                <div>
                                    <label for="name"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Business
                                        Type</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="name" name="name" placeholder="Enter Business Type">
                                </div>
                                <div>
                                    <label for="status"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Status</label>
                                    <select id="status" name="status"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button
                                        class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- First, add the edit modal to your existing HTML (place it after the add modal) -->
    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden"
        id="edit-business-type-modal">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
            <div class="step-content relative">
                <div class="relative max-w-[530px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                                Edit Business Type
                            </h3>
                        </div>
                        <div>
                            <button type="button" id="edit-modal-cancel"
                                class="rounded-md focus:outline-none w-8 h-8 bg-bgray-200 dark:bg-darkblack-500 hover:bg-red-500 hover:text-white text-bgray-700 inline-flex justify-center items-center">
                                <span class="sr-only">Close</span>
                                <svg class="fill-bgray-900 dark:fill-darkblack-300" width="12" height="12"
                                    viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.68746 10.609C9.94199 10.8636 10.3547 10.8636 10.6092 10.609C10.8638 10.3545 10.8638 9.94174 10.6092 9.6872L6.92202 5.99993L10.6093 2.31268C10.8638 2.05813 10.8638 1.64542 10.6093 1.39087C10.3547 1.13631 9.94199 1.13631 9.68746 1.39087L6.00019 5.07809L2.31292 1.39087C2.05837 1.13632 1.64566 1.13632 1.39111 1.39087C1.13656 1.64543 1.13656 2.05814 1.39111 2.3127L5.07835 5.99993L1.39112 9.6872C1.13657 9.94174 1.13657 10.3544 1.39112 10.609C1.64567 10.8636 2.05838 10.8636 2.31293 10.609L6.00019 6.92177L9.68746 10.609Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <form class="space-y-6" id="edit-business-type-form">
                                <input type="hidden" id="edit-id" name="id">
                                <div>
                                    <label for="edit-name"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Business
                                        Type</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="edit-name" name="name" placeholder="Enter Business Type">
                                </div>
                                <div>
                                    <label for="edit-status"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Status</label>
                                    <select id="edit-status" name="status"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        const canDelete = @json(Auth::user()->can('delete api token'));
    </script> -->

    @push('scripts')
        <!-- Your other scripts -->
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script>

        <script>
            $(document).ready(function () {
                // DataTable initialization
                $('#business-type-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('kyc.businesstype') }}",
                    columns: [
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            data: 'name',
                            render: function (data, type, row, meta) {
                                return `
                                        <span class="short-token">${data}</span>`;
                            }
                        },
                        { data: 'status' },
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
                                // if (canDelete) {
                                return `<button data-id="${row.id}" class="edit-token-btn bg-success-50 px-4 py-1.5 text-sm text-success-300 rounded-md">Edit</button>`;
                                // <button data-id="${row.id}" class="delete-token-btn bg-error-50 px-4 py-1.5 text-sm text-error-300 rounded-md">Delete</button>
                                // }
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

                $('#business-type-table').on('click', '.edit-token-btn', async function () {
                    const id = $(this).data('id');

                    try {
                        // Fetch business type data for editing
                        const response = await fetch(`/kyc/business-type/${id}/edit`, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });

                        const data = await response.json();

                        if (response.ok && data.status === 'success') {
                            // Fill the form with the fetched data
                            $('#edit-id').val(data.data.id);
                            $('#edit-name').val(data.data.name);
                            $('#edit-status').val(data.data.status);

                            // Show the edit modal
                            $('#edit-business-type-modal').removeClass('hidden');
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message || 'Failed to fetch business type data'
                            });
                        }
                    } catch (error) {
                        console.error(error);
                        Toast.fire({
                            icon: 'error',
                            title: 'Network error. Please try again.'
                        });
                    }
                });

                $('#open-token-modal').on('click', function () {
                    $('#multi-step-modal').removeClass('hidden');
                });

                $('#step-1-cancel').on('click', function () {
                    $('#multi-step-modal').addClass('hidden');
                });
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                $('#add-business-type-form').on('submit', async function (e) {
                    e.preventDefault();

                    const name = $('#name').val();
                    const status = $('#status').val();

                    try {
                        const response = await fetch("{{ route('kyc.business-type') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({ name, status })
                        });

                        const data = await response.json();
                        if (!response.ok) {
                            if (response.status === 422 && data.errors) {
                                let message = '';
                                Object.keys(data.errors).forEach(key => {
                                    message += `${data.errors[key].join(', ')}<br>`;
                                });

                                Toast.fire({
                                    icon: 'error',
                                    html: message
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.status || data.message || 'Something went wrong'
                                });
                            }
                            return;
                        }

                        console.log(data.status)
                        if (data.status == "success") {
                            $('#multi-step-modal').addClass('hidden');
                            $('#add-business-type-form')[0].reset();
                            $('#business-type-table').DataTable().ajax.reload();

                            Toast.fire({
                                icon: data.status,
                                title: data.message || 'Business saved successfully.'
                            });
                        } else {
                            Toast.fire({
                                icon: data.status,
                                title: data.message || 'testing.'
                            });
                        }


                    } catch (error) {
                        console.log(error)
                        Toast.fire({
                            icon: 'error',
                            title: 'Network error. Please try again.'
                        });
                    }
                });

                // Handle form submission for editing
                $('#edit-business-type-form').on('submit', async function (e) {
                    e.preventDefault();

                    const id = $('#edit-id').val();
                    const name = $('#edit-name').val();
                    const status = $('#edit-status').val();

                    try {
                        const response = await fetch("{{ route('kyc.business-type.update') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({ id, name, status })
                        });

                        const data = await response.json();

                        if (!response.ok) {
                            if (response.status === 422 && data.errors) {
                                let message = '';
                                Object.keys(data.errors).forEach(key => {
                                    message += `${data.errors[key].join(', ')}<br>`;
                                });

                                Toast.fire({
                                    icon: 'error',
                                    html: message
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.message || 'Something went wrong'
                                });
                            }
                            return;
                        }

                        if (data.status === 'success') {
                            // Close modal and reset form
                            $('#edit-business-type-modal').addClass('hidden');
                            $('#edit-business-type-form')[0].reset();

                            // Refresh the DataTable
                            $('#business-type-table').DataTable().ajax.reload();

                            Toast.fire({
                                icon: 'success',
                                title: data.message || 'Business type updated successfully.'
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message || 'Failed to update business type.'
                            });
                        }
                    } catch (error) {
                        console.error(error);
                        Toast.fire({
                            icon: 'error',
                            title: 'Network error. Please try again.'
                        });
                    }
                });

            });
        </script>
    @endpush
</x-app-layout>