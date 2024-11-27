@include('layouts.header')
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
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-30">
            <div class="card-body">
                <div class="card-header">
                    <h5 class="card-title">Add New Mandal</h5>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('mandal.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Mandal Name</label>
                                <div class="col-sm-8">
                                    <input type="name" class="form-control" id="name" name="name"
                                        placeholder="Enter Mandal Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Installment Amount</label>
                                <div class="col-sm-8">
                                    <input type="installment_amount" class="form-control" name="installment_amount"
                                        placeholder="Enter Installment Amount"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Interest Rate</label>
                                <div class="col-sm-8">
                                    <input type="interest_rate" class="form-control" name="interest_rate"
                                        placeholder="Enter Interest Rate"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tennert</label>
                                <div class="col-sm-8">
                                    <input type="tennert" class="form-control" name="tenert"
                                        placeholder="Enter Tennert">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Logo</label>
                                <div class="col-sm-8">
                                    <input type="file" id="imageInput" class="form-control form-control-file"
                                        name="logo" onchange="showFileName()">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success rounded mt-2 mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')