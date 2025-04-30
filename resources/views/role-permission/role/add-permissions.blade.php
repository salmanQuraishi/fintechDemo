<x-app-layout>

    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <!-- write your code here-->
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <!--list table-->
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Role : {{ $role->name }}</h4>

                        <form action="{{ route('roles.givePermissionToRole',$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                
                                <x-input-error :messages="$errors->get('permission')" class="mt-2" />

                                <div class="grid lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-3 lg:gap-4 xl:gap-6">
                                    
                                    
                                    @foreach ($permissions as $permission)
                                    
                                    <div class="col-md-2">
                                        <label class="font-medium text-base text-bgray-700 dark:text-bgray-50">
                                            <input
                                                type="checkbox"
                                                name="permission[]"
                                                value="{{ $permission->name }}"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                            class="w-5 h-5 dark:bg-darkblack-500 focus:ring-transparent rounded-full border border-bgray-300 focus:accent-success-300 text-success-300"/>
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                    
                                </div>

                            </div>
                            <div class="flex justify-start">
                                <button class="rounded-lg bg-success-300 text-white font-semibold mt-10 py-3.5 px-4">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>


        




        <!-- write your code here-->
    </main>

    @push('scripts')
        <!--scripts -->
        <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
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

        <script src="{{ asset('/') }}assets/js/main.js"></script>
    @endpush

</x-app-layout>