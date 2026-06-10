<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Workspace - Ticketing System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen flex-col overflow-hidden bg-slate-100 text-slate-900 antialiased">

    {{-- ── Topbar ───────────────────────────────────── --}}
    <header class="flex h-14 shrink-0 items-center justify-between border-b border-slate-200 bg-white px-6 shadow-sm">

        {{-- Brand --}}
        <div class="flex items-center gap-2.5">
            <div class="flex h-7 w-7 items-center justify-center rounded-md bg-blue-600 text-xs font-bold text-white">T</div>
            <span class="text-sm font-bold text-slate-800">Ticketing System</span>
        </div>

        {{-- Search --}}
        <div class="flex h-9 w-80 cursor-text items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 px-3 text-xs text-slate-400">
            <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803a7.5 7.5 0 0010.607 0z"/>
            </svg>
            Search tickets, IDs, or clients...
        </div>

        {{-- Right --}}
        <div class="flex items-center gap-4">
            <button class="relative p-1.5 text-slate-400 transition hover:text-slate-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                </svg>
                <span class="absolute right-1 top-1 h-1.5 w-1.5 rounded-full bg-red-500"></span>
            </button>
            <div class="flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                    {{ strtoupper(substr(auth()->user()?->name ?? 'A', 0, 1)) }}
                </div>
                <div class="leading-tight">
                    <p class="text-xs font-semibold text-slate-800">{{ auth()->user()?->name ?? 'Alex Triage' }}</p>
                    <p class="text-[11px] text-slate-400">System Admin</p>
                </div>
            </div>
        </div>
    </header>

    {{-- ── Body ─────────────────────────────────────── --}}
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
                <a href="{{ route('tickets.create') }}"
                   class="flex items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Create Ticket
                </a>
                <a href="{{ route('developer.workspace') }}"
                   class="flex items-center gap-2.5 rounded-xl bg-blue-50 px-3 py-2.5 text-sm font-semibold text-blue-700">
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

        {{-- Scrollable content area --}}
        <div class="flex flex-1 gap-4 overflow-y-auto px-5 py-4">

            {{-- ── Center column ─────────────────────── --}}
            <div class="flex min-w-0 flex-1 flex-col gap-3">

                {{-- Ticket meta + title --}}
                <div>
                    <div class="flex flex-wrap items-center gap-1.5 text-xs text-slate-400">
                        <span class="font-medium text-slate-500">TCK-2024-1023</span>
                        <span>•</span>
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Created Oct 24, 2023</span>
                        <span>•</span>
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                        </svg>
                        <span>Last updated: 2 hours ago</span>
                    </div>
                    <div class="mt-1.5 flex items-center justify-between gap-3">
                        <h1 class="text-lg font-bold leading-snug text-slate-900">
                            Email sync failing for Enterprise accounts
                        </h1>
                        <span class="shrink-0 rounded-full bg-blue-600 px-3 py-0.5 text-xs font-semibold text-white">
                            In Progress
                        </span>
                    </div>
                </div>

                {{-- ── Description card ───────────────── --}}
                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                    <div class="flex border-b border-slate-200 px-2 pt-0.5">
                        <button class="flex items-center gap-1.5 border-b-2 border-blue-600 px-3 py-2.5 text-xs font-medium text-blue-600">
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                            </svg>
                            Description
                        </button>
                        <button class="flex items-center gap-1.5 border-b-2 border-transparent px-3 py-2.5 text-xs font-medium text-slate-400 transition hover:text-slate-700">
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>
                            </svg>
                            Technical Analysis
                        </button>
                    </div>
                    <div class="p-4">
                        <h2 class="mb-2 text-xs font-semibold text-slate-800">Problem Summary</h2>
                        <p class="text-xs leading-relaxed text-slate-600">
                            Several Enterprise tier clients (Acme Corp, GlobalLogistics) are reporting that email
                            synchronization is failing specifically for their custom domains. Preliminary logs show a
                            handshake timeout during the TLS negotiation phase.
                        </p>
                        <ul class="mt-3 space-y-1.5">
                            <li class="flex items-start gap-2 text-xs text-slate-600">
                                <span class="mt-[5px] h-1 w-1 shrink-0 rounded-full bg-slate-400"></span>
                                Affects: SMTP and IMAP connections.
                            </li>
                            <li class="flex items-start gap-2 text-xs text-slate-600">
                                <span class="mt-[5px] h-1 w-1 shrink-0 rounded-full bg-slate-400"></span>
                                Priority: High (Impacts business-critical communication).
                            </li>
                            <li class="flex items-start gap-2 text-xs text-slate-600">
                                <span class="mt-[5px] h-1 w-1 shrink-0 rounded-full bg-slate-400"></span>
                                Environment: Production Cluster-C4.
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- ── Activity & Discussion card ──────── --}}
                <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                    <div class="flex items-center justify-between border-b border-slate-100 px-4 py-2.5">
                        <div class="flex items-center gap-1.5 text-xs font-semibold text-slate-800">
                            <svg class="h-3.5 w-3.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                            </svg>
                            Activity &amp; Discussion
                        </div>
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-500">4 Comments</span>
                    </div>

                    <div class="divide-y divide-slate-100">
                        {{-- Comment: Sarah --}}
                        <div class="flex gap-2.5 px-4 py-3">
                            <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-purple-100 text-[10px] font-bold text-purple-700">SJ</div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-baseline justify-between gap-2">
                                    <p class="text-xs font-semibold text-slate-800">
                                        Sarah Jenkins <span class="font-normal text-slate-400">(QA Lead)</span>
                                    </p>
                                    <span class="shrink-0 text-[11px] text-slate-400">3 hours ago</span>
                                </div>
                                <p class="mt-0.5 text-xs leading-relaxed text-slate-600">
                                    I've verified that this isn't affecting Sandbox accounts. Only production Enterprise clients are hitting this.
                                </p>
                            </div>
                        </div>

                        {{-- Comment: David --}}
                        <div class="flex gap-2.5 px-4 py-3">
                            <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-sky-100 text-[10px] font-bold text-sky-700">DC</div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-baseline justify-between gap-2">
                                    <p class="text-xs font-semibold text-slate-800">
                                        David Chen <span class="font-normal text-slate-400">(DevOps)</span>
                                    </p>
                                    <span class="shrink-0 text-[11px] text-slate-400">1 hour ago</span>
                                </div>
                                <p class="mt-0.5 text-xs leading-relaxed text-slate-600">
                                    Checking the SNI configurations now. It looks like the deployment script might have skipped the Enterprise CNAME records during the last maintenance window.
                                </p>
                            </div>
                        </div>

                        {{-- Comment: Alex --}}
                        <div class="flex gap-2.5 px-4 py-3">
                            <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 text-[10px] font-bold text-blue-700">AT</div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-baseline justify-between gap-2">
                                    <p class="text-xs font-semibold text-slate-800">
                                        Alex Triage <span class="font-normal text-slate-400">(System Admin)</span>
                                    </p>
                                    <span class="shrink-0 text-[11px] text-slate-400">45 mins ago</span>
                                </div>
                                <p class="mt-0.5 text-xs leading-relaxed text-slate-600">
                                    Note: Acme Corp is requesting an ETR. Please update as soon as the SNI hypothesis is confirmed.
                                </p>
                            </div>
                        </div>

                        {{-- Reply box --}}
                        <div class="flex gap-2.5 px-4 py-3">
                            <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px] font-bold text-slate-600">
                                {{ strtoupper(substr(auth()->user()?->name ?? 'U', 0, 1)) }}
                            </div>
                            <div class="flex flex-1 flex-col gap-1.5">
                                <textarea
                                    rows="2"
                                    placeholder="Add a technical note or update..."
                                    class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-900 placeholder:text-slate-400 transition focus:border-blue-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-blue-200"
                                ></textarea>
                                <div class="flex justify-end">
                                    <button class="rounded-xl bg-blue-600 px-3.5 py-1.5 text-xs font-semibold text-white transition hover:bg-blue-700">
                                        Post Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- /center --}}

            {{-- ── Right column ──────────────────────── --}}
            <div class="w-56 shrink-0 space-y-3">

                {{-- Actions card --}}
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                    <p class="mb-2 text-[10px] font-bold uppercase tracking-widest text-slate-400">Actions</p>
                    <div class="space-y-1.5">
                        <button class="flex w-full items-center gap-2 rounded-lg bg-blue-600 px-3 py-2 text-left transition hover:bg-blue-700 active:scale-[.98]">
                            <svg class="h-3.5 w-3.5 shrink-0 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <p class="text-xs font-semibold text-white">Mark as Solved</p>
                                <p class="text-[10px] text-blue-200">Resolves ticket &amp; notifies client</p>
                            </div>
                        </button>
                        <button class="flex w-full items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-left transition hover:bg-slate-50 active:scale-[.98]">
                            <svg class="h-3.5 w-3.5 shrink-0 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                            </svg>
                            <div>
                                <p class="text-xs font-medium text-slate-700">Mark as Pending</p>
                                <p class="text-[10px] text-slate-400">Waiting for external input</p>
                            </div>
                        </button>
                        <button class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-xs font-medium text-red-500 transition hover:bg-red-50">
                            <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                            </svg>
                            Escalate to Senior
                        </button>
                    </div>
                </div>

                {{-- Resource Hub card --}}
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                    <p class="mb-2 text-[10px] font-bold uppercase tracking-widest text-slate-400">Resource Hub</p>
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-2.5" style="border-left: 3px solid #f87171;">
                        <div class="mb-1.5 flex items-center justify-between">
                            <p class="text-[11px] font-semibold text-slate-700">Related Resolved Ticket</p>
                            <a href="#" class="flex items-center gap-0.5 text-[11px] font-medium text-blue-600 hover:underline">
                                <svg class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                                </svg>
                                View
                            </a>
                        </div>
                        <p class="text-[10px] text-slate-400">TCK-2024-0982</p>
                        <p class="mt-0.5 text-xs font-medium text-slate-800">IMAP authentication timeout on legacy servers</p>
                        <p class="mt-1.5 text-[11px] leading-relaxed text-slate-500">
                            <span class="font-semibold text-slate-600">Resolution Note:</span>
                            Adjusted socket timeout from 30s to 60s for specific IP ranges.
                        </p>
                    </div>
                </div>

                {{-- Assigned Developer card --}}
                <div class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                    <p class="mb-2 text-[10px] font-bold uppercase tracking-widest text-slate-400">Assigned Developer</p>
                    <div class="flex items-center gap-2">
                        <div class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-[10px] font-bold text-emerald-700">JS</div>
                        <div>
                            <p class="text-xs font-semibold text-slate-800">Jordan Smith</p>
                            <p class="text-[10px] text-slate-400">Lead Developer</p>
                        </div>
                    </div>
                    <div class="mt-3 grid grid-cols-2 gap-2 border-t border-slate-100 pt-3">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">SLA Timer</p>
                            <p class="mt-1 text-sm font-bold text-red-500">1h 12m left</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Tier</p>
                            <p class="mt-1 text-xs font-bold text-slate-800">Enterprise</p>
                        </div>
                    </div>
                    <a href="#" class="mt-3 flex items-center gap-1 text-[11px] text-slate-400 transition hover:text-slate-700 hover:underline">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                        Internal SOP for Sync Issues
                    </a>
                </div>

            </div>{{-- /right --}}

        </div>{{-- /content --}}

    </div>{{-- /body --}}

</body>
</html>
