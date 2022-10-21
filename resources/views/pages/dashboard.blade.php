@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Employee Count</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $employeeCount }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle" style="background-image: linear-gradient(310deg, #A7C7E7 0%, #A7C7E7 100%);">
                                    <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Leave Count</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $leaveCount }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle"  style="background-image: linear-gradient(310deg, #A7C7E7 0%, #A7C7E7 100%);">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tardy Count</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $tardyCount }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Notifications</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">#</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Designation</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Status</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($notification as $index => $row)
                                    <tr class="text-center">
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ $index + 1 }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ ucfirst($row->name) }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ ucfirst($row->designation) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold badge bg-gradient-danger">Warning</span>
                                        </td>
                                        @if($row->tardy >= 10 && $row->undertime < 10)
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->tardy }} Tardy</span>
                                            </td>
                                        @elseif($row->undertime >= 10 && $row->tardy < 10)
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->undertime }} Undertime</span>
                                            </td>
                                        @elseif($row->undertime >= 10 && $row->tardy >= 10)
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->tardy }} Tardy and {{ $row->undertime }} Undertime</span>
                                            </td>
                                        @endif
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="font-weight-bold text-center table-text">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                        <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                            {{$notification->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
@endpush
