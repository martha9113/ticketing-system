<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint - Ticketing System</title>
    @vite(['resources/css/app.css', 
    'resources/js/app.js'])
</head>
<body class="flex h-screen flex-col overflow-hidden bg-slate-100 text-slate-900 antialiased">

    {{-- Topbar --}}
    <header class="flex h-14 shrink-0 items-center justify-between border-b border-slate-200 bg-white px-6 shadow-sm">
        <div class="flex items-center gap-2.5">
            <div class="flex h-7 w-7 items-center justify-center rounded-md bg-blue-600 text-xs font-bold text-white">T</div>
            <span class="text-sm font-bold text-slate-800">Ticketing System</span>
        </div>
        <div class="flex h-9 w-80 cursor-text items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 px-3 text-xs text-slate-400">
            <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803a7.5 7.5 0 0010.607 0z"/>
            </svg>
            Search tickets, IDs, or clients...
        </div>
        <div class="flex items-center gap-4">
            <button class="relative p-1.5 text-slate-400 transition hover:text-slate-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                </svg>
                <span class="absolute right-1 top-1 h-1.5 w-1.5 rounded-full bg-red-500"></span>
            </button>
            <div class="flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                    {{ strtoupper(substr(auth()->user()?->name ?? auth()->user()?->email ?? 'G', 0, 1)) }}
                </div>
                <div class="leading-tight">
                    <p class="text-xs font-semibold text-slate-800">{{ auth()->user()?->name ?? auth()->user()?->email ?? 'Guest' }}</p>
                    <p class="text-[11px] text-slate-400">System Admin</p>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">

        {{-- Sidebar --}}
        <aside class="flex w-52 shrink-0 flex-col border-r border-slate-200 bg-white px-3 py-4">
            <nav class="flex flex-col gap-0.5">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                    </svg>
                    Triage Dashboard
                </a>
                <a href="{{ route('submit.complaint') }}"
                   class="flex items-center gap-2.5 rounded-xl bg-blue-50 px-3 py-2.5 text-sm font-semibold text-blue-700">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Submit Complaint
                </a>
                <a href="{{ route('developer.workspace') }}"
                   class="flex items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>
                    </svg>
                    Developer Workspace
                </a>
            </nav>

            <div class="mt-auto border-t border-slate-100 pt-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main content --}}
        <div class="flex-1 overflow-y-auto px-6 py-6">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-slate-900">Submit Complaint</h1>
                <p class="mt-1 text-sm text-slate-500">Create a new customer complaint and send it for triage.</p>
            </div>

            <div class="complaint-card">
                <form class="complaint-form">
                    <div>
                        <label class="complaint-field-label">Ticket ID</label>
                        <input type="text" class="complaint-input" placeholder="Auto-generated or custom ticket ID">
                    </div>

                    <div>
                        <label class="complaint-field-label">Title</label>
                        <input type="text" class="complaint-input" placeholder="Enter ticket title">
                    </div>

                    <div>
                        <label class="complaint-field-label">Description</label>
                        <textarea rows="6" class="complaint-textarea" placeholder="Describe the complaint in detail..."></textarea>
                    </div>

                    <div>
                        <label class="complaint-field-label">Name</label>
                        <input type="text" class="complaint-input" placeholder="Enter your full name">
                    </div>

                    <div>
                        <label class="complaint-field-label">Email</label>
                        <input type="email" class="complaint-input" placeholder="Enter your email address">
                    </div>

                    <div>
                        <label class="complaint-field-label">Date</label>
                        <input type="date" class="complaint-input">
                    </div>

                    <div>
                        <label class="complaint-field-label">Status</label>
                        <select class="complaint-select">
                            <option value="open">Open</option>
                            <option value="resolved">Resolved</option>
                            <option value="reopen">Reopen</option>
                        </select>
                    </div>

                    <div>
                        <label class="complaint-field-label">Priority</label>
                        <select class="complaint-select">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div>
                        <label class="complaint-field-label">Assigned To</label>
                        <input type="text" class="complaint-input" placeholder="Developer or team name">
                    </div>
                    <div class="complaint-actions">
                        <button type="button" class="complaint-button-secondary">Cancel</button>
                        <button type="submit" class="complaint-button-primary">Submit Complaint</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
