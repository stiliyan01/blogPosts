<button {{ $attributes->merge(['class' => 'bg-blue-500 text-white',
'id'=>"stelio",
""]) }}>
    {{ $slot }}
</button>
