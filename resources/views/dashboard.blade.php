<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ticketing System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <main class="mx-auto flex min-h-screen w-full max-w-6xl flex-col px-6 py-10">
        <header class="mb-8 flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div>
                <p class="text-sm uppercase tracking-[0.2em] text-blue-600">Ticketing System</p>
                <h1 class="mt-2 text-3xl font-semibold">Dashboard</h1>
                <p class="mt-2 text-slate-600">Welcome back, {{ auth()->user()?->name ?? auth()->user()?->email ?? 'Guest' }}.</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                    Logout
                </button>
            </form>
        </header>

        <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-semibold">Overview</h2>
                <p class="mt-2 text-slate-600">This is your new dashboard landing page after login.</p>
            </article>
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-semibold">Tickets</h2>
                <p class="mt-2 text-slate-600">Manage support requests and customer activity from here.</p>
            </article>
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-semibold">Reports</h2>
                <p class="mt-2 text-slate-600">Review daily operations and upcoming tasks from one place.</p>
            </article>
        </section>
    </main>
</body>
</html>
