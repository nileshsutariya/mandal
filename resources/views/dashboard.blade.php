@include('layouts.header')
<style>

.card {
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}

.rounded-circle {
    border-radius: 50%;
    width: 130px;
    height: 130px;
}

@media (min-width: 1600px) and (max-width: 1700px) {
    .rounded-circle {
        width: 130px;
        height: 130px;
    }
}
@media (min-width: 1400px) and (max-width: 1599px) {
    .rounded-circle {
        width: 120px;
        height: 120px;
    }
}
@media (min-width: 1200px) and (max-width: 1400px) {
    .rounded-circle {
        width: 100px;
        height: 110px;
    }
}
@media (min-width: 1001px) and (max-width: 1199px) {
    .rounded-circle {
        width: 100px;
        height: 90px;
        padding: 0px
    }
}
@media (min-width: 990px) and (max-width: 1000px) {
    .rounded-circle {
        width: 100px;
        height: 80px;
        padding: 0px
    }
}
@media (min-width: 676px) and (max-width: 989px) {
    .rounded-circle {
        width: 120px;
        height: 120px;
        padding: 0px
    }
}
@media (min-width: 767px) and (max-width: 835px) {
    .rounded-circle {
        width: 100px;
        height: 100px;
        padding: 0px
    }
}
@media (min-width: 575px) and (max-width: 675px) {
    .rounded-circle {
        width: 110px;
        height: 110px;
        padding: 0px
    }
}
</style>
<!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12" style="width: 80%;">
        <div class="main-content-header">
            <h1>Mandal</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="dashboard-sales.html">mandal</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="active">Forms</span>
                </li>
            </ol>
        </div>
        <form>
            <div class="container-fluid">
                <div class="row ">
                    @foreach ($mandals as $key => $value)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
                            <a href="{{route('mandal.details', ['id' => $value->id])}}" class="text-muted">
                                <div class="card mandal-card shadow-lg ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-3 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('imageuploaded/' . $value->logo) }}" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="col-md-8 col-sm-9">
                                                <span class="staff-name text-dark fw-bold mb-2 p-0">
                                                    {{ $value->mandal_name }}
                                                </span>
                                                <div class="row mb-1">
                                                    <div class="col-sm-1">
                                                        <i class="fas fa-users me-1 mt-1  text-primary fa-lg"></i>
                                                        <!-- Members Icon -->
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <span class="ml-1">
                                                            {{ $count[$key]}} Members
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-sm-1">
                                                        <i class="fas fa-percent me-2 fa-lg mt-2 text-success "></i>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <span class="ml-1"> Interest Rate :
                                                            {{ $value->interest_rate }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-sm-1">
                                                        <i class="fas fa-dollar-sign fa-lg me-1 text-warning mt-2"></i>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <span class="ml-1">Installment Amount :
                                                            {{ $value->installment_amount }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-sm-1">
                                                        <i class="fas fa-wallet me-1 fa-lg mt-1 text-info"></i>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <span class="ml-1">Total Amount :
                                                            {{ $value->member_count }} 55000
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
   
    @include('layouts.footer')
 

