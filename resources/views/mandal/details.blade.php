@include('layouts.header')
<style>
    .profile-card {
        transition: transform 0.3s;
    }

    .profile-card:hover {
        transform: scale(1.05);
    }
</style>
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
            <!-- <img src="assets/img/user/1.jpg" alt="Profle" class="rounded-circle"> -->
            <h3 class="name">
                {{$mandal->mandal_name}}
            </h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="profile-left-content">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Mandal Details</h5>
                    </div>
                    <div>
                        <p class="font-weight-bold">Tenert :</p>
                        <p>
                            {{$mandal->tenert}}
                        </p>
                    </div>
                    <p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="profile-left-content">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Mandal Transaction Details</h5>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <span class="font-weight-bold">Installment Amount :</span>
                        <div class="text-muted ml-1">
                            {{ number_format($mandal->installment_amount, 2) }}
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <span class="font-weight-bold">Interest Rate :</span>
                        <div class="text-muted ml-1">
                            {{$mandal->interest_rate}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-30">
            <div class="card-body">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <p class="mb-0">Member of Mandal</p>
                    </div>
                    <button type="button" class="btn btn-success rounded">Add new member</button>
                </div>
                <div class="row">
                    @foreach ($member as $value)
                        <!-- Profile Card 1 -->
                        <div class="col-md-2 mb-3">
                            <div class="card profile-card shadow-lg">
                                <div class="card-body text-center">
                                    <div class="position-relative">
                                        <img class="rounded-circle" src="{{asset('imageuploaded/' . $value->image)}}"
                                            width="70" height="70" />
                                        <div class="position-absolute" style="top: 10px; right: 10px; color: gray;">
                                            <i class="fas fa-pen"></i>
                                        </div>
                                    </div>
                                    <p class="mt-4 font-weight-bold" style="font-size: 20px;">{{$value->name}}</p>
                                    <p class="text-muted">{{$value->user_role}}</p>
                                    <p class="text-muted"><b>mobile :</b> {{$value->mobile}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-2 mb-3" id="add-new-member" data-toggle="modal" data-target="#mandalmodal">
                        <div class="card profile-card shadow-lg" style="height: 252px;">
                            <div class="card-body text-center">
                                <div class="text-primary display-3 mt-4">
                                    +
                                </div>
                                <div class="text-secondary ">
                                    <p>
                                        ADD NEW
                                    </p>
                                    MEMBER
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mandalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="error" class="alert alert-danger mt-3" role="alert" style="display: none;"></div>

                <form>
                    <input type="hidden" value="{{$mandal->id}}" name="mandalid">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    <select id="user" class="form-control" name="userid">
                                        <option value="">Select Member</option>
                                        @foreach ($user as $u)
                                            <option value="{{ $u->id }}">
                                                {{ $u->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select id="role" class="form-control" name="role"
                                        onchange="toggleDefaultManager(this.value)">
                                        <option value="">Select Role</option>
                                        <option value="member">Member</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group defaultmanager d-none">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="manager" name="manager">
                            <label class="form-check-label" for="gridCheck">
                                Default Manager
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('role').addEventListener('change', function () {
        const isManager = this.value === 'manager';
        const defaultManagerDiv = document.querySelector('.defaultmanager');

        if (isManager) {
            defaultManagerDiv.classList.add('d-none'); 
        } else {
            defaultManagerDiv.classList.remove('d-none');
        }
    });


    $('.save').on('click', function () {
        var formData = $('form').serialize();
        console.log(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('mandalwiseuser.store') }}',
            type: 'POST',
            data: formData,
            success: function (response) {
                $("#mandalmodal").hide();
            },
            error: function (xhr, status, error) {
                let errorMessage = `<strong>Error:</strong><ul>`;

                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.errors && typeof response.errors === 'object') {
                        for (const [field, messages] of Object.entries(response.errors)) {
                            messages.forEach((message) => {
                                errorMessage += `<li>${message}</li>`;
                            });
                        }
                    } else {
                        errorMessage += `<li>${response.message || xhr.responseText}</li>`;
                    }
                } catch (e) {
                    errorMessage += `<li>${xhr.responseText}</li>`;
                }
                errorMessage += `</ul>`;
                $('#error').html(errorMessage).fadeIn();
            }
        });
    });
</script>

@include('layouts.footer')
      
         