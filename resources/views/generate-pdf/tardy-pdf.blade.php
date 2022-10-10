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
    <div class="container-fluid p-0 m-0">
        <div class="row">
            <h4>{{ $title }}</h4>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs">ID</th>
                        <th class="text-center text-uppercase text-secondary text-xxs ps-2">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">Designation</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">No. of times Tardy</th>
                        <th class="text-center text-uppercase text-secondary text-xxs">No. of times Undertime</th>
                        <th class="text-center text-uppercase text-secondary text-xxs" colspan="2">Total No. of</th>
                      </tr>
                      <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs" colspan="5"></th>
                          <th class="text-center text-uppercase text-secondary text-xxs">Hours</th>
                          <th class="text-center text-uppercase text-secondary text-xxs">Minutes</th>
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
                          </tr>
                      @empty
                          <tr>
                              <td colspan="6" class="font-weight-bold text-center">No Data Available</td>
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
