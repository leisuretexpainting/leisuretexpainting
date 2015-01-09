@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-users"></i> Users</a></li>
            <li><a href="/admin/users">Manage Users</a></li>
            <li class="active">User Details</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">User Details&nbsp;</div>        
        <div class="panel-body">
            {{printpre($user->toArray())}}
        </div>
    </div>
</div>
</div>
@stop
