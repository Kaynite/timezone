<div class="filter left-sidebar-widget mb_50">
    <div class="heading-part mtb_20 ">
        <h2 class="main_title">Refine Search</h2>
    </div>
    <div class="filter-block">
        <form id="shop-search-form">
            <p>
                <label for="amount">Price range:</label>
                <input type="text" name="amount" id="amount" readonly="">
                <input type="hidden" id="amount-min" name="amount_min" value="">
                <input type="hidden" id="amount-max" name="amount_max" value="">
            </p>
            <div id="slider-range" class="mtb_20 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"></div>
            <div class="list-group">
                @if ($colors->count() > 0)
                <div class="list-group-item mb_10">
                    <label>Color</label>
                    <div id="filter-group1">
                        @foreach ($colors as $color)
                        <div class="checkbox">
                            <label><input name="colors[]" value="{{ $color->id }}" type="checkbox"> {{ $color->name }} ({{ $color->products_count }})</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="list-group-item mb_10">
                    <label>Size</label>
                    <div id="filter-group3">
                        <div class="checkbox">
                            <label><input value="" type="checkbox"> Big (3)</label>
                        </div>
                        <div class="checkbox">
                            <label><input value="" type="checkbox"> Medium (2)</label>
                        </div>
                        <div class="checkbox">
                            <label><input value="" type="checkbox"> Small (1)</label>
                        </div>
                    </div>
                </div>
                <button type="button" id="search-btn" class="btn">Refine Search</button>
            </div>
        </form>
    </div>
</div>