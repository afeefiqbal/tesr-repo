<form id="filterForm" role="form" method="post" class="filterForm">
	    				{{csrf_field()}}
	<div class="mw_product_search">
		<input type="text" name="filter_param" id="filter_param" placeholder="Search Product" class="filter-btn" value="{{isset($filterParam)?$filterParam:''}}">
		<input type="hidden" name="category_id" id="category_id" value="{{isset($categoryId)?$categoryId:''}}">
		<input type="hidden" name="brand_id" id="brand_id" value="{{isset($explodeBrand)?implode(',',$explodeBrand):''}}">
		<button type="submit" class="text-filter-btn">
			<img src="{{asset('web/images/product_search_icon.svg')}}">
		</button>
	</div>
	<div class="row mw_product_row ">
		@foreach($products as $product)
			@include('web.render._single_product',['column'=>4])
		@endforeach
	</div>

</form>
