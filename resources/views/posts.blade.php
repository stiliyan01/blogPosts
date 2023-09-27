<x-layout>


    @foreach ($posts as $post)
    <h1>
        <a href="post/{{$post->slug}}" class="{{$loop->even?'margin':''}}">{{$post->title}}</a>
    </h1>
    {{$post->excerpt}}
    @endforeach

<script src="./js/app.js"></script>
</x-layout>
