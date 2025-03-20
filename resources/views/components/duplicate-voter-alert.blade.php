@if(session('duplicateVoter'))
<div x-data="{ show: true }"
     x-show="show"
     x-init="setTimeout(() => show = false, 10000)"
     class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 m-4 max-w-sm w-full">
        <div class="flex flex-col items-center">
            <div class="mb-4">
                <div class="h-16 w-16 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-3xl text-red-500 dark:text-red-400"></i>
                </div>
            </div>
            <div class="text-center mb-4">
                <h3 class="text-lg font-semibold text-red-600 dark:text-red-400 mb-2">Duplicate Voter Detected!</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ session('duplicateVoter')['message'] }}</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 w-full mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Duplicate Details:</p>
                <p class="text-sm text-gray-900 dark:text-gray-100">Student Number: {{ session('duplicateVoter')['student_number'] }}</p>
                <p class="text-sm text-gray-900 dark:text-gray-100">Email: {{ session('duplicateVoter')['email'] }}</p>
            </div>
            <div class="flex justify-center">
                <button @click="show = false" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endif
