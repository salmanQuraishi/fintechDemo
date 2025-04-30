<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">

                        <div
                            class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h3 class="text-bgray-900 dark:text-white text-xl font-bold">
                                Documents
                            </h3>
                            <button data-target="#multi-step-modal" type="button"
                                class="modal-open rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">
                                Add Document
                            </button>
                        </div>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="documents-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Label</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Placeholder</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Field Name</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Business
                                                Type</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Type</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Required</span>
                                        </td>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Action</span>
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

    <!-- Add Document Modal -->
    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="multi-step-modal">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
            <div class="step-content step-1 relative">
                <div class="relative max-w-[530px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                                Add Document
                            </h3>
                        </div>
                        <div>
                            <button type="button" id="close-document-modal"
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
                            <form class="space-y-6" id="add-document-form">
                                <div>
                                    <label for="label"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Label</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="label" name="label" placeholder="Enter document label">
                                </div>

                                <div>
                                    <label for="placeholder"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Placeholder</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="placeholder" name="placeholder" placeholder="Enter document label">
                                </div>
                                
                                <div>
                                    <label for="field_name"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Field Name</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="field_name" name="field_name" placeholder="Enter document label">
                                </div>
                                <div>
                                    <label for="business_type_id"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Business
                                        Type</label>
                                    <select
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="business_type_id" name="business_type_id">
                                        <option value="">Select Business Type</option>
                                        @foreach($businessTypes as $businessType)
                                            <option value="{{ $businessType->id }}">{{ $businessType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="type"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Document
                                        Type</label>
                                    <select
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="type" name="type">
                                        <option value="">Select Type</option>
                                        <option value="file">File</option>
                                        <option value="text">Text</option>
                                        <option value="number">Number</option>
                                    </select>
                                </div>

                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="border border-bgray-300 rounded focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400"
                                        id="required" name="required" value="1">
                                    <label for="required"
                                        class="ml-2 text-sm text-bgray-500 dark:text-bgray-50">Required</label>
                                </div>

                                <div>
                                    <label for="status"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Status</label>
                                    <select
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="status" name="status">
                                        <option value="active" selected >Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
                                        Add Document
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Document Modal -->
    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden"
        id="edit-document-modal">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
            <div class="step-content step-1 relative">
                <div class="relative max-w-[530px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                                Update Document
                            </h3>
                        </div>
                        <div>
                            <button type="button" id="close-edit-modal"
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
                            <form class="space-y-6" id="edit-document-form">
                                <input type="hidden" id="edit_document_id" name="document_id">
                                <div>
                                    <label for="edit_label"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Label</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="edit_label" name="label" placeholder="Enter document label">
                                </div>
                                
                                <div>
                                    <label for="edit_placeholder"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Placeholder</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="edit_placeholder" name="placeholder" placeholder="Enter document label">
                                </div>

                                <div>
                                    <label for="edit_field_name"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Field Name</label>
                                    <input type="text"
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="edit_field_name" name="edit_field_name" placeholder="Enter document label">
                                </div>
                                <div>
                                    <label for="edit_business_type_id"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Business
                                        Type</label>
                                    <select
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="edit_business_type_id" name="business_type_id">
                                        <option value="">Select Business Type</option>
                                        @foreach($businessTypes as $businessType)
                                            <option value="{{ $businessType->id }}">{{ $businessType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="edit_type"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Document
                                        Type</label>
                                    <select
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="edit_type" name="type">
                                        <option value="">Select Type</option>
                                        <option value="file">File</option>
                                        <option value="text">Text</option>
                                        <option value="number">Number</option>
                                    </select>
                                </div>
                                
                                <div class="flex items-center">
                                    <input type="checkbox"
                                    class="border border-bgray-300 rounded focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400"
                                    id="edit_required" name="required" value="1">
                                    <label for="edit_required"
                                    class="ml-2 text-sm text-bgray-500 dark:text-bgray-50">Required</label>
                                </div>

                                <div>
                                    <label for="edit_status"
                                        class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Status</label>
                                    <select
                                        class="w-full border border-bgray-300 rounded-lg py-3 px-4 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white"
                                        id="edit_status" name="edit_status">
                                        <option value="active" selected >Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
                                        Update Document
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons Template -->
    <script type="text/template" id="action-buttons-template">
        <button data-id="@{{id}}" class="edit-document-btn bg-success-50 px-4 py-1.5 text-sm text-success-300 rounded-md">Edit</button>
        <button data-id="@{{id}}" class="delete-document-btn bg-error-50 px-4 py-1.5 text-sm text-error-300 rounded-md">Delete</button>
    </script>

    @push('scripts')
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script> 


        <script>
            $(document).ready(function () {
                // DataTable initialization
                $('#documents-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('documents.data') }}",
                    columns: [
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                console.log(row);
                                return meta.row + 1;
                            }
                        },
                        { data: 'label' },
                        { data: 'placeholder'},
                        { data: 'field_name'},
                        { data: 'business_type_name'},
                        { data: 'type' },
                        { data: 'required',
                            render: function (data, type, row, meta) {
                                 if(data){
                                    return `<span>Yes</span>`
                                }else{
                                    return `<span>No</span>`
                                };
                            }
                        },
                        { data: 'status',
                            render: function (data, type, row, meta) {
                                
                                    return `<span>${data}</span>`
                               
                            }
                        },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                // if (canDelete) {
                                
                                    return `<button data-id="${row.id}" class="edit-document-btn bg-success-50 px-4 py-1.5 text-sm text-success-300 rounded-md">Edit</button>`;
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

                $('#open-token-modal').on('click', function () {
                    $('#multi-step-modal').removeClass('hidden');
                });

                $('#close-document-modal').on('click', function () {
                    $('#label').val('');
                    $('#business_type_id').val('');
                    $('#type').val('');
                    $('#placeholder').val('');
                    $('#field_name').val('');
                    $('#status').val('');
                    $('#required').prop('checked', false);
                    $('#multi-step-modal').addClass('hidden');
                });

                $('#close-edit-modal').on('click', function () {
                    $('#edit_label').val('');
                    $('#edit_business_type_id').val('');
                    $('#edit_type').val('');
                    $('#edit_placeholder').val('');
                    $('#edit_field_name').val('');
                    $('#edit_status').val('');
                    $('#edit_required').prop('checked', false);
                    $('#edit-document-modal').addClass('hidden');
                });

                // Toast notification setup
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

                // Add document form submission
                $('#add-document-form').on('submit', async function (e) {
                    e.preventDefault();

                    const formData = {
                        label: $('#label').val(),
                        business_type_id: $('#business_type_id').val(),
                        type: $('#type').val(),
                        placeholder: $('#placeholder').val(),
                        field_name: $('#field_name').val(),
                        status: $('#status').val(),
                        required: $('#required').is(':checked') ? 1 : 0
                    };

                    try {
                        const response = await fetch("{{ route('documents.store') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify(formData)
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

                        if (data.status == "success") {
                            $('#multi-step-modal').addClass('hidden');
                            $('#add-document-form')[0].reset();
                            $('#documents-table').DataTable().ajax.reload();

                            Toast.fire({
                                icon: 'success',
                                title: data.message || 'Document saved successfully.'
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message || 'An error occurred.'
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

                // Edit document button click
                $(document).on('click', '.edit-document-btn', function () {
                    const documentId = $(this).data('id');
                    $('#edit-document-modal').removeClass('hidden');

                    $.ajax({
                        url: `/kyc/documents/${documentId}`,
                        type: 'GET',
                        success: function (response) {
                            if (response.status === 'success') {
                                const document = response.data;
                                $('#edit_document_id').val(document.id);
                                $('#edit_label').val(document.label);
                                $('#edit_placeholder').val(document.placeholder);
                                $('#edit_field_name').val(document.field_name);
                                $('#edit_business_type_id').val(document.business_type_id);
                                $('#edit_type').val(document.type);
                                $('#edit_required').prop('checked', document.required == 1);
                                $('#edit_status').val(document.status);
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message || 'Error loading document data'
                                });
                            }
                        },
                        error: function (xhr) {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error loading document data'
                            });
                        }
                    });
                });

                // Update document form submission
                $('#edit-document-form').on('submit', async function (e) {
                    e.preventDefault();

                    const documentId = $('#edit_document_id').val();
                    const formData = {
                        label: $('#edit_label').val(),
                        placeholder: $('#edit_placeholder').val(),
                        field_name: $('#edit_field_name').val(),
                        business_type_id: $('#edit_business_type_id').val(),
                        type: $('#edit_type').val(),
                        status: $('#edit_status').val(),
                        required: $('#edit_required').is(':checked') ? 1 : 0
                    };

                    try {
                        const response = await fetch(`/kyc/documents/${documentId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(formData)
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

                        if (data.status == "success") {
                            $('#edit-document-modal').addClass('hidden');
                            $('#edit-document-form')[0].reset();
                            $('#documents-table').DataTable().ajax.reload();

                            Toast.fire({
                                icon: 'success',
                                title: data.message || 'Document updated successfully.'
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message || 'An error occurred.'
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

                // Delete document button click
                $(document).on('click', '.delete-document-btn', function () {
                    const documentId = $(this).data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteDocument(documentId);
                        }
                    });
                });

                // Function to delete document
                function deleteDocument(documentId) {
                    $.ajax({
                        url: `/documents/${documentId}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        success: function (response) {
                            if (response.status === 'success') {
                                $('#documents-table').DataTable().ajax.reload();

                                Toast.fire({
                                    icon: 'success',
                                    title: response.message || 'Document deleted successfully.'
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message || 'Error deleting document'
                                });
                            }
                        },
                        error: function (xhr) {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error deleting document'
                            });
                        }
                    });
                }
            });
            </script>
    @endpush
</x-app-layout>