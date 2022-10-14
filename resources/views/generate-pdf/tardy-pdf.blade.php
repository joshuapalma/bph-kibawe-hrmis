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

    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />

    <title>{{ $title }}</title>
  </head>
  <body>
    <div class="container-fluid p-0 m-0">
        <div class="row">
            <h4>{{ $title }}</h4>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <table class="table table-bordered" style="width: 50px !important;">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>No. of times Tardy</th>
                        <th>No. of times Undertime</th>
                        <th  colspan="2">Total No. of</th>
                      </tr>
                      <tr>
                          <th colspan="5"></th>
                          <th>Hours</th>
                          <th>Minutes</th>
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
                                  <span>{{ $row->tardy }}</span>
                              </td>
                              <td>
                                  <span>{{ $row->undertime }}</span>
                              </td>
                              <td>
                                  <span>{{ $row->hours }}</span>
                              </td>
                              <td>
                                  <span>{{ $row->mins }}</span>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="6">No Data Available</td>
                          </tr>
                      @endforelse
                    </tbody>
                </table>
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

 --}}


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center lh-1">Republic of the Philippines</p>
                <p class="text-center font-weight-bold lh-1">Province of Bukidnon</p>
                <p class="text-center lh-1">Provincial Capitol</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center font-weight-bold lh-1">MONTHLY TARDY AND UNDERTIME SUMMARY REPORT</p>
                <p class="text-center lh-1">For the month of {{ date('M Y') }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <h6 class="font-weight-bold text-center lh-1">OFFICE: BUKIDNON PROVINCIAL HOSPITAL - KIBAWE (REGULAR)</h6>
        </div>
        <br>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-info text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>No. of times Tardy</th>
                    <th>No. of times Undertime</th>
                    <th  colspan="2">Total No. of</th>
                </tr>
                    <tr>
                        <th colspan="5"></th>
                        <th>Hours</th>
                        <th>Minutes</th>
                    </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->designation }}</td>
                        <td>{{ $row->tardy }}</td>
                        <td>{{ $row->undertime }}</td>
                        <td>{{ $row->hours }}</td>
                        <td>{{ $row->mins }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Data Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <p class="mb-5">Prepared by:</p>
            <p class="font-weight-bold" style="line-height:5px;">JUNRIEL D. OCOR</p>
            <p class="font-weight-bold" style="line-height:5px;">Administrative Aide III</p>
        </div>
        <div class="col-md-6">
            <p class="mb-5">Approved by:</p>
            <p class="font-weight-bold" style="line-height:5px;">ANTONIO R. TUBOG, MD, FPSMS</p>
            <p class="font-weight-bold" style="line-height:5px;">Chief of Hospital II</p>
        </div>
    </div>
</body>
</html>
