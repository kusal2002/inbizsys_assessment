<?php
use App\Models\Supplier;
$totalSuppliers = Supplier::count();
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <!-- Total Suppliers Card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Suppliers</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalSuppliers }}</p>
                                <p class="text-sm text-gray-500 mt-2">
                                    {{ Str::plural('supplier', $totalSuppliers) }} in your list
                                </p>
                            </div>
                            <div class="bg-blue-100 rounded-full p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-blue-600">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('suppliers.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-900 transition">
                            View All Suppliers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
