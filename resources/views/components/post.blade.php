@props(['post'])
<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">

        <div class="flex space-x-3">
            @if ($post->user)
                <div class="avatar">
                    <div class="size-10 rounded-full bg-red-500">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($post->user->email) }}"
                            alt="Photo de {{ $post->user->name }}">
                    </div>
                </div>
            @else
                <div class="avatar">
                    <div class="size-10 rounded-full bg-red-500">
                        <img src="https://avatars.laravel.cloud/b1f745aa-ff21-4d64-872d-7ee05d3e7ee8?vibe=stealth"
                            alt="Photo de   Anonyme">
                    </div>
                </div>
            @endif

            <div class="grow">
                <div class="flex items-center justify-between">
                    {{-- left side --}}
                    <div class="flex items-center gap-1">

                        <div>{{ $post->user ? $post->user->name : 'Anonymous' }}</div>
                        <div class="text-sm text-gray-500">
                            {{ $post->created_at->diffForHumans() }}

                        </div>

                        @if ($post->updated_at->gt($post->created_at->addSeconds(5)))
                            <span class="text-sm text-base-content/60 italic">(Edited)</span>
                        @endif
                    </div>
                    {{-- right side --}}
                    @can('update', $post)
            
                    <div class="flex gap-1">
                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-ghost btn-xs">
                            edit</a>

                        <form method="POST" action="/posts/{{ $post->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('are you sure?')"
                                class="btn btn-ghost btn-xs text-error">Delete</button>
                        </form>


                    </div>
                    @endcan

                </div>
                <div class="mt-5">{{ $post->message }}</div>
            </div>
        </div>
    </div>
</div>
