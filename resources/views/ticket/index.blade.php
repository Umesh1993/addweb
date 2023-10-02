@include('partials.header')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ticket</h1>
                    <div class="row">
                        <div class="col-lg-12">
                        <div style="margin-bottom:20px;"><a href="{{url('create-ticket')}}" class="btn btn-primary">ADD NEW</a></div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Ticket List
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>title</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($ticket->count() > 0)
                                                     @foreach($ticket as $t)
                                                        <tr>
                                                            <td>{{$t->title}}</td>
                                                            <td>{{$t->status}}</td>
                                                            <td><a href="{{url('ticket/view/'.$t->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-list"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3">No Data Found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {{ $ticket->links() }}
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