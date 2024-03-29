@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tardy'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#exportTardyModal">Generate Report</button>
                        <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addTardyModal">Add Tardy / Undertime</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{route('tardy.index')}}" method="GET">
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
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">#</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 table-text">Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Designation</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">No. of times Tardy</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">No. of times Undertime</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text" colspan="2">Total No. of</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Action</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text"></th>
                                </tr>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="5"></th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Hours</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Minutes</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($tardy as $index => $row)
                                    <tr class="text-center">
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 table-text">{{ $index + 1 }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 table-text">{{ ucfirst($row->name) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ ucfirst($row->designation) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->tardy }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->undertime }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->hours }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->mins }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <input type="hidden" id="tardy-details-{{$row->id}}" data-detail="{{ $row }}">
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-warning z-index-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editTardyModal" 
                                                onclick = "editTardy('{{$row->id}}')">
                                                Edit
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-danger z-index-2 drop" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal"
                                                data-url="{{ route('tardy.destroy', $row->id) }}"
                                                onclick = "deleteTardy(this)">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="font-weight-bold text-center">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                        </div>
                        <div class="table-pagination p-5">
                            <div class="row">
                                <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                                    {{$tardy->appends(['search' => isset($requestData->search) ? $requestData->search : null])->links('components.pagination')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.delete-modal')
    @include('modals.tardy.export-modal')
    @include('modals.tardy.create-tardy-modal')
    @include('modals.tardy.edit-tardy-modal')
@endsection

@push('js')
    <script>
        $('#add-tardy-form').validate({
            rules: {
                name: {
                    required: true
                },
                designation: {
                    required: true
                },
                mins: {
                    maxValue: '59'
                }
            },
            errorElement: "span",
            errorClass: "text-danger text-xs font-weight-bold",
        });

        $('#edit-tardy-form').validate({
            rules: {
                name: {
                    required: true
                },
                designation: {
                    required: true
                },
                mins: {
                    maxValue: '59'
                }
            },
            errorElement: "span",
            errorClass: "text-danger text-xs font-weight-bold",
        });

        function editTardy(id) {
            const detail = $(`#tardy-details-${id}`).data().detail;     

            $('#edit_name').val(detail.name);            
            $('#edit_designation').attr('value',detail.designation);
            $('#edit_tardy').attr('value',detail.tardy);
            $('#edit_undertime').attr('value',detail.undertime);
            $('#edit_hours').attr('value',detail.hours);
            $('#edit_mins').attr('value',detail.mins);
            $('#edit-tardy-form').attr('action', `tardy/update/${detail.id}`)
        }

        function deleteTardy(btn) {
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
            $('#exportTardyModal').modal('hide');
        }

        $.validator.addMethod('maxValue', function (value, element, param) {    
            let inputValue = value;

            if(inputValue > 59){
                return false;
            } else {
                return true;
            }
            
        }, 'The value must not be greater than 59');
    </script>
@endpush