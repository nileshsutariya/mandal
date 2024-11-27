@include('layouts.mandalheader')
<div class="main-content-header">
    <h1>Mandal</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard-sales.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <span class="active">mandal</span>  
        </li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="profile-header mb-30">
            <h3 class="name">
                {{$mandal->mandal_name}}
            </h3>
        </div>
    </div>
</div>
@include('layouts.footer')
      
         