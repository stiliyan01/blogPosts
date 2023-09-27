<x-layout>
<article>
    <h1>{{$post->title}}</h1>

    <p>{!!$post->body!!}</p>
</article>

<p><a href="/">Go back</a></p>
<x-button :disabled false>
    Click me!
</x-button>
</x-layout>
