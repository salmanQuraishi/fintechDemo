<x-app-layout>

    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">

                        <div class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h3 class="text-bgray-900 dark:text-white text-xl font-bold">
                                Api Tokens
                            </h3>
                            <button data-target="#multi-step-modal" type="button" class="modal-open rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">
                                Add New
                            </button>
                        </div>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="tokens-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Token</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Domain</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Callback</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Payin Callback</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">IP</span>
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
                    Add Token
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
                  <form class="space-y-6" id="add-token-form">
                    <div>
                      <label for="IP" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">IP</label>
                      <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="ip" name="ip" placeholder="Enter your server IP">
                    </div>
                    <div>
                      <label for="Domain" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Domain</label>
                      <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="domain" name="domain" placeholder="Enter your Domain">
                    </div>
                    <div>
                      <label for="callback" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Call Back</label>
                      <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="callback" name="callback" placeholder="Enter your Call Back">
                    </div>
                    <div>
                        <label for="payincallback" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Payin Call Back</label>
                        <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="payincallback" name="payincallback" placeholder="Enter your Payin Call Back">
                    </div>
                    <div class="flex justify-end">
                      <button class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">
                        Add Token
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="multi-step-modal2">
        <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content w-full max-w-xl px-4 mx-auto">
          <div class="step-content step-1 relative">
            <div class="relative max-w-[530px] rounded-lg bg-white dark:bg-darkblack-600 p-7 transition-all">
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="text-3xl font-medium text-bgray-900 dark:text-white font-poppins">
                    Update Token
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
                  <form class="space-y-6" id="update-token-form">
                    <div>
                        <input type="hidden" id="RowId">
                        <label for="IP" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">IP</label>
                        <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="updateip" name="updateip" placeholder="Enter your server IP">
                    </div>
                    <div>
                        <label for="Domain" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Domain</label>
                        <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="updatedomain" name="updatedomain" placeholder="Enter your Domain">
                    </div>
                    <div>
                        <label for="callback" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Call Back</label>
                        <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="updatecallback" name="updatecallback" placeholder="Enter your Call Back">
                    </div>
                    <div>
                        <label for="updatepayincallback" class="text-sm text-bgray-500 dark:text-bgray-50 block mb-2.5 text-left">Payin Call Back</label>
                        <input type="text" class="w-full border border-bgray-300 rounded-lg py-3 px-4 h-10 focus:border focus:border-success-300 focus:ring-0 dark:bg-darkblack-600 dark:border-darkblack-400 dark:text-white" id="updatepayincallback" name="updatepayincallback" placeholder="Enter your Payin Call Back">
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-success-300 hover:bg-success-400 text-white text-base font-medium rounded-lg py-3 px-6">Update Token</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script>
        const canDelete = @json(Auth::user()->can('delete api token'));
    </script>

    @push('scripts')
        <!-- Your other scripts -->
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script> 
        
        <script>
            $(document).ready(function () {
                // DataTable initialization
                $('#tokens-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('tokens.data') }}",
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
                            data: 'token',
                            render: function(data, type, row, meta) {
                                return `
                                    <span class="short-token">${data.substring(0, 10)}...</span>
                                    <button class="copy-btn" data-token="${data}" title="Copy token">📋</button>
                                `;
                            }
                        },
                        { data: 'domain' },
                        { data: 'callback' },
                        { data: 'payin_callback' },
                        { data: 'ip' },
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
                            render: function (data, type, row) {
                                if (canDelete) {
                                    return `<button data-id="${row.id}" class="edit-token-btn bg-success-50 px-4 py-1.5 text-sm text-success-300 rounded-md">Edit</button>
                                    
                                    <button data-id="${row.id}" class="delete-token-btn bg-error-50 px-4 py-1.5 text-sm text-error-300 rounded-md">Delete</button>
                                    `;
                                }
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

                // Delete token
                $(document).on('click', '.delete-token-btn', function () {
                    const tokenId = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This token will be permanently deleted!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `/tokens/${tokenId}`,
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function () {
                                    $('#tokens-table').DataTable().ajax.reload();
                                    Swal.fire('Deleted!', 'The token has been deleted.', 'success');
                                },
                                error: function () {
                                    Swal.fire('Error!', 'Failed to delete the token.', 'error');
                                }
                            });
                        }
                    });
                });

                $('#tokens-table').on('click', '.copy-btn', function() {
                    const token = $(this).data('token');
                    navigator.clipboard.writeText(token).then(() => {

                        Swal.fire({
                            icon: 'success',
                            text: 'Text copied to clipboard',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                        
                    }).catch(err => {
                        Swal.fire({
                            icon: 'errot',
                            text: 'Failed copied to clipboard',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    });
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

                $('#add-token-form').on('submit', async function (e) {
                    e.preventDefault();

                    const ip = $('#ip').val();
                    const domain = $('#domain').val();
                    const callback = $('#callback').val();
                    const payin_callback = $('#payincallback').val();

                    try {
                        const response = await fetch("{{ route('tokens.store') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({ ip, domain, callback,payin_callback })
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

                        if(data.status == "success"){
                            $('#multi-step-modal').addClass('hidden');
                            $('#add-token-form')[0].reset();
                            $('#tokens-table').DataTable().ajax.reload();
    
                            Toast.fire({
                                icon: data.status,
                                title: data.message || 'Token saved successfully.'
                            });
                        }else{
                            Toast.fire({
                                icon: data.status,
                                title: data.message || 'testing.'
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

                $(document).on('click', '.edit-token-btn', function () {
                    const tokenId = $(this).data('id');

                    $('#multi-step-modal2').removeClass('hidden');

                    $('#multi-step-modal2 .modal-body').html('<p>Loading...</p>');

                    $.ajax({
                        url: '/api/token/' + tokenId,
                        type: 'GET',
                        data: { _token: $("meta[name='csrf-token']").attr("content"),id: tokenId },
                        success: function (response) {
                            
                            $('#multi-step-modal2 #update-token-form #RowId').val(response.data.id);
                            $('#multi-step-modal2 #update-token-form #updateip').val(response.data.ip);
                            $('#multi-step-modal2 #update-token-form #updatedomain').val(response.data.domain);
                            $('#multi-step-modal2 #update-token-form #updatecallback').val(response.data.callback);
                            $('#multi-step-modal2 #update-token-form #updatepayincallback').val(response.data.payin_callback);

                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', error);
                            $('#multi-step-modal2 .modal-body').html('<p>Error loading data</p>');
                        }
                    });
                });

                $('#update-token-form').on('submit', async function (e) {
                    e.preventDefault();

                    let id = $('#RowId').val();
                    let ip = $('#updateip').val();
                    let domain = $('#updatedomain').val();
                    let callback = $('#updatecallback').val();
                    let payin_callback = $('#updatepayincallback').val();

                    try {
                        const response = await fetch(`/tokens/update/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({ ip, domain, callback,payin_callback })
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

                        if (data.status === "success") {
                            $('#multi-step-modal2').addClass('hidden');
                            $('#update-token-form')[0].reset();
                            $('#tokens-table').DataTable().ajax.reload();

                            Toast.fire({
                                icon: 'success',
                                title: data.message || 'Token updated successfully.'
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message || 'Unexpected response.'
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
                $('#step-1-cancel2').on('click', function () {
                    $('#multi-step-modal2').addClass('hidden');
                });

            });
        </script>
    @endpush
</x-app-layout>