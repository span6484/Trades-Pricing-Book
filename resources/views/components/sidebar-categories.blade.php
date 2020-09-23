<!-- THIS GOES IN THE sidebar.blade.php -->



    @foreach($categories $category)

    {{!! $category->category_name}}
        <li><a href="#" class="dropdown-item list-group-item list-group-item-action bg-light border-0 pl-4" value="{{ $category->pk_category_id }}">{{ $category->category_name }}</</a></li>
    @endforeach