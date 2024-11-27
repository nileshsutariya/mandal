@include('layouts.header')
<style>
    .mandal-card {
        transition: transform 0.3s;
    }

    .mandal-card:hover {
        transform: scale(1.05);
    }
</style>
<div class="main-content-header">
    <h1>Mandal list</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard-sales.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <span class="active">Mandal list</span>
        </li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="row">
            @foreach($mandals as $mandal)
                <div class="col-lg-3 col-md-6 mandal-card ">
                    <!-- Card -->
                    <a href="{{ route('mandal.details', ['id' => $mandal->id]) }}">
                        <div class="card shadow-lg border-0 mb-4">
                            <!-- Card Header with Gradient -->
                            <div class="card-header text-center text-white py-3">
                                <h5 class="card-title mb-0">
                                    {{ $mandal->mandal_name }}
                                </h5>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Installment Amount -->
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-dark">Installment Amount :</span>
                                    <div class="text-muted ml-1">
                                        {{ number_format($mandal->installment_amount, 2) }}
                                    </div>
                                </div>
                                <!-- Interest Rate -->
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-dark">Interest Rate :</span>
                                    <div class="text-muted ml-1">
                                        {{ $mandal->interest_rate }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-4 scroll">
        <div class="card shadow-lg border-0 mb-4">
            <div>
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title">
                            Details
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')