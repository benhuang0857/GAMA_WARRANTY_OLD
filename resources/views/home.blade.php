@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="white-box analytics-info">
                <h3 class="box-title">GAMA POINT</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li onclick="play()">
                        <i class="material-icons md-48" style="font-size:48px ;color: rgb(255, 225, 52)">monetization_on</i>
                        <audio id="audio" src="{{asset('sound/coin_sound.mp3')}}"></audio>
                    </li>
                    <li class="ms-auto"><span class="counter text-purple">{{$Data['User']->gama_point}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">姓名</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->name}}" readonly> 
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="example-email" class="col-md-12 p-0">Email</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->email}}" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">手機</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->mobile}}" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">住址</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{$Data['User']->address}}" readonly>
                        </div>
                    </div>
                    <label class="col-md-12 p-0">分享連結</label>
                    <div class="input-group mb-3">
                        <input type="text" value="http://127.0.0.1:8000/warranty/{{$Data['Recommand_URL']}}" id="recommand_url" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" onclick="myFunction()">複製連結</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection