<aside
    class="w-64 bg-slate-900 text-slate-100 min-h-screen hidden lg:flex flex-col
           transition-all duration-300 ease-in-out">

    {{-- BRAND --}}
    <div class="px-6 py-4 text-xl font-semibold border-b border-slate-700
                tracking-wide">
        {{ trans('panel.site_title') }}
    </div>

    {{-- NAV --}}
    <nav class="flex-1 px-3 py-4 space-y-1 text-sm">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.home') }}"
           class="group flex items-center gap-3 px-3 py-2 rounded transition
           {{ request()->routeIs('admin.home')
                ? 'bg-slate-800 text-white'
                : 'hover:bg-slate-800 hover:pl-4' }}">
            <i class="fas fa-tachometer-alt text-slate-400 group-hover:text-white transition"></i>
            {{ trans('global.dashboard') }}
        </a>

        {{-- USER MANAGEMENT --}}
        @can('user_management_access')
            <div x-data="{ open:
                {{ request()->is('admin/permissions*')
                || request()->is('admin/roles*')
                || request()->is('admin/users*')
                || request()->is('admin/audit-logs*') ? 'true' : 'false' }}
            }">

                <button @click="open = !open"
                        class="group w-full flex items-center justify-between px-3 py-2 rounded
                               hover:bg-slate-800 transition">
                    <span class="flex items-center gap-3">
                        <i class="fas fa-users text-slate-400 group-hover:text-white transition"></i>
                        {{ trans('cruds.userManagement.title') }}
                    </span>

                    <i class="fas fa-chevron-down text-xs transition-transform duration-300"
                       :class="open ? 'rotate-180' : ''"></i>
                </button>

                {{-- DROPDOWN --}}
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     class="ml-6 mt-1 space-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="block px-3 py-2 rounded transition
                           {{ request()->is('admin/permissions*')
                                ? 'bg-slate-800 text-white'
                                : 'hover:bg-slate-800 hover:pl-4' }}">
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="block px-3 py-2 rounded transition
                           {{ request()->is('admin/roles*')
                                ? 'bg-slate-800 text-white'
                                : 'hover:bg-slate-800 hover:pl-4' }}">
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="block px-3 py-2 rounded transition
                           {{ request()->is('admin/users*')
                                ? 'bg-slate-800 text-white'
                                : 'hover:bg-slate-800 hover:pl-4' }}">
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="block px-3 py-2 rounded transition
                           {{ request()->is('admin/audit-logs*')
                                ? 'bg-slate-800 text-white'
                                : 'hover:bg-slate-800 hover:pl-4' }}">
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        {{-- CONTENT MANAGEMENT --}}
@canany(['post_access','category_access','tag_access','comment_access','like_access','bookmark_access','live_access'])
<div x-data="{ open:
    {{ request()->is('admin/posts*','admin/categories*','admin/tags*','admin/comments*','admin/likes*','admin/bookmarks*','admin/live*')
    ? 'true' : 'false' }}
}">

    <button @click="open = !open"
            class="group w-full flex items-center justify-between px-3 py-2 rounded
                   hover:bg-slate-800 transition">
        <span class="flex items-center gap-3">
            <i class="fas fa-newspaper text-slate-400 group-hover:text-white transition"></i>
            Content Management
        </span>

        <i class="fas fa-chevron-down text-xs transition-transform duration-300"
           :class="open ? 'rotate-180' : ''"></i>
    </button>

    <div x-show="open" class="ml-6 mt-1 space-y-1">

        {{-- POSTS --}}
        @can('post_access')
        <a href="{{ route('admin.posts.index') }}"
           class="block px-3 py-2 rounded transition
           {{ request()->is('admin/posts*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:pl-4' }}">
            <i class="fas fa-file-alt mr-2"></i> Posts
        </a>
        @endcan

        {{-- CATEGORIES --}}
        @can('category_access')
        <a href="{{ route('admin.categories.index') }}"
           class="block px-3 py-2 rounded transition
           {{ request()->is('admin/categories*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:pl-4' }}">
            <i class="fas fa-list mr-2"></i> Categories
        </a>
        @endcan

        {{-- TAGS --}}
        @can('tag_access')
        <a href="{{ route('admin.tags.index') }}"
           class="block px-3 py-2 rounded transition
           {{ request()->is('admin/tags*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:pl-4' }}">
            <i class="fas fa-tags mr-2"></i> Tags
        </a>
        @endcan

        {{-- COMMENTS --}}
        @can('comment_access')
        <a href="{{ route('admin.comments.index') }}"
           class="block px-3 py-2 rounded transition
           {{ request()->is('admin/comments*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:pl-4' }}">
            <i class="fas fa-comments mr-2"></i> Comments
        </a>
        @endcan

        {{-- LIKES --}}
        @can('like_access')
        <a href="{{ route('admin.likes.index') }}"
           class="block px-3 py-2 rounded transition
           {{ request()->is('admin/likes*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:pl-4' }}">
            <i class="fas fa-heart mr-2"></i> Likes
        </a>
        @endcan

        {{-- BOOKMARKS 🔥 --}}
        @can('bookmark_access')
        <a href="{{ route('admin.bookmarks.index') }}"
           class="block px-3 py-2 rounded transition
           {{ request()->is('admin/bookmarks*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:pl-4' }}">
            <i class="fas fa-bookmark mr-2"></i> Bookmarks
        </a>
        @endcan

        {{-- LIVE STREAM 🔥 --}}
@can('live_access')
<a href="{{ route('admin.live.index') }}"
   class="block px-3 py-2 rounded transition
   {{ request()->is('admin/live*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:pl-4' }}">
    <i class="fas fa-video mr-2"></i> Live Stream
</a>
@endcan

    </div>
</div>
@endcanany

        {{-- CHANGE PASSWORD --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   class="group flex items-center gap-3 px-3 py-2 rounded transition
                   {{ request()->is('profile/password*')
                        ? 'bg-slate-800 text-white'
                        : 'hover:bg-slate-800 hover:pl-4' }}">
                    <i class="fas fa-key text-slate-400 group-hover:text-white transition"></i>
                    {{ trans('global.change_password') }}
                </a>
            @endcan
        @endif

    </nav>

    {{-- LOGOUT --}}
    <div class="border-t border-slate-700 p-3">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           class="group flex items-center gap-3 px-3 py-2 rounded transition
                  hover:bg-red-600 hover:text-white">
            <i class="fas fa-sign-out-alt transition group-hover:translate-x-1"></i>
            {{ trans('global.logout') }}  ddf
        </a>
    </div>

</aside>
