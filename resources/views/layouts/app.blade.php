<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'School Management') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|poppins:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Dark Mode Initialization -->
    <script>
        // Initialize dark mode before page renders to prevent flash
        if (localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body
    class="min-h-screen bg-slate-50 dark:bg-slate-900 font-[Inter] text-slate-900 dark:text-slate-100 antialiased transition-colors duration-200"
    x-data="{
        sidebarOpen: false,
        sidebarExpanded: localStorage.getItem('sidebarExpanded') !== 'false',
        darkMode: localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)
    }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebarExpanded', value));
    $watch('darkMode', value => {
        localStorage.setItem('darkMode', value);
        if (value) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });">
    <div class="min-h-screen flex">
        <x-layout.sidebar />

        <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out"
            :class="sidebarExpanded ? 'lg:ml-64' : 'lg:ml-20'">
            <x-layout.topbar />

            <main class="flex-1 px-6 py-8">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Toast Container (managed by toast.js) -->
    <div id="toast-container"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    @stack('scripts')
    @stack('modals')
</body>

</html>
