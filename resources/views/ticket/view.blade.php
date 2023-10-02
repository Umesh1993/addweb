@include('partials.header')
<div id="page-wrapper">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-6">
                
                    <h1 class="page-header">View
                    <a href="{{url('ticket')}}" class="btn btn-default pull-right">Back</a>
                    </h1>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ucwords($ticket->title)}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$ticket->description}}</td>
                    </tr>
                    <tr>
                        <th>Assign User</th>
                        <td>{{isset($ticket->users->name)  ? $ticket->users->name:''}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                        @if (Auth::user()->user_type_id == "1")
                            @if($ticket->status != 'Closed')
                                <form method="POST" action="{{url('status-change')}}">
                                    @csrf
                                    <input type="hidden" name="tracking_id" value="{{$ticket->id}}">
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="Pending" <?php echo isset($ticket->status) && ($ticket->status == 'Pending') ? 'selected="selected"':'';?>>Pending</option>
                                        <option value="Closed" <?php echo isset($ticket->status) && ($ticket->status == 'Closed') ? 'selected="selected"':'';?>>Closed</option>
                                    </select>
                                </form>
                            @else
                              {{$ticket->status}}
                            @endif
                        @else
                            {{$ticket->status}}
                        @endif
                            
                        </td>
                    </tr>
                   </table>
            </div>
         

        </div>
</div>
@include('partials.footer')
