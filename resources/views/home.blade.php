@extends('layouts.app')
@section('content')
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/avatar5.png"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">{{ Auth::user()->position }}</p>
                <ul class="list-group list-group-unbordered mb-3"></ul>
                <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#Modal_TimeInOut" id=""><b>Time In/Out</b></a>
                <a href="#" class="btn btn-danger btn-block"><b>Logout</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">TimeLog</a></li>
                  <li class="nav-item"><a class="nav-link" href="#members" data-toggle="tab">Online Team</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tasks" data-toggle="tab">Tasks</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content"  style="min-height:350px; max-height:350px; overflow:auto">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table class="table">
                        <thead>
                          <th>Date</th>
                          <th>WebLogin</th>
                          <th>Time-In</th>
                          <th>Time-Out</th>
                        </thead>
                        <tbody>
                          @forelse($timelogs as $log)
                          <tr>
                            <td>{{ $log->created_at->format('m/d/Y') }}</td>
                            <td>{{ $log->created_at->format('h:i:s A') }}</td>
                            <td>{{ $timein = ($log->timein) ? $log->timein->format('h:i:s A') : "" }}</td>
                            <td>{{ $timeout = ($log->timeout) ? $log->timeout->format('h:i:s A') : "" }}</td>
                          </tr>
                          @empty
                          <p class="alert alert-danger">No record.</p>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                    
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->


                  <div class="tab-pane p-0" id="members">
                    <ul class="users-list clearfix">
                      <li>
                        <img src="dist/img/user1-128x128.jpg" alt="User Image" width="90px">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                      </li>
                      <li>
                        <img src="dist/img/user8-128x128.jpg" alt="User Image" width="90px">
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date">Yesterday</span>
                      </li>
                      <li>
                        <img src="dist/img/user1-128x128.jpg" alt="User Image" width="90px">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                      </li>
                      <li>
                        <img src="dist/img/user8-128x128.jpg" alt="User Image" width="90px">
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date">Yesterday</span>
                      </li>
                      <li>
                        <img src="dist/img/user1-128x128.jpg" alt="User Image" width="90px">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                      </li>
                      <li>
                        <img src="dist/img/user8-128x128.jpg" alt="User Image" width="90px">
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date">Yesterday</span>
                      </li>
                    </ul>
                  </div> <!-- / end of members tab -->
                 

                  <div class="tab-pane" id="tasks">
                 Task here
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <!-- MODAL
  =============================================== -->
  <div class="modal" tabindex="-1" role="dialog" id="Modal_TimeInOut">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Prompt: Verify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" id="FrmTimeInOut">
        <div class="form-group">
          <input type="text" name="comp_num" class="form-control" placeholder="enter your company id number" /> 
            @csrf
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="BtnVerifyLogin">Verify</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-js')
<script>
  $('document').ready(function() {

    /* METHODS HERE */
    function TimeIn(data)
    {
      $.post("/log/timein", data,
        function (data, textStatus, jqXHR) {
          alert(jqXHR);
        },
        "json"
      );
    }

    /* EVENTS HERE */
    $('#BtnVerifyLogin').click(function () { 
      var data = $('#FrmTimeInOut').serialize();
      TimeIn(data);
    });

  });
</script>
@endsection
