@extends('backend.app')
@section('content')
<div class="tab_content">

<h3 class="box_title">Add New 
 <a href="{{route('our-team.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a></h3>
	{!! Form::open(array('route' => 'our-team.store','class'=>'form-horizontal','files'=>true)) !!}
	    
	    <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
            {{Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                <label class="slide_upload" for="file">
                    <!--  -->
                    <img id="image_load">
                </label>
                {{Form::file('photo',array('id'=>'file','style'=>'display:none'))}}
                 @if ($errors->has('photo'))
	                    <span class="help-block" style="display:block">
	                        <strong>{{ $errors->first('photo') }}</strong>
	                    </span>
	                @endif
            </div>
        </div>
        <div class="form-group">
            {{Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
            <? $max=$max_serial+1; ?>
                {{Form::number('serial_num',"$max",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('name', 'Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Name','required'))}}
            </div>
        </div>
        
        <div class="form-group">
            {{Form::label('designation', 'Designation', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('designation','',array('class'=>'form-control','placeholder'=>'Designation'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::email('email','',array('class'=>'form-control','placeholder'=>'Email'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('address', 'Address', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('address','',array('class'=>'form-control','placeholder'=>'Address'))}}
            </div>
        </div>

        <div class="form-group">
            {{Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),'1', ['class' => 'form-control'])}}
            </div>
        </div>
        
	    <div class="form-group">
	        <div class="col-md-9 col-md-offset-3">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
      </div>
	{!! Form::close() !!}

@endsection

