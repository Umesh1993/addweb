@include('partials.header')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    @if($errors->any())
                        <div class="alert alert-danger" style="margin-top:25px">
                        {{$errors->first()}}
                        </div>
                    @endif
                    <h1 class="page-header">Add Users</h1>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      ADD NEW
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{url('users')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group col-lg-6">
                                        <label>Name</label>
                                        <input type="text" name="name" value="" class="form-control" required="required">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Mobile No</label>
                                        <input type="text" name="mobile_no" pattern="[0-9]{10}" value="" class="form-control" required="required">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Email</label>
                                        <input type="text" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" pattern="[0-9]{10}" value="" class="form-control" required="required">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Password</label>
                                        <input type="password" name="password"  value="" class="form-control" required="required" autocomplete="off">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control"></textarea>
                                    </div>
                                   
                                    <div class="form-group col-lg-12">
                                        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                                        <a href="{{url('users')}}" class="btn btn-default">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
         

        </div>
</div>
@include('partials.footer')
