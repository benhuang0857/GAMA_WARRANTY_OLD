@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">所有保固資訊</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">姓名</th>
                                <th class="border-top-0">車牌</th>
                                <th class="border-top-0">產品</th>
                                <th class="border-top-0">施工店家</th>
                                <th class="border-top-0">審核狀態</th>
                                <th class="border-top-0">查看證書</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mycard as $card)
                            <tr>
                                <td>1</td>
                                <td>{{$card->name}}</td>
                                <td>{{$card->car_license}}</td>
                                <td>{{$card->warranty_body}}</td>
                                <td>{{$card->construction_by}}</td>
                                @if ($card->status == 'OFF')
                                <td><span class="badge rounded-pill bg-secondary">審核中</span></td>
                                @else
                                <td><span class="badge rounded-pill bg-success">通過</span></td>
                                @endif
                                <td><a href="/my_warranty/{{$card->card_id}}">查看</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection