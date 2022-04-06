@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">禮品兌換紀錄</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">禮品名稱</th>
                                <th class="border-top-0">GAMA點數</th>
                                <th class="border-top-0">兌換時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Data['FreeGoods'] as $good)
                            <tr>
                                <td>{{ $good->product_name }}</td>
                                <td>{{ $good->cost }}</td>
                                <td>{{ $good->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">票卷兌換紀錄</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">兌換</th>
                                <th class="border-top-0">票卷名稱</th>
                                <th class="border-top-0">價格</th>
                                <th class="border-top-0">購買時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Data['Orders'] as $ticket)
                            <tr>
                                <input style="display: none;" type="text" id="tcontain-{{$ticket->id}}" value="{{ $ticket->contain }}">
                                @if($ticket->status == 'unused')
                                <td><a href="#" class="show-sheet btn btn-info btn-sm" style="width:100%" value="{{ $ticket->id }}">兌換</a></td>
                                @else
                                <td><a href="#" class="btn btn-light btn-sm" style="width:100%">已核銷</a></td>
                                @endif
                                <td>{{ json_decode($ticket->contain)->product_name }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>{{ $ticket->created_at }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $Data['Orders']->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

<script>
    $(function () {
        $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 116;
        });
    });

    $(".show-sheet").click(function () {

        var ID = $(this).attr('value');
        var tcontainVal = $("#tcontain-" + ID).attr("value");
        var tName = JSON.parse(tcontainVal)['product_name'];

        var initTime = new Date;
        var nowTime = (initTime.getFullYear()) + "-" + (initTime.getMonth() + 1) + "-" + initTime.getDate()
            + " " + initTime.getHours() + ":" + initTime.getMinutes() + ":" + initTime.getSeconds();

        initTime.setSeconds(initTime.getSeconds() + 5);
        var endTime = (initTime.getFullYear()) + "-" + (initTime.getMonth() + 1) + "-" + initTime.getDate()
            + " " + initTime.getHours() + ":" + initTime.getMinutes() + ":" + initTime.getSeconds();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: `/get-time/${ID}`,
            dataType: 'html',
            success: function (repEndTime) {
                if (Date.parse(nowTime) > Date.parse(repEndTime)) {
                    console.log("Expired");
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: `/close-order/${ID}`,
                        dataType: 'html',
                        success: function () {

                        },
                    });
                } else {
                    if (repEndTime != '9999-12-12 00:00:00') {
                        var repEndTime = repEndTime;
                        repEndTime = new Date(repEndTime);
                        var conter = Date.parse(repEndTime) - Date.parse(nowTime);
                        var cnt = parseInt(conter);

                        var timerInterval
                        Swal.fire({
                            title: '兌換'+tName+'票卷',
                            html: '票卷將於 <b></b> 秒後關閉.',
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                var b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()/1000
                                }, 50)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer');
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "GET",
                                    url: `/close-order/${ID}`,
                                    dataType: 'html',
                                    success: function () {

                                    },
                                });
                            }
                        })

                    }
                    else {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "GET",
                            url: `/update-order/${ID}`,
                            data: {
                                'nowTime': nowTime,
                                'endTime': endTime
                            },
                            dataType: 'html',
                            success: function () {

                                var conter = Date.parse(endTime) - Date.parse(nowTime);
                                var cnt = parseInt(conter);

                                var timerInterval
                                Swal.fire({
                                    title: '兌換'+tName+'票卷',
                                    html: '票卷將於 <b></b> 秒後關閉.',
                                    timer: 5000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        var b = Swal.getHtmlContainer().querySelector('b')
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft()/1000
                                        }, 50)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        console.log('I was closed by the timer')
                                        $.ajax({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            type: "GET",
                                            url: `/close-order/${ID}`,
                                            dataType: 'html',
                                            success: function () {
                                                Swal.fire({
                                                title: '票卷兌換完畢',
                                                confirmButtonText: '完成'
                                                }).then((result) => {
                                                    /* Read more about isConfirmed, isDenied below */
                                                    if (result.isConfirmed) {
                                                        location.reload();
                                                    }
                                                })

                                            },
                                        });
                                    }
                                })
                            },
                        });
                    }
                }
            },
        });
    });

</script>

@endsection