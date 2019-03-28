@extends('layouts.master')
@section('title')
Home
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-2">
                <form action="#" class="form-inline p-5">
                    <label class="mr-sm-2 mb-0" for="title">Album Title</label>
                    <input type="text" class="form-control mr-sm-2 mb-2 mb-sm-0" placeholder="Album title" id="title" name="title">
                    <label class="mr-sm-2 mb-0" for="image">Image</label>
                    <input style="padding: 0px;" multiple type="file" class="form-control mr-sm-2 mb-2 mb-sm-0" id="image" name="images[]">
                    <button type="submit" class="btn btn-primary mt-2 pl-3 pr-3 pt-1 pb-1 mt-sm-0">Submit</button>
                </form>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="gallery">
                    <a target="_blank" href="#">
                        <img src="{{asset('public/assets/images/img_5terre.jpg')}}" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
        </div>
    </div>
@endsection