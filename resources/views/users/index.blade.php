@include('partials.header')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                    <div class="row">
                        <div class="col-lg-12">
                        <div style="margin-bottom:20px;"><a href="{{url('create')}}" class="btn btn-primary">ADD NEW</a></div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Users List
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($users->count() > 0)
                                                   @foreach($users as $u)
                                                        <tr>
                                                            <td>{{$u->user_type->name}}</td>
                                                            <td>{{$u->name}}</td>
                                                            <td>{{$u->mobile_no}}</td>
                                                            <td>{{$u->address}}</td>
                                                            <td><a href="{{url('users/edit/'.$u->id)}}" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                                            <a href="{{url('users/delete/'.$u->id)}}" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a> 
                                                           </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                 <tr>
                                                    <td colspan="5">No Data Found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {{ $users->links() }}
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@include('partials.footer')