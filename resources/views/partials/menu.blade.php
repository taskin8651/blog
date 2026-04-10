<aside class="w-64 bg-slate-900 text-slate-100 min-h-screen hidden lg:flex flex-col">

    {{-- BRAND --}}
    <div class="px-6 py-4 text-xl font-semibold border-b border-slate-700">
        {{ trans('panel.site_title') }}
    </div>

    {{-- NAV --}}
    <nav class="flex-1 px-3 py-4 space-y-1 text-sm">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.home') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded
           {{ request()->routeIs('admin.home') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
        </a>

        {{-- USER MANAGEMENT --}}
        @can('user_management_access')
        <a href="{{ route('admin.users.index') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded
           {{ request()->is('admin/users*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
            <i class="fas fa-users"></i>
            Users
        </a>
        @endcan

        {{-- CONTENT MANAGEMENT (ONLY 3 ITEMS) --}}
        @canany(['post_access','category_access','tag_access'])
        <div x-data="{ open: true }">

            <button @click="open = !open"
                    class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-slate-800">
                <span class="flex items-center gap-3">
                    <i class="fas fa-newspaper"></i>
                    Content Management
                </span>
                <i class="fas fa-chevron-down text-xs" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" class="ml-6 mt-1 space-y-1">

                {{-- POSTS --}}
                @can('post_access')
                <a href="{{ route('admin.posts.index') }}"
                   class="block px-3 py-2 rounded
                   {{ request()->is('admin/posts*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
                    Posts
                </a>
                @endcan

                {{-- CATEGORIES --}}
                @can('category_access')
                <a href="{{ route('admin.categories.index') }}"
                   class="block px-3 py-2 rounded
                   {{ request()->is('admin/categories*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
                    Categories
                </a>
                @endcan

                {{-- TAGS --}}
                @can('tag_access')
                <a href="{{ route('admin.tags.index') }}"
                   class="block px-3 py-2 rounded
                   {{ request()->is('admin/tags*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
                    Tags
                </a>
                @endcan

            </div>
        </div>
        @endcanany

        {{-- COMMENTS --}}
        @can('comment_access')
        <a href="{{ route('admin.comments.index') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded hover:bg-slate-800">
            <i class="fas fa-comments"></i>
            Comments
        </a>
        @endcan

        {{-- LIKES --}}
        @can('like_access')
        <a href="{{ route('admin.likes.index') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded hover:bg-slate-800">
            <i class="fas fa-heart"></i>
            Likes
        </a>
        @endcan

        {{-- BOOKMARKS --}}
        @can('bookmark_access')
        <a href="{{ route('admin.bookmarks.index') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded hover:bg-slate-800">
            <i class="fas fa-bookmark"></i>
            Bookmarks
        </a>
        @endcan

        {{-- LIVE STREAM --}}
        @can('live_access')
        <a href="{{ route('admin.live.index') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded hover:bg-slate-800">
            <i class="fas fa-video"></i>
            Live Stream
        </a>
        @endcan

        {{-- CHANGE PASSWORD --}}
        @can('profile_password_edit')
        <a href="{{ route('profile.password.edit') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded hover:bg-slate-800">
            <i class="fas fa-key"></i>
            Change Password
        </a>
        @endcan

    </nav>

    {{-- LOGOUT --}}
    <div class="border-t border-slate-700 p-3">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           class="flex items-center gap-3 px-3 py-2 rounded hover:bg-red-600">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>

</aside>