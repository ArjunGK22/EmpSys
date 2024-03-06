@extends('user.header')

@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <!-- {{session('user_type')}} -->
    @if(session()->has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Your Profile is updated.</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://cdn2.iconfinder.com/data/icons/professional-avatar-9/64/38-512.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ $user['first_name'] }}</h5>
            <p class="text-muted mb-1">{{ $user['position'] }}</p>
            <p class="text-muted mb-4">{{ $user['city'] .", ". $user['state'] }}</p>
            <div class="d-flex justify-content-center mb-2">
              <a href="/pdf/{{ $user['id'] }}" class="btn btn-primary" target="_blank">Download Bio-Data</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user['first_name'] ." ". $user['last_name'] }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user['email'] }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user['phone_number'] }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">DOB</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ (new DateTime($user['date_of_birth']))->format('d-m-Y') }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user['address'] }}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                Gender </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ ucwords($user['gender']) }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                Joined Date</div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ (new DateTime($user['start_date']))->format('d-m-Y') }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-header">
                <h3 class="text-info">Education Details</h3>
              </div>
              <div class="card-body">
                @if (count($user['educations']) > 0)
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th>Degree</th>
                      <th>Institution</th>
                      <th>Year</th>
                      <th>Percentage / GPA</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($user->educations as $education )
                    <tr>
                      <td>{{ $education['degree'] }}</td>
                      <td>{{ $education['institution'] }}</td>
                      <td>{{ $education['completion_year'] }}</td>
                      <td>{{ $education['aggregate'] }}</td>
                    </tr>

                    @endforeach
                  </tbody>

                </table>

                @else
                <p class="fw-bold text-danger">No Education Details Found. Kindly update.</p>
                @endif



              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-header">
                <h3 class="text-info">Previous Experience Details</h3>
              </div>
              <div class="card-body">
                @if (count($user['experiences']) > 0)
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Position</th>
                      <th>Year Of Experience</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($user->experiences as $experience )
                    <tr>
                      <td>{{ $experience['company_name'] }}</td>
                      <td>{{ $experience['position'] }}</td>
                      <td>{{ $experience['year_of_exp'] }}</td>
                    </tr>

                    @endforeach
                  </tbody>

                </table>

                @else
                <p class="fw-bold text-danger"><i class="bi bi-info-circle-fill me-2"></i>No Previous Experience Found.</p>
                @endif



              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-header">
                <h3 class="text-info">Family Details</h3>
              </div>
              <div class="card-body">
                @if (count($user['families']) > 0)
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th>Full Name</th>
                      <th>Relationship</th>
                      <th>DOB</th>
                      <th>Occupation</th>

                    </tr>

                  </thead>

                  <tbody>
                    @foreach ($user->families as $family )
                    <tr>
                      <td>{{ $family['first_name'] ." ". $family['last_name'] }}</td>
                      <td>{{ $family['relationship'] }}</td>
                      <td>{{ $family['rel_dob'] }}</td>
                      <td>{{ $family['occupation'] }}</td>
                    </tr>

                    @endforeach
                  </tbody>

                </table>

                @else
                <p class="fw-bold text-danger"><i class="bi bi-info-circle-fill me-2"></i>No Family Details Found.</p>
                @endif



              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</section>
@endsection