@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Employee Profile'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add Employee</button>
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
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Middle Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($employeeProfile as $row)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $row->id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ ucfirst($row->first_name) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{ ucfirst($row->middle_name) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ ucfirst($row->last_name) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ ucfirst($row->address) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ ucfirst($row->designation) }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <input type="hidden" id="employee-profile-details-{{$row->id}}" data-detail="{{ $row }}">
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-warning z-index-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editEmployeeModal" 
                                                onclick = "editEmployeeProfile('{{$row->id}}')">
                                                Edit
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-danger z-index-2 drop" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal"
                                                data-url="{{ route('employee-profile.destroy', $row->id) }}"
                                                onclick = "deleteEmployeeProfile(this)">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="font-weight-bold text-center">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                        <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                            {{$employeeProfile->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.employee-profile.create-employee-profile-modal')
    @include('modals.employee-profile.edit-employee-profile-modal')
    @include('modals.delete-modal')
@endsection

@push('js')
    <script>
        $('#add-employee-form').validate({
            rules: {
                first_name: {
                    required: true
                },
                middle_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                address: {
                    required: true
                },
                designation: {
                    required: true
                },
            },
            errorElement: "span",
            errorClass: "text-danger text-xs font-weight-bold",
        });

        $('#edit-employee-form').validate({
            rules: {
                first_name: {
                    required: true
                },
                middle_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                address: {
                    required: true
                },
                designation: {
                    required: true
                },
            },
            errorElement: "span",
            errorClass: "text-danger text-xs font-weight-bold",
        });


        function editEmployeeProfile(id) {
            const detail = $(`#employee-profile-details-${id}`).data().detail;        
            
            $('#edit_first_name').attr('value',detail.first_name);
            $('#edit_middle_name').attr('value',detail.middle_name);
            $('#edit_last_name').attr('value',detail.last_name);
            $('#edit_address').attr('value',detail.address);
            $('#edit_designation').attr('value',detail.designation);
            $('#edit-employee-form').attr('action', `employee-profile/update/${detail.id}`)
        }

        function deleteEmployeeProfile(btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#delete-form').attr('action', url);
        }
    </script>
@endpush
