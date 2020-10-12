<div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
    <div class="nav-responsive">
        <div class="heading-part">
            <h2 class="main_title">Top category</h2>
        </div>
        <ul class="nav  main-navigation collapse in">
            @foreach (getCategories() as $cat)
            <li>
                <a href="{{ route('category.show', $cat->id) }}">{{ $cat->name }} ({{ $cat->products_count }})</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>