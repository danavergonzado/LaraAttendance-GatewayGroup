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
                  <li class="list-group-item">Last Logged In <span class="float-right">{{ Auth::user()->updated_at->format('m/d/Y h:i A') }}</span></li>
                </ul>
                <a href="#" class="btn btn-success btn-block"  
                  data-toggle="modal" data-target="#Modal_TimeInOut" id="">
                  <i class="fa fa-user-clock"></i> <b>Time  In/Out</b>
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
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">TimeLog</a></li>
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
                          <th>Time-In</th>
                          <th>Time-Out</th>
                        </thead>
                        <tbody>
                          @forelse($timelogs as $log)
                          <tr>
                            <td>{{ $log->created_at->format('m/d/Y') }}</td>
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

                  <div class="tab-pane" id="tasks">
                 
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

  @if(empty($timeout))
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

      @if($timein)
        <p class="alert alert-danger">Note: After verification, you will be log out and will no longer access this page for today.</p>
      @endif

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
    function TimeIn(data)
    {
      $.post("/log/timein", data)
        .done( function(e) {
          if(e == '1') {
            alert('Success: ID Number verified');
            location.reload();
          }else{
            alert(e);
          }
          
        })
        .fail( function(xhr, textStatus, errorThrown) {
         alert(xhr.responseText);
        });
    }

    /* EVENTS HERE */
    $('#BtnVerifyLogin').click(function (e) { 
      e.preventDefault();
      var data = $('#FrmTimeInOut').serialize();
      TimeIn(data);
    });

  });
</script>
@endsection
