<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Suppliers') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-end gap-8 mb-8">

            <div class="flex flex-col gap-2 shrink-0 sm:flex-row ">
                <a href="{{ route('suppliers.print') }}" target="_blank"
                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Print List
                </a>
                <button wire:click="create"
                    class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        stroke-width="2" class="w-4 h-4">
                        <path
                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                        </path>
                    </svg>
                    Add Supplier
                </button>
            </div>
        </div>
        <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">Suppliers Details</h3>
                {{-- <p class="text-slate-500">Overview of the current activities.</p> --}}
            </div>
            <div class="ml-3">
                <div class="w-full max-w-sm min-w-[200px] relative">
                    <div class="relative">
                        <input type="text" wire:model.live="search"
                            class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                            placeholder="Search for invoice..." />
                        <button class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor" class="w-8 h-8 text-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border overflow-x-auto">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                ID
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Supplier Name
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50 hidden sm:table-cell">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Supplier Email
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50 hidden md:table-cell">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Supplier Phone
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50 hidden lg:table-cell">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Supplier Address
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Action
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr class="hover:bg-slate-50 border-b border-slate-200" wire:key="supplier-{{ $supplier->id }}">
                            <td class="p-4 py-5">
                                <p class="block font-semibold text-sm text-slate-800">{{ $supplier->id }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <div>
                                    <p class="text-sm text-slate-500 font-semibold">{{ $supplier->name }}</p>
                                    <p class="text-xs text-slate-400 sm:hidden">{{ $supplier->email }}</p>
                                </div>
                            </td>
                            <td class="p-4 py-5 hidden sm:table-cell">
                                <p class="text-sm text-slate-500">{{ $supplier->email }}</p>
                            </td>
                            <td class="p-4 py-5 hidden md:table-cell">
                                <p class="text-sm text-slate-500">{{ $supplier->phone }}</p>
                            </td>
                            <td class="p-4 py-5 hidden lg:table-cell">
                                <p class="text-sm text-slate-500">{{ $supplier->address }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <div class="flex gap-2">
                                    <button wire:click="edit({{ $supplier->id }})"
                                        class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-blue-600 transition-all hover:bg-blue-gray-900/10 active:bg-blue-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button" title="Edit">
                                        <span
                                            class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" aria-hidden="true" class="w-4 h-4">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                    <button onclick="showDeleteConfirmation({{ $supplier->id }})"
                                        class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-red-600 transition-all hover:bg-red-900/10 active:bg-red-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button" title="Delete">
                                        <span
                                            class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" aria-hidden="true" class="w-4 h-4">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478m-3.622-1.28h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zm0 0h.008v.003h-.008v-.003zM5.486 8.75a.75.75 0 10-1.5 0 .75.75 0 001.5 0z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd"
                                                    d="M8 9.75A2.75 2.75 0 015.25 7H4.25a2.75 2.75 0 00-2.75 2.75v11.5A2.75 2.75 0 001.5 24h21a2.75 2.75 0 002.75-2.75V9.75A2.75 2.75 0 0021.75 7h-1a2.75 2.75 0 00-2.75 2.75M7 9a.75.75 0 000-1.5H.75a.75.75 0 000 1.5H7zm13.06 3.03a.75.75 0 10-1.06-1.06L17.5 10.44v8.56a.75.75 0 001.5 0v-8.56l2.03 2.03z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="flex justify-end items-center px-4 py-3">

                <div class="flex space-x-1">
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>

        <!-- Modal -->
        @if ($showModal)
            <div class="fixed inset-0 z-50 flex items-center justify-center" wire:transition>
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/50" wire:click="resetForm()"></div>

            <!-- Modal Content -->
            <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full mx-4 z-10">
                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-blue-gray-900">
                        {{ $isEdit ? 'Edit Supplier' : 'New Supplier' }}
                    </h3>
                    <button wire:click="resetForm()" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="px-6 py-4 space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-blue-gray-900 mb-2">Supplier Name</label>
                        <input wire:model="name"
                            class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition"
                            placeholder="Enter supplier name" />
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-blue-gray-900 mb-2">Email</label>
                        <input wire:model="email" type="email"
                            class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition"
                            placeholder="Enter supplier email" />
                        @error('email')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-blue-gray-900 mb-2">Phone</label>
                        <input wire:model="phone"
                            type="tel"
                            inputmode="numeric"
                            pattern="[0-9\-\+\s]+"
                            maxlength="20"
                            class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition"
                            placeholder="Enter supplier phone" />
                        @error('phone')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-blue-gray-900 mb-2">Address</label>
                        <textarea wire:model="address"
                            class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition resize-none"
                            rows="3" placeholder="Enter supplier address"></textarea>
                        @error('address')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 border-t border-gray-200 flex gap-3 justify-end">
                    <button wire:click="resetForm()"
                        class="px-6 py-2 text-gray-900 border border-gray-900 rounded-lg hover:bg-gray-900/5 transition font-semibold">
                        Cancel
                    </button>
                    <button wire:click="save"
                        class="px-6 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition font-semibold">
                        {{ $isEdit ? 'Update Supplier' : 'Add Supplier' }}
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

@once
<style>
    .swal2-popup {
        border-radius: 12px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .swal2-title {
        color: #1f2937;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .swal2-html-container {
        color: #6b7280;
        font-size: 15px;
        margin-bottom: 24px;
    }

    .swal2-icon.swal2-warning {
        border-color: #fbbf24;
        color: #fbbf24;
    }

    .swal2-icon.swal2-success {
        border-color: #10b981;
        color: #10b981;
    }

    .swal2-actions {
        gap: 12px;
        margin-top: 24px;
    }

    .swal2-confirm {
        background-color: #dc2626 !important;
        color: white !important;
        border: none !important;
        padding: 10px 24px !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 14px !important;
        transition: all 0.2s !important;
    }

    .swal2-confirm:hover {
        background-color: #b91c1c !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 10px 15px -3px rgba(220, 38, 38, 0.2) !important;
    }

    .swal2-cancel {
        background-color: #fff !important;
        color: #1f2937 !important;
        border: 2px solid #1f2937 !important;
        padding: 8px 24px !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 14px !important;
        transition: all 0.2s !important;
    }

    .swal2-cancel:hover {
        background-color: #f3f4f6 !important;
        border-color: #111827 !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
    }
</style>

<script>
    function showDeleteConfirmation(supplierId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
            allowOutsideClick: false,
            allowEscapeKey: true,
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                // Call the Livewire delete method
                @this.call('delete', supplierId);

                Swal.fire({
                    title: "Deleted!",
                    text: "The supplier has been deleted successfully.",
                    icon: "success",
                    allowOutsideClick: false,
                    buttonsStyling: false,
                    confirmButtonText: "OK"
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Cancelled",
                    text: "Your supplier is safe :)",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "OK"
                });
            }
        });
    }
</script>
@endonce
