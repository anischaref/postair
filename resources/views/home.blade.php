<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    
    <div class="max-w-xl mx-auto">

        @foreach($posts as $post)

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">

                <div>{{ $post ['author'] }}</div>
                <div>{{ $post ['message'] }}</div>
                <div>{{$post ['time']}}</div>
            </div>
        </div>

        @endforeach


    </div>
</x-layout>