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
                       src="{{ asset('dist/img/avatar.png') }}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">{{ Auth::user()->position }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">Last Logged In: <span class="float-right">{{ Auth::user()->updated_at->format('m/d/Y h:i A') }}</span></li>
                  <li class="list-group-item">Time-In: <span class="float-right"> {{ $data['timein'] }}</span></li>
                  <li class="list-group-item">Time-Out: <span class="float-right">{{ $data['timeout'] }}</span></li>
                </ul>
                <a href="#" class="btn {{ ($data['timein'] == null) ? 'btn-success' : 'btn-danger'}} btn-block"  
                  data-toggle="modal" data-target="#Modal_TimeInOut" id="">
                  <i class="fa fa-user-clock"></i> <b>{{ ($data['timein'] == null) ? 'Time-In' : 'Time-Out'}}</b>
                </a>
              
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
                <h5 class="pt-1">Running Task <a href="#" data-toggle="modal" data-target="#Modal_AddTask" class="btn btn-primary btn-sm float-right" role="button"><i class="fa fa-plus"></i> Add Task</a></h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content"  style="max-height:350px; overflow:auto">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table class="table">
                        <thead>
                          <th>Date</th>
                          <th>Task</th>
                        </thead>
                        <tbody>
                         
                        </tbody>
                      </table>
                    </div>
                    
                    <!-- /.post -->
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

  @if($data['timeout'] == null)
  <div class="modal" tabindex="-1" role="dialog" id="Modal_TimeInOut">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ (!empty($data['timein']) ? 'Time-Out' : 'Time-In') }}</h5>
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
@endif

<!-- Add Task Modal
  =================================== -->
<div class="modal" tabindex="-1" role="dialog" id="Modal_AddTask">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
      <form method="post" id="FrmAddTask">
        <div class="form-group">
          <input type="text" name="task" class="form-control" placeholder="Enter the task name here" /> 
            @csrf
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="BtnSaveTask"><i class="fa fa-save"></i > Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i > Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-js')
<script>
  $('document').ready(function() {

    $(document).keypress(
      function(e){
        if (e.which == '13') {
          e.preventDefault();
          $('#BtnVerifyLogin').click();
        }
    });

    /* METHODS HERE */
    function post(url, data, success){
      $.post(url, data)
        .done(function(e){
          alert(success);
          location.reload();
        })
        .fail(function(xhr, textStatus, errorThrown){
          alert(xhr.responseText);
      });
    }

    /* EVENTS HERE */
    $('#BtnVerifyLogin').click(function (e) { 
      e.preventDefault();
      var data = $('#FrmTimeInOut').serialize();
      post('log/timein', data, "Success: ID Verified");
    });

    $('#BtnSaveTask').click(function(e){
      e.preventDefault();
      var data = $('#FrmAddTask').serialize();
      post('task/add',data, "Success: New Task Added");
    });




  });
</script>
@endsection
