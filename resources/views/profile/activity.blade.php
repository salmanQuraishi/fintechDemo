<div id="useractivity" class="tab-pane {{ Route::currentRouteName() == 'useractivity' ? 'active' : '' }}">
    <div class="xl:grid gap-12 flex 2xl:flex-row flex-col-reverse">
      <div class="2xl:col-span-8 xl:col-span-7">
        <h3
          class="text-2xl font-bold pb-2 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
          Activity
        </h3>
        <div class="mt-2">
          <div class="table-content w-full overflow-x-auto">
            @if ($countActivity > 0)
            <table style="width: 100%">
              <thead>
                <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                  <td class="py-5 px-6 xl:px-0">
                    <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">IP</span>
                  </td>
                  <td class="py-5 px-6 xl:px-0">
                    <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Activity</span>
                  </td>
                  <td class="py-5 px-6 xl:px-0">
                    <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Device</span>
                  </td>
                  <td class="py-5 px-6 xl:px-0">
                    <span class="text-base font-medium text-bgray-600 dark:text-bgray-50">Time Stamp</span>
                  </td>
                </tr>
              </thead>
              <tbody>                         
                @foreach ($Activity as $actData)
                  <tr>
                    <td class="py-5 px-6 xl:px-0">
                      <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                        {{ $actData->source_ip }}
                      </p>
                    </td>
                    <td class="py-5 px-6 xl:px-0">
                      <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                        {{ $actData->activity }}
                      </p>
                    </td>
                    <td class="py-5 px-6 xl:px-0">
                      <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                        {{ \Illuminate\Support\Str::limit($actData->device, 24) }}
                      </p>
                    </td>
                    <td class="py-5 px-6 xl:px-0">
                      <p class="font-medium text-base text-bgray-900 dark:text-bgray-50">
                        {{ $actData->timestamp }}
                      </p>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>