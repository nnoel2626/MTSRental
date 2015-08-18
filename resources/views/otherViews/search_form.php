
                  ///---search form------//
      {!! Form::open(array('url' => '/equipment.search', 'method' => 'GET')) !!}

      {!! Form::label('query','Search') !!}

      {!! Form::text('query') !!}

     {!! Form::submit('Search') !!}

      {!! Form::close() !!}



		