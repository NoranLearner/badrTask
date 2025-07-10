@foreach($categories as $category)

    <div class="my-4 {{ $category->isChild() ? 'ml-4' : null }}">

        <x-category :category="$category" />

    </div>


@endforeach
