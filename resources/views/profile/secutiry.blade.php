<div id="usersecutiry" class="tab-pane {{ Route::currentRouteName() == 'usersecutiry' ? 'active' : '' }}">
    <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
      <div class="2xl:col-span-8 xl:col-span-7">
        <h3
          class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
          Secutiry
        </h3>
        <div class="mt-8">
          <form action="{{ route('passwordupdate') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="xl:grid">
              <!-- Old Password -->
              <div class="flex flex-col gap-2 mb-3">
                <div class="flex justify-between">
                  <label for="oldpass" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Old
                    Password</label>
                </div>
                <input type="password" id="oldpass" name="oldpass"
                  class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                  value="{{ old('oldpass') }}">
                <x-input-error :messages="$errors->first('oldpass')" />
              </div>

              <!-- New Password -->
              <div class="flex flex-col gap-2 mb-3">
                <div class="flex justify-between">
                  <label for="newpass" class="text-base text-bgray-600 dark:text-bgray-50 font-medium">New
                    Password</label>
                </div>
                <input type="password" id="newpass" name="newpass"
                  class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                  value="{{ old('newpass') }}">
                <x-input-error :messages="$errors->first('newpass')" />
              </div>

              <!-- Confirm New Password -->
              <div class="flex flex-col gap-2 mb-3">
                <div class="flex justify-between">
                  <label for="newpass_confirmation"
                    class="text-base text-bgray-600 dark:text-bgray-50 font-medium">Confirm New Password</label>
                </div>
                <input type="password" id="newpass_confirmation" name="newpass_confirmation"
                  class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white p-4 rounded-lg h-14 border-0 focus:border focus:border-success-300 focus:ring-0"
                  value="{{ old('newpass_confirmation') }}">
                <x-input-error :messages="$errors->first('newpass_confirmation')" />
              </div>

              <!-- Submit Button -->
              <div class="flex justify-start">
                <button type="submit" class="rounded-lg bg-success-300 text-white font-semibold mt-4 py-3.5 px-4">
                  Update Password
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
</div>