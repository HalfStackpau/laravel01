@extends('layouts.app');
@section('content')
 <div class="container">
     <div class="row">
        <div class="col align-self-center">
            <h2>{{$post->title}}</h2>
                    <article>
                        {!!$cont!!}
                    </article>
        </div>



     </div>

     <a href="{{url("/posts")}}">Back</a>

 </div>
@endsection
