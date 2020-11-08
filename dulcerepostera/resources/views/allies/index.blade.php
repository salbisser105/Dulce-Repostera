@extends('layouts.master')
@section("title", 'Service Team')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header"><b>Service Team</b></div>
                <div class="card-body" id="card-body-all">
 
                    <script type="text/javascript">
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: 'http://54.227.195.109/audios/latest',
                            success: function(data) {
                                $.each(data.data, function(i, f) {
                                    var tblRow = "<tr>" + "<td>" + f.id + "</td>" +
                                        "<td>" + f.title + "</td>" + "<td>" + f.description + "</td>" +
                                        "<td>" + f.type + "</td>" + "<td>" + f.contributors + "</td>" + 
                                        "<td>" + f.categories + "</td>" + "<td>" + f.price + "</td>"
                                        + "</tr>"
                                    $(tblRow).appendTo("#userdata tbody");
                                });
                                console.log(data);
                            }
                        });
                    </script>
 <!-- {"title":"Porter Robinson - Sad Machine","description":"Porter robinson new song.","type":"Song","cover_image":"\/storage\/covers\/sad_machine_1601491571.jpg","contributors":"porter robinson","categories":"Electronic","price":2"} -->
                    <table id="userdata" border="2">
                        <thead>
                            <th>id</th>
                            <th>title</th>
                            <th>description</th>
                            <th>type</th>
                            <th>contributors</th>
                            <th>categories</th>
                            <th>price</th>
                            
                        </thead>
                        <tbody>
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection