<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
      
        <title>ADDWEB</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">

         <!-- DataTables CSS -->
         <link href="{{asset('css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{asset('css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('css/startmin.css')}}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <!-- Custom Fonts -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('dashboard')}}">ADDWEB</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-right navbar-top-links">
                    <!-- <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret">{{Auth::user()->notifications()->count()}}</b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                           <li>
                             <a href="#"> 
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> new comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>

                             </a>
                           </li>
                        </ul>
                    </li> -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ucwords(Auth::user()->name)}} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{url('profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="{{url('dashboard')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                        @if (Auth::user()->user_type_id == "1")
                                <li>
                                    <a href="{{url('users')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Users</a>
                                </li>
                                <li>
                                    <a href="{{url('ticket')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Ticket</a>
                                </li>
                        @elseif (Auth::user()->user_type_id == "2")
                                <li>
                                    <a href="{{url('ticket')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Ticket</a>
                                </li>
                        @endif
                                <li>
                                    <a href="{{url('notification')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Notification</a>
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>