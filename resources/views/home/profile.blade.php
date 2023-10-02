@include('partials.header')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">Profile</h1>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Profile
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('edit-profile')}}" method="POST" autocomplete="off">
                                @csrf
                                        <div class="form-group col-lg-6">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{isset($users->name) ? $users->name:''}}" class="form-control" required="required">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Mobile No</label>
                                            <input type="text" name="mobile_no" pattern="[0-9]{10}" value="{{isset($users->mobile_no) ? $users->mobile_no:''}}" class="form-control" required="required">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Email</label>
                                            <input type="text" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" pattern="[0-9]{10}" value="{{isset($users->email) ? $users->email:''}}" class="form-control" required="required">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Password</label>
                                            <input type="text" name="password" value="" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control">{{isset($users->address) ? $users->address:''}}</textarea>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <input type="hidden" name="id" value="{{isset($users->id) ? $users->id:''}}">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <a href="{{url('dashboard')}}" class="btn btn-default">Back</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@include('partials.footer')