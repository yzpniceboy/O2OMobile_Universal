@extends('Backend.layout')
@section('page_title')
<h1>投诉举报列表 <!--<span class="middle-sep mg-x-10"></span><a href="{{url('/admin/user/new')}}" class="btn btn-info">新建</a>--></h1>
@stop
@section('content')
<div class="row">
    <div class="col-md-12 form-group">
        <div class="table-filter col-md-12 row">
            <form action="" method="get" accept-charset="utf-8">
                <div class="col-md-3">
                    <input type="text" name="time_range" class="form-control daterange" value="{{Input::get('time_range')}}" placeholder="举报时间"/>
                </div>
                <div class="col-md-2">
                    <input type="text" name="keyword" class="form-control" value="{{Input::get('keyword')}}" placeholder="举报者">
                </div>
                <div class="col-md-2">
                    <input type="text" name="order" class="form-control" value="{{Input::get('order')}}" placeholder="被举报订单ID">
                </div>
                <div class="col-md-3">
                    <input type="text" name="text" class="form-control" value="{{Input::get('text')}}" placeholder="举报内容">
                </div>
                <div class="col-md-1">
                    <input type="submit" class="submit-btn btn btn-blue" value="搜索" />
                </div>
            </form>
        </div>
        <hr class="clearfix">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>举报者</th>
                    <th>被举报者</th>
                    <th>被举报订单ID</th>
                    <th>举报内容</th>
                    <th>举报时间</th>
                    <th class="do">操作</th>
                </tr>
            </thead>
            <tbody>
                @if(!count($reports))
                <tr>
                    <td colspan="8">无数据</td>
                </tr>
                @else
                @foreach($reports as $report)
                <tr>
                    <td class="td-id">{{$report->id}}</td>
                    <td>{{User::userinfo($report->operate_id)}}</td>
                    <td>{{User::userinfo($report->user_id)}}</td>
                    <td>{{$report->order_id ? $report->order_id : '无'}}</td>
                    <td>{{$report->text}}</td>
                    <td>{{isset($report->created_at) ? $report->created_at->format('Y-m-d H:i') : '无'}}</td>
                    <td class="do">
                    </td>
                </tr>
                @endforeach
                <tr><td colspan="9">
                    <div class="table-actions row">
                        <div class="pull-right">{{$reports->appends(Request::except('page'))->links('Backend.includes.pager')}}</div>
                    </div>
                </td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop

@section('page_css')
<link rel="stylesheet" href="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/js/daterangepicker/daterangepicker-bs3.css') }}">
@stop

@section('page_js')
<script src="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.min.js') }}" ></script>
<script src="{{ asset('/backend/js/daterangepicker/moment.min.js') }}" ></script>
<script src="{{ asset('/backend/js/daterangepicker/daterangepicker.js') }}" ></script>
@stop