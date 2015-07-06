
@extends('layout.main')

@section('head')
 {{ HTML::style('css/default.css') }}  
 @stop  
 
@section('content')
 <fieldset>

<div class="well">
     <fieldset>
     {{ Form::open(['url' => '/processform', 'class' => 'form-horizontal']) }}
    <!-- {{ Form::open(['action' => 'EquipmentController@postRentalForm', 'class' => 'form-horizontal', 'method' => 'Post']) }}  -->
        <div class="form-group">
        <h3> Customer Information</h3>

         <!-- Harvard_ID-->
        <div class="form-group">
            {{ Form::label('harvard_id', 'Harvard_id:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
            {{ Form::text('harvard_id', $value = null, ['class' => 'form-control', 'placeholder' => 'Harvard_id'])  }}
           </div>
        </div>
        <!-- name -->
            {{ Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
                {{ Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'name']) }}
            </div>
        </div>
         <!-- e-mail -->
        <div class="form-group">
            {{ Form::label('e-mail', 'E-mail:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
                {{ Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'e-mail'])  }}
               
            </div>
        </div>
        <!-- Phone number-->
         <div class="form-group">
            {{ Form::label('phone number', 'Phone Number:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
                {{ Form::text('Phone number', $value = null, ['class' => 'form-control', 'placeholder' => 'phone number'])  }}
               
            </div>
        </div>
         
        <div class="form-group">
        <h3> Course Information</h3>
        <!--subject-number-->
            {{ Form::label('course number', 'Course Number:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
                {{ Form::text('course number', $value = null, ['class' => 'form-control', 'placeholder' => 'Course number']) }}
            </div>
        </div>
        <!---instructor -->
        <div class="form-group">
            {{ Form::label('instructor', 'Instructor:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
                {{ Form::text('instructor', $value = null, ['class' => 'form-control', 'placeholder' => 'instructor'])  }}
            </div>
        </div>
        <!-- meeting location-->
        <div class="form-group">
            {{ Form::label('meeting location', 'Meeting Location:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
            {{ Form::text('meeting location', $value = null, ['class' => 'form-control', 'placeholder' => 'meeting location'])  }}
               
            </div>
        </div>
            <!-- Select With One Default -->
        <div class="form-group">
            <h3> Select Equipment</h3>
            {{ Form::label('select', 'Category', ['class' => 'col-lg-2 control-label'] )  }}
            <div class="col-lg-3">
                 {{  Form::select('select', ['audiorecorder' => 'Audiorecorder', 'dungle' => 'Dungle', 'laptop' => 'Laptop', 
                'mac' => 'Mac', 'microphone' => 'Microphone', 'projector'=>'Projector','tripod' => 'Pripod', 'videocamera' => 'Videocamera', 
                'student_sound_system' => 'Student_Sound_system']) }}
            </div>
        </div>
            <!-- Select Multiple -->
            <div class="form-group">
            {{ Form::label('multipleselect[]', ' Equipment', ['class' => 'col-lg-2 control-label'] )  }}
            <div class="col-lg-3">
            {{  Form::select('multipleselect[]', ['S' => 'Small', 'L' => 'Large', 'XL' => 'Extra Large', '2XL' => '2X Large'],  'S', ['class' => 'form-control' ],
            $selected = null, ['class' => 'form-control', 'multiple' => 'multiple']) }} 
            </div>
        </div>

        <!--subject-number-->
        <div class="form-group">
            {{ Form::label('how many', 'How many :', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-3">
                {{ Form::number('how many ', $value = null, ['class' => 'form-control', 'placeholder' => 'how many ']) }}
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <div class="col-lg-6 col-lg-offset-2">
                    {{ Form::label('daily Rental', 'Daily Rental') }}
                    {{ Form::checkbox('daily Rental') }}
                 </div>
                  
                    <div class="col-lg-6 col-lg-offset-2">
                    {{ Form::label('weekly Rental', 'Weekly Rental') }}
                    {{ Form::checkbox('weekly Rental') }}
                </div>
              </div>
            </div>


            <div class="form-group">
        <h3> For Billable Rentals</h3>
        <!--Check-->
             {{ Form::label('Check', 'Check', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-9">    
            {{ Form::radio('Check', 'Check', true, ['id' => 'radio1']) }}
            </div>
        </div>
        <div class="form-group">
            <!--Cash-->
             {{ Form::label('Cash', 'Cash:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-9">
              
                {{ Form::radio('Cash', 'Cash', false, ['id' => 'radio2']) }}
            </div>
        </div>
         <div class="form-group">
            <!--Billing Code-->
             {{ Form::label('Billing Code', 'Billing Code:', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-9">
            {{ Form::radio('Billing Code', 'Billing Code', false, ['id' => 'radio3']) }}
               
            </div>
        </div>
      

        

        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-3 col-lg-offset-2">
                {{ Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
            </div>
        </div>

   {{ Form::close()  }}

 </fieldset>
   </div>

    @stop

    @section('script')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    @stop


