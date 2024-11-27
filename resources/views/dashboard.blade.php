@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="row">
    <div class="col-lg-9 col-md-8" style="width: 80%;">
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
            <div class="row">
                @foreach ($mandals as $value)
                <div class="col-md-3 col-sm-6 mb-3 mandal">
                <input type="hidden" value="{{$value->id}}" name="mandalid">
                    <div class="card profile-card shadow-lg h-100">
                        <div class="card-body text-center">
                            <div class="position-relative">
                                    <input type="hidden" class="mandalid" value="{{$value->id}}" name="mandalid">
                                    <img class="rounded-circle" src="{{ asset('imageuploaded/' . $value->logo) }}"
                                        alt="Mandal Logo" width="100px" height="100" />
                                </div>
                                <div>
                                    <p class="mt-2 font-weight-bold text-truncate text-info" style="font-size: 15px;">
                                        {{$value->mandal_name}}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-muted">8 members</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="sidemenu-area-right">
            <nav class="sidemenu navbar navbar-expand navbar-light hide-nav-title">
                <div class="navbar-collapse collapse">
                    <div class="navbar-nav sidemenu-content">
                        <div class="container mt-2 mandaldetails">
                            <h4 class="mb-3">Mandal Details</h4>
                            <p class="text-muted">5 Employees</p>
                            <div class="userlist">
                            @if (isset($details))
                            @foreach ($details as $value)
                            <div class="row userdetails">
                                <!-- Staff Member 1 -->
                                <div class="col-12 staff-card d-flex align-items-center">
                                    <img src="https://via.placeholder.com/50" alt="Avatar"
                                        class="avatar me-3 rounded-circle">
                                    <div class="flex-grow-1">
                                        <p class="staff-name fw-bold mb-1">Susan Waldman</p>
                                        <p class="staff-role text-muted small mb-0">Bartender</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
    $('.mandal').on('click', function () {
        var id = $(this).find('.mandalid').val();
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('mandal.details') }}',
            type: 'GET',
            data: {id: id },
            success: function (response) {
                console.log("Response:", response); 
                var data = response; 
                
                $(".userdetails").remove();
                data.forEach(function (value) {
                    var display = `<div class="row userdetails">
                                <div class="col-12 staff-card d-flex align-items-center">
                                <img src="{{ asset('imageuploaded/${value.image}') }}" alt="Avatar" 
                                        class="me-3 rounded-circle" width="50px" height="50" />
                                        <div class="flex-grow-1 ml-2">
                                            <h6 class="staff-name fw-bold mb-1">${value.name}</h6> 
                                            <p class="staff-role text-muted small mb-0">${value.mobile}</p>
                                        </div>
                                        <div class="permissions">${value.user_role}</div>
                                        </div>
                            </div>`;
                    $('.userlist').append(display);
                });
                $(".userdetails").hide().show(1000); // Change 300 to adjust the speed

            },
            error: function (xhr, status, error) {
                console.error("Error occurred:", error);
            }
        });
    });
</script>

@include('layouts.footer')
 

