<x-app-layout>
    <main class="w-full xl:px-[48px] px-6 pb-6 xl:pb-[48px] sm:pt-[156px] pt-[100px] min-h-screen">
        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">
                <div class="w-full py-[20px] px-[24px] rounded-lg bg-white dark:bg-darkblack-600">
                    <div class="flex flex-col space-y-5">
                        <h4 class="text-lg font-bold text-bgray-900 dark:text-white">Service List</h4>

                        <div class="table-content w-full overflow-x-auto">
                            <table id="Service-table" style="width: 100%">
                                <thead>
                                    <tr class="border-b border-bgray-300 dark:border-darkblack-400">
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">#</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Category</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Name</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Price</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">image</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Description</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Status</span>
                                            <span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-base font-medium text-bgray-600 dark:text-bgray-50">Action</span>
                                            <span>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @push('scripts')
        <!-- Your other scripts -->
        <script src="{{ asset('/') }}assets/js/flatpickr.js"></script>
        <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script>
        <script>
            $(document).ready(function() {
                $('#Service-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('get.service') }}",
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'category.name', name: 'category.name' },
                        { data: 'name', name: 'name' },
                        { 
                            data: 'icon', 
                            name: 'icon',
                            orderable: false, 
                            searchable: false,
                            render: function(data, type, row) {
                                if (data) {
                                    return `<img src="${data}" alt="Service Image" width="50" height="50" style="border-radius: 5px;">`;
                                } else {
                                    return "No Image";
                                }
                            }
                        }, // ✅ **Comma added here**
                        { 
                            data: 'price', 
                            name: 'price',
                            render: function(data, type, row) {
                                return data ? `₹${parseFloat(data)}` : '₹0.00';
                            }
                        },
                        { data: 'description', name: 'description' },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row) {
                                // ✅ Set different classes for Active and Inactive
                                let ButtonClass = data === 'active' 
                                    ? 'rounded-md bg-success-50 px-4 py-1.5 text-xs font-semibold leading-[22px] text-success-400 dark:bg-darkblack-500'
                                    : 'rounded-md bg-[#FAEFEE] px-4 py-1.5 text-xs font-semibold text-[#FF4747] dark:bg-darkblack-500';
                                
                                let buttonText = data === 'active' ? 'Active' : 'Inactive';
                                
                                return `<button class="${ButtonClass}">
                                            ${buttonText}
                                        </button>`;
                            }
                        },

                        { 
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                let actionButtons = '';
            
                                @can('update service')
                                actionButtons += `<a href="/services/${row.id}/edit"
                                    class="rounded-md bg-[#FDF9E9] px-4 py-1.5 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-500">
                                    Edit
                                </a> `;
                                @endcan
            
                                return actionButtons;
                            }
                        }
                    ],
                    createdRow: function(row, data, dataIndex) {
                        $('td', row).each(function() {
                            $(this).addClass("font-medium text-base text-bgray-900 dark:text-bgray-50");
                        });
                    }
                });
            });
        </script>
            
        
    @endpush
</x-app-layout>