<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <div class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Default Schemes</h4>
                            <button type="button" class="modal-open rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold text-warning-300 dark:bg-darkblack-500">Add New Scheem</button>
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
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Charge Name</span>
                                            <span>
                                        </th>
                                        <th>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Type</span>
                                            <span>
                                        </th>
                                        <th>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Value</span>
                                            <span>
                                        </th>
                                        <th>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Created At</span>
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
    
    <!-- <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="multi-step-modal">
        <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content flex justify-center w-full px-4 items-center mx-auto">
            <div class="step-content step-1 max-w-[752px] rounded-lg bg-white dark:bg-darkblack-600 p-6 pb-10 relative">
                <button id="step-1-cancel" class="absolute top-6 right-6">
                    <svg width="24" height="24"><path d="M16.9492 7.05029L7.04972 16.9498" stroke="#22C55E" stroke-width="2"/><path d="M7.0498 7.05029L16.9493 16.9498" stroke="#22C55E" stroke-width="2"/></svg>
                </button>
                <header class="text-center mb-3">
                    <h3 class="text-2xl font-bold text-bgray-900 dark:text-white">Add New Default Scheem</h3>
                </header>
                <form id="depositForm">

                    <div class="mb-4">
                        <input type="text" name="amount" id="amount" class="w-full h-14 border rounded-lg px-4 py-3.5 dark:bg-darkblack-500 dark:text-white" placeholder="Enter Amount" />
                        <div id="amount_error" class="text-error-300 text-sm mt-1"></div>
                    </div>
                    <button type="submit" class="bg-success-300 hover:bg-success-400 text-white font-semibold py-4 rounded-lg w-full mt-2">Continue</button>
                </form>
            </div>
        </div>
    </div> -->

    
    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="multi-step-modal">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
          <div class="step-content step-1 relative">
            <div class="relative max-w-[530px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                  Add New Default Scheem
                  </h3>
                </div>
                <div>
                  <button type="button" id="step-1-cancel" class="rounded-md focus:outline-none w-8 h-8 bg-bgray-200 dark:bg-darkblack-500 hover:bg-red-500 hover:text-white text-bgray-700 inline-flex justify-center items-center">
                    <span class="sr-only">Close</span>
                    <svg class="fill-bgray-900 dark:fill-darkblack-300" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.68746 10.609C9.94199 10.8636 10.3547 10.8636 10.6092 10.609C10.8638 10.3545 10.8638 9.94174 10.6092 9.6872L6.92202 5.99993L10.6093 2.31268C10.8638 2.05813 10.8638 1.64542 10.6093 1.39087C10.3547 1.13631 9.94199 1.13631 9.68746 1.39087L6.00019 5.07809L2.31292 1.39087C2.05837 1.13632 1.64566 1.13632 1.39111 1.39087C1.13656 1.64543 1.13656 2.05814 1.39111 2.3127L5.07835 5.99993L1.39112 9.6872C1.13657 9.94174 1.13657 10.3544 1.39112 10.609C1.64567 10.8636 2.05838 10.8636 2.31293 10.609L6.00019 6.92177L9.68746 10.609Z"></path>
                      </svg>
                  </button>
                </div>
              </div>
              <div class="flex flex-col">
                <div>
                  <form class="space-y-6" id="default-scheem-form">
                    <div>
                      <label for="name" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Name</label>
                      <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="name" name="name" placeholder="Enter Charge Name">
                    </div>
                    
                    <div class="flex flex-col gap-2">
                        <label for="type" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Type</label>
                        <select name="type" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                            <option value="percent" selected >Percent</option>
                            <option value="flat" >Flat</option>
                        </select>                                                
                    </div>
                    <div>
                      <label for="value" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Value</label>
                      <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="value" name="value" placeholder="Enter your value">
                    </div>
                    <div class="flex justify-end">
                      <button class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
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

    
    <!-- Edit Modal -->
    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="edit-multi-step-modal">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
          <div class="step-content step-1 relative">
            <div class="relative max-w-[530px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                  Edit Default Scheem
                  </h3>
                </div>
                <div>
                  <button type="button" id="step-2-cancel" class="rounded-md focus:outline-none w-8 h-8 bg-bgray-200 dark:bg-darkblack-500 hover:bg-red-500 hover:text-white text-bgray-700 inline-flex justify-center items-center">
                    <span class="sr-only">Close</span>
                    <svg class="fill-bgray-900 dark:fill-darkblack-300" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.68746 10.609C9.94199 10.8636 10.3547 10.8636 10.6092 10.609C10.8638 10.3545 10.8638 9.94174 10.6092 9.6872L6.92202 5.99993L10.6093 2.31268C10.8638 2.05813 10.8638 1.64542 10.6093 1.39087C10.3547 1.13631 9.94199 1.13631 9.68746 1.39087L6.00019 5.07809L2.31292 1.39087C2.05837 1.13632 1.64566 1.13632 1.39111 1.39087C1.13656 1.64543 1.13656 2.05814 1.39111 2.3127L5.07835 5.99993L1.39112 9.6872C1.13657 9.94174 1.13657 10.3544 1.39112 10.609C1.64567 10.8636 2.05838 10.8636 2.31293 10.609L6.00019 6.92177L9.68746 10.609Z"></path>
                      </svg>
                  </button>
                </div>
              </div>
              <div class="flex flex-col">
                <div>
                  <form class="space-y-6" id="edit-default-scheem-form">

                  <input type="number" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white hidden" id="default-charge-id" name="id">

                    <div>
                      <label for="edit-name" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Name</label>
                      <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="edit-name" name="name" placeholder="Enter Charge Name">
                    </div>
                    
                    <div class="flex flex-col gap-2">
                        <label for="edit-type" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Type</label>
                        <select name="type" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                            <option value="percent" selected >Percent</option>
                            <option value="flat" >Flat</option>
                        </select>                                                
                    </div>
                    <div>
                      <label for="edit-value" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Value</label>
                      <input type="text" 
                      class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" 
                      id="edit-value" 
                      name="value" placeholder="Enter your value"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="flex justify-end">
                      <button class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6" id="save-changes">
                        Save Changes
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


    @push('scripts')
    <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
    <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
    <script src="{{ asset('/') }}assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>
        $(document).ready(function () {

            $(".modal-open").on("click", function () {
                $("#multi-step-modal").removeClass("hidden");
            });
            $("#step-1-cancel").on("click", function () {
                $("#multi-step-modal").addClass("hidden");
            });
            $("#step-2-cancel").on("click", function () {
                $("#edit-multi-step-modal").addClass("hidden");
            });

            var userRoles = @json(auth()->user()->getRoleNames());

            var columns = [
                { data: null, render: (data, type, row, meta) => meta.row + 1 },
                { data: 'name' },
                {
                    data: 'type',
                    render: data => {
                        let cls = data === 'flat' ? 'bg-[#FDF9E9] text-warning-300' :
                                  data == 'percent' ? 'bg-success-50 text-success-400' :
                                  'bg-[#FAEFEE] text-[#FF4747]';
                        return `<span class="rounded-md ${cls} px-4 py-1.5 text-sm font-semibold dark:bg-darkblack-500">${data}</span>`;
                    }
                },
                {
                    data: 'value'
                },
                {
                    data: 'created_at',
                    render: data => new Intl.DateTimeFormat('en-CA').format(new Date(data))
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        let actionButtons = `
                                <a href="javascript:void(0)"
                                    data-id="${row.id}"
                                    class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500 edit-scheem-btn">
                                    Edit
                                </a>`;
                        
                        return actionButtons;
                    }
                }
            ];

            $('#default-scheem-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('default.data') }}",
                columns: columns,
                createdRow: function (row, data, dataIndex) {
                    $('td', row).each(function () {
                        $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                    });
                }
            });

            $('#default-scheem-table').on('click', '.edit-scheem-btn', function() {
                const id = $(this).data('id');
                console.log(id);
                
                // Clear form and validation errors
                $('#edit-default-scheem-form')[0].reset();
                
                // Fetch charge data for editing
                $.ajax({
                    url: `/default/charges/${id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Populate the form with the charge data
                            const charge = response.data;
                            
                            // Set the form action with the correct ID for update
                            $('#default-charge-id').data('id', charge.id);
                            
                            // Fill form fields
                            $('#edit-name').val(charge.name);
                            $('#edit-type').val(charge.type);
                            $('#edit-value').val(charge.value);
                            
                            // Show the edit modal
                            $("#edit-multi-step-modal").removeClass("hidden");
                        } else {
                            // Handle error
                            Swal.fire({
                                icon: 'error',
                                text: response.message || 'Failed to load charge data',
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
                            text: 'Failed to load charge data',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#amount").on("input", function () {
                this.value = this.value.replace(/[^0-9]/g, "");
            });
  
            // Add submit event listener to the form
            $('#default-scheem-form').on('submit', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                
                // Serialize form data to an object
                const formData = {};
                $.each($(this).serializeArray(), function() {
                formData[this.name] = this.value;
                });
                
                // Send AJAX request
                $.ajax({
                url: "{{ route('default.store') }}",
                type: 'POST',
                data: JSON.stringify(formData),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {

                    console.log(response);

                    // Optionally reset the form
                    $('#default-scheem-form')[0].reset();
                    
                    $("#multi-step-modal").addClass("hidden");
                    $('#default-scheem-table').DataTable().ajax.reload();

                    // Request failed
                    Swal.fire({
                        icon: 'success',
                        text: 'Charge added successfully!',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                
                },
                error: function(xhr, status, error) {

                    let errorMessage = 'Failed to add charge';
        
                    if (xhr.responseJSON) {
                        // Laravel validation errors
                        if (xhr.responseJSON.errors && xhr.responseJSON.errors.name) {
                            errorMessage = xhr.responseJSON.errors.name[0];
                        } else if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                    }
                    // Request failed
                    Swal.fire({
                        icon: 'error',
                        text: errorMessage,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
                });
            });

            // Edit form submission
            $('#edit-default-scheem-form').on('submit', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                
                // Get the charge ID
                const id = $('#default-charge-id').data('id');
                // Serialize form data to an object
                const formData = {};
                $.each($(this).serializeArray(), function() {
                    formData[this.name] = this.value;
                });

                
                // Send AJAX request
                $.ajax({
                    url: `/default/charges/${id}`,
                    type: 'PUT',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {

                        // Close the modal
                        $("#edit-multi-step-modal").addClass("hidden");
                        
                        // Reload the DataTable
                        $('#default-scheem-table').DataTable().ajax.reload();
                        
                        // Show success notification
                        Swal.fire({
                            icon: 'success',
                            text: 'Charge updated successfully!',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = 'Failed to update charge';
                        
                        if (xhr.responseJSON) {
                            // Laravel validation errors
                            if (xhr.responseJSON.errors && xhr.responseJSON.errors.name) {
                                errorMessage = xhr.responseJSON.errors.name[0];
                            } else if (xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }
                        }
                        
                        // Show error notification
                        Swal.fire({
                            icon: 'error',
                            text: errorMessage,
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
