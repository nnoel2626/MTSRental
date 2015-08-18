@extends( 'layouts.default' )


@section('content')
<section>
<h1>Category View</h1>
 <div>
View as:
<a href='/equipment/?format=json' target='_blank'>JSON</a> |
<a href='/equipment/?format=pdf' target='_blank'>PDF</a>
</div> 
  <div class="container">
    
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            @foreach($equipment as $equipment)
                     <div class="equipmentinfo text-center">
                  <div class="equipment">
                  <a href="/rental/view/{{ $equipment->id }}">   
                    <img src='/{{$equipment['image_path']}}'>
                    <div class="equipmentinfo text-center">
                    <span><h2>{{ $equipment['name'] }}</h2></span>
                    <span><h2>{{ $equipment['brand'] }}</h2></span>
                    <span><h2>{{ $equipment['model'] }}</h2></span>
                    <!-- <p>${{ $equipment->price }}</p> -->
                    </div> 
                                     
                    </a>
                  </div>
                  </div> 
              @endforeach
           
    </div><!-- /container -->
</section>
@stop