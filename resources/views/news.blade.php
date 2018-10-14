@extends('layouts.homeapp')
@section('content')


<div class="container" style="margin-top:50px;margin-bottom:200px;">
   <section class="millions-jon brt-cmp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2>News</h2>
                    </div>
                </div>
            </div>
    </section>
    <section class="blog">
        <div class="container">
            <div class="heading text-center">
                <h1>{{$news->name}}</h1>
                <div class="blg-im-tx">{{Html::image('public/images/blog/'.$news->image)}}</div>
                 <div class="blg-im-tx"><p>{!! $news->description !!}</p></div>
            </div>
        </div>
    </section>
</div>

@endsection