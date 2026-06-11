<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket List - Ticketing System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <div class="flex items-center gap-2.5">
            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                {{ strtoupper(substr(auth()->user()?->name ?? 'G', 0, 1)) }}
            </div>
            <div class="leading-tight">
                <p class="text-xs font-semibold text-slate-800">{{ auth()->user()?->name ?? auth()->user()?->email }}</p>
                <p class="text-[11px] text-slate-400">System Admin</p>
            </div>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">

        {{-- Sidebar --}}
        <aside class="flex w-52 shrink-0 flex-col border-r border-slate-200 bg-white px-3 py-4">
            <nav class="flex flex-col gap-0.5">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                    Triage Dashboard
                </a>
                <a href="{{ route('tickets.create') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Create Ticket
                </a>
                <a href="{{ route('ticketlist.index') }}" class="flex items-center gap-2.5 rounded-xl bg-blue-50 px-3 py-2.5 text-sm font-semibold text-blue-700">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/></svg>
                    Ticket List
                </a>
                <a href="{{ route('developer.workspace') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                    Developer Workspace
                </a>
            </nav>
            <div class="mt-auto border-t border-slate-100 pt-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-2.5 rounded-xl px-3 py-2.5 text-sm text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Content --}}
        <div class="flex-1 overflow-y-auto px-6 py-6">

            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Ticket List</h1>
                    <p class="mt-1 text-sm text-slate-500">All submitted tickets — edit or delete inline.</p>
                </div>
                <a href="{{ route('tickets.create') }}" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                    + New Ticket
                </a>
            </div>

            {{-- Flash --}}
            @if(session('success'))
                <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-400">
                            <th class="px-4 py-3">Ticket ID</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Issuer</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Priority</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($tickets as $ticket)

                            {{-- ── View row ── --}}
                            <tr id="row-{{ $ticket->id }}" class="align-top transition hover:bg-slate-50">
                                <td class="px-4 py-3 font-semibold text-blue-600">{{ $ticket->ticket_id }}</td>
                                <td class="px-4 py-3 font-medium text-slate-800">{{ $ticket->title }}</td>
                                <td class="max-w-xs px-4 py-3 text-slate-500"><span class="line-clamp-2">{{ $ticket->description }}</span></td>
                                <td class="px-4 py-3 text-slate-600">{{ $ticket->issuer?->name ?? $ticket->issuer?->email ?? '—' }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ \Carbon\Carbon::parse($ticket->date)->format('d M Y') }}</td>
                                <td class="px-4 py-3">
                                    @php $sc = match($ticket->status) { 'resolved' => 'bg-emerald-50 text-emerald-700', 'in-progress' => 'bg-blue-50 text-blue-700', default => 'bg-slate-100 text-slate-600' }; @endphp
                                    <span class="rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $sc }}">{{ ucfirst($ticket->status) }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    @php $pc = match($ticket->priority) { 'high' => 'bg-red-50 text-red-600', 'medium' => 'bg-amber-50 text-amber-700', default => 'bg-slate-100 text-slate-600' }; @endphp
                                    <span class="rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $pc }}">{{ ucfirst($ticket->priority) }}</span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button onclick="openEdit({{ $ticket->id }})"
                                                class="rounded-lg border border-slate-200 px-2.5 py-1 text-xs font-medium text-slate-600 transition hover:bg-slate-100">
                                            Edit
                                        </button>
                                        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST"
                                              onsubmit="return confirm('Delete this ticket?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="rounded-lg border border-red-200 px-2.5 py-1 text-xs font-medium text-red-500 transition hover:bg-red-50">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- ── Edit row (hidden by default) ── --}}
                            <tr id="edit-{{ $ticket->id }}" class="hidden bg-blue-50/40">
                                <td colspan="8" class="px-4 py-4">
                                    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-2 gap-3 md:grid-cols-3 xl:grid-cols-6">
                                            <div class="xl:col-span-2">
                                                <label class="mb-1 block text-xs font-medium text-slate-600">Title</label>
                                                <input name="title" type="text" value="{{ old('title', $ticket->title) }}"
                                                       class="w-full rounded-lg border border-slate-300 px-3 py-1.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                            </div>
                                            <div class="xl:col-span-2">
                                                <label class="mb-1 block text-xs font-medium text-slate-600">Description</label>
                                                <textarea name="description" rows="1"
                                                          class="w-full rounded-lg border border-slate-300 px-3 py-1.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $ticket->description) }}</textarea>
                                            </div>
                                            <div>
                                                <label class="mb-1 block text-xs font-medium text-slate-600">Date</label>
                                                <input name="date" type="date" value="{{ old('date', $ticket->date) }}"
                                                       class="w-full rounded-lg border border-slate-300 px-3 py-1.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <label class="mb-1 block text-xs font-medium text-slate-600">Status</label>
                                                <select name="status" class="w-full rounded-lg border border-slate-300 px-3 py-1.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                                    <option value="open" {{ $ticket->status === 'open' ? 'selected' : '' }}>Open</option>
                                                    <option value="in-progress" {{ $ticket->status === 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                                    <option value="resolved" {{ $ticket->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="mb-1 block text-xs font-medium text-slate-600">Priority</label>
                                                <select name="priority" class="w-full rounded-lg border border-slate-300 px-3 py-1.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                                    <option value="low" {{ $ticket->priority === 'low' ? 'selected' : '' }}>Low</option>
                                                    <option value="medium" {{ $ticket->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                                                    <option value="high" {{ $ticket->priority === 'high' ? 'selected' : '' }}>High</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3 flex items-center gap-2">
                                            <button type="submit"
                                                    class="rounded-lg bg-blue-600 px-4 py-1.5 text-xs font-semibold text-white transition hover:bg-blue-700">
                                                Save Changes
                                            </button>
                                            <button type="button" onclick="closeEdit({{ $ticket->id }})"
                                                    class="rounded-lg border border-slate-200 px-4 py-1.5 text-xs font-medium text-slate-600 transition hover:bg-slate-100">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-12 text-center text-sm text-slate-400">
                                    No tickets yet. <a href="{{ route('tickets.create') }}" class="text-blue-600 hover:underline">Create the first one.</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        function openEdit(id) {
            document.getElementById('row-' + id).classList.add('hidden');
            document.getElementById('edit-' + id).classList.remove('hidden');
        }
        function closeEdit(id) {
            document.getElementById('edit-' + id).classList.add('hidden');
            document.getElementById('row-' + id).classList.remove('hidden');
        }
    </script>

</body>
</html>
