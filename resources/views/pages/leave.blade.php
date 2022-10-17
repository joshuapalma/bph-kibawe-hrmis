@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Leave'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#filterLeaveModal">Filter</button>
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#exportLeaveModal">Generate Report</button>
                        {{-- <a href="{{ route('leave.generate-pdf') }}" class="btn bg-gradient-info z-index-2 me-2" target="_blank">Generate Report</a> --}}
                        <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addLeaveModal">Add Leave</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{route('leave.index')}}" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search.." name="search" value="{{ $requestData['search'] }}">
                            <button class="search-btn" type="submit" style="border: none; border-top-right-radius: 10px; border-bottom-right-radius: 10px; backgropund-color: #ededed;"><i class="ni ni-zoom-split-in" style="padding-left: 5px; padding-right: 5px"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Leave</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nature of Leave</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($leave as $index => $row)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ ucfirst($row->name) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{ ucfirst($row->designation) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ date('m/d/Y', strtotime($row->date_of_leave)) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ getNatureOfLeave()[$row->nature_of_leave] }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <input type="hidden" id="leave-details-{{$row->id}}" data-detail="{{ $row }}">
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-warning z-index-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editLeaveModal" 
                                                onclick = "editLeave('{{$row->id}}')">
                                                Edit
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-danger z-index-2 drop" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal"
                                                data-url="{{ route('leave.destroy', $row->id) }}"
                                                onclick = "deleteLeave(this)">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="font-weight-bold text-center">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                          <div class="table-pagination p-5">
                            <div class="row">
                                <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                                    {{$leave->appends(['search' => isset($requestData->search) ? $requestData->search : null])->links('components.pagination')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.leave.create-leave-modal')
    @include('modals.leave.edit-leave-modal')
    @include('modals.leave.filter-modal')
    @include('modals.leave.export-modal')
    @include('modals.delete-modal')
@endsection

@push('js')
    <script>
        $('#add-leave-form').validate({
            rules: {
                name: {
                    required: true
                },
                designation: {
                    required: true
                },
                date_of_leave: {
                    required: true
                },
                nature_of_leave: {
                    required: true
                },
            },
            errorElement: "span",
            errorClass: "text-danger text-xs font-weight-bold",
        });

        $('#edit-leave-form').validate({
            rules: {
                name: {
                    required: true
                },
                designation: {
                    required: true
                },
                date_applied: {
                    required: true
                },
                date_of_leave: {
                    required: true
                },
                nature_of_leave: {
                    required: true
                },
            },
            errorElement: "span",
            errorClass: "text-danger text-xs font-weight-bold",
        });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join('-');
        }

        function editLeave(id) {
            const detail = $(`#leave-details-${id}`).data().detail;     
            newDateOfLeave = formatDate(detail.date_of_leave);

            $('#edit_name').val(detail.name);            
            $('#edit_designation').attr('value',detail.designation);
            $('#edit_date_of_leave').val(newDateOfLeave);
            $('#edit_nature_of_leave').val(detail.nature_of_leave);
            $('#edit-leave-form').attr('action', `leave/update/${detail.id}`)
        }

        function deleteLeave(btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#delete-form').attr('action', url);
        }

        function getDesignationByName(nameId, designationId) {
            var designation = $(designationId);
            var name = $(nameId).val();

            $.ajax({
                url: "{{ route('getDesignationByName') }}",
                type: 'GET',
                data: {
                    employee: name
                },

                success: function(result){
                    var resultDesignation = result.query.designation;
                    $(designation).val(resultDesignation);
                },
                error: function(result){
                    console.log(result);
                }
            });
        }

        function exportModal(){
            $('#exportLeaveModal').modal('hide');
        }
    </script>
@endpush