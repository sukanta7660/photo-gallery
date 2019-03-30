@extends('layouts.master')
@section('title')
Home
@endsection

@section('content')
    <div class="container">
        @if(isset(Auth::user()->email))
        <div class="row">
            <div class="col-md-6">
                <form action="{{action('MainController@save_album')}}" method="post" enctype="multipart/form-data" class="p-5">
                    {{csrf_field()}}
                    <h3>Add New Album</h3>
                    <hr>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Album Title</span>
                        </div>
                        <input type="text" name="title" placeholder="Enter the album title" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    @if($errors->has('title'))
                        <ul>
                            <li style="color:red;">{{$errors->first('title')}}</li>
                        </ul>
                    @endif
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Image</span>
                        </div>
                        <input style="padding: 0;" type="file" name="imageName" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    @if($errors->has('imageName'))
                        <ul>
                            <li style="color:red;">{{$errors->first('imageName')}}</li>
                        </ul>
                    @endif
                    <button type="submit" class="btn btn-sm btn-primary mt-2 pl-3 pr-3 pt-1 pb-1 mt-sm-0">Save</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{action('MainController@image_upload')}}" method="post" enctype="multipart/form-data" class="p-5">
                    {{csrf_field()}}
                    <h3>Add Images To The Album</h3>
                    <hr>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Album</span>
                        </div>
                        <select name="albumID" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                            <option value="">Select an Album</option>
                            @foreach($table as $row)
                            <option value="{{$row->albumID}}">{{$row->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('albumID'))
                        <ul>
                            <li style="color:red;">{{$errors->first('albumID')}}</li>
                        </ul>
                    @endif
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Image</span>
                        </div>
                        <input style="padding: 0;" type="file" name="images[]" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" multiple>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-2 pl-3 pr-3 pt-1 pb-1 mt-sm-0">Save</button>
                </form>
            </div>
        </div>
        <hr>
        @endif

            <div class="row mt-3 mb-3">
                <div class="col-md-12">
                    <div class="md-form mt-0">
                        <input id="search" class="form-control" data-url="{{action('MainController@albumSearch')}}" name="search" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </div>
            </div>
        <div class="row mt-3 mb-3" id="album_lists">

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        $(function () {
            contents("{{action('MainController@allAlbums')}}");
            $('#search').keyup(function (e) {
                e.preventDefault();
                var search = $(this).val();
                var url = $(this).data('url')+'?search='+search;

                if (search.length>0){
                    contents(url);
                }
                else {
                    contents("{{action('MainController@allAlbums')}}");
                }

            });
        });



        function contents(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="col-md-3">\n' +
                        '                <div class="gallery">\n' +
                        '                    <a value="'+row.albumID+'" href="{{action('MainController@gallery_page')}}?id='+row.albumID+'">\n' +
                        '                        <img value="'+row.albumID+'" src="public/uploads/album/'+row.imageName+'" alt="Northern Lights" width="600" height="400">\n' +
                        '                    </a>\n' +
                        '                    <div class="desc text-center" value="'+row.albumID+'">'+row.title+'</div>\n' +
                        '                </div>\n' +
                        '            </div>'
                });

                $('#album_lists').html(show_data);
            });
        }

    </script>
@endsection