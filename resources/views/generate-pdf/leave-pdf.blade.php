{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">

    <title>{{ $title }}</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">Republic of the Philippines</p>
                <p class="text-center font-weight-bold">Province of Bukidnon</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center font-weight-bold">BUKIDNON PROVINCIAL HOSPITAL - KIBAWE</p>
                <p class="text-center">CM Recto Street, Palma, Kibawe, Bukidnon</p>
            </div>
        </div>
        <hr>
        <div class="row d-flex">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">To:</p>
            </div>
            <div class="col-md-10">
                <h6 class="font-weight-bold">MARIE CARMEN C. UNABIA</h6>
                <p class="lh-1">PO Department Head</p>
                <p class="lh-1">PEEDM Officer</p>
                <p class="lh-1">Province of Bukidnon</p>
            </div>
        </div>
        <br>
        <div class="row d-flex">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">Date:</p>
            </div>
            <div class="col-md-10">
                <h6 class="lh-1">{{ date('M d, Y') }}</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">Subject:</p>
            </div>
            <div class="col-md-10">
                <h6 class="font-weight-bold lh-1">APPLICATION FOR LEAVE</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="lh-1">Ma'am, respectfully sumitting herewith the Application for Leave of BPH-Kibawe personnel, to wit;</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Leave</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nature of Leave</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($users as $row)
                            <tr>
                                <td>
                                    <p>{{ $row->id }}</p>
                                </td>
                                <td>
                                    <p>{{ ucfirst($row->name) }}</p>
                                </td>
                                <td>
                                    <span>{{ ucfirst($row->designation) }}</span>
                                </td>
                                <td>
                                    <span>{{ date('m/d/Y', strtotime($row->date_of_leave)) }}</span>
                                </td>
                                <td>
                                    <span>{{ ucfirst($row->nature_of_leave) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="font-weight-bold text-center">No Data Available</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/usm/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <script>

    </script>
  </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">Republic of the Philippines</p>
                <p class="text-center font-weight-bold">Province of Bukidnon</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center font-weight-bold">BUKIDNON PROVINCIAL HOSPITAL - KIBAWE</p>
                <p class="text-center">CM Recto Street, Palma, Kibawe, Bukidnon</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">To:</p>
            </div>
            <div class="col-md-10">
                <h6 class="font-weight-bold">MARIE CARMEN C. UNABIA</h6>
                <p class="lh-1">PO Department Head</p>
                <p class="lh-1">PEEDM Officer</p>
                <p class="lh-1">Province of Bukidnon</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">Date:</p>
            </div>
            <div class="col-md-10">
                <h6 class="lh-1">{{ date('M d, Y') }}</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">Subject:</p>
            </div>
            <div class="col-md-10">
                <h6 class="font-weight-bold lh-1">APPLICATION FOR LEAVE</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="lh-1">Ma'am, respectfully sumitting herewith the Application for Leave of BPH-Kibawe personnel, to wit;</p>
            </div>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-info">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Date of Leave</th>
                    <th scope="col">Nature of Leave</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->designation }}</td>
                        <td>{{ $row->date_of_leave }}</td>
                        <td>{{ $row->nature_of_leave }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Data Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
