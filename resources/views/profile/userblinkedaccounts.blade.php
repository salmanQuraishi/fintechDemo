<div id="userblinkedaccounts" class="tab-pane {{ Route::currentRouteName() == 'userblinkedaccounts' ? 'active' : '' }}">
    <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
      <div class="2xl:col-span-8 xl:col-span-7">
        <h3
          class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
          Linked Accounts
        </h3>
        <div class="mt-4">

          <form action="{{route('linkedAccount')}}" method="post" class="mb-4">
            @csrf
            <div class="flex flex-col md:flex-row justify-between gap-5 md:gap-x-8 mb-4">
        
                <div class="w-full flex flex-col gap-2">
                  <label for="BankName" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Bank Name*</label>
                  <input type="text" id="BankName" name="BankName"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('BankName') }}">
                    <x-input-error :messages="$errors->first('BankName')" />
                </div>

                <div class="w-full flex flex-col gap-2">
                  <label for="AccountNumber" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Account Number*</label>
                  <input type="text" id="AccountNumber" name="AccountNumber"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('AccountNumber') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    <x-input-error :messages="$errors->first('AccountNumber')" />
                </div>
        
              </div>
            <div class="flex flex-col md:flex-row justify-between gap-5 md:gap-x-8 mb-4">
        
                <div class="flex flex-col gap-2 w-full">
                  <label for="IFSC" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">IFSC*</label>
                  <input type="text" id="IFSC" name="IFSC"
                    class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                    value="{{ old('IFSC') }}">
                    <x-input-error :messages="$errors->first('IFSC')" />
                </div>

                <div class="flex flex-col gap-2 w-full">
                  <label for="AccountType" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Account Type *</label>
                  <select name="AccountType" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                      <option value="saving">Saving</option>
                      <option value="current">Current</option>
                  </select>                                                
                  <x-input-error :messages="$errors->get('AccountType')" class="mt-2" />
                </div>

                <div class="flex flex-col gap-2 w-full">
                  <label for="Status" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Status *</label>
                  <select name="Status" class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0">
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                  </select>                                                
                  <x-input-error :messages="$errors->get('Status')" class="mt-2" />
                </div>
        
              </div>
              <button class="bg-success-300 hover:bg-success-400 text-white font-semibold text-base py-4 flex justify-center items-center rounded-lg w-full mt-2">
                submit
              </button>

        </form>


          <div class="table-content w-full overflow-x-auto">
            <table class="w-full">
                <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                    <td class="py-5 ">
                      <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">
                        #</span>
                    </td>
                    <td class="py-5  xl:px-0">
                      <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Bank Name</span>
                    </td>
                    <td class="py-5  xl:px-0">
                      <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">A/c</span>
                    </td>
                    <td class="py-5  xl:px-0">
                      <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">IFSC</span>
                    </td>
                    <td class="py-5 ">
                      <span class="text-base font-medium text-bgray-600 dark:text-gray-50">
                          Type</span>
                    </td>
                    <td class="py-5 ">
                      <span class="text-base font-medium text-bgray-600 dark:text-gray-50">
                          Status</span>
                    </td>
                    <td class="py-5 ">
                      <span class="text-base font-medium text-bgray-600 dark:text-gray-50">
                        Action</span>
                    </td>
                </tr>
              @foreach ($UserBankAccounts as $accountData)
                <tr>
                  <td class="py-5 ">
                    <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">{{ $loop->iteration }}</p>
                  </td>
                  <td class="py-5 ">
                    <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">{{$accountData->bank_name}}</p>
                  </td>
                  <td class="py-5 ">
                    <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">{{$accountData->account_no}}</p>
                  </td>
                  <td class="py-5 ">
                    <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">{{$accountData->ifsc}}</p>
                  </td>
                  <td class="py-5 ">
                    <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">{{$accountData->type}}</p>
                  </td>
                  <td class="py-5 ">
                    <label class="rounded-md bg-[#FAEFEE] px-4 py-1.5 text-sm font-semibold leading-[22px]  dark:bg-darkblack-500 {{ $accountData->status === 'active' ? 'text-success-400' : 'text-[#FF4747]' }}">{{$accountData->status}}</label>
                  </td>
                  <td class="py-5">
                    <form action="{{ route('updateaccountStatus', $accountData->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <label class="switch">
                          <input type="checkbox" name="status"
                                 onchange="this.form.submit()"
                                 {{ $accountData->status === 'active' ? 'checked' : '' }}>
                          <span class="slider"></span>
                      </label>
                    </form>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function () {
      const day = this.id;
      document.getElementById(`${day}-start`).disabled = !this.checked;
      document.getElementById(`${day}-end`).disabled = !this.checked;
      });
    });
</script>