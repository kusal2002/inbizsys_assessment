<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Suppliers') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-end gap-8 mb-8">

            <div class="flex flex-col gap-2 shrink-0 sm:flex-row ">
                <button
                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button">
                    Print List
                </button>
                <button
                    class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        stroke-width="2" class="w-4 h-4">
                        <path
                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                        </path>
                    </svg>
                    Add member
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

        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
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
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Supplier Email
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Supplier Phone
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
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
                        <tr class="hover:bg-slate-50 border-b border-slate-200">
                            <td class="p-4 py-5">
                                <p class="block font-semibold text-sm text-slate-800">{{ $supplier->id }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $supplier->name }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $supplier->email }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $supplier->phone }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $supplier->email }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <div class="flex gap-2">
                                    <button wire:click="edit({{ $supplier->id }})"
                                        class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-blue-600 transition-all hover:bg-blue-gray-900/10 active:bg-blue-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button">
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
                                    <button wire:click="delete({{ $supplier->id }})"
                                        onclick="return confirm('Are you sure?')"
                                        class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-red-600 transition-all hover:bg-red-900/10 active:bg-red-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button">
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

            <div class="flex justify-between items-center px-4 py-3">

                {{ $suppliers->links() }}
            </div>
        </div>

    </div>
</div>
