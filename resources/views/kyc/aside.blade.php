<aside class="col-span-3 border-r border-bgray-200 dark:border-darkblack-400">  
  <div class="px-4 py-6">

    <a href='{{route('business.overview')}}' class="tab flex gap-x-4 p-4 rounded-lg transition-all {{ Route::currentRouteName() == 'business.overview' ? 'active' : '' }}" data-tab="businessoverview">
      <div class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100 dark:bg-darkblack-500">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <ellipse cx="12" cy="17.5" rx="7" ry="3.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></ellipse>
          <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></circle>
        </svg>
      </div>
      <div class="datamanage">
        <h4 class="text-base font-bold text-bgray-900 dark:text-white">
          Business Overview
        </h4>
      </div>
    </a>
    <a href='{{route('business.details')}}' class="tab flex gap-x-4 p-4 rounded-lg transition-all {{ Route::currentRouteName() == 'business.details' ? 'active' : '' }}" data-tab="businessdetails">
      <div class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100 dark:bg-darkblack-500">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <ellipse cx="12" cy="17.5" rx="7" ry="3.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></ellipse>
          <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></circle>
        </svg>
      </div>
      <div class="datamanage">
        <h4 class="text-base font-bold text-bgray-900 dark:text-white">
          Business Details
        </h4>
      </div>
    </a>

  </div>
</aside>