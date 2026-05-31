<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 mw_col_wrapper_left">
    <div class="mw_col_inner_wrapper">
        <!-- Custom Toggle Button -->
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="customOuterHeading">
                    <button id="categoryToggleBtn" class="accordion-button collapsed" type="button">
                        CATEGORIES
                    </button>
                </h2>
                <div id="customOuterCollapse" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <!-- INNER ACCORDION START -->
                        <div class="accordion accordion-flush mw_product_accodian_inner_list" id="accordionFlushExampleInner">
                            @foreach($categories as $category)
                                <div class="accordion-item filter-param" data-category_param="{{ $category->id }}">
                                    <h2 class="accordion-header" id="flush-headingOneInner{{ $category->id }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOneInner{{ $category->id }}"
                                            aria-expanded="false"
                                            aria-controls="flush-collapseOneInner{{ $category->id }}">
                                            {{ $category->title }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOneInner{{ $category->id }}"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOneInner{{ $category->id }}"
                                        data-bs-parent="#accordionFlushExampleInner">
                                        <div class="accordion-body">
                                            @if($category->products->isNotEmpty())
                                                <ul class="mw_dropdown_list">
                                                    @foreach($category->products as $child)
                                                        <li>
                                                            <a href="{{ url('product/'.$child->short_url) }}" class="filter-param" data-category_param="{{ $child->id }}">
                                                                {{ $child->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- INNER ACCORDION END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
