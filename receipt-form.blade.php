@extends('layout.main')
@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js">
@endsection
@section('content')
    <div class="container-fluid">
        {{--<div class="row col-md-space">--}}
                {{--<div class="col-lg-4">--}}
                    {{--<p>{{ $shopDetails->building_address }}--}}
                        {{--<br>{{ $shopDetails->street_address }}--}}
                        {{--<br>{{ $shopDetails->suburb }} {{ $shopDetails->state }} {{ $shopDetails->postcode }}--}}
                        {{--<br><b>Tel : {{ $shopDetails->phone }}</b>--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4">--}}
                    {{--<h2 class="text-center">{{ $shopDetails->name }}</h2>--}}
                    {{--<p class="text-center">{{ $shopDetails->tagline }}--}}
                        {{--<br>ABN {{ $shopDetails->abn }}</p>--}}
                {{--</div>--}}
                <div class="col-lg-4">QUOTATION {{$receipt_code}}</div>
        {{--</div>--}}
        {{--<p class="col-md-space text-center"> {!! $receiptMaster->header_line !!}</p>--}}
    </div>
    <div class="container-fluid">
        <form action="{{ route('receipt.store') }}" method="post" accept-charset="utf-8">{{csrf_field()}}
            {{ Form::hidden('receipt_code', $receipt_code) }}
            <div class="user-detail-form col-md-space">
                <div class="row col-md-space">
                    <div class="col-lg-3">
                        <label>Date :</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label>Time :</label>
                        <input type="time" name="time" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label>Network :</label>
                        <input type="text" name="network" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label>Sales Person :</label>
                        <input type="text" name="sales_person" class="form-control">
                    </div>
                </div>
                <div class="row col-md-space">
                    <div class="col-lg-6">
                        <label>Name :</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label>Home ph :</label>
                        <input type="text" name="home_ph" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label>Mob :</label>
                        <input type="text" name="mob" class="form-control">
                    </div>
                </div>
                <div class="row col-md-space">
                    <div class="col-lg-3">
                        <label>Brand:</label>
                        <select name="brand" id="brand" class="form-control">
                            <option value="">--Select--</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Model :</label>
                        <select name="brand_item" id="brand_item" class="form-control">

                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>IMEI :</label>
                        <input type="text" name="ime" class="form-control">
                    </div>
                    <div class="col-lg-2">
                        <label>Lock code :</label>
                        <input type="text" name="lock_code" class="form-control">
                    </div>
                </div>
                <div class="row col-md-space">
                    <div class="col-lg-6">
                        <label>Accessories :</label>
                        <input type="text" name="aces" class="accesories form-control">
                    </div>
                    <div class="col-lg-6">
                        <label>Phone Condition :</label>
                        <input type="text" name="phone_condition" class="phone_condition form-control">
                    </div>
                </div>
            </div>
            <div class="row col-md-space">
                <div class="col-lg-12"><b>Repairs Required</b></div>
                <div class="col-lg-3">
                    <ul class="repair-list list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="no power">
                                <div class="state p-primary-o">
                                    <label for="">NO POWER</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="water damage">
                                <div class="state p-primary-o">
                                    <label for="">WATER DAMAGE</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="battery">
                                <div class="state p-primary-o">
                                    <label for="">BATTERY</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="touch screen">
                                <div class="state p-primary-o">
                                    <label for="">TOUCH SCREEN</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="LCD">
                                <div class="state p-primary-o">
                                    <label for="">LCD</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="repair-list list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Charge unit">
                                <div class="state p-primary-o">
                                    <label for="">Charge unit</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="no reception">
                                <div class="state p-primary-o">
                                    <label for="">No reception</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="sim lock">
                                <div class="state p-primary-o">
                                    <label for="">SIM lock</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="loud speaker">
                                <div class="state p-primary-o">
                                    <label for="">Loud speaker</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Sensor">
                                <div class="state p-primary-o">
                                    <label for="">Sensor</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="repair-list  list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Power button">
                                <div class="state p-primary-o">
                                    <label for="">Power button</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Home button">
                                <div class="state p-primary-o">
                                    <label for="">Home button</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="volume button">
                                <div class="state p-primary-o">
                                    <label for="">Volume button</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="speaker">
                                <div class="state p-primary-o">
                                    <label for="">Speaker</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Microphone">
                                <div class="state p-primary-o">
                                    <label for="">Microphone</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="repair-list list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Camera">
                                <div class="state p-primary-o">
                                    <label for="">Camera</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Wifi">
                                <div class="state p-primary-o">
                                    <label for="">Wifi</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="SW">
                                <div class="state p-primary-o">
                                    <label for="">SW</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="Frame Damage">
                                <div class="state p-primary-o">
                                    <label for="">Frame Damage</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                <input type="checkbox" name="repair_required[]" value="SIM Reader">
                                <div class="state p-primary-o">
                                    <label for="">SIM Reader</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row col-md-space">
                <div class="others-wrapper col-lg-12">
                    <label for="others">Others</label>
                    <textarea id="others" class="others form-control" name="other" rows="8"></textarea>
                </div>
            </div>
            {{--<div class="row col-md-space">--}}
                {{--<div class="col-lg-9">Customer Signature ...................................................................................</div>--}}
                {{--<div class="col-lg-3">Technician ..........................................</div>--}}
            {{--</div>--}}
            {{--<div class="row col-md-space">--}}
                {{--<div class="col-lg-1">NOTE :</div>--}}
                {{--<div class="col-lg-11">--}}
                    {{--<ul class="ul-no-left">--}}
                        {{--@foreach($receiptMaster->notes as $note)--}}
                            {{--<li>{{ $note }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row col-md-space">
                <div class="col-lg-8">Price of Repairs : $
                    <input type="text" name="price" class="price form-control">
                </div>
                <div class="col-lg-4">
                    <label>Advance: $</label>
                    <input type="text" name="advance" class="advance form-control">
                </div>

            </div>
            <div class="row col-md-space">
                <div class="col-lg-4">
                    <label>Picked Up By</label>
                    <input type="text" name="pick_up_by" class="pick_up_by form-control">
                </div>
                <div class="col-lg-4 offset-lg-4">Pick up date :
                    <input type="date" name="pick_up_date" class="pick_up_date form-control">
                </div>
            </div>
            <div class="row col-md-space">
                <div class="col-lg-4">
                    <label>Progress %</label>
                    {{--<input type="number" name="progress" class="form-control" value="{{ $receipt->progress }}">--}}
                    <input type="range" class="custom-range" min="0" max="100" step="1" id="customRange3">
                </div>
            </div>
            <div class="row col-md-space">
                <div class="pretty p-default p-round">
                    <input type="checkbox" name="true" value="true">
                    <div class="state p-primary-o">
                        <label for="">Paid ?</label>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#brand").on('change', function() {
                let brand = $(this).val();
                $.ajax({
                    method: 'get',
                    url: '/branditem/filter?brand='+brand,
                    success: function (resp) {
                        $("#brand_item").empty();
                        let _opt = '';
                        for(let i=0; i<resp.length; i++) {
                            _opt += "<option value='"+resp[i].model_name+"'>"+resp[i].model_name+"</option>";
                        }
                        $("#brand_item").append(_opt);

                    }
                });
            })
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>
@endsection
