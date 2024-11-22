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
                <form>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mandal Name</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Installment Amount</label>
                        <div class="col-sm-10">
                            <input type="installment_amount" class="form-control" id="installment_amount"
                                placeholder="Enter Installment Amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Interest Rate</label>
                        <div class="col-sm-10">
                            <input type="interest_rate" class="form-control" id="interest_rate"
                                placeholder="Enter Interest Rate">
                        </div>
                    </div>
                    <button type="button" class="btn btn-success rounded mt-2 mr-2">Success</button>


                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')