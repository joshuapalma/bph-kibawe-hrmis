<!doctype html>
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

    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />

    <title>{{ $title }}</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">Republic of the Philippines</p>
                <p class="text-center fw-bold">Province of Bukidnon</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center fw-bold">BUKIDNON PROVINCIAL HOSPITAL - KIBAWE</p>
                <p class="text-center">CM Recto Street, Palma, Kibawe, Bukidnon</p>
            </div>
        </div>
        <hr>
        <div class="row d-flex">
            <div class="col-md-2">
                <p class="fw-bold lh-1">To:</p>
            </div>
            <div class="col-md-10">
                <h6 class="fw-bold">MARIE CARMEN C. UNABIA</h6>
                <p class="lh-1">PO Department Head</p>
                <p class="lh-1">PEEDM Officer</p>
                <p class="lh-1">Province of Bukidnon</p>
            </div>
        </div>
        <br>
        <div class="row d-flex">
            <div class="col-md-2">
                <p class="fw-bold lh-1">Date:</p>
            </div>
            <div class="col-md-10">
                <h6 class="lh-1">{{ date('M d, Y') }}</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <p class="fw-bold lh-1">Subject:</p>
            </div>
            <div class="col-md-10">
                <h6 class="fw-bold lh-1">APPLICATION FOR LEAVE</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="lh-1">Ma'am, respectfully sumitting herewith the Application for Leave of BPH-Kibawe personnel, to wit;</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Applied</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Leave</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nature of Leave</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($users as $row)
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
                                    <span class="text-secondary text-xs font-weight-bold">{{ date('m/d/Y', strtotime($row->date_applied)) }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ date('m/d/Y', strtotime($row->date_of_leave)) }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ ucfirst($row->nature_of_leave) }}</span>
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
</html>
