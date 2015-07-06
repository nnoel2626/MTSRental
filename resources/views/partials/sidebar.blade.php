					<div class="left-sidebar">
						<h2>Category</h2>
						<div id="accordian" class="panel-group category-equipments"><!--category-equipmentsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#sportswear" data-parent="#accordian" data-toggle="collapse">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="sportswear">
									<div class="panel-body">
										<ul>
											
									<li><a href="#">Audiorecorder</a></li>
									<li><a href="#"> Dongle</a></li>
									<li><a href="#">laptop</a></li>
									<li><a href="#">>Mac</a></li>
									<li><a href="#">Microphone</a></li>
									<li><a href="#"> Projector</a></li>
									<li><a href="#">Tripod</a></li>
									<li><a href="#">Videocamera</a></li>
									<li><a href="#">Sound_system</a></li>
										</ul>
									</div>
								</div>
							</div>
						 @foreach($categories as $categories)
							<div class="panel panel-default">
                <div class="panel-heading">
                  
                </div>
              </div>
             @endforeach

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-equipments-->
					
						<div class="brands_equipments"><!--brands_equipments-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
      								<li><a href="#"> <span class="pull-right">(50)</span>audiorecorder</a></li>
									
							</div>
						</div><!--/brands_equipments-->
						
						<div class="price-range"><!--price-range-->
								<h2>Price Range</h2>
								<div class="well text-center">
									 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
									 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
								</div>
            </div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							{!! HTML::image('images/home/shipping.jpg') !!}
						</div><!--/shipping-->
					
					</div>
