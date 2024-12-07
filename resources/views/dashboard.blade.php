@include('layouts.header')
<style>
    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }
</style>
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
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-3 d-flex align-items-center justify-content-center">
                                                <div class="rounded-circle overflow-hidden"
                                                    style="width: 120px; height: 120px;">
                                                    <img src="{{ asset('imageuploaded/' . $value->logo) }}" alt="Avatar"
                                                        class="img-fluid"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                </div>
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
                                                    <div class="col-sm-9 ">
                                                        <span class="ml-1">
                                                            {{ $count[$key]}} Members
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-sm-1">
                                                        <i class="fas fa-percent me-2 fa-lg mt-2 text-success "></i>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <span class="ml-1"> Interest Rate :
                                                            {{ $value->interest_rate }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-sm-1">
                                                        <i class="fas fa-dollar-sign fa-lg me-1 text-warning mt-2"></i>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <span class="ml-1">Installment Amount :
                                                            {{ $value->installment_amount }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-sm-1">
                                                        <i class="fas fa-wallet me-1  fa-lg mt-1 text-info"></i>
                                                    </div>
                                                    <div class="col-sm-9">
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
 

