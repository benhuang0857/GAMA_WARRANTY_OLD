@extends('layouts.app')

@section('content')

<style>
    .shadow_box_2
    {
        background: white;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>

<div class="container">

    <div class="row justify-content-center shadow_box_2" style="margin-bottom:30px ">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/edit_profile/submit" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">姓名</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="name" value="{{$Data['User']->name}}"> 
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="email" value="{{$Data['User']->email}}">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">手機</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="mobile" value="{{$Data['User']->mobile}}">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">住址</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="address" value="{{$Data['User']->address}}">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">密碼</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" placeholder="留白代表不更改密碼" class="form-control p-0 border-0" name="password">
                            </div>
                        </div>

                        <div class="form-group pb-3">
                            <button style="width:100%" type="submit" class="btn btn-secondary btn-sm pass">確認修改資料</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection