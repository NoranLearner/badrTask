<div class="">

    @if ($category->isChild())
        {{-- <span class="material-icons">get_app</span> --}}
        {{-- <span class="material-icons">switch_access_shortcut</span> --}}
        <span class="material-icons">subdirectory_arrow_right</span>
    @endif

    <div class="bg-light bg-gradient font-weight-bolder text-center text-capitalize rounded shadow py-4">

        {{$category->name}}

    </div>

</div>

<x-categories :categories="$category->children" />
