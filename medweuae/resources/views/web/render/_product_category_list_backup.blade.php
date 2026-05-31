<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 mw_col_wrapper_left">
	<div class="mw_col_inner_wrapper">
		<div class="accordion" id="accordionExample">
			<div class="accordion" id="accordionPanelsStayOpenExample">
  				<div class="accordion-item">
    				<h2 class="accordion-header" id="panelsStayOpen-headingOne">
      					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        					CATEGORIES
      					</button>
    				</h2>
    				<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      					<div class="accordion-body">
        					<ul>
        						@foreach($categories as $categoryData)
              						<li class="filter-param" data-category_param="{{$categoryData->id}}">
              							{{$categoryData->title}}
              							@if($categoryData->products->isNotEmpty())
                    						<ul class="mw_dropdown_list">
                    							@foreach($categoryData->products as $child)
                      								<li>
                      									<a href="{{url('product/'.$child->short_url)}}" class="filter-param" data-category_param="{{$child->id}}">
                      									{{$child->title}}
                      									</a>
                      								</li>
                      							@endforeach
                    						</ul>
                						@endif
              						</li>
          						@endforeach
        					</ul>
      					</div>
    				</div>
  				</div>
  				@if($productBrands->isNotEmpty())
      				<div class="accordion-item">
        				<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
          					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
            					Brands
          					</button>
        				</h2>
        				<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
          					<div class="accordion-body">
          						@foreach($productBrands as $brand)
          							@php 
          								if(isset($explodeBrand)){
          									$checked = in_array($brand->id, $explodeBrand)?'checked':'';
          								}
          							@endphp
		                        	<label class="mw_checkbox_wrapper">	
		                        		{{$brand->title}}
		                          		<input type="checkbox" {{@$checked}} name="selected_brand_id" id="selected_brand_id_{{$brand->id}}" value="{{$brand->id}}" class="filter-brand-param">
		                          		<span class="checkmark"></span>
		                        	</label>
	                        	@endforeach
							</div>
        				</div>
      				</div>
      			@endif	
			</div>
		</div>
	</div>
	</div>