<aside class="block xl:block sm:hidden sidebar-wrapper w-[308px] fixed top-0 bg-white dark:bg-darkblack-600 h-full z-30">
    <div class="sidebar-header relative border-r border-b   border-r-[#F7F7F7] border-b-[#F7F7F7] dark:border-darkblack-400 w-full h-[108px] flex items-center pl-[50px] z-30">
      <a href="{{route('dashboard')}}">
        <img src="{{ !empty($settings->logo_dark) ? asset("/".$settings->logo_dark) : "assets/images/logo/logo-color.png" }}" class="block dark:hidden" alt="logo">
        <img src="{{ !empty($settings->logo_light) ? asset("/".$settings->logo_light) : "assets/images/logo/logo-white.png" }}" class="hidden dark:block " alt="logo">
      </a>
      <button type="button" class="drawer-btn absolute right-0 top-auto" title="Ctrl+b">
        <span>
          <svg width="16" height="40" viewbox="0 0 16 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10C0 4.47715 4.47715 0 10 0H16V40H10C4.47715 40 0 35.5228 0 30V10Z" fill="#22C55E"></path>
            <path d="M10 15L6 20.0049L10 25.0098" stroke="#ffffff" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </span>
      </button>
    </div>
    <div class="sidebar-body pl-[48px] pt-[14px] w-full relative z-30 h-screen overflow-style-none overflow-y-scroll pb-[200px]">
      <div class="nav-wrapper pr-[50px] mb-[36px]">
        <div class="item-wrapper mb-5">
          <h4 class="text-sm font-medium dark:text-bgray-50 text-bgray-700 border-b dark:border-darkblack-400 border-bgray-200 leading-7">
            Menu
          </h4>
          <ul class="mt-2.5">
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('dashboard')}}">
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="18" height="21" viewbox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="path-1" d="M0 8.84719C0 7.99027 0.366443 7.17426 1.00691 6.60496L6.34255 1.86217C7.85809 0.515019 10.1419 0.515019 11.6575 1.86217L16.9931 6.60496C17.6336 7.17426 18 7.99027 18 8.84719V17C18 19.2091 16.2091 21 14 21H4C1.79086 21 0 19.2091 0 17V8.84719Z" fill="#1A202C"></path>
                        <path class="path-2" d="M5 17C5 14.7909 6.79086 13 9 13C11.2091 13 13 14.7909 13 17V21H5V17Z" fill="#22C55E"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Dashboard</span>
                  </div>
                </div>
              </a>
            </li>
            @canany(['create permission', 'view permission'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('dashboard')}}">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.57666 3.61499C1.57666 2.51042 2.47209 1.61499 3.57666 1.61499H8.5C9.60456 1.61499 10.5 2.51042 10.5 3.61499V8.53833C10.5 9.64289 9.60456 10.5383 8.49999 10.5383H3.57666C2.47209 10.5383 1.57666 9.64289 1.57666 8.53832V3.61499Z" fill="#1A202C" class="path-1"></path>
                        <path d="M13.5 15.5383C13.5 14.4338 14.3954 13.5383 15.5 13.5383H20.4233C21.5279 13.5383 22.4233 14.4338 22.4233 15.5383V20.4617C22.4233 21.5662 21.5279 22.4617 20.4233 22.4617H15.5C14.3954 22.4617 13.5 21.5662 13.5 20.4617V15.5383Z" fill="#1A202C" class="path-1"></path>
                        <circle cx="6.03832" cy="18" r="4.46166" fill="#1A202C" class="path-1"></circle>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18 2C18.4142 2 18.75 2.33579 18.75 2.75V5.25H21.25C21.6642 5.25 22 5.58579 22 6C22 6.41421 21.6642 6.75 21.25 6.75H18.75V9.25C18.75 9.66421 18.4142 10 18 10C17.5858 10 17.25 9.66421 17.25 9.25V6.75H14.75C14.3358 6.75 14 6.41421 14 6C14 5.58579 14.3358 5.25 14.75 5.25H17.25V2.75C17.25 2.33579 17.5858 2 18 2Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Permissions</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('create permission')
                  <li>
                    <a href="{{ route('permissions.create') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Add Permissions</a>
                  </li>
                @endcan
                @can('view permission')
                  <li>
                    <a href="{{ route('permissions.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">View Permissions</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @can('view user') 
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{ route('users.index') }}"> 
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="11.7778" cy="17.5555" rx="7.77778" ry="4.44444" class="path-1" fill="#1A202C"></ellipse>
                        <circle class="path-2" cx="11.7778" cy="6.44444" r="4.44444" fill="#22C55E"></circle>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Users</span>
                  </div>
                </div>
              </a>
            </li>
            @endcanany
            @canany(['create role', 'view role'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('dashboard')}}">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Roles</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('create role')
                  <li>
                    <a href="{{ route('roles.create') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Create Role</a>
                  </li>
                @endcan
                @can('view role')
                  <li>
                    <a href="{{ route('roles.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">View Role</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @can('update kyc') 
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)" class="toggle-menu"> 
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                        <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                        <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">kyc</span>
                  </div>
                </div>
              </a>
            </li>
            @endcanany
            @canany(['view business kyc', 'verify business kyc'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Business KYCs</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('view business kyc')
                  <li>
                    <a href="{{ route('business_kyc.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">KYCs</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @canany(['admin banks']) 
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('bank.adminbankList')}}"> 
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 16V6C18 3.79086 16.2091 2 14 2H4C1.79086 2 0 3.79086 0 6V16C0 18.2091 1.79086 20 4 20H14C16.2091 20 18 18.2091 18 16Z" fill="#1A202C" class="path-1"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 8C4.25 7.58579 4.58579 7.25 5 7.25H13C13.4142 7.25 13.75 7.58579 13.75 8C13.75 8.41421 13.4142 8.75 13 8.75H5C4.58579 8.75 4.25 8.41421 4.25 8Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H13C13.4142 11.25 13.75 11.5858 13.75 12C13.75 12.4142 13.4142 12.75 13 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 16C4.25 15.5858 4.58579 15.25 5 15.25H9C9.41421 15.25 9.75 15.5858 9.75 16C9.75 16.4142 9.41421 16.75 9 16.75H5C4.58579 16.75 4.25 16.4142 4.25 16Z" fill="#22C55E" class="path-2"></path>
                        <path d="M11 0H7C5.89543 0 5 0.895431 5 2C5 3.10457 5.89543 4 7 4H11C12.1046 4 13 3.10457 13 2C13 0.895431 12.1046 0 11 0Z" fill="#22C55E" class="path-2"></path>
                      </svg>  
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Admin Banks</span>
                  </div>
                </div>
              </a>
            </li>
            @endcanany
            @canany(['default charges']) 
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('default.charges')}}"> 
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 16V6C18 3.79086 16.2091 2 14 2H4C1.79086 2 0 3.79086 0 6V16C0 18.2091 1.79086 20 4 20H14C16.2091 20 18 18.2091 18 16Z" fill="#1A202C" class="path-1"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 8C4.25 7.58579 4.58579 7.25 5 7.25H13C13.4142 7.25 13.75 7.58579 13.75 8C13.75 8.41421 13.4142 8.75 13 8.75H5C4.58579 8.75 4.25 8.41421 4.25 8Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H13C13.4142 11.25 13.75 11.5858 13.75 12C13.75 12.4142 13.4142 12.75 13 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 16C4.25 15.5858 4.58579 15.25 5 15.25H9C9.41421 15.25 9.75 15.5858 9.75 16C9.75 16.4142 9.41421 16.75 9 16.75H5C4.58579 16.75 4.25 16.4142 4.25 16Z" fill="#22C55E" class="path-2"></path>
                        <path d="M11 0H7C5.89543 0 5 0.895431 5 2C5 3.10457 5.89543 4 7 4H11C12.1046 4 13 3.10457 13 2C13 0.895431 12.1046 0 11 0Z" fill="#22C55E" class="path-2"></path>
                      </svg>  
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Default Schemes</span>
                  </div>
                </div>
              </a>
            </li>
            @endcanany
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('fund.view')}}"> 
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 16V6C18 3.79086 16.2091 2 14 2H4C1.79086 2 0 3.79086 0 6V16C0 18.2091 1.79086 20 4 20H14C16.2091 20 18 18.2091 18 16Z" fill="#1A202C" class="path-1"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 8C4.25 7.58579 4.58579 7.25 5 7.25H13C13.4142 7.25 13.75 7.58579 13.75 8C13.75 8.41421 13.4142 8.75 13 8.75H5C4.58579 8.75 4.25 8.41421 4.25 8Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H13C13.4142 11.25 13.75 11.5858 13.75 12C13.75 12.4142 13.4142 12.75 13 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 16C4.25 15.5858 4.58579 15.25 5 15.25H9C9.41421 15.25 9.75 15.5858 9.75 16C9.75 16.4142 9.41421 16.75 9 16.75H5C4.58579 16.75 4.25 16.4142 4.25 16Z" fill="#22C55E" class="path-2"></path>
                        <path d="M11 0H7C5.89543 0 5 0.895431 5 2C5 3.10457 5.89543 4 7 4H11C12.1046 4 13 3.10457 13 2C13 0.895431 12.1046 0 11 0Z" fill="#22C55E" class="path-2"></path>
                      </svg>  
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Fund</span>
                  </div>
                </div>
              </a>
            </li>
            <!-- <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('linkedbanksRequests')}}"> 
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 16V6C18 3.79086 16.2091 2 14 2H4C1.79086 2 0 3.79086 0 6V16C0 18.2091 1.79086 20 4 20H14C16.2091 20 18 18.2091 18 16Z" fill="#1A202C" class="path-1"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 8C4.25 7.58579 4.58579 7.25 5 7.25H13C13.4142 7.25 13.75 7.58579 13.75 8C13.75 8.41421 13.4142 8.75 13 8.75H5C4.58579 8.75 4.25 8.41421 4.25 8Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H13C13.4142 11.25 13.75 11.5858 13.75 12C13.75 12.4142 13.4142 12.75 13 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 16C4.25 15.5858 4.58579 15.25 5 15.25H9C9.41421 15.25 9.75 15.5858 9.75 16C9.75 16.4142 9.41421 16.75 9 16.75H5C4.58579 16.75 4.25 16.4142 4.25 16Z" fill="#22C55E" class="path-2"></path>
                        <path d="M11 0H7C5.89543 0 5 0.895431 5 2C5 3.10457 5.89543 4 7 4H11C12.1046 4 13 3.10457 13 2C13 0.895431 12.1046 0 11 0Z" fill="#22C55E" class="path-2"></path>
                      </svg>  
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Linked Banks Request</span>
                  </div>
                </div>
              </a>
            </li> -->
            @canany(['create service category', 'view service category'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Services Category</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('create service category')
                  <li>
                    <a href="{{ route('category.create') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Create Service Category</a>
                  </li>
                @endcan
                @can('view service category')
                  <li>
                    <a href="{{ route('category.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">View Service Category</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @canany(['create service', 'view service'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Services</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('create service')
                  <li>
                    <a href="{{ route('service.create') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Create Service</a>
                  </li>
                @endcan
                @can('view service')
                  <li>
                    <a href="{{ route('service.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">View Service</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @canany(['add bank', 'view bank'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Bank</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('add bank')
                  <li>
                    <a href="{{ route('banks.create') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Add Bank</a>
                  </li>
                @endcan
                @can('view bank')
                  <li>
                    <a href="{{ route('banks.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">View Bank</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @canany(['payout', 'view payout'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Payout</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('payout')
                  <li>
                    <a href="{{ route('payout.create') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Payout</a>
                  </li>
                @endcan
                @can('view payout')
                  <li>
                    <a href="{{ route('payout.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">View Payout</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @canany(['payin', 'view payin'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Payin</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('view payin')
                  <li>
                    <a href="{{ route('payin.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">View Payin</a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcanany
            @canany(['api setting'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">API Settings</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                <li>
                  <a href="{{ route('tokens.index') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Callback & Token</a>
                </li>
                <li>
                  <a href="https://www.postman.com/startpay-1840456/startpay/collection/dg4qxyz/startpay?action=share&creator=44591676" target="_blank" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Api Documents</a>
                </li>
              </ul>
            </li>
            @endcanany
            @can('buy service list') 
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('buy.service.list')}}" > 
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                        <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                        <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Buy Service</span>
                  </div>
                </div>
              </a>
            </li>
            @endcan
            @canany(['edit profile','update profile'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('user.profile.edit')}}">
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                        <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                        <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Profile</span>
                  </div>
                </div>
              </a>
            </li>
            @endcan
            @canany(['view setting','manage payout apis'])
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Manage Panel</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                @can('view setting')
                <li>
                  <a href="{{route('setting.view')}}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">App Setting</a>
                </li>
                @endcan
                @can('manage payout apis')
                <li>
                  <a href="{{route('manage.payout.service')}}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Manage Payout APIs</a>
                </li>
                @endcan
              </ul>
            </li>
            @endcanany
            <!-- @can('view setting')
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="{{route('setting.view')}}">
                <div class="flex items-center justify-between">
                  <div class="flex space-x-2.5 items-center">
                    <span class="item-ico">
                      <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.0606 2H10.9394C9.76787 2 8.81817 2.89543 8.81817 4C8.81817 5.26401 7.46574 6.06763 6.35556 5.4633L6.24279 5.40192C5.22823 4.84963 3.93091 5.17738 3.34515 6.13397L2.28455 7.86602C1.69879 8.8226 2.0464 10.0458 3.06097 10.5981C4.17168 11.2027 4.17168 12.7973 3.06096 13.4019C2.0464 13.9542 1.69879 15.1774 2.28454 16.134L3.34515 17.866C3.93091 18.8226 5.22823 19.1504 6.24279 18.5981L6.35555 18.5367C7.46574 17.9324 8.81817 18.736 8.81817 20C8.81817 21.1046 9.76787 22 10.9394 22H13.0606C14.2321 22 15.1818 21.1046 15.1818 20C15.1818 18.736 16.5343 17.9324 17.6445 18.5367L17.7572 18.5981C18.7718 19.1504 20.0691 18.8226 20.6548 17.866L21.7155 16.134C22.3012 15.1774 21.9536 13.9542 20.939 13.4019C19.8283 12.7973 19.8283 11.2027 20.939 10.5981C21.9536 10.0458 22.3012 8.82262 21.7155 7.86603L20.6548 6.13398C20.0691 5.1774 18.7718 4.84965 17.7572 5.40193L17.6445 5.46331C16.5343 6.06765 15.1818 5.26402 15.1818 4C15.1818 2.89543 14.2321 2 13.0606 2Z" fill="#1A202C" class="path-1"></path>
                        <path d="M15.75 12C15.75 14.0711 14.0711 15.75 12 15.75C9.92893 15.75 8.25 14.0711 8.25 12C8.25 9.92893 9.92893 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Setting</span>
                  </div>
                </div>
              </a>
            </li>
            @endcan -->

            @can('view kyc setting')
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <a href="javascript:void(0)">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2.5">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                    <span class="item-text text-lg font-medium leading-none">Kyc Settings</span>
                  </div>
                  <span>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M0.531506 0.414376C0.20806 0.673133 0.155619 1.1451 0.414376 1.46855L4.03956 6.00003L0.414376 10.5315C0.155618 10.855 0.208059 11.3269 0.531506 11.5857C0.854952 11.8444 1.32692 11.792 1.58568 11.4685L5.58568 6.46855C5.80481 6.19464 5.80481 5.80542 5.58568 5.53151L1.58568 0.531506C1.32692 0.20806 0.854953 0.155619 0.531506 0.414376Z"></path>
                    </svg>
                  </span>
                </div>
              </a>
              <ul class="sub-menu ml-2.5 mt-[22px] border-l border-success-100 pl-5">
                
                <li>
                  <a href="{{ route('kyc.business.category') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Business Category</a>
                </li>
                <li>
                  <a href="{{ route('kyc.business.sub.cat') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Business Sub Category</a>
                </li>
                <li>
                  <a href="{{ route('kyc.business-type') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Business Type</a>
                </li>
                <li>
                  <a href="{{ route('kyc.documents') }}" class="text-md inline-block py-1.5 font-medium text-bgray-600 transition-all hover:text-bgray-800 dark:text-bgray-50 hover:dark:text-success-300">Documents</a>
                </li>
              </ul>
            </li>
            @endcan
            <li class="item py-[11px] text-bgray-900 dark:text-white">
              <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to log out?')">
                @csrf
                <button>
                  <div class="flex items-center justify-between">
                    <div class="flex space-x-2.5 items-center">
                      <span class="item-ico">
                        <svg width="21" height="18" viewbox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1464 10.4394C16.8536 10.7323 16.8536 11.2072 17.1464 11.5001C17.4393 11.7929 17.9142 11.7929 18.2071 11.5001L19.5 10.2072C20.1834 9.52375 20.1834 8.41571 19.5 7.73229L18.2071 6.4394C17.9142 6.1465 17.4393 6.1465 17.1464 6.4394C16.8536 6.73229 16.8536 7.20716 17.1464 7.50006L17.8661 8.21973H11.75C11.3358 8.21973 11 8.55551 11 8.96973C11 9.38394 11.3358 9.71973 11.75 9.71973H17.8661L17.1464 10.4394Z" fill="#22C55E" class="path-2"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 17.75H12C14.6234 17.75 16.75 15.6234 16.75 13C16.75 12.5858 16.4142 12.25 16 12.25C15.5858 12.25 15.25 12.5858 15.25 13C15.25 14.7949 13.7949 16.25 12 16.25H8.21412C7.34758 17.1733 6.11614 17.75 4.75 17.75ZM8.21412 1.75H12C13.7949 1.75 15.25 3.20507 15.25 5C15.25 5.41421 15.5858 5.75 16 5.75C16.4142 5.75 16.75 5.41421 16.75 5C16.75 2.37665 14.6234 0.25 12 0.25H4.75C6.11614 0.25 7.34758 0.82673 8.21412 1.75Z" fill="#1A202C" class="path-1"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5C0 2.37665 2.12665 0.25 4.75 0.25C7.37335 0.25 9.5 2.37665 9.5 5V13C9.5 15.6234 7.37335 17.75 4.75 17.75C2.12665 17.75 0 15.6234 0 13V5Z" fill="#1A202C" class="path-1"></path>
                        </svg>
                      </span>
                      <span class="item-text text-lg font-medium leading-none">Logout</span>
                    </div>
                  </div>
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </aside>
  <div style="z-index: 25" class="aside-overlay block sm:hidden w-full h-full fixed left-0 top-0 bg-black bg-opacity-30"></div>
<aside class="sm:block hidden relative w-[96px] bg-white dark:bg-black">
  <div class="w-full sidebar-wrapper-collapse relative top-0 z-30">
    <div class="sidebar-header bg-white dark:bg-darkblack-600 dark:border-darkblack-500 sticky top-0 border-r border-b border-r-[#F7F7F7] border-b-[#F7F7F7] w-full h-[108px] flex items-center justify-center z-20">
      <a href="{{route('dashboard')}}">
        <img src="{{ !empty($settings->dark_icon) ? asset("/".$settings->dark_icon) : "assets/images/logo/logo-short.png" }}" class="dark:hidden block" alt="logo">
        <img src="{{ !empty($settings->light_icon) ? asset("/".$settings->light_icon) : "assets/images/logo/logo-short-white.png" }}" class="hidden dark:block" alt="logo">
      </a>
    </div>
    <div class="sidebar-body pt-[14px] w-full">
      <div class="flex flex-col items-center">
        <div class="nav-wrapper mb-[36px]">
          <div class="item-wrapper mb-5">
            <ul class="mt-2.5 flex justify-center items-center flex-col">
              <li class="item py-[11px] px-[43px]">
                <a href="{{route('dashboard')}}">
                  <span class="item-ico">
                    <svg width="18" height="21" viewbox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path class="path-1" d="M0 8.84719C0 7.99027 0.366443 7.17426 1.00691 6.60496L6.34255 1.86217C7.85809 0.515019 10.1419 0.515019 11.6575 1.86217L16.9931 6.60496C17.6336 7.17426 18 7.99027 18 8.84719V17C18 19.2091 16.2091 21 14 21H4C1.79086 21 0 19.2091 0 17V8.84719Z" fill="#1A202C"></path>
                      <path class="path-2" d="M5 17C5 14.7909 6.79086 13 9 13C11.2091 13 13 14.7909 13 17V21H5V17Z" fill="#22C55E"></path>
                    </svg>
                  </span>
                </a>
              </li>
              @canany(['create permission', 'view permission'])
                <li class="item py-[11px] px-[43px]">
                  <a href="javascript:void(0)">
                    <span class="item-ico">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.57666 3.61499C1.57666 2.51042 2.47209 1.61499 3.57666 1.61499H8.5C9.60456 1.61499 10.5 2.51042 10.5 3.61499V8.53833C10.5 9.64289 9.60456 10.5383 8.49999 10.5383H3.57666C2.47209 10.5383 1.57666 9.64289 1.57666 8.53832V3.61499Z" fill="#1A202C" class="path-1"></path>
                        <path d="M13.5 15.5383C13.5 14.4338 14.3954 13.5383 15.5 13.5383H20.4233C21.5279 13.5383 22.4233 14.4338 22.4233 15.5383V20.4617C22.4233 21.5662 21.5279 22.4617 20.4233 22.4617H15.5C14.3954 22.4617 13.5 21.5662 13.5 20.4617V15.5383Z" fill="#1A202C" class="path-1"></path>
                        <circle cx="6.03832" cy="18" r="4.46166" fill="#1A202C" class="path-1"></circle>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18 2C18.4142 2 18.75 2.33579 18.75 2.75V5.25H21.25C21.6642 5.25 22 5.58579 22 6C22 6.41421 21.6642 6.75 21.25 6.75H18.75V9.25C18.75 9.66421 18.4142 10 18 10C17.5858 10 17.25 9.66421 17.25 9.25V6.75H14.75C14.3358 6.75 14 6.41421 14 6C14 5.58579 14.3358 5.25 14.75 5.25H17.25V2.75C17.25 2.33579 17.5858 2 18 2Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                  </a>
                  <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                    @can('create permission')
                      <li>
                        <a href="{{ route('permissions.create') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-800">Add Permissions</a>
                      </li>
                    @endcan
                    @can('view permission')
                      <li>
                        <a href="{{ route('permissions.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-800">View Permissions</a>
                      </li>
                    @endcan
                  </ul>
                </li>
              @endcanany
              @canany(['create user', 'view user'])
                <li class="item py-[11px] px-[43px]">
                  <a href="javascript:void(0)">
                    <span class="item-ico">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="11.7778" cy="17.5555" rx="7.77778" ry="4.44444" class="path-1" fill="#1A202C"></ellipse>
                        <circle class="path-2" cx="11.7778" cy="6.44444" r="4.44444" fill="#22C55E"></circle>
                      </svg>
                    </span>
                  </a>
                  <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                    @can('create user')
                      <li>
                        <a href="{{ route('users.create') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-800">Add Users</a>
                      </li>
                    @endcan
                    @can('view user')
                      <li>
                        <a href="{{ route('users.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-800">View Users</a>
                      </li>
                    @endcan
                  </ul>
                </li>
              @endcanany
              @canany(['create role', 'view role'])
                <li class="item py-[11px] px-[43px]">
                  <a href="javascript:void(0)">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                  </a>
                  <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                    @can('create role')
                      <li>
                        <a href="{{ route('roles.create') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Create Role</a>
                      </li>
                    @endcan
                    @can('view role')
                      <li>
                        <a href="{{ route('roles.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">View Role</a>
                      </li>
                    @endcan
                  </ul>
                </li>
              @endcanany
              @can('update kyc') 
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                      <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                      <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li class="toggle-menu">
                    <a href="javascript:void(0)" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Kyc</a>
                  </li>
                </ul>
              </li>
              @endcan
              @canany(['view business kyc', 'verify business kyc'])
                <li class="item py-[11px] px-[43px]">
                  <a href="javascript:void(0)">
                    <span class="item-ico">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                        <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                        <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                    </span>
                  </a>
                  <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                    @can('create role')
                      <li>
                        <a href="{{ route('business_kyc.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">KYCs</a>
                      </li>
                    @endcan
                    
                  </ul>
                </li>
              @endcanany
              @canany(['admin banks']) 
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="18" height="20" viewbox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M18 16V6C18 3.79086 16.2091 2 14 2H4C1.79086 2 0 3.79086 0 6V16C0 18.2091 1.79086 20 4 20H14C16.2091 20 18 18.2091 18 16Z" fill="#1A202C" class="path-1"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 8C4.25 7.58579 4.58579 7.25 5 7.25H13C13.4142 7.25 13.75 7.58579 13.75 8C13.75 8.41421 13.4142 8.75 13 8.75H5C4.58579 8.75 4.25 8.41421 4.25 8Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H13C13.4142 11.25 13.75 11.5858 13.75 12C13.75 12.4142 13.4142 12.75 13 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 16C4.25 15.5858 4.58579 15.25 5 15.25H9C9.41421 15.25 9.75 15.5858 9.75 16C9.75 16.4142 9.41421 16.75 9 16.75H5C4.58579 16.75 4.25 16.4142 4.25 16Z" fill="#22C55E" class="path-2"></path>
                      <path d="M11 0H7C5.89543 0 5 0.895431 5 2C5 3.10457 5.89543 4 7 4H11C12.1046 4 13 3.10457 13 2C13 0.895431 12.1046 0 11 0Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{route('fund.view')}}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Admin Banks</a>
                  </li>
                </ul>
              </li>
              @endcanany
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="18" height="20" viewbox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M18 16V6C18 3.79086 16.2091 2 14 2H4C1.79086 2 0 3.79086 0 6V16C0 18.2091 1.79086 20 4 20H14C16.2091 20 18 18.2091 18 16Z" fill="#1A202C" class="path-1"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 8C4.25 7.58579 4.58579 7.25 5 7.25H13C13.4142 7.25 13.75 7.58579 13.75 8C13.75 8.41421 13.4142 8.75 13 8.75H5C4.58579 8.75 4.25 8.41421 4.25 8Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H13C13.4142 11.25 13.75 11.5858 13.75 12C13.75 12.4142 13.4142 12.75 13 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 16C4.25 15.5858 4.58579 15.25 5 15.25H9C9.41421 15.25 9.75 15.5858 9.75 16C9.75 16.4142 9.41421 16.75 9 16.75H5C4.58579 16.75 4.25 16.4142 4.25 16Z" fill="#22C55E" class="path-2"></path>
                      <path d="M11 0H7C5.89543 0 5 0.895431 5 2C5 3.10457 5.89543 4 7 4H11C12.1046 4 13 3.10457 13 2C13 0.895431 12.1046 0 11 0Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{route('fund.view')}}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Fund</a>
                  </li>
                </ul>
              </li>
              <!-- <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="18" height="20" viewbox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M18 16V6C18 3.79086 16.2091 2 14 2H4C1.79086 2 0 3.79086 0 6V16C0 18.2091 1.79086 20 4 20H14C16.2091 20 18 18.2091 18 16Z" fill="#1A202C" class="path-1"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 8C4.25 7.58579 4.58579 7.25 5 7.25H13C13.4142 7.25 13.75 7.58579 13.75 8C13.75 8.41421 13.4142 8.75 13 8.75H5C4.58579 8.75 4.25 8.41421 4.25 8Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 12C4.25 11.5858 4.58579 11.25 5 11.25H13C13.4142 11.25 13.75 11.5858 13.75 12C13.75 12.4142 13.4142 12.75 13 12.75H5C4.58579 12.75 4.25 12.4142 4.25 12Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25 16C4.25 15.5858 4.58579 15.25 5 15.25H9C9.41421 15.25 9.75 15.5858 9.75 16C9.75 16.4142 9.41421 16.75 9 16.75H5C4.58579 16.75 4.25 16.4142 4.25 16Z" fill="#22C55E" class="path-2"></path>
                      <path d="M11 0H7C5.89543 0 5 0.895431 5 2C5 3.10457 5.89543 4 7 4H11C12.1046 4 13 3.10457 13 2C13 0.895431 12.1046 0 11 0Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{route('linkedbanksRequests')}}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Linked Banks Request</a>
                  </li>
                </ul>
              </li> -->
              @canany(['create service category','view service category'])
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                      <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                        <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                        <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    @can('create service category')
                      <li>
                        <a href="{{ route('category.create') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Create Service Cat</a>
                      </li>
                    @endcan
                    @can('view service category')
                      <li>
                        <a href="{{ route('category.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">View Service Cat</a>
                      </li>
                    @endcan
                  </li>
                </ul>
              </li>
              @endcanany
              @canany(['create service', 'view service'])
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                      <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                        <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                        <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    @can('create service')
                      <li>
                        <a href="{{ route('service.create') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Create Service</a>
                      </li>
                    @endcan
                    @can('view service')
                      <li>
                        <a href="{{ route('service.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">View Service</a>
                      </li>
                    @endcan
                  </li>
                </ul>
              </li>
              @endcanany
              @canany(['add bank', 'view bank'])
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                      <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                      <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    @can('add bank')
                      <li>
                        <a href="{{ route('banks.create') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Add Bank</a>
                      </li>
                    @endcan
                    @can('view bank')
                      <li>
                        <a href="{{ route('banks.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">View Bank</a>
                      </li>
                    @endcan
                  </li>
                </ul>
              </li>
              @endcanany
              @canany(['payout', 'view payout'])
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                      <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                      <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    @can('payout')
                      <li>
                        <a href="{{ route('payout.create') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Payout</a>
                      </li>
                    @endcan
                    @can('view payout')
                      <li>
                        <a href="{{ route('payout.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">View Payout</a>
                      </li>
                    @endcan
                  </li>
                </ul>
              </li>
              @endcanany
              @canany(['payin', 'view payin'])
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                      <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                      <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                    @can('view payin')
                      <li>
                        <a href="{{ route('payin.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">View Payin</a>
                      </li>
                    @endcan
                </ul>
              </li>
              @endcanany
              @canany(['api setting'])
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z" fill="#1A202C" class="path-1"></path>
                      <path d="M14 9C12.8954 9 12 9.89543 12 11L12 13C12 14.1046 12.8954 15 14 15C15.1046 15 16 14.1046 16 13V11C16 9.89543 15.1046 9 14 9Z" fill="#22C55E" class="path-2"></path>
                      <path d="M6 5C4.89543 5 4 5.89543 4 7L4 13C4 14.1046 4.89543 15 6 15C7.10457 15 8 14.1046 8 13L8 7C8 5.89543 7.10457 5 6 5Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  @can('payout')
                    <li>
                      <a href="{{ route('tokens.index') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Callback & Token</a>
                    </li>
                  @endcan
                  @can('view payout')
                    <li>
                      <a href="https://www.postman.com/startpay-1840456/startpay/collection/dg4qxyz/startpay?action=share&creator=44591676" target="_blank" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">API Documentation</a>
                    </li>
                  @endcan
                </ul>
              </li>
              @endcanany
              @can('buy service list')
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                      <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                      <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{route('buy.service.list')}}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Buy Service</a>
                  </li>
                </ul>
              </li>
              @endcan
              @can('buy service list')
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                      <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                      <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{route('buy.service.list')}}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Buy Service</a>
                  </li>
                </ul>
              </li>
              @endcan
              @canany(['edit profile','update profile'])
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                      <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 2V11C5 12.1046 5.89543 13 7 13H18C19.1046 13 20 12.1046 20 11V2C20 0.895431 19.1046 0 18 0H7C5.89543 0 5 0.89543 5 2Z" fill="#1A202C" class="path-1"></path>
                        <path d="M0 15C0 13.8954 0.895431 13 2 13H2.17157C2.70201 13 3.21071 13.2107 3.58579 13.5858C4.36683 14.3668 5.63317 14.3668 6.41421 13.5858C6.78929 13.2107 7.29799 13 7.82843 13H8C9.10457 13 10 13.8954 10 15V16C10 17.1046 9.10457 18 8 18H2C0.89543 18 0 17.1046 0 16V15Z" fill="#22C55E" class="path-2"></path>
                        <path d="M7.5 9.5C7.5 10.8807 6.38071 12 5 12C3.61929 12 2.5 10.8807 2.5 9.5C2.5 8.11929 3.61929 7 5 7C6.38071 7 7.5 8.11929 7.5 9.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 4.5C8.25 4.08579 8.58579 3.75 9 3.75L16 3.75C16.4142 3.75 16.75 4.08579 16.75 4.5C16.75 4.91421 16.4142 5.25 16 5.25L9 5.25C8.58579 5.25 8.25 4.91421 8.25 4.5Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 8.5C11.25 8.08579 11.5858 7.75 12 7.75L16 7.75C16.4142 7.75 16.75 8.08579 16.75 8.5C16.75 8.91421 16.4142 9.25 16 9.25L12 9.25C11.5858 9.25 11.25 8.91421 11.25 8.5Z" fill="#22C55E" class="path-2"></path>
                      </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{route('user.profile.edit')}}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Profile</a>
                  </li>
                </ul>
              </li>
              @endcanany
              @can('view setting')
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.84849 0H7.15151C6.2143 0 5.45454 0.716345 5.45454 1.6C5.45454 2.61121 4.37259 3.25411 3.48444 2.77064L3.39424 2.72153C2.58258 2.27971 1.54473 2.54191 1.07612 3.30717L0.227636 4.69281C-0.240971 5.45808 0.0371217 6.43663 0.848773 6.87846C1.73734 7.36215 1.73734 8.63785 0.848771 9.12154C0.0371203 9.56337 -0.240972 10.5419 0.227635 11.3072L1.07612 12.6928C1.54473 13.4581 2.58258 13.7203 3.39424 13.2785L3.48444 13.2294C4.37259 12.7459 5.45454 13.3888 5.45454 14.4C5.45454 15.2837 6.2143 16 7.15151 16H8.84849C9.7857 16 10.5455 15.2837 10.5455 14.4C10.5455 13.3888 11.6274 12.7459 12.5156 13.2294L12.6058 13.2785C13.4174 13.7203 14.4553 13.4581 14.9239 12.6928L15.7724 11.3072C16.241 10.5419 15.9629 9.56336 15.1512 9.12153C14.2627 8.63784 14.2627 7.36216 15.1512 6.87847C15.9629 6.43664 16.241 5.45809 15.7724 4.69283L14.9239 3.30719C14.4553 2.54192 13.4174 2.27972 12.6058 2.72154L12.5156 2.77065C11.6274 3.25412 10.5455 2.61122 10.5455 1.6C10.5455 0.716344 9.7857 0 8.84849 0Z" fill="#1A202C" class="path-1"></path>
                      <path d="M11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{route('setting.view')}}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Settings</a>
                  </li>
                </ul>
              </li>
              @endcan
              @can('view setting')
              <li class="item py-[11px] px-[43px]">
                <a href="javascript:void(0)">
                  <span class="item-ico">
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.84849 0H7.15151C6.2143 0 5.45454 0.716345 5.45454 1.6C5.45454 2.61121 4.37259 3.25411 3.48444 2.77064L3.39424 2.72153C2.58258 2.27971 1.54473 2.54191 1.07612 3.30717L0.227636 4.69281C-0.240971 5.45808 0.0371217 6.43663 0.848773 6.87846C1.73734 7.36215 1.73734 8.63785 0.848771 9.12154C0.0371203 9.56337 -0.240972 10.5419 0.227635 11.3072L1.07612 12.6928C1.54473 13.4581 2.58258 13.7203 3.39424 13.2785L3.48444 13.2294C4.37259 12.7459 5.45454 13.3888 5.45454 14.4C5.45454 15.2837 6.2143 16 7.15151 16H8.84849C9.7857 16 10.5455 15.2837 10.5455 14.4C10.5455 13.3888 11.6274 12.7459 12.5156 13.2294L12.6058 13.2785C13.4174 13.7203 14.4553 13.4581 14.9239 12.6928L15.7724 11.3072C16.241 10.5419 15.9629 9.56336 15.1512 9.12153C14.2627 8.63784 14.2627 7.36216 15.1512 6.87847C15.9629 6.43664 16.241 5.45809 15.7724 4.69283L14.9239 3.30719C14.4553 2.54192 13.4174 2.27972 12.6058 2.72154L12.5156 2.77065C11.6274 3.25412 10.5455 2.61122 10.5455 1.6C10.5455 0.716344 9.7857 0 8.84849 0Z" fill="#1A202C" class="path-1"></path>
                      <path d="M11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8Z" fill="#22C55E" class="path-2"></path>
                    </svg>
                  </span>
                </a>
                <ul class="sub-menu border-l border-success-100 bg-white px-5 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li>
                    <a href="{{ route('kyc.business.category') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Business Category</a>
                  </li>
                  <li>
                    <a href="{{ route('kyc.business.sub.cat') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Business Sub Category</a>
                  </li>
                  <li>
                    <a href="{{ route('kyc.business-type') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Business Type</a>
                  </li>
                  <li>
                    <a href="{{ route('kyc.documents') }}" class="text-md font-medium text-bgray-600 py-1.5 inline-block hover:text-bgray-80">Documents</a>
                  </li>
                </ul>
              </li>
              @endcan
              <li class="item py-[11px] px-[43px]">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to log out?')">
                  @csrf
                  <button>
                    <span class="item-ico">
                      <svg width="21" height="18" viewbox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1464 10.4394C16.8536 10.7323 16.8536 11.2072 17.1464 11.5001C17.4393 11.7929 17.9142 11.7929 18.2071 11.5001L19.5 10.2072C20.1834 9.52375 20.1834 8.41571 19.5 7.73229L18.2071 6.4394C17.9142 6.1465 17.4393 6.1465 17.1464 6.4394C16.8536 6.73229 16.8536 7.20716 17.1464 7.50006L17.8661 8.21973H11.75C11.3358 8.21973 11 8.55551 11 8.96973C11 9.38394 11.3358 9.71973 11.75 9.71973H17.8661L17.1464 10.4394Z" fill="#22C55E" class="path-2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 17.75H12C14.6234 17.75 16.75 15.6234 16.75 13C16.75 12.5858 16.4142 12.25 16 12.25C15.5858 12.25 15.25 12.5858 15.25 13C15.25 14.7949 13.7949 16.25 12 16.25H8.21412C7.34758 17.1733 6.11614 17.75 4.75 17.75ZM8.21412 1.75H12C13.7949 1.75 15.25 3.20507 15.25 5C15.25 5.41421 15.5858 5.75 16 5.75C16.4142 5.75 16.75 5.41421 16.75 5C16.75 2.37665 14.6234 0.25 12 0.25H4.75C6.11614 0.25 7.34758 0.82673 8.21412 1.75Z" fill="#1A202C" class="path-1"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5C0 2.37665 2.12665 0.25 4.75 0.25C7.37335 0.25 9.5 2.37665 9.5 5V13C9.5 15.6234 7.37335 17.75 4.75 17.75C2.12665 17.75 0 15.6234 0 13V5Z" fill="#1A202C" class="path-1"></path>
                      </svg>
                    </span>
                  </button>
                </form>
              </li>
            </ul>
          </div>
          
        </div>
        <div class="upgrade-wrapper">
          <div class="w-10 flex justify-center items-center h-10 rounded-full bg-success-300 border border-white">
            <span>
              <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 12.75C14 11.7835 13.1046 11 12 11C10.8954 11 10 11.7835 10 12.75C10 13.7165 10.8954 14.5 12 14.5C13.1046 14.5 14 15.2835 14 16.25C14 17.2165 13.1046 18 12 18C10.8954 18 10 17.2165 10 16.25" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M12 9.5V11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12 18V19.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M5.63246 11.1026C6.44914 8.65258 8.74197 7 11.3246 7H12.6754C15.258 7 17.5509 8.65258 18.3675 11.1026L19.3675 14.1026C20.6626 17.9878 17.7708 22 13.6754 22H10.3246C6.22921 22 3.33739 17.9878 4.63246 14.1026L5.63246 11.1026Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"></path>
                <path d="M14.0859 7L9.91411 7L8.51303 5.39296C7.13959 3.81763 8.74185 1.46298 10.7471 2.10985L11.6748 2.40914C11.8861 2.47728 12.1139 2.47728 12.3252 2.40914L13.2529 2.10985C15.2582 1.46298 16.8604 3.81763 15.487 5.39296L14.0859 7Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>