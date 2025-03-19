@if(session('passkeyReset'))
<div x-data="{ show: true }"
     x-show="show"
     x-init="setTimeout(() => show = false, 10000)"
     class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 m-4 max-w-sm w-full">
        <div class="flex flex-col items-center">
            <div class="mb-4">
                <div class="h-16 w-16 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center">
                    <i class="fas fa-key text-3xl text-yellow-500 dark:text-yellow-400"></i>
                </div>
            </div>
            <div class="text-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Passkey Reset Successfully!</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">A new passkey has been generated and sent to the voter's email.</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 w-full mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Reset Details:</p>
                <p class="text-sm text-gray-900 dark:text-gray-100">Name: {{ session('passkeyReset')['name'] }}</p>
                <p class="text-sm text-gray-900 dark:text-gray-100">Email: {{ session('passkeyReset')['email'] }}</p>
                <p class="font-mono text-sm bg-gray-100 dark:bg-gray-600 p-2 rounded mt-2">
                    New Passkey: {{ session('passkeyReset')['passkey'] }}
                </p>
            </div>
            <div class="flex justify-center">
                <button @click="show = false" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endif
