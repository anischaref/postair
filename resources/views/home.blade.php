<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    
    <div class="max-w-xl mx-auto">

        {{-- Form --}}
        
        <div class="card bg-base-100 shadow m-8">
            <div class="card-body">
                <form action="/posts" method="POST">
                    @csrf

                    <textarea name="message" placeholder="what's happening today?" rows="4" maxlength="255" 
                    {{-- required --}}
                    class="textarea  textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <div class="label">
                            <span class="label-text-alt text-error">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary btn-sm">post</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Feed --}}
        <div class="max-w-2xl mx-auto">
            @forelse($posts as $post)
            <x-post :post="$post"/>
            @empty
            <div class="text-gray-500">no posts yet.</div>
            @endforelse
        </div>


    </div>
</x-layout>