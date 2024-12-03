@include('layouts.mandalheader')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="profile-header mb-30">
                <h3 class="name">
                    {{$mandal->mandal_name}}
                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 ">
            <div class="card ">
                <div class="card-body">
                    <div class="container mt-2 ">
                        <div class="card-header">
                            <h6 class="mb-3">Info </h6>
                        </div>
                        <div>
                            <span style="font-weight: bold;"> Interest Rate :
                            </span>
                            <span class="text-muted mb-1">
                                {{ $mandal->interest_rate }}
                            </span>
                        </div>
                        <div>
                            <span style="font-weight: bold;"> Installment Amount :
                            </span>
                            <span class="text-muted mb-1">
                                {{ number_format($mandal->installment_amount, 2) }}
                            </span>
                        </div>
                        <div>
                            <span style="font-weight: bold;" class="mb-1">Tenert :
                            </span class="text-muted mb-1">
                            {{ $mandal->tenert }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6     col-md-4 ">
            <div class="card ">
                <div class="card-body">
                    <div class="container mt-2 ">
                        <div class="card-header">
                            <h6 class="mb-3">Transaction Details </h6>
                        </div>
                        <div class="row ">
                                    <div class="col-12 staff-card d-flex align-items-center">
                                        <div class="flex-grow-1 ml-2">
                                            <p class="staff-name fw-bold mb-1">
                                            </p>
                                            <p class="staff-role text-muted small mb-0">
                                            </p>
                                        </div>
                                        <div class="permissions">
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 ">
            <div class="card ">
                <div class="card-body scroll ">
                    <div class="container mt-2 ">
                        <div class="card-header">
                            <h6 class="mb-3">Members </h6>
                        </div>
                        @if (isset($member))
                            @foreach ($member as $value)
                                <div class="row userdetails">
                                    <div class="col-12 staff-card d-flex align-items-center">
                                        <img src="{{asset('imageuploaded/' . $value->image)}}" alt="Avatar"
                                            class="me-3 rounded-circle" width="45px" height="45px">
                                        <div class="flex-grow-1 ml-2">
                                            <p class="staff-name fw-bold mb-1">
                                                {{$value->name}}
                                            </p>
                                            <p class="staff-role text-muted small mb-0">
                                                {{$value->mobile}}
                                            </p>
                                        </div>
                                        <div class="permissions">
                                            {{$value->user_role}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')