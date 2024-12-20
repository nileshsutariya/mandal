@include('layouts.mandalheader')
<style>
    .nav-search-form {
        display: inline-block;
        position: relative;
        width: 50%;
    }

    .nav-search-form .form-control {
        height: 36px;
        border-radius: 20px;
        background: #eef5f9;
        border-color: #eef5f9;
        padding: 0 15px;
        font-size: 13px;
        font-weight: 300;
    }

    .nav-search-form .search-success {
        position: absolute;
        top: 0;
        right: 0;
        background: transparent;
        border-color: transparent;
        border-radius: 0px 30px 30px 2px;
        height: 36px;
        color: #717171;
        font-size: 20px;
        line-height: 20px;
        padding: 0 15px;
    }

    .nav-search-form .search-success .icon {
        width: 15px;
        height: 15px;
        margin-top: -3px;
    }

    .nav-search-form .search-success:hover {
        color: #2962ff;
    }

    .role {
        margin-left: auto;
    }

    @media (min-width: 990px) and (max-width: 1100px) {
        .role {
            margin-left: 4px;
        }
    }
</style>
<!-- <div class="main-content-header">
    <h1>Mandal</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard-sales.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <span class="active">mandal</span>
        </li>
    </ol>
</div> -->
<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card mb-30">
            <div class="card-body">

                <form>
                    <input type="hidden" class="mandalid" value="{{$mandal->id}}">
                </form>
                <div class="d-flex">
                    <div>
                        <img src="{{asset('imageuploaded/' . $mandal->logo)}}" class="rounded-circle p-0 "
                        style="height: 100px; width: 100px;">
                    </div>
                    <div class="p-1 ml-4 mt-3">
                        <h6 class="name ">
                            {{$mandal->mandal_name}}
                        </h6>
                       <span>{{$membercount}}Member</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="profile-left-content">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <form>
                                <input type="hidden" class="mandalid" value="{{$mandal->id}}">
                            </form>
                            <img src="{{asset('imageuploaded/' . $mandal->logo)}}" class="rounded-circle p-0 "
                                style="height: 100px; width: 100px;">
                        </div>
                        <div class="p-1 ml-4 mt-1">
                            <h6 class="name ">
                                {{$mandal->mandal_name}}
                            </h6>
                            <i class="fas fa-users me-1 mt-1 text-primary fa-lg"></i>
                            <span class="ml-1">
                                {{$membercount}} Member
                            </span>
                        </div>
                    </div>
                    <hr><br>
                    <div class="card-header">
                        <h5 class="card-title">Mandal Details</h5>
                    </div>
                    <div>
                        <span class="font-weight-bold">Tenert :</span>
                        {{$mandal->tenert}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-5 col-sm-4">
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

    <div class="col-lg-3 col-md-4 col-sm-5">
        <div class="card mb-30">
            <div class="card-body">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <p class="mb-0">Member of Mandal</p>
                    </div>
                    @if ($role->user_role == 'manager')
                        <form class="nav-search-form d-none d-sm-block">
                            <input type="text" class="form-control search" placeholder="Search...">
                            <button type="button" class="search-success">
                                <i data-feather="search" class="icon"></i>
                            </button>
                        </form>
                    @endif
                </div>
                <div class="row memberlist" style="max-height: 500px; overflow-y: auto;">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3  memberdata">
                        <!-- <div class="card shadow-lg"> -->
                        <!-- <div class="card-body memberdata scroll" style="max-height: 500px; overflow-y: auto;"> -->
                        @foreach ($member as $value)
                            <div class="d-flex align-items-center mb-3 member">
                                <div>
                                    <img class="rounded-circle ml-2" src="{{ asset('imageuploaded/' . $value->image) }}"
                                        width="50" height="50" alt="User Image" />
                                </div>
                                <div class="ml-3">
                                    <p class="font-weight-bold mb-0">
                                        {{ $value->name }}
                                    </p>
                                </div>
                                <div class="role">
                                    <p class="text-muted mb-0">
                                        {{ $value->user_role }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <!-- </div>
                    </div>
                </div> -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('input', '.search', function () {
            var search = $(this).val();
            var mandal = $('.mandalid').val();

            // console.log(mandal);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('memberlist') }}",
                data: {
                    'search': search,
                    'mandalid': mandal,
                },
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    var member = data.member;
                    var wise = data.wise;
                    var sendrequest = data.sendrequest;

                    var htmlContent = '';
                    member.forEach(function (value) {
                        var Send = sendrequest.some(sr => sr.requested_to_userid === value.id);

                        var Wise = wise.some(w => w.user_id === value.id);
                        if (Wise) {
                            var matchedWise = findwise(value.id);
                        }
                        // console.log(Wise);
                        function findwise(id) {
                            return wise.find(w => w.id === id);
                        }
                        htmlContent += `
                    <div class="d-flex align-items-center mb-3 member">
                        <div>
                        <input type="hidden" class="memberid" value=" ${value.id}">
                            <img class="rounded-circle ml-2" src="{{ asset('imageuploaded/') }}/${value.image}" width="50" height="50" alt="User Image" />
                        </div>
                        <div class="ml-3">
                            <p class="font-weight-bold mb-0">
                                ${value.name}
                            </p>
                      
                        </div>
                        <div class="ml-auto">
                        ${Send
                                ? '<button class="btn btn-secondary btn-sm" disabled>Invited</button>'
                                : (!Send && !Wise
                                    ? '<button class="btn btn-primary btn-sm invite">Invite</button>'
                                    : (matchedWise ? `<p>${matchedWise.user_role}</p>` : '')
                                )
                            }
                        </div>
                    </div>
                    <hr>`;
                    });
                    $('.memberdata').html(htmlContent);
                    $('.memberdata').hide().show(1000);
                } 
            });
        });


        $(document).on('click', '.invite', function () {
            var id = $(this).closest('.member').find('.memberid').val();
            var mandal = $('.mandalid').val();
            var search = $('.search').val();
            // console.log(id);
            // console.log(mandal);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('send.request') }}",
                data: {
                    'id': id,
                    'mandalid': mandal,
                    'search': search,
                },
                type: 'GET',
                success: function (data) {
                    Swal.fire({
                        title: "Request send successfully !",
                        text: data.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    var member = data.member;
                    var wise = data.wise;
                    var sendrequest = data.sendrequest;

                    var htmlContent = '';
                    member.forEach(function (value) {
                        var Send = sendrequest.some(sr => sr.requested_to_userid === value.id);

                        var Wise = wise.some(w => w.user_id === value.id);
                        if (Wise) {
                            var matchedWise = findwise(value.id);
                        }
                        // console.log(Wise);
                        function findwise(id) {
                            return wise.find(w => w.id === id);
                        }
                        htmlContent += `
                    <div class="d-flex align-items-center mb-3 member">
                        <div>
                        <input type="hidden" class="memberid" value=" ${value.id}">
                            <img class="rounded-circle ml-2" src="{{ asset('imageuploaded/') }}/${value.image}" width="50" height="50" alt="User Image" />
                        </div>
                        <div class="ml-3">
                            <p class="font-weight-bold mb-0">
                                ${value.name}
                            </p>
                       
                        </div>
                        <div class="ml-auto">
                        ${Send
                                ? '<button class="btn btn-secondary btn-sm" disabled>Invited</button>'
                                : (!Send && !Wise
                                    ? '<button class="btn btn-primary btn-sm invite">Invite</button>'
                                    : ''
                                )
                            }
                        </div>
                    </div>
                    <hr>`;
                    });
                    $('.memberdata').html(htmlContent);
                    $('.memberdata').hide().show(1000);
                }
            });
        });

    </script>

    @include('layouts.footer')

      
         