<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suppliers List - Print</title>
    @vite(['resources/css/app.css'])

    <style>
        @page {
            margin: 20mm 15mm 25mm 15mm;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: #ffffff !important;
            }

            .print-footer {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                font-size: 0.75rem;
                color: #4b5563;
            }
        }

        .print-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.5rem;
            border-top: 1px solid #e5e7eb;
            margin-top: 1.5rem;
        }
    </style>
</head>

<body class="bg-white text-gray-900">
    <div class="max-w-5xl mx-auto py-6">
        <div class="flex items-center justify-between mb-6 no-print">
            <h1 class="text-2xl font-semibold">Suppliers List (Print Preview)</h1>
            <button onclick="window.print()"
                class="rounded-lg bg-gray-900 py-2 px-4 text-xs font-bold uppercase text-white shadow-sm hover:bg-gray-800 transition">
                Print
            </button>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Suppliers</h2>
            <p class="text-sm text-gray-500">Generated on {{ now()->format('Y-m-d H:i') }}</p>
        </div>

        <table class="w-full border-collapse text-sm">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-2 py-1 text-left">#</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Name</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Email</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Phone</th>
                    <th class="border border-gray-300 px-2 py-1 text-left">Address</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $index => $supplier)
                    <tr class="break-inside-avoid">
                        <td class="border border-gray-300 px-2 py-1">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $supplier->name }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $supplier->email }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $supplier->phone }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $supplier->address }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-2 py-4 text-center text-gray-500">No suppliers
                            available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="print-footer">
            <div>
                Page
                <span class="page-number">1</span>
            </div>
            <div>
                Logged in user: <span class="font-semibold">{{ $user?->name }}</span>
            </div>
        </div>
    </div>

    <script>
        // Best-effort page number update for some browsers supporting CSS counters
        document.addEventListener('DOMContentLoaded', function () {
            const footerPage = document.querySelector('.page-number');
            if (footerPage) {
                // Fallback: show 1 (browsers generally don't expose page count to JS)
                footerPage.textContent = '1';
            }
        });
    </script>
</body>

</html>
