@extends('layout.main')
@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js">
@endsection
@php
    function repairCheckbox($checkbox_value, $values_array) {
        return Form::checkbox('repair_required[]',$checkbox_value,in_array($checkbox_value,$values_array));
    }
@endphp
@section('content')
    <div class="container-fluid">
        <div class="row col-md-space">
                <div class="col-lg-4">
                    <p>{{ $shopDetails->building_address }}
                        <br>{{ $shopDetails->street_address }}
                        <br>{{ $shopDetails->suburb }} {{ $shopDetails->state }} {{ $shopDetails->postcode }}
                        <br><b>Tel : {{ $shopDetails->phone }}</b>
                    </p>
                </div>
                <div class="col-lg-4">
                    <h2 class="text-center">{{ $shopDetails->name }}</h2>
                    <p class="text-center">{{ $shopDetails->tagline }}
                        <br>ABN {{ $shopDetails->abn }}</p>
                </div>
                <div class="col-lg-4 text-center">QUOTATION 2949</div>
        </div>
        <p class="col-md-space text-center"> {!! $receiptMaster->header_line !!}</p>
    </div>
    <div class="container-fluid">
        <form action="{{ route('receipt.update', ['receipt'=>$receipt->id]) }}" method="post" accept-charset="utf-8">{{csrf_field()}}
            @method('PUT')
            <div class="user-detail-form col-md-space">
                <div class="row col-md-space">
                    <div class="col-lg-3">
                        <label>Date :</label>
                        <input type="date" name="date" class="form-control" value="{{ $receipt->date }}">
                    </div>
                    <div class="col-lg-3">
                        <label>Time :</label>
                        <input type="time" name="time" class="form-control"  value="{{ $receipt->time }}">
                    </div>
                    <div class="col-lg-3">
                        <label>Network :</label>
                        <input type="text" name="network" class="form-control" value="{{ $receipt->network }}">
                    </div>
                    <div class="col-lg-3">
                        <label>Sales Person :</label>
                        <input type="text" name="sales_person" class="form-control" value="{{ $receipt->sales_person }}">
                    </div>
                </div>
                <div class="row col-md-space">
                    <div class="col-lg-6">
                        <label>Name :</label>
                        <input type="text" name="name" class="form-control" value="{{ $receipt->name }}">
                    </div>
                    <div class="col-lg-3">
                        <label>Home ph :</label>
                        <input type="text" name="home_ph" class="form-control" value="{{ $receipt->home_ph }}">
                    </div>
                    <div class="col-lg-3">
                        <label>Mob :</label>
                        <input type="text" name="mob" class="form-control" value="{{ $receipt->mob }}">
                    </div>
                </div>
                <div class="row col-md-space">
                    <div class="col-lg-3">
                        <label>Brand:</label>
                        <select name="brand" id="brand" class="form-control">
                            <option value="">--Select--</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->name }}" @if($receipt->brand == $brand->name) selected @endif >{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Model :</label>
                        <select name="brand_item" id="brand_item" class="form-control">
                            @foreach($brandItems as $brandItem)
                                <option value="{{ $brandItem->model_name }}" @if($receipt->brand_item == $brandItem->model_name) selected @endif >{{ $brandItem->model_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>IMEI :</label>
                        <input type="text" name="ime" class="form-control" value="{{ $receipt->ime }}">
                    </div>
                    <div class="col-lg-2">
                        <label>Lock code :</label>
                        <input type="text" name="lock_code" class="form-control" value="{{ $receipt->lock_code }}">
                    </div>
                </div>
                <div class="row col-md-space">
                    <div class="col-lg-6">
                        <label>Accessories :</label>
                        <input type="text" name="aces" class="accesories form-control" value="{{ $receipt->aces }}">
                    </div>
                    <div class="col-lg-6">
                        <label>Phone Condition :</label>
                        <input type="text" name="phone_condition" class="phone_condition form-control" value="{{ $receipt->phone_condition }}">
                    </div>
                </div>
            </div>
            <div class="row col-md-space">
                <div class="col-lg-12"><b>Repairs Required</b></div>
                <div class="col-lg-3">
                    <ul class="repair-list list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('no power', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="no power">--}}
                                <div class="state p-primary-o">
                                    <label for="">NO POWER</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('water damage', $receipt->repair_required) }}
{{--                                {{ Form::checkbox('repair_required[]',null,in_array('water damage',$receipt->repair_required)) }}--}}
                                {{--<input type="checkbox" name="repair_required[]" value="water damage">--}}
                                <div class="state p-primary-o">
                                    <label for="">WATER DAMAGE</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('battery', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="battery">--}}
                                <div class="state p-primary-o">
                                    <label for="">BATTERY</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('touch screen', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="touch screen">--}}
                                <div class="state p-primary-o">
                                    <label for="">TOUCH SCREEN</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="repair-list list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Charge unit', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Charge unit">--}}
                                <div class="state p-primary-o">
                                    <label for="">Charge unit</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('no reception', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="no reception">--}}
                                <div class="state p-primary-o">
                                    <label for="">No reception</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('sim lock', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="sim lock">--}}
                                <div class="state p-primary-o">
                                    <label for="">SIM lock</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('loud speaker', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="loud speaker">--}}
                                <div class="state p-primary-o">
                                    <label for="">Loud speaker</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="repair-list  list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Power button', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Power button">--}}
                                <div class="state p-primary-o">
                                    <label for="">Power button</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Home button', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Home button">--}}
                                <div class="state p-primary-o">
                                    <label for="">Home button</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('volume button', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="volume button">--}}
                                <div class="state p-primary-o">
                                    <label for="">Volume button</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('speaker', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="speaker">--}}
                                <div class="state p-primary-o">
                                    <label for="">Speaker</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="repair-list list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Camera', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Camera">--}}
                                <div class="state p-primary-o">
                                    <label for="">Camera</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Wifi', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Wifi">--}}
                                <div class="state p-primary-o">
                                    <label for="">Wifi</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('SW', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="SW">--}}
                                <div class="state p-primary-o">
                                    <label for="">SW</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Frame Damage', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Frame Damage">--}}
                                <div class="state p-primary-o">
                                    <label for="">Frame Damage</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="repair-list list-unstyled">
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('LCD', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="LCD">--}}
                                <div class="state p-primary-o">
                                    <label for="">LCD</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Sensor', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Sensor">--}}
                                <div class="state p-primary-o">
                                    <label for="">Sensor</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('Microphone', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="Microphone">--}}
                                <div class="state p-primary-o">
                                    <label for="">Microphone</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pretty p-default p-round">
                                {{ repairCheckbox('SIM Reader', $receipt->repair_required) }}
                                {{--<input type="checkbox" name="repair_required[]" value="SIM Reader">--}}
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
                    <textarea id="others" class="others form-control" name="other" rows="8">{{ $receipt->other }}</textarea>
                </div>
            </div>
            <div class="row col-md-space">
                <div class="col-lg-8">
                    <label>Price of Repairs : $</label>
                    <input type="text" name="price" class="price form-control" value="{{ $receipt->price }}">
                </div>
                <div class="col-lg-4">
                    <label>Advance: $</label>
                    <input type="text" name="advance" class="advance form-control" value="{{ $receipt->advance }}">
                </div>
            </div>
            <div class="row col-md-space">
                <div class="col-lg-4">
                    <label>Picked Up By</label>
                    <input type="text" name="pick_up_by" class="pick_up_by form-control" value="{{ $receipt->pick_up_by }}">
                </div>
                <div class="col-lg-4 offset-lg-4">
                    <label>Pick up date :</label>
                    <input type="date" name="pick_up_date" class="pick_up_date form-control" value="{{ $receipt->pick_up_date }}">
                </div>
            </div>
            <div class="row col-md-space">
                <div class="col-lg-4">
                    <label>Progress %</label>
                    {{--<input type="number" name="progress" class="form-control" value="{{ $receipt->progress }}">--}}
                    <input type="range" class="custom-range" min="0" max="100" step="1" id="customRange3" value="{{ $receipt->progress }}">
                </div>
            </div>
            <div class="row col-md-space">
                <div class="pretty p-default p-round">
                    {{ Form::checkbox('has_paid','true',$receipt->has_paid == 'true') }}
                    {{--<input type="checkbox" name="has_paid" value="true">--}}
                    <div class="state p-primary-o">
                        <label for="">Paid ?</label>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary">
            <a href="{{ route('receipt.index') }}" class="btn btn-primary">Cancel</a>
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

        $('input[type="range"]').rangeslider({

            // Feature detection the default is `true`.
            // Set this to `false` if you want to use
            // the polyfill also in Browsers which support
            // the native <input type="range"> element.
            polyfill: true,

            // Default CSS classes
            rangeClass: 'rangeslider',
            disabledClass: 'rangeslider--disabled',
            horizontalClass: 'rangeslider--horizontal',
            verticalClass: 'rangeslider--vertical',
            fillClass: 'rangeslider__fill',
            handleClass: 'rangeslider__handle',

            // Callback function
            onInit: function() {},

            // Callback function
            onSlide: function(position, value) {},

            // Callback function
            onSlideEnd: function(position, value) {}
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>
@endsection