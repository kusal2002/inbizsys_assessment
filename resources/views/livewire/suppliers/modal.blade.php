<div class="fixed inset-0 z-50 items-center justify-center hidden"
     x-data="{ open: false }"
     @show-modal.window="open = true"
     @hide-modal.window="open = false"
     x-show="open"
     x-transition>

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/50" @click="open = false"></div>

    <!-- Modal -->
    <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full mx-4 z-10">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h3 class="text-xl font-semibold text-blue-gray-900">
                @if(@$__livewire['isEdit'])
                    Edit Supplier
                @else
                    New Supplier
                @endif
            </h3>
            <button @click="open = false" wire:click="@parent.resetForm(); $dispatch('hide-modal')" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
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
                <input wire:model.defer="name"
                    class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition"
                    placeholder="Enter supplier name" />
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-gray-900 mb-2">Email</label>
                <input wire:model.defer="email" type="email"
                    class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition"
                    placeholder="Enter supplier email" />
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-gray-900 mb-2">Phone</label>
                <input wire:model.defer="phone"
                    class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition"
                    placeholder="Enter supplier phone" />
                @error('phone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-gray-900 mb-2">Address</label>
                <textarea wire:model.defer="address"
                    class="w-full px-4 py-2 border border-blue-gray-200 rounded-lg focus:border-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900/10 transition resize-none"
                    rows="3" placeholder="Enter supplier address"></textarea>
                @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 border-t border-gray-200 flex gap-3 justify-end">
            <button @click="open = false" wire:click="@parent.resetForm(); $dispatch('hide-modal')"
                class="px-6 py-2 text-gray-900 border border-gray-900 rounded-lg hover:bg-gray-900/5 transition font-semibold">
                Cancel
            </button>
            <button wire:click="@parent.save"
                class="px-6 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition font-semibold">
                @if(@$__livewire['isEdit'])
                    Update Supplier
                @else
                    Add Supplier
                @endif
            </button>
        </div>
    </div>
</div>
