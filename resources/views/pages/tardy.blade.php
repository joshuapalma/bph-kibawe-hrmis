@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tardy'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <a href="{{ route('tardy.generate-pdf') }}" class="btn bg-gradient-info z-index-2 me-2" target="_blank">Generate Report</a>
                        <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addTardyModal">Add Tardy / Undertime</button>
                    </div>
                </div>
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
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. of times Tardy</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. of times Undertime</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Total No. of</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="5"></th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hours</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Minutes</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($tardy as $row)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $row->id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ ucfirst($row->name) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{ ucfirst($row->designation) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $row->tardy }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $row->undertime }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $row->hours }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $row->mins }}</span>
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
                                        <td colspan="6" class="font-weight-bold text-center">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                        </div>
                        <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                            {{$tardy->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.tardy.create-tardy-modal')
    @include('modals.tardy.edit-tardy-modal')
    @include('modals.delete-modal')
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
            },
            errorElement: "span",
            errorClass: "text-danger text-xs font-weight-bold",
        });

        function editTardy(id) {
            const detail = $(`#tardy-details-${id}`).data().detail;     

            $('#edit_name').attr('value',detail.name);            
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
                    employeeName: name
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
    </script>
@endpush