@extends('frontend.includes.app')
@section('title', 'Dashboard')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
                <h2 class="mb-3 me-auto">Dashboard</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>Total Orders</h5>
                                <h2 class="fs-40 font-w600">{{ $countOrder->count() }}</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["var(--primary)", "rgba(242, 246, 252)"]}'>{{ $countOrder->count() }}/1000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>Pending Orders</h5>
                                <h2 class="fs-40 font-w600">{{ $pendingOrder->count() }}</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["rgb(56, 226, 93,1)", "rgba(242, 246, 252)"]}'>{{ $pendingOrder->count() }}/1000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>Completed Orders</h5>
                                <h2 class="fs-40 font-w600">{{ $completedOrder->count() }}</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["rgb(255, 135, 35,1)", "rgba(242, 246, 252)"]}'>{{ $completedOrder->count() }}/1000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>Tasks In Process</h5>
                                <h2 class="fs-40 font-w600">{{ $tasksInProcess }}</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["rgb(51, 62, 75,1)", "rgba(242, 246, 252)"]}'>{{ $tasksInProcess }}/1000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (Auth::user()->role == 2)
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Recent Alloted Tasks</h3>
                            </div>
                            <div class="table-responsive fs-14">
                                <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table"
                                    id="example5">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Customer Name</th>
                                            <th>Task Description</th>
                                            <th>Status</th>
                                            <th>Task Due Date</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @forelse ($tasks as $tk)
                                            <tr>
                                                <td>{{ $tk->user->name }}</td>
                                                <td>{{ $tk->description }}</td>
                                                <td>
                                                    @if ($tk->status == 1)
                                                        <span class="text-warning">On Process</span>
                                                    @elseif ($tk->status == 2)
                                                        <span class="text-success">Finished</span>
                                                    @elseif ($tk->status == 3)
                                                        <span class="text-danger">Cancelled</span>
                                                    @elseif ($tk->status == 4)
                                                        <span class="text-warning">Hold</span>
                                                    @endif
                                                </td>
                                                <td>{{ $tk->due_date }}</td>
                                            </tr>
                                        @empty
                                            <td colspan="5" class="text-center">No tasks found!</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $tasks->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Recent Alloted Tasks</h3>
                            </div>
                            <div class="table-responsive fs-14">
                                <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table"
                                    id="example5">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Customer Name</th>
                                            <th>Task Description</th>
                                            <th>Status</th>
                                            <th>Task Due Date</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @forelse ($tasks as $tk)
                                            @if (Auth::user()->id == $tk->userId)
                                                <tr>
                                                    <td>{{ $tk->user->name }}</td>
                                                    <td>{{ $tk->description }}</td>
                                                    <td>
                                                        @if ($tk->status == 1)
                                                            <span class="text-warning">On Process</span>
                                                        @elseif ($tk->status == 2)
                                                            <span class="text-success">Finished</span>
                                                        @elseif ($tk->status == 3)
                                                            <span class="text-danger">Cancelled</span>
                                                        @elseif ($tk->status == 4)
                                                            <span class="text-warning">Hold</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $tk->due_date }}</td>
                                                </tr>
                                            @endif
                                        @empty
                                            <td colspan="5" class="text-center">No tasks found!</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $tasks->links() }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Animating a Donut with Svg.animate</h4>
                        </div>
                        <div class="card-body">
                            <div id="animating-donut" class="ct-chart ct-golden-section chartlist-chart">
                                <div class="chartist-tooltip" style="top: -33.2251px; left: 58.7125px;"><span
                                        class="chartist-tooltip-value">10</span></div><svg
                                    xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%"
                                    class="ct-chart-donut" style="width: 100%; height: 100%;">
                                    <g class="ct-series ct-series-a">
                                        <path d="M286.638,40.058A74.9,74.9,0,0,0,259.581,35" class="ct-slice-donut"
                                            ct:value="10" style="stroke-width: 60px;"
                                            stroke-dasharray="27.683048248291016px 27.683048248291016px"
                                            stroke-dashoffset="-27.683048248291016px">
                                            <animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms"
                                                from="-27.683048248291016px" to="0px" fill="freeze" calcMode="spline"
                                                keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate>
                                        </path>
                                    </g>
                                    <g class="ct-series ct-series-b">
                                        <path d="M326.629,76.514A74.9,74.9,0,0,0,286.394,39.964" class="ct-slice-donut"
                                            ct:value="20" style="stroke-width: 60px;"
                                            stroke-dasharray="55.62751770019531px 55.62751770019531px"
                                            stroke-dashoffset="-55.62751770019531px">
                                            <animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms"
                                                from="-55.62751770019531px" to="0px" fill="freeze"
                                                begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1"
                                                keyTimes="0;1"></animate>
                                        </path>
                                    </g>
                                    <g class="ct-series ct-series-c">
                                        <path d="M273.344,183.525A74.9,74.9,0,0,0,326.512,76.28" class="ct-slice-donut"
                                            ct:value="50" style="stroke-width: 60px;"
                                            stroke-dasharray="138.6782989501953px 138.6782989501953px"
                                            stroke-dashoffset="-138.6782989501953px">
                                            <animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms"
                                                from="-138.6782989501953px" to="0px" fill="freeze"
                                                begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1"
                                                keyTimes="0;1"></animate>
                                        </path>
                                    </g>
                                    <g class="ct-series ct-series-d">
                                        <path d="M220.151,173.581A74.9,74.9,0,0,0,273.601,183.476" class="ct-slice-donut"
                                            ct:value="20" style="stroke-width: 60px;"
                                            stroke-dasharray="55.62808609008789px 55.62808609008789px"
                                            stroke-dashoffset="-55.62808609008789px">
                                            <animate attributeName="stroke-dashoffset" id="anim3" dur="1000ms"
                                                from="-55.62808609008789px" to="0px" fill="freeze"
                                                begin="anim2.end" calcMode="spline" keySplines="0.23 1 0.32 1"
                                                keyTimes="0;1"></animate>
                                        </path>
                                    </g>
                                    <g class="ct-series ct-series-e">
                                        <path d="M209.121,165.252A74.9,74.9,0,0,0,220.374,173.719" class="ct-slice-donut"
                                            ct:value="5" style="stroke-width: 60px;"
                                            stroke-dasharray="14.103452682495117px 14.103452682495117px"
                                            stroke-dashoffset="-14.103452682495117px">
                                            <animate attributeName="stroke-dashoffset" id="anim4" dur="1000ms"
                                                from="-14.103452682495117px" to="0px" fill="freeze"
                                                begin="anim3.end" calcMode="spline" keySplines="0.23 1 0.32 1"
                                                keyTimes="0;1"></animate>
                                        </path>
                                    </g>
                                    <g class="ct-series ct-series-f">
                                        <path d="M220.151,46.219A74.9,74.9,0,0,0,209.315,165.428" class="ct-slice-donut"
                                            ct:value="50" style="stroke-width: 60px;"
                                            stroke-dasharray="138.67739868164062px 138.67739868164062px"
                                            stroke-dashoffset="-138.67739868164062px">
                                            <animate attributeName="stroke-dashoffset" id="anim5" dur="1000ms"
                                                from="-138.67739868164062px" to="0px" fill="freeze"
                                                begin="anim4.end" calcMode="spline" keySplines="0.23 1 0.32 1"
                                                keyTimes="0;1"></animate>
                                        </path>
                                    </g>
                                    <g class="ct-series ct-series-g">
                                        <path d="M259.581,35A74.9,74.9,0,0,0,219.929,46.357" class="ct-slice-donut"
                                            ct:value="15" style="stroke-width: 60px;"
                                            stroke-dasharray="41.786197662353516px 41.786197662353516px"
                                            stroke-dashoffset="-41.786197662353516px">
                                            <animate attributeName="stroke-dashoffset" id="anim6" dur="1000ms"
                                                from="-41.786197662353516px" to="0px" fill="freeze"
                                                begin="anim5.end" calcMode="spline" keySplines="0.23 1 0.32 1"
                                                keyTimes="0;1"></animate>
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
