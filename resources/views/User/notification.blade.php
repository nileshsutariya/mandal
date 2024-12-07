@include('layouts.header')
<style>
    .mail-item-nav .nav-pills .nav-link .info .date {
        top: 38px;
    }
</style>
<div class="main-content-header">
    <h1>Inbox</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard-sales.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <span class="active">Inbox</span>
        </li>
    </ol>
</div>

<!-- End Main Content Header -->

<!-- Mailbox -->
<div class="mb-30 row">

    <div class="col-xl-12">
        <div class="inbox-content-wrap tab-content">
            <div class="tab-pane fade show active" id="v-pills-inbox" role="tabpanel">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-6">
                        <div class="mail-item-nav">
                            <div class="nav flex-column nav-pills" role="tablist">
                                @foreach ($notification as $value)
                                    <a class="nav-link" data-toggle="pill" href="#EmailOne">
                                        <img src="{{asset('imageuploaded/' . $value->logo)}}" alt="User"
                                            class="wh-30 rounded-circle">
                                        <div class="info">
                                            <div class="name">
                                                {{$value->mandal_name}}
                                            </div>
                                            <p>Send Request By
                                                {{$value->sender_name}}
                                            </p>
                                            <p class="date">
                                                {{ \Carbon\Carbon::parse($value->created_at)->format('M j, Y ') }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-7 col-sm-6">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="EmailOne" role="tabpanel">
                                <div class="email-details-warp">
                                    <div class="d-flex">
                                        <img src="#" alt="User" class="wh-30 mr-2 rounded-circle">
                                        <div class="info">
                                            <div class="name line-height-1">Aaron Rossi</div>
                                            <p class="fs-11 m-0">Mar 1, 2019</p>
                                        </div>
                                    </div>
                                    <h6 class="mt-3 fw-600">You Have a Request from mandal</h6>
                                    Thanks!
                                    <br>
                                    Marco Gomez
                                    </p>
                                    <div class="inbox-topbar">
                                        <button type="button" class="btn btn-primary mr-1" data-toggle="modal"
                                            data-target="#SendMail">Accept</button>
                                        <button type="button" class="btn btn-outline-danger">cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Mailbox -->

@include('layouts.footer')
        