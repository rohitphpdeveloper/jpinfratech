@extends('admin.master')


@section('content')
 <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Backup And Restore</h5>
          </div>
      
        <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
                       @if (count($errors) > 0)
                       <div class="alert alert-danger">
                              <ul class='text'>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                        
                      @if(session()->has('success'))

                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> {{ session()->get('success') }}</strong> 
                          </div>
                         @endif
                        <button class="btn btn-success btn-xs" onclick="backUp({{1}})"><i class="fa fa-database"></i> Backup</button>
                        <button class="btn btn-success btn-xs" onclick="restoreBackup({{0}})"><i class="fa fa-undo"></i> Restore</button>
                     
              @section('footerscript')

            
          <script type="text/javascript" class="init"> 

            function backUp(id){
              if(confirm("Are you sure?"))
              {
                $.ajax({
                type:'POST',
                url:"{{url('admin/backup/backup_data')}}",
                data:{'id':id},
                beforeSend: function(xhr){
                xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                cache: false,
                async:false,
                data:{'id':id},
                success:function(data){
                  alert(data);
                 location.reload();
                }
                })
              }
            }

            function restoreBackup(id){
              if(confirm("Are you sure?"))
              {
                $.ajax({
                type:'POST',
                url:"{{url('admin/backup/restore_data')}}",
                data:{'id':id},
                beforeSend: function(xhr){
                xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                cache: false,
                async:false,
                success:function(data){
                  alert(data);
                 location.reload();
                }
                })
              }
             }
          
          </script>
            
          @endsection

            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
<!-- /Row -->
</div>
      
      <!-- Footer -->
      <script>
          window.setTimeout(function() {
              $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 2000);
            
      </script>
      <!-- /Footer -->
      
    </div>
    <!-- /Main Content -->
@endsection
