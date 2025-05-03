<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <div class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Default Scheems</h4>
                            <button type="button" class="modal-open rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold text-warning-300 dark:bg-darkblack-500">Add New Scheem</button>
                        </div>
                        <div class="table-content w-full overflow-x-auto">
                            <table id="payin-table">
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
    
    <div class="modal fixed inset-0 z-50 overflow-y-auto flex items-center justify-center hidden" id="multi-step-modal">
        <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content flex justify-center w-full px-4 items-center mx-auto">
            <div class="step-content step-1 max-w-[752px] rounded-lg bg-white dark:bg-darkblack-600 p-6 pb-10 relative">
                <button id="step-1-cancel" class="absolute top-6 right-6">
                    <svg width="24" height="24"><path d="M16.9492 7.05029L7.04972 16.9498" stroke="#22C55E" stroke-width="2"/><path d="M7.0498 7.05029L16.9493 16.9498" stroke="#22C55E" stroke-width="2"/></svg>
                </button>
                <header class="text-center mb-3">
                    <h3 class="text-2xl font-bold text-bgray-900 dark:text-white">Add Fund</h3>
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

            var userRoles = @json(auth()->user()->getRoleNames());
            const allowedRoles = ['admin', 'super-admin', 'staff'];
            const hasAccess = userRoles.some(role => allowedRoles.includes(role));

            const columns = [
                { data: null, render: (data, type, row, meta) => meta.row + 1 }
            ];
            if (hasAccess) columns.push({ data: 'user.name', name: 'user.name' });

            columns.push(
                { data: 'ref_no' },
                {
                    data: 'status',
                    render: data => {
                        let cls = data === 'pending' ? 'bg-[#FDF9E9] text-warning-300' :
                                  data === 'success' ? 'bg-success-50 text-success-400' :
                                  'bg-[#FAEFEE] text-[#FF4747]';
                        return `<span class="rounded-md ${cls} px-4 py-1.5 text-sm font-semibold dark:bg-darkblack-500">${data}</span>`;
                    }
                },
                {
                    data: 'type',
                    render: function(data,type,row){
                        let cls = row.user_txn_id === null ? 'bg-[#FDF9E9] text-warning-300' : 'bg-success-50 text-success-400';
                        let text = row.user_txn_id === null ? 'Portal' : 'API';
                        return `<span class="rounded-md ${cls} px-4 py-1.5 text-sm font-semibold dark:bg-darkblack-500">${text}</span>`;
                    }
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
                        let actionButtons = '';
                        if (row.status === "pending") {
                            actionButtons += `
                                <a href="javascript:void(0)"
                                    data-id="${row.txn_id}"
                                    class="rounded-md bg-success-50 px-4 py-1.5 text-sm font-semibold text-success-400 dark:bg-darkblack-500 check-btn">
                                    Check
                                </a>`;
                        }
                        return actionButtons;
                    }
                }
            );

            $('#payin-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('payin.data') }}",
                columns: columns,
                createdRow: function (row, data, dataIndex) {
                    $('td', row).each(function () {
                        $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                    });
                }
            });

            $('#payin-table').on('click', '.check-btn', function() {
                    const id = $(this).data('id');

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
                                url: `/payin/check/${id}`,
                                method: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (response) {
                                    $('#payin-table').DataTable().ajax.reload();
                                    
                                   if(response.status=='success'){
                                        Swal.fire({
                                            icon: 'success',
                                            text: response.message,
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });
                                   }else if(response.status=='pending'){
                                    Swal.fire({
                                            icon: 'warning',
                                            text: response.message,
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });

                                   }else{
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#depositForm").submit(function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                $("#amount_error").text('');

                $.ajax({
                    url: "{{ route('payin.store') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if (res.status == 'success') {
                            // success logic
                            $("#depositForm").empty();

                            // Add QR div
                            $("#depositForm").append('<div id="countdown" class="text-center text-success-300 font-semibold text-lg mb-4"></div>');
                            $("#depositForm").append('<div id="qrcode" class="bg-white p-4"></div>');

                            var qrcode = new QRCode(document.getElementById("qrcode"), {
                                text: res.qr_string,
                                width: 200,
                                height: 200,
                            });

                            let timeLeft = 300; // 60 seconds countdown
                            const countdownElement = document.getElementById('countdown');

                            const timer = setInterval(() => {
                                if (timeLeft <= 0) {
                                    clearInterval(timer);
                                    $("#multi-step-modal").addClass("hidden");

                                    $('#payin-table').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'error',
                                        text: "QR Code Expired!",
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true
                                    });
                                } else {
                                    // Format minutes and seconds
                                    let minutes = Math.floor(timeLeft / 60);
                                    let seconds = timeLeft % 60;
                                    // Add leading zero if needed
                                    let formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                                    countdownElement.innerText = `Time remaining: ${formattedTime}`;
                                }
                                timeLeft -= 1;
                            }, 1000);

                            // Start checking status every 15 seconds
                            var statusInterval = setInterval(function () {
                                $.ajax({
                                    url: "{{ route('payin.checkstatus') }}", // Replace with your check status API URL
                                    method: "POST",
                                  	data:{txn_id:res.txn_id},
                                    success: function (statusRes) {

                                        if (statusRes.status === 'success') {
                                            clearInterval(statusInterval); // Stop checking
                                            console.log("Payment successful!");
                                          
                                              Swal.fire({
                                                icon: 'success',
                                                text: "Deposit successful!",
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: true
                                            });
                                          
                                           $("#multi-step-modal").addClass("hidden");

                                           $('#payin-table').DataTable().ajax.reload();

                                            // You can add success UI logic here
                                        }
                                    },
                                    error: function (err) {
                                        console.error("Status API call failed:", err);
                                        Swal.fire({
                                                icon: 'error',
                                                text: "Deposit Failed!",
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: true
                                            });
                                    }
                                });
                            }, 15000);

                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: res.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });                          
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            if (errors.amount) {
                                $("#amount_error").text(errors.amount[0]);
                            }
                        }
                    }
                });
            });

            $("#amount").on("input", function () {
                this.value = this.value.replace(/[^0-9]/g, "");
            });
        });
    </script>
    @endpush
</x-app-layout>
