@extends('layouts.master')
@section('title')
    {{$album->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="mt-3 text-danger">{{$album->title}}</h3>
                <hr>
            </div>
        </div>
        @if( $count > 0 )
        <div class="row mt-5 mb-5">
            @foreach($table as $row)
                <div class="col-md-3 pr-0">
                    <div class="gallery">
                        <a href="#">
                            <img src="{{asset('public/uploads/gallery/'.$row->images)}}" alt="Northern Lights" width="600" height="400">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">There Are No Photos In this Album</h1>
                </div>
            </div>
        @endif
    </div>
@endsection