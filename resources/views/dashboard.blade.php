@extends('layouts.app')

@section('content')
<div class="content">
    <h3>{{$title ?? 'Dashboard'}}</h3>
    <br />
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">TICKETS BY PRIORITY</h5>
                </div>
                <div class="card-body">
                    <div id="priorityChart" style="height: 200px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">TICKETS BY TYPE</h5>
                </div>
                <div class="card-body">
                    <div id="typeChart" style="height: 200px;"></div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">TICKETS BY STATUS</h5>
                </div>
                <div class="card-body">
                    <div id="statusChart" style="height: 200px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card cardAudit">
                <div class="card-header">
                    <h5 class="card-title">AUDIT LOG</h5>
                </div>
                <div class="card-body tableAudit">
                    <table class="table tableText" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">Name</th>
                                <th scope="col">Done By</th>
                                <th scope="col">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @if(count($auditTrails) > 0)
                            @foreach($auditTrails as $auditTrail)
                            <tr>
                                <td>{{$auditTrail->action}}</td>
                                <td>{{$auditTrail->action_name}}</td>
                                <td>{{$auditTrail->user['name']}}</td>
                                <td>{{$auditTrail->created_at->format('m/d/Y h:m:s')}}</td>
                            </tr>
                            @endforeach
                            @else
                            <p style="text-align-center">No Audit found</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const priorityChart = new Chartisan({
          el: '#priorityChart',
          url: "@chart('priority_chart')",
          hooks: new ChartisanHooks()
          .colors()
        });

        const typeChart = new Chartisan({
          el: '#typeChart',
          url: "@chart('type_chart')",
          hooks: new ChartisanHooks()
          .colors()
        });

        const statusChart = new Chartisan({
          el: '#statusChart',
          url: "@chart('status_chart')",
          hooks: new ChartisanHooks()
          .colors()
          .borderColors()
        });
</script>
@endsection