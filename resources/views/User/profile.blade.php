@include('layouts.header')
<style>
    .form-label{
        font-weight: bold;
    }
</style>
<div class="main-content-header">
    <h1>Profile</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard-sales.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <span class="active">Profile Settings</span>
        </li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="profile-left-content">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title">Account Profile</h5>
                    </div>
                        <div class="profile-header mb-30">
                        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <img src="{{asset('imageuploaded/' . $user->image)}}" alt="Profile"
                                    style="width: 100px; height:100px;" class="rounded-circle">
                                <span id="fileName" class="text-muted"></span><br>
                                <input type="file" id="imageInput" class="form-control form-control-file" name="image" style="display: none;" onchange="showFileName()">
                                <a href="#" id="uploadLink" class="btn btn-link">Change profile picture</a>
                                <h3 class="name mt-3">
                                    {{$user->name}}
                                </h3>
                                <p>
                                {{$user->address}}
                                </p>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="profile-settings-form mb-30">
            @if($errors->any())
                <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                </div>
            @endif 
                <div class="row">
                    <div class="col-md">
                        <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label class="form-label">Mobile No.</label>
                            <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label class="form-label">Pancard No.</label>
                            <input type="text" class="form-control" name="pancard" value="{{$user->pancard_no}}">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label class="form-label">Adhar card No.</label>
                            <input type="text" class="form-control" name="adharcard" value="{{$user->adharcard_no}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label class="form-label">Birthday Date</label>
                            <input type="date" class="form-control" name="dob" value="{{$user->date_of_birth}}">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <textarea rows="3" class="form-control" name="address">{{$user->address}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label ">Gender</label>
                    <div class="row ">
                        <div class="col-sm ">
                            <input class="form-check-input col-sm-3 pt-0 " type="radio" name="gender" id="gridRadios1"
                                value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label col-sm-9 pt-0" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female"
                                {{ $user->gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="gridRadios2">
                                Female
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="other" {{ $user->gender == 'other' ? 'checked' : '' }}>
                            <label class="form-check-label" for="gridRadios3">
                                Other
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter new password">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Your password">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    document.getElementById('uploadLink').addEventListener('click', function(e) {
        e.preventDefault(); 
        document.getElementById('imageInput').click();
    });

    function showFileName() {
        const fileInput = document.getElementById('imageInput');
        const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'No file selected';
        document.getElementById('fileName').textContent = fileName;
    }
</script>
    @include('layouts.footer')
