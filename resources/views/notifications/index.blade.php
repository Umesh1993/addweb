@include('partials.header')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Notification</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Notification List
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>User name</th>
                                                    <th>Notification</th>
                                                    @if (Auth::user()->user_type_id == "2")
                                                     <th>Action</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($notifications->count() > 0)
                                                 <?php $i =1;?>
                                                     @foreach($notifications as $n)
                                                     <?php 
                                                     if(Auth::user()->user_type_id == '2'){
                                                         $name = ucwords(Auth::user()->name);
                                                         $message = $n->data['message'];
                                                     }else{
                                                        $name = ucwords($n->user->name);
                                                        $data = json_decode($n->data);
                                                        $message = $data->message;
                                                     }
                                                     ?>
                                                        <tr {{($n->read_at == '') ? 'style=font-weight:bold':''}}>
                                                            <td><?php echo $i++.'.';?></td>
                                                            <td>{{$name}}</td>
                                                            <td>{{$message}}</td>
                                                            @if (Auth::user()->user_type_id == "2")
                                                             <td><a href="{{url('notification-read/'.$n->id)}}" class="btn btn-warning">Mark as Read</a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @else
                                                 <tr>
                                                    <td colspan="4">No Data Found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {{ $notifications->links() }}
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