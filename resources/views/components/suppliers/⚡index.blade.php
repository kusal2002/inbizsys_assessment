<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Suppliers</h1>
        <div class="flex gap-4">
            <input type="text" wire:model.live="search"
                   class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Search suppliers...">

            <button wire:click="create"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Supplier
            </button>

            <a href="{{ route('suppliers.print') }}" target="_blank"
               class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium">
                Print List
            </a>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-xl overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Address</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($suppliers as $supplier)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $supplier->name }}</td>
                    <td class="px-6 py-4">{{ $supplier->email }}</td>
                    <td class="px-6 py-4">{{ $supplier->phone }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($supplier->address, 60) }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <button wire:click="edit({{ $supplier->id }})"
                                class="text-blue-600 hover:text-blue-900">Edit</button>
                        <button onclick="if(confirm('Delete this supplier?')) { @this.call('delete', {{ $supplier->id }}) }"
                                class="text-red-600 hover:text-red-900">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $suppliers->links() }}
    </div>
</div>

{{-- Modal --}}
<x-modal wire:model="showModal">  <!-- You'll need a simple modal component or use Alpine -->
    <!-- I'll provide the full modal code in the next message if you want -->
</x-modal>
