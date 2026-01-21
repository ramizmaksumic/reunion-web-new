<div class="flex min-h-screen bg-gray-100">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-900 text-gray-100 p-6 space-y-6">
        <h1 class="text-xl font-bold">Reunion Admin</h1>

        <nav class="space-y-2 text-sm">
            <button wire:click="$dispatch('navigate', { section: 'dashboard' })" class="block w-full text-left cursor-pointer hover:text-white">
                Dashboard
            </button>

            <button wire:click="$dispatch('navigate', { section: 'categories' })" class="block w-full text-left cursor-pointer hover:text-white">
                Kategorije
            </button>

            <button wire:click="$dispatch('navigate', { section: 'projects' })" class="block w-full text-left cursor-pointer hover:text-white">
                Projekti
            </button>

            <button wire:click="$dispatch('navigate', { section: 'posts' })" class="block w-full text-left cursor-pointer hover:text-white">
                Postovi
            </button>

            <button wire:click="$dispatch('navigate', { section: 'tags' })" class="block w-full text-left cursor-pointer hover:text-white">
                Tagovi
            </button>

            <button wire:click="$dispatch('navigate', { section: 'documentation' })" class="block w-full text-left cursor-pointer hover:text-white">
                Dokumentacija
            </button>
        </nav>
        {{-- Logout --}}
        <div class="pt-6 border-t border-gray-700">
            <p class="text-xs text-gray-400 mb-3">
                Prijavljeni ste kao: <span class="text-gray-200 font-medium">{{ auth()->user()->email }}</span>
            </p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-gray-800 hover:bg-red-600 transition text-white py-2 px-4 rounded-xl text-sm font-semibold cursor-pointer">
                    Odjavi se
                </button>
            </form>
        </div>
    </aside>

    {{-- CONTENT --}}
    <main class="flex-1 p-8">

        @if($activeSection === 'dashboard')
        <livewire:admin.dashboard />
        @elseif($activeSection === 'categories')
        <livewire:admin.categories.index />
        @elseif($activeSection === 'projects')
        <livewire:admin.projects.index />
        @elseif($activeSection === 'posts')
        <livewire:admin.posts.index />
        @elseif($activeSection === 'tags')
        <livewire:admin.tags.index />
        @elseif($activeSection === 'documentation')
        <livewire:admin.documentation.index />
        @endif

    </main>

</div>