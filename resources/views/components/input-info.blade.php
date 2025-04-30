@props(['messages'])

@if ($messages)
    <div class="block rounded-md bg-[#FDF9E9] px-4 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">
        @foreach ((array) $messages as $message)
            <div class="flex flex-row py-3">
                <div class="flex h-[93] w-1 bg-warning-300 rounded-lg"></div>
                <div class="flex-1">
                    <p class="text-bgray-800 dark:text-white text-[#9AA2B1] pl-3 lg:text-base text-xs lg:leading-7">{{ $message }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif