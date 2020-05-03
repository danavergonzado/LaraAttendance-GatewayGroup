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

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Running Tasks</b> <a class="float-right">{{ count($tasks) }}</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Start Test</b></a>
                <a href="#" class="btn btn-warning btn-block"><b>Goto Break</b></a>
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
              <a href="#" class="btn btn-success btn-sm float-right mt-2" data-toggle="modal" data-target="#Modal-AddTask">Add Task</a>
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Task/Test</a></li>
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
                          <th>Created At</th>
                          <th>Category</th>
                          <th>Task</th>
                          <th>Started</th>
                        <t/head>
                        <tbody>
                          @forelse($tasks as $task)
                          <tr>
                              <td>{ $task->created_at->format('m/d/Y h:i:s A') }}</td>
                              <td>{{ $task->category }}</td>
                              <td>{{ $task->name}}</td>
                                <img class="img- circle img-bordered-sm" src="../../dist/img/AdminLTELogo.png" alt="user image">
                                <span class="description">{ - {{ Auth::user()->username }} on </span>
                                <p style="margin-left:50px"></p>
                          </tr>
                          @empty
                            <p>No Activity</p>
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
  <div class="modal" tabindex="-1" role="dialog" id="Modal-AddTask">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Task (Test item)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" id="FrmAddTask">
        <div class="form-group">
            <input class="form-control" type="text" id="task-name" name="name" placeholder="task name here">
            @csrf
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="BtnAddTask">Save Item</button>
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
    function AddTask(data)
    {
      $.post("/task/addtask", data,
        function (data, textStatus, jqXHR) {
          alert(jqXHR);
        },
        "json"
      );
    }

    /* EVENTS HERE */
    $('#BtnAddTask').click(function () { 
      var data = $('#FrmAddTask').serialize();
      AddTask(data);
    });

  });
</script>
@endsection
