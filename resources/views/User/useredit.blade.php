@include('layouts.header')

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
    <div class="col-lg-12">
        <div class="profile-settings-form mb-30">
        @if($errors->any())
     <div class="error-message">
        <i class="fas fa-exclamation-triangle"></i>
        <div class="message-content">
            <strong>Error</strong><br>
            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <button onclick="this.parentElement.style.display='none'"><i class="fas fa-times"></i></button>
    </div>
    @endif
        <form  action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
        @csrf
                <div class="form-group">
                    <label class="form-label">Upload New Picture</label>
                    <input type="file" class="form-control form-control-file" name="image">
                </div>
                <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label class="form-label">Pancard No.</label>
                    <input type="text" class="form-control" name="pancard" value="{{$user->pancard_no}}">
                </div>
                <div class="form-group">
                    <label class="form-label">Adhar card No.</label>
                    <input type="text" class="form-control" name="adharcard" value="{{$user->adharcard_no}}">
                </div>
                <div class="form-group">
                    <label class="form-label">Mobile No.</label>
                    <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                <div class="form-group">
                    <label class="form-label">Birthday Date</label>
                    <input type="date" class="form-control" name="dob" value="{{$user->date_of_birth}}">
                </div>
                <div class="form-group">
                    <!-- <label class="form-label">Gender</label>
                    <input type="text" class="form-control" value="{{$user->gender}}">
                    <div class="form-group"> -->
                    <label class="col-form-label ">Gender</label>
                    <div class="row ">
                        <div class="col-sm ">
                            <input class="form-check-input col-sm-3 pt-0 " type="radio" name="gender" id="gridRadios1"
                                value="male">
                            <label class="form-check-label col-sm-9 pt-0" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios2"
                                value="female">
                            <label class="form-check-label" for="gridRadios2">
                                Female
                            </label>
                        </div>
                        <div class="col-sm">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios3"
                                value="other">
                            <label class="form-check-label" for="gridRadios3">
                                Other
                            </label>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <div class="form-group">
                    <label class="form-label">Address</label>
                    <textarea rows="3" class="form-control" name="address">{{$user->address}}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmpassword">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Settings</button>
                </div>
            </form>
        </div>
    </div>
@include('layouts.footer')
