@if (Session::has('success'))
    <div id="success-message" class="pt-3 flex items-center justify-center">
        <div class="bg-blue-900 text-blue-200 px-6 py-4 rounded-lg shadow-md flex items-center space-x-2 w-full max-w-md border border-blue-500">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>{{ Session::get('success') }}</span>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div id="error-message" class="pt-3 flex items-center justify-center">
        <div class="bg-red-900 text-red-200 px-6 py-4 rounded-lg shadow-md flex items-center space-x-2 w-full max-w-md border border-red-500">
            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>{{ Session::get('error') }}</span>
        </div>
    </div>
@endif

@if ($errors->any())
    <div id="error-message" class="pt-3 flex items-center justify-center">
        <div class="bg-red-900 text-red-200 px-6 py-4 rounded-lg shadow-md flex items-start space-x-2 w-full max-w-md border border-red-500">
            <svg class="w-5 h-5 text-red-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <ul class="pl-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<script>
    setTimeout(() => {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');
        if (successMessage) {
            successMessage.style.transition = 'opacity 1s ease';
            successMessage.style.opacity = '0';
            setTimeout(() => successMessage.style.display = 'none', 1000);
        }
        if (errorMessage) {
            errorMessage.style.transition = 'opacity 1s ease';
            errorMessage.style.opacity = '0';
            setTimeout(() => errorMessage.style.display = 'none', 1000);
        }
    }, 3000); 
</script>

<style>
    .bg-blue-900 {
        background-color: #0a0a0a;
    }
    .text-blue-200 {
        color: #66e0ff;
    }
    .border-blue-500 {
        border-color: #00d9ff;
    }
    .text-blue-400 {
        color: #00d9ff;
    }

    .bg-red-900 {
        background-color: #330000;
    }
    .text-red-200 {
        color: #ffb3b3;
    }
    .border-red-500 {
        border-color: #ff4d4d;
    }
    .text-red-400 {
        color: #ff8080;
    }

    #success-message, #error-message {
        opacity: 1;
        transition: opacity 1s ease;
    }
</style>
