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
                        <form method="POST" action="{{url('ticket')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group col-lg-6">
                                        <label>Title</label>
                                        <input type="text" name="title" value="" class="form-control" required="required">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Assign user</label>
                                        <select name="user_id" class="form-control" required="required">
                                            <option>Please select user</option>
                                            @if($users)
                                              @foreach($users as $u)
                                                <option value="{{$u->id}}">{{ucwords($u->name)}}</option>
                                              @endforeach
                                            @endif  
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                    
                                    <div class="form-group col-lg-12">
                                        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                                        <a href="{{url('ticket')}}" class="btn btn-default">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@include('partials.footer')
