@extends('admin.layouts.master')

@section('title')
    Admins 
@stop

@section('header')
@stop


@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <h2>Add an admin</h2>
                            {!! Form::open(['action'=>'Admin\AdminController@store']) !!}
                                <div class="form-group">
                                        {!!Form::label('username','Username:') !!}
                                        {!!Form::text('username',null,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                        {!! Form::submit("Add",['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}

                            @include ('errors.list')
            </div>

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                
                   <table class="resource-table">
                        
                         <tr>
                                 <th>Username</th> 
                                 <th>Appointed on</th> 
                         </tr>

                        <?php $cnt = 0; ?>
                        
                        @foreach($admins as $admin)
                        <tr class="<?php echo (($cnt++)%2 == 0)?null:'alt'; ?>">
                                <td>{{ $admin->user->username }}</td> 
                                <td>
                                     {{ $admin->created_at }} 
                                </td>
                        </tr>

                        @endforeach 
                   </table>


            </div>


@stop

