@extends('admin.master')


@section('content')
 <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Home Buyers Reports</h5>
          </div>
        </div>
        <!-- /Title -->
        
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
                      
                      <table id="example1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr>
                            <th>Event Id</th>
                            <th>Resolution Id</th>
                            <th>Name</th>
                            <th>Member Id</th>
                            <th>Sum of No. of Votes for Yes</th>
                            <th>Sum of No. of Votes for No</th>
                            <th>Sum of No. of Votes for Abstain</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $rno='';
                          $option_1=0;
                          $option_2=0;
                          $option_3=0;

                           $count= count($result); ?>
                          @foreach($result as $row)

                            <?php if(empty($rno)) $rno=$row->question_id; ?>
                                  @if($rno !=$row->question_id)
                            <?php $rno=$row->question_id;  ?>

                            <tr>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td> </td>
                                <td>{{$option_1}}</td>
                                <td>{{$option_2}} </td>
                                <td>{{$option_3}} </td>
                            </tr>

                            <?php $option_1=0; $option_2=0; $option_3=0;?>
                            <?php 
                            if($row->option_1==1) $option_1++; 
                            elseif ($row->option_2==1) $option_2++;
                            elseif ($row->option_3==1) $option_3++;
                            ?>

                             @else
                            <?php 
                              if($row->option_1==1) $option_1++; 
                              elseif ($row->option_2==1) $option_2++;
                              elseif ($row->option_3==1) $option_3++;
                            ?>
                             @endif

                            <tr>
                                <td>{{$row->resolution->event_id}}</td>
                                <td>{{$row->question_id}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>{{$row->user->fd_no}}</td>
                                <td>{{$row->option_1}}</td>
                                <td>{{$row->option_2}}</td>
                                <td>{{$row->option_3}}</td>
                            </tr>
                            @endforeach

                            @if($count>=1)
                              <tr>
                                <td >Total </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                 <td> {{$option_1}}</td>
                                <td>{{$option_2}} </td>
                                <td>{{$option_3}} </td>
                             
                            </tr>
                            @endif

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <!-- /Row -->
      </div>
    
   </div>
    <!-- /Main Content -->
@endsection

@section('footerscript')
  <script type="text/javascript">
     $('#example1').dataTable({
       "ordering": false,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print' ]
    });
  </script>
@endsection