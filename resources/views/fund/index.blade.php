<x-app-layout>

    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <!-- write your code here-->
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <!--list table-->
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        
                        <div class="flex justify-between items-center border-b border-bgray-300 dark:border-darkblack-400 py-3">
                            <h3 class="text-bgray-900 dark:text-white text-xl font-bold">
                              Fund History
                            </h3>
                            @can('create fund')
                                <button data-target="#multi-step-modal" type="button" class="modal-open rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">
                                    Add Offline Fund
                                </button>
                            @endcan
                        </div>


                        <div class="">
                            <ul class="space-y-3 grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                                <li class="flex justify-between items-center">
                                    <div class="flex space-x-3">
                                        <div class="bg-bgray-50 w-10 h-10 rounded-lg flex justify-center items-center">
                                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 1V5C10 5.26522 10.1054 5.51957 10.2929 5.70711C10.4804 5.89464 10.7348 6 11 6H15" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H10L15 6V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19Z" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="text-base font-semibold dark:text-white">Bank Name</h5>
                                            <span class="text-sm text-bgray-500 dark:text-bgray-50" id="bankName">{{$adminBank->bank_name}}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="text-bgray-500 hover:text-green-500" onclick="copyToClipboard('bankName')">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#1976d2" d="M186.668 416C136.684 416 96 375.316 96 325.332V106.668H58.668C26.305 106.668 0 132.968 0 165.332v288C0 485.695 26.305 512 58.668 512h266.664C357.695 512 384 485.695 384 453.332V416zm0 0" opacity="1" data-original="#1976d2" class="hovered-path"></path><path fill="#2196f3" d="M469.332 58.668C469.332 26.262 443.07 0 410.668 0h-224C154.262 0 128 26.262 128 58.668v266.664C128 357.738 154.262 384 186.668 384h224c32.402 0 58.664-26.262 58.664-58.668zm0 0" opacity="1" data-original="#2196f3" class=""></path></g></svg>
                                        </button>
                                    </div>
                                </li>
                                
                                <li class="flex justify-between items-center">
                                    <div class="flex space-x-3">
                                        <div class="bg-bgray-50 w-10 h-10 rounded-lg flex justify-center items-center">
                                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 1V5C10 5.26522 10.1054 5.51957 10.2929 5.70711C10.4804 5.89464 10.7348 6 11 6H15" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H10L15 6V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19Z" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="text-base font-semibold dark:text-white">A/C No.</h5>
                                            <span class="text-sm text-bgray-500 dark:text-bgray-50" id="accountNo">{{$adminBank->account_no}}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="text-bgray-500 hover:text-green-500" onclick="copyToClipboard('accountNo')">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#1976d2" d="M186.668 416C136.684 416 96 375.316 96 325.332V106.668H58.668C26.305 106.668 0 132.968 0 165.332v288C0 485.695 26.305 512 58.668 512h266.664C357.695 512 384 485.695 384 453.332V416zm0 0" opacity="1" data-original="#1976d2" class="hovered-path"></path><path fill="#2196f3" d="M469.332 58.668C469.332 26.262 443.07 0 410.668 0h-224C154.262 0 128 26.262 128 58.668v266.664C128 357.738 154.262 384 186.668 384h224c32.402 0 58.664-26.262 58.664-58.668zm0 0" opacity="1" data-original="#2196f3" class=""></path></g></svg>
                                        </button>
                                    </div>
                                </li>
                        
                                <li class="flex justify-between items-center">
                                    <div class="flex space-x-3">
                                        <div class="bg-bgray-50 w-10 h-10 rounded-lg flex justify-center items-center">
                                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 1V5C10 5.26522 10.1054 5.51957 10.2929 5.70711C10.4804 5.89464 10.7348 6 11 6H15" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H10L15 6V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19Z" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="text-base font-semibold dark:text-white">IFSC</h5>
                                            <span class="text-sm text-bgray-500 dark:text-bgray-50" id="ifsc">{{$adminBank->ifsc}}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="text-bgray-500 hover:text-green-500" onclick="copyToClipboard('ifsc')">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#1976d2" d="M186.668 416C136.684 416 96 375.316 96 325.332V106.668H58.668C26.305 106.668 0 132.968 0 165.332v288C0 485.695 26.305 512 58.668 512h266.664C357.695 512 384 485.695 384 453.332V416zm0 0" opacity="1" data-original="#1976d2" class="hovered-path"></path><path fill="#2196f3" d="M469.332 58.668C469.332 26.262 443.07 0 410.668 0h-224C154.262 0 128 26.262 128 58.668v266.664C128 357.738 154.262 384 186.668 384h224c32.402 0 58.664-26.262 58.664-58.668zm0 0" opacity="1" data-original="#2196f3" class=""></path></g></svg>
                                        </button>
                                    </div>
                                </li>
                        
                                <li class="flex justify-between items-center">
                                    <div class="flex space-x-3">
                                        <div class="bg-bgray-50 w-10 h-10 rounded-lg flex justify-center items-center">
                                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 1V5C10 5.26522 10.1054 5.51957 10.2929 5.70711C10.4804 5.89464 10.7348 6 11 6H15" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H10L15 6V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19Z" stroke="#22C55E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="text-base font-semibold dark:text-white">A/C Type</h5>
                                            <span class="text-sm text-bgray-500 dark:text-bgray-50" id="accountType">{{$adminBank->type}}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="text-bgray-500 hover:text-green-500" onclick="copyToClipboard('accountType')">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path fill="#1976d2" d="M186.668 416C136.684 416 96 375.316 96 325.332V106.668H58.668C26.305 106.668 0 132.968 0 165.332v288C0 485.695 26.305 512 58.668 512h266.664C357.695 512 384 485.695 384 453.332V416zm0 0" opacity="1" data-original="#1976d2" class="hovered-path"></path><path fill="#2196f3" d="M469.332 58.668C469.332 26.262 443.07 0 410.668 0h-224C154.262 0 128 26.262 128 58.668v266.664C128 357.738 154.262 384 186.668 384h224c32.402 0 58.664-26.262 58.664-58.668zm0 0" opacity="1" data-original="#2196f3" class=""></path></g></svg>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <x-input-success :messages="session('status')" />

                        <div class="table-content w-full overflow-x-auto">
                            <table class="w-full">
                                <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                    <td class="py-5 px-6 xl:px-0 w-[250px] lg:w-auto inline-block">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">
                                                #</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Deposit Bank Details</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Pay Slip</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Amount</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Remark</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span>
                                            <span>
                                                <svg width="14" height="15" viewbox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.332 1.31567V13.3157" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66602 11.3157L3.66602 13.3157L1.66602 11.3157"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M3.66602 13.3157V1.31567" stroke="#718096"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12.332 3.31567L10.332 1.31567L8.33203 3.31567"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Date</span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-6 xl:px-0">
                                        <div class="w-full flex space-x-2.5 items-center">
                                            <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Action</span>

                                        </div>
                                    </td>
                                </tr>
                                @foreach ($fund as $funds)
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                {{ $loop->iteration }}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                Bank : {{ $funds->deposit_bank }}<br>
                                                A/C : {{ $funds->from_account }}<br>
                                                Mode : {{ $funds->payment_mode }}<br>
                                                From A/C : {{ $funds->from_account }}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <button class="view-slip-btn rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500"
                                                data-image="{{ url("/$funds->pay_slip") }}">
                                                View Slip
                                            </button>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                ₹{{ $funds->amount }}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                {{ $funds->remark }}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                @if ($funds->status === "pending")
                                                    <button class="rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">Pending</button> 
                                                @elseif ($funds->status === "approved")
                                                    <button class="rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-success-300 dark:bg-darkblack-500">Approved</button> 
                                                @elseif ($funds->status === "rejected")
                                                    <button class="rounded-md bg-[#FAEFEE] px-4 py-1.5 text-sm font-semibold leading-[22px] text-[#FF4747] dark:bg-darkblack-500">Rejected</button> 
                                                @endif
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                                                {{ $funds->created_at }}
                                            </p>
                                        </td>
                                        <td class="py-5 px-6 xl:px-0">
                                            @can('update fund')
                                                @if ($funds->status === "pending")
                                                    <form action="{{ route('fund.update', $funds->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status" class="text-bgray-800 border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white focus:border-success-300 focus:ring-0 placeholder:text-bgray-500">
                                                            <option value="approved">Approve</option>
                                                            <option value="rejected">Reject</option>
                                                        </select>
                                                        <br>
                                                        <button type="submit" class="bg-[#FDF9E9] px-4 py-1.5 text-xs text-warning-300 dark:bg-darkblack-500">Submit</button> 
                                                    </form>
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach                            

                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- write your code here-->
    </main>



    <div class="modal hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center" id="multi-step-modal">
        <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75 dark:bg-bgray-900 dark:opacity-50"></div>
        <div class="modal-content flex justify-center w-full px-4 items-center mx-auto">
          <!-- Step 1 -->
          <div class="step-content step-1">
            <div class="max-w-[752px] rounded-lg bg-white dark:bg-darkblack-600 p-6 pb-10 transition-all relative">
              <button id="step-1-cancel" class="flex justify-center items-center absolute top-6 right-6">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.9492 7.05029L7.04972 16.9498" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M7.0498 7.05029L16.9493 16.9498" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </button>
              <header class="text-center">
                <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-3">Add Money</h3>
              </header>

                <div class="flex flex-row py-3" id="success-message" style="display: none;">
                    <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                    <div class="flex-1">
                        <p class="text-bgray-800 dark:text-white text-[#9AA2B1] pl-3 lg:text-base text-xs lg:leading-7" id='textadd'></p>
                    </div>
                </div>
      
                <form action="" id='depositForm'>
                    <div class='flex flex-col md:flex-row justify-between gap-5 md:gap-x-8'>
                
                        <div class='w-full md:w-1/2 space-y-3'>
                
                            <div class="mb-4">
                                <select name="deposit_bank" id="deposit_bank" class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base">
                                    <option disabled selected>Deposit Bank</option>
                                    <option value='{{$adminBank->bank_name}}' selected>{{$adminBank->bank_name}} ( A/c : {{$adminBank->account_no}} )</option>
                                </select>
                                <div id="deposit_bank_error" class="text-error-300"></div>
                            </div>
                            
                            <div class="mb-4">
                                <input type="text" name="amount" id="amount" class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base" placeholder="Enter Amount" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <div id="amount_error" class="text-error-300"></div>
                            </div>
                            
                            <div class="mb-4">
                                <select name="payment_mode" id="payment_mode" class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base">
                                    <option value='0' disabled selected>Payment Mode</option>
                                    <option value='IMPS'>IMPS</option>
                                    <option value='NEFT'>NEFT</option>
                                    <option value='NET BANKING'>NET BANKING</option>
                                    <option value='CASH'>CASH</option>
                                </select>
                                <div id="payment_mode_error" class="text-error-300"></div>
                            </div>
                            
                        </div>
                        
                        <div class='w-full md:w-1/2'>
                            
                            <div class="mb-4">
                                <input type="text" name="from_account" id="from_account" class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base" placeholder="Enter From Account">
                                <div id="from_account_error" class="text-error-300"></div>
                            </div>
                            
                            <div class="mb-4">
                                <input type="text" name="ref_no" id="ref_no" class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base" placeholder="Enter Ref No.">
                                <div id="ref_no_error" class="text-error-300"></div>
                            </div>

                            <div class="mb-4">
                                <input type="file" name="pay_slip" id="pay_slip" class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base">
                            </div>
                
                        </div>
                
                    </div>
                    
                    <textarea name="remark" id="remark" rows="6" cols="50" class="text-bgray-800 text-base border border-bgray-300 dark:border-darkblack-400 dark:bg-darkblack-500 dark:text-white h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base" placeholder="Enter Remark"></textarea>
                
                    <button class="bg-success-300 hover:bg-success-400 text-white font-semibold text-base py-4 flex justify-center items-center rounded-lg w-full mt-2">
                        Continue
                    </button>
                </form>
            
      
            </div>
          </div>         
        </div>
    </div>

    <!-- Modal -->
<div id="imageModal" class="modal hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center">
    <div class="bg-white dark:bg-darkblack-500 p-4 rounded-md max-w-lg w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-50">Slip Image</h2>
            <button id="closeModal" class="text-gray-600 dark:text-gray-200">✖</button>
        </div>
        <img id="modalImage" src="" alt="Slip Image" class="mt-3 max-w-full h-auto" width="100%">
    </div>
</div>


    @push('scripts')
        <!--scripts -->
        <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script>
            function copyToClipboard(elementId) {
                var text = document.getElementById(elementId).textContent;
                navigator.clipboard.writeText(text).then(function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Text copied to clipboard',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                }).catch(function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Copy Failed!',
                        text: 'Error copying text',
                    });
                    console.error("Copy failed!", error);
                });
            }
        </script>

        <script>
            // min-calender
            $("#min-calender").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                inline: true,
            });
        </script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script>
            $(".card-slider").slick({
                dots: true,
                infinite: true,
                autoplay: true,
                speed: 500,
                fade: true,
                cssEase: "linear",
                arrows: false,
            });
        </script>

        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#depositForm").submit(function (event) {
                    event.preventDefault();
                    $(".error-message").html("");

                    let formData = new FormData(this);

                    $.ajax({
                        url: "{{ route('fund.request') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $("#textadd").html(response.message).fadeIn();
                            $("#success-message").fadeIn();
                            $("#depositForm")[0].reset();
                            setTimeout(function () {
                                $("#success-message").slideUp();
                                location.href='{{route("fund.view")}}';
                            }, 2000);
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $("#" + field + "_error").text(errors[field][0]);
                            }
                        }
                    });
                });

                // Restrict input to numbers only
                $("#amount").on("input", function () {
                    this.value = this.value.replace(/[^0-9]/g, "");
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".view-slip-btn").on("click", function () {
                    var imageUrl = $(this).data("image");  // Get image URL from data attribute
                    $("#modalImage").attr("src", imageUrl); // Set modal image src
                    $("#imageModal").removeClass("hidden").addClass("flex"); // Show modal
                });
        
                $("#closeModal").on("click", function () {
                    $("#imageModal").addClass("hidden").removeClass("flex"); // Hide modal
                });
        
                // Close modal when clicking outside the image box
                $("#imageModal").on("click", function (e) {
                    if ($(e.target).is("#imageModal")) {
                        $(this).addClass("hidden").removeClass("flex");
                    }
                });
            });
        </script>

        <script src="{{ asset('/') }}assets/js/main.js"></script>
    @endpush

</x-app-layout>