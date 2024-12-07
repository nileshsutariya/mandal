@include('layouts.mandalheader')

<style>
    .modalhover:hover {
        background-color: rgb(220, 220, 211);
    }
</style>

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
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-2">
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
        <div class="col-lg-6 col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-2 ">
                        <div class="card-header">
                            <h6 class="mb-3">Transaction Details </h6>
                        </div>
                        <div class="row">
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
                    <div class="card-header">
                        @if ($role->user_role == 'manager')
                            <button type="button" class="btn btn-primary rounded float-right btn-lg ml-3"
                                id="add-new-member" data-toggle="modal" data-target="#mandalmodal"><i
                                    class="fas fa-plus"></i> Add</button>
                        @endif
                        <h6 class="mb-3">Members </h6>
                    </div>
                    <div class="container mt-2 ">
                        <div class="userlist">
                            @if (isset($member))
                                @foreach ($member as $value)
                                    @if ($role->user_id == $value->id && $role->user_role == 'manager')
                                        <div class="row members modalhover" id="add-new-member" data-toggle="modal"
                                            data-target="#mandalmodal">
                                    @else
                                        <div class="row members">
                                    @endif
                                            <div
                                                class="col-lg-12 col-md-12 col-sm-12 staff-card d-flex align-items-center members">
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
    </div>

    <div class="modal fade" id="mandalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header ">
                    <h5 class="modal-title">Add New Member</h5>
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
        function toggleDefaultManager(role) {
            const isManager = role === 'manager';
            const defaultManagerDiv = document.querySelector('.defaultmanager');

            if (isManager) {
                defaultManagerDiv.classList.add('d-none');
            } else {
                defaultManagerDiv.classList.remove('d-none');
            }
        }

        $(document).on('click', '.save', function () {
            Swal.fire({
                title: "Confirmation",
                text: "Are you sure you want to send this request ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, add it !",
                cancelButtonText: "No, cancel !",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    addRecord();
                }
            });
        });

        function addRecord() {
            var formData = $('form').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('notification.send') }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    // console.log(response)    
                    $('#mandalmodal').modal('hide');
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        timer: 1500, 
                        showConfirmButton: false 
                    });                   
                    // setTimeout(function () {
                    //     location.reload();
                    // }, 2000);
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
                        } else if (response.message) {
                            errorMessage += `<li>${response.message}</li>`;
                        } else {
                            errorMessage += `<li>${xhr.responseText}</li>`;
                        }
                    } catch (e) {
                        errorMessage += `<li>${xhr.responseText}</li>`;
                    }

                    errorMessage += `</ul>`;
                    $('#error').html(errorMessage).fadeIn();
                    console.log(xhr.responseText);
                }
            });
        }
    </script>

    @include('layouts.footer')