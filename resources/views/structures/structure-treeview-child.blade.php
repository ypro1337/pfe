<li>
    {{ $structure->name }}
    @if(count($structure->children))
        <ul>
            @foreach($structure->children as $child)
                @include('structures/structure-treeview-child', ['structure' => $child])
            @endforeach
        </ul>
    @endif
</li>
