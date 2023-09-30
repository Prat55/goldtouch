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
                        <li class="breadcrumb-item active">
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
                                <h5>#</h5>
                                <h2 class="fs-40 font-w600">75</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["rgb(51, 62, 75,1)", "rgba(242, 246, 252)"]}'>3/1000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="float-end">
                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                data-bs-original-title="Refferals" aria-label="Refferals"><i class=""></i></a>
                        </div>
                        <h5>Project Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-sm-6" style="position: relative;">
                                <div id="projects-chart" style="min-height: 200px;">
                                    <div id="apexchartsdp6kfyfjk" class="apexcharts-canvas apexchartsdp6kfyfjk light"
                                        style="width: 207px; height: 200px;">
                                        <svg id="SvgjsSvg1150" width="207" height="200"
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG1152" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(33, 0)">
                                                <defs id="SvgjsDefs1151">
                                                    <clipPath id="gridRectMaskdp6kfyfjk">
                                                        <rect id="SvgjsRect1153" width="145" height="167"
                                                            x="-1" y="-1" rx="0" ry="0"
                                                            fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0">
                                                        </rect>
                                                    </clipPath>
                                                    <clipPath id="gridRectMarkerMaskdp6kfyfjk">
                                                        <rect id="SvgjsRect1154" width="183" height="205"
                                                            x="-20" y="-20" rx="0" ry="0"
                                                            fill="#ffffff" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0">
                                                        </rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1156" class="apexcharts-pie" data:innerTranslateX="0"
                                                    data:innerTranslateY="-25">
                                                    <g id="SvgjsG1157" transform="translate(0, -5) scale(1)">
                                                        <circle id="SvgjsCircle1158" r="52.14146341463415" cx="71.5"
                                                            cy="82.5" fill="transparent"></circle>
                                                        <g id="SvgjsG1159">
                                                            <g id="apexcharts-series-0"
                                                                class="apexcharts-series apexcharts-pie-series OnHold"
                                                                rel="1">
                                                                <path id="apexcharts-donut-slice-0"
                                                                    d="M 71.5 8.012195121951208 A 74.48780487804879 74.48780487804879 0 1 1 71.48699942558893 8.012196256465344 L 71.49089959791226 30.358537379525742 A 52.14146341463415 52.14146341463415 0 1 0 71.5 30.358536585365847 L 71.5 8.012195121951208 z"
                                                                    fill="rgba(111,217,67,1)" fill-opacity="1"
                                                                    stroke="#ffffff" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-pie-area"
                                                                    index="0" j="0" data:angle="360"
                                                                    data:startAngle="0" data:strokeWidth="2"
                                                                    data:value="100"
                                                                    data:pathOrig="M 71.5 8.012195121951208 A 74.48780487804879 74.48780487804879 0 1 1 71.48699942558893 8.012196256465344 L 71.49089959791226 30.358537379525742 A 52.14146341463415 52.14146341463415 0 1 0 71.5 30.358536585365847 L 71.5 8.012195121951208 z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1162" x1="0" y1="0" x2="143"
                                                    y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                    stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1163" x1="0" y1="0" x2="143"
                                                    y2="0" stroke-dasharray="0" stroke-width="0"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                        </svg>

                                        <div class="apexcharts-legend"></div>

                                        <div class="apexcharts-tooltip dark">
                                            <div class="apexcharts-tooltip-series-group"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(111, 217, 67);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group">
                                                        <span class="apexcharts-tooltip-text-label"></span>
                                                        <span class="apexcharts-tooltip-text-value"></span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group">
                                                        <span class="apexcharts-tooltip-text-z-label"></span>
                                                        <span class="apexcharts-tooltip-text-z-value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 232px; height: 201px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 pb-5 ml-5 px-3">

                                <div class="col-6">
                                    <span class="d-flex align-items-center mb-2">
                                        <i class="f-10 lh-1 fas fa-circle text-primary"></i>
                                        <span class="ms-2 text-sm">On Going</span>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="d-flex align-items-center mb-2">
                                        <i class="f-10 lh-1 fas fa-circle text-warning"></i>
                                        <span class="ms-2 text-sm">Finished</span>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="d-flex align-items-center mb-2">
                                        <i class="f-10 lh-1 fas fa-circle text-danger"></i>
                                        <span class="ms-2 text-sm">On Hold</span>
                                    </span>
                                </div>

                            </div>

                            <div class="row text-center">

                                <div class="col-4">
                                    <i class="fas fa-chart text-success  h3"></i>
                                    <h6 class="font-weight-bold">
                                        <span>100%</span>
                                    </h6>
                                    <p class="text-muted">OnHold</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Recent Tasks
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
                                        <td>{{ $tk->customer_name }}</td>
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
        </div>
    </div>
@endsection
