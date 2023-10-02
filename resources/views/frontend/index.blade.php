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
                    <div class="col-md-8 col-sm-12">
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
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Orders Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="morris_donught" class="morris_chart_height"></div>

                                <input type="hidden" name="pendingorder" id="pendingorder"
                                    value="{{ $pendingOrder->count() }}">
                                <input type="hidden" name="completedOrder" id="completedOrder"
                                    value="{{ $completedOrder->count() }}">

                                <input type="hidden" name="completedOrder" id="completedOrder"
                                    value="{{ $onhold->count() }}">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Recent Alloted Tasks</h3>
                            </div>
                            <div class="table-responsive fs-14">
                                <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table"
                                    id="example5">
                                    <thead>
                                        <tr class="text-center">
                                            <th>User Name</th>
                                            <th>Task Description</th>
                                            <th>Status</th>
                                            <th>Task Due Date</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @forelse ($tasks as $tk)
                                            @if (Auth::user()->id == $tk->userId && $tk->status == 1)
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

                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Orders Chart</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-xl-2 col-sm-4 col-6 mt-4 mt-md-0">
                                    <div class=""><span class="donut"
                                            data-peity="{ &quot;fill&quot;: [&quot;rgb(33, 111, 237)&quot;, &quot;rgba(33, 111, 237, .5)&quot;]}"
                                            style="display: none;">8/8</span><svg class="peity" height="100"
                                            width="100">
                                            <path
                                                d="M 50 0 A 50 50 0 1 1 14.64466094067263 85.35533905932738 L 32.32233047033631 67.67766952966369 A 25 25 0 1 0 50 25"
                                                data-value="5" fill="rgb(33, 111, 237)"></path>
                                            <path
                                                d="M 14.64466094067263 85.35533905932738 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 25 A 25 25 0 0 0 32.32233047033631 67.67766952966369"
                                                data-value="3" fill="rgba(33, 111, 237, .5)"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        let donutChart = function() {
            let pending = $('#pendingorder').val();
            let completed = $('#completedOrder').val();
            let onHold = $('#completedOrder').val();

            Morris.Donut({
                element: 'morris_donught',
                data: [{
                    label: "\xa0 \xa0 On process \xa0 \xa0",
                    value: pending,

                }, {
                    label: "\xa0 \xa0 Completed \xa0 \xa0",
                    value: completed
                }, {
                    label: "\xa0 \xa0 On Hold \xa0 \xa0",
                    value: onHold
                }],
                resize: true,
                redraw: true,
                colors: ['rgb(255, 92, 0)', '#38e25d', '#943eff'],
                responsive: true,

            });
        }
    </script>
@endsection
