@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{$tender->job->name}}</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-file"></i> Tenders</a></li>
            <li><a href="/admin/tenders">Manage Tenders</a></li>
            <li class="active">Tender Details</li>
        </ol>
    </div>
</div>
<div id="content-main" class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">Job Details</span>
                </div>
                <div class="panel-body">
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Status:</label></div>
                        <div class="col-lg-11">{{$tender->tenderStatus->text}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Job Title:</label></div>
                        <div class="col-lg-11">{{$tender->job->name}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Address:</label></div>
                        <div class="col-lg-3">{{$tender->job->address_street}}</div>
                        <div class="col-lg-2">{{$tender->job->address_suburb}}</div>
                        <div class="col-lg-2">{{$tender->job->address_state}}</div>
                        <div class="col-lg-1">{{$tender->job->address_zip}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3"><i><strong>Street</strong></i></div>
                        <div class="col-lg-2"><i><strong>Suburb</strong></i></div>
                        <div class="col-lg-2"><i><strong>State</strong></i></div>
                        <div class="col-lg-1"><i><strong>Zip Code</strong></i></div>
                    </div></br>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Sales Person:</label></div>
                        <div class="col-lg-11">{{$tender->sales->name}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Due Date:</label></div>
                        <div class="col-lg-11">{{date('M d, Y',strtotime($tender->job->due_date))}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Date Created:</label></div>
                        <div class="col-lg-11">{{date('M d, Y H:g:s',strtotime($tender->job->created_at))}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Date Modified:</label></div>
                        <div class="col-lg-11">{{date('M d, Y H:g:s',strtotime($tender->job->updated_at))}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
    		<div class="panel panel-primary">
            	<div class="panel-heading">
            		<span class="panel-title">Contractor Details</span>
            	</div>
                <div class="panel-body">
                	<div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Name:</label></div>
                        <div class="col-lg-11">{{$tender->contractor->name}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Bus. Address:</label></div>
                        <div class="col-lg-3">{{$tender->contractor->business_address_street}}</div>
                        <div class="col-lg-2">{{$tender->contractor->business_address_suburb}}</div>
                        <div class="col-lg-2">{{$tender->contractor->business_address_state}}</div>
                        <div class="col-lg-1">{{$tender->contractor->business_address_zip}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3"><i><strong>Street</strong></i></div>
                        <div class="col-lg-2"><i><strong>Suburb</strong></i></div>
                        <div class="col-lg-2"><i><strong>State</strong></i></div>
                        <div class="col-lg-1"><i><strong>Zip Code</strong></i></div>
                    </div></br>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Postal Address:</label></div>
                        <div class="col-lg-3">{{$tender->contractor->postal_address_street}}</div>
                        <div class="col-lg-2">{{$tender->contractor->postal_address_suburb}}</div>
                        <div class="col-lg-2">{{$tender->contractor->postal_address_state}}</div>
                        <div class="col-lg-1">{{$tender->contractor->postal_address_zip}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3"><i><strong>Street</strong></i></div>
                        <div class="col-lg-2"><i><strong>Suburb</strong></i></div>
                        <div class="col-lg-2"><i><strong>State</strong></i></div>
                        <div class="col-lg-1"><i><strong>Zip Code</strong></i></div>
                    </div></br>

                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Phone Number:</label></div>
                        <div class="col-lg-11">{{$tender->contractor->phone}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Email Address:</label></div>
                        <div class="col-lg-11">{{$tender->contractor->email}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">Contact Details</span>
                </div>
                <div class="panel-body">
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Name:</label></div>
                        <div class="col-lg-11">{{$tender->contact->name}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Phone Number:</label></div>
                        <div class="col-lg-11">{{$tender->contact->phone}}</div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-1"><label class="control-label">Email Address:</label></div>
                        <div class="col-lg-11">{{$tender->contact->email}}</div>
                    </div>
                </div>
            </div>
        </div>

        @if($tender->documents()->count() > 0)
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">Related Documents</span>
                </div>
                <div class="panel-body">
                    <div class="row col-lg-12" style="margin-bottom:10px;">
                        <div class="pull-right">
                            <a href="/admin/download/tenderdocuments/?id={{$tender->id}}" target="_blank">
                                <button type="button" class="btn btn-sm btn-default" title="Download this file"><i class="icon-download-alt"></i> Download All Related Documents</button>
                            </a>
                        </div>
                    </div>

                    <div id="fileupload-preview" class="row col-lg-12" style="margin-top:20px;height:auto;max-height:300px;overflow-y:auto;">
                        @if($tender->documents()->count() > 0)
                        @foreach($tender->documents()->get() as $document)
                        <div class="upload-item row">
                            <div class="col-lg-1">
                                <a href="javascript:;" class="thumbnail">
                                    @if($document->is_image)
                                        <img src="{{$document->url->thumbnail}}">
                                    @else
                                        <span class="fa fa-file" style="font-size:30px;"></span>
                                    @endif
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <span class="fa fa-paperclip" style="font-size:30px;">
                                </span>&nbsp;<span>{{$document->text}}</span>
                                <input type="hidden" name="upload_name[]" value="{{$document->name}}">
                                <input type="hidden" name="upload_text[]" value="{{$document->text}}">
                            </div>
                            <div class="col-lg-5">
                                <p style="overflow-y: none;height: 60px;">{{$document->note}}</p>
                            </div>
                            <div class="col-lg-2">
                                <a href="/admin/download/tenderdocuments/{{$document->name}}" target="_blank">
                                    <button type="button" class="btn btn-sm btn-default" title="Download this file"><i class="icon-download-alt"></i> Download</button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row col-lg-12" style="text-align:center;">
            <a href="/admin/tenders/{{$tender->id}}/edit">
                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-edit"></i>Update Tender Details</button>
            </a>
        </div>
    </div>
</div>
@stop

@section('footer-js')

@stop