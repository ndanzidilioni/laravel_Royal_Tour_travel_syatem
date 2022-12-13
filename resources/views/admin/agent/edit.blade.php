@extends('layouts.MainLayOutNav')
@section('content')
    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Agent
                        <span class="slight slight-align ">
                               <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Agent Home
                               <br/>
                              <a class="btn btn-default" href="/system/agent">Agent</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled activer-border">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Add

                        <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Add New Agent
                                <br/>
                             <a  class="btn btn-default" href="/system/agent/create">Add</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        View
                        <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                View All Agents
                                <br/>
                             <a  class="btn btn-default" href="/system/agent/view">View</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <br/>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3>Update Agent details </h3>
                    @include('notifications._message')
                    {!! Form::model($agent, ['method' => 'PATCH','action' => ['Agent\AgentController@update', $agent->id],'id'=>'agentForm']) !!}
                    @include('admin.agent.partials.uneditformPartial',['btn' => 'Update Agent'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#agentForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email should cannot be empty'
                        },
                        emailAddress: {
                            message: 'Should be a valid email address'
                        }
                    }
                },
                number: {
                    validators: {
                        notEmpty: {
                            message: 'Phone Number should not be empty'
                        },
                        regexp: {
                            regexp: /^[0-9\s]+$/i,
                            message: 'The number can consist of numbers only'
                        },
                        stringLength:{
                            min:10,
                            max:10,
                            message:'Invalid contact number'
                        }
                    }
                }


            }
        });
    </script>
@endsection