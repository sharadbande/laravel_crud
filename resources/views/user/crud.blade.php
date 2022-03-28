

@include('theme.default')
@include('theme.header')
@include('theme.sidebar')
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CURD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('Home')}}">Home</a></li>
              <li class="breadcrumb-item active">API</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->


 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Employee Details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
 

        <form action="{{ url('Insertcrud') }}" method="POST">
        @csrf
     
 
 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control"  id="name" name="name" > 
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control" id="address" name="address"  >
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="text" class="form-control" id="mobile" name="mobile"  >
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">designation</label>
    <input type="text" class="form-control" id="designation" name="designation"  >
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 





        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
        
      </div>
      <!-- /.card -->
 
  <section>
    <div class="card">
    <table class="table">
  <!-- <caption>List of users</caption> -->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">designation</th>
    </tr>
  </thead>
  <tbody>
  
  <?php $ct=$result->firstItem();  foreach($result as $key):     ?>
  <tr>
      <th scope="row"> {!!  $ct !!}</th>
      <td>{!!  $key->name; !!}</td>
      <td>{!! $key->address !!}</td>
      <td>{!! $key->mobile !!}</td>
      <td>{!! $key->designation !!}</td>
    </tr>
    <?php $ct++;  endforeach; ?>
  </tbody>
</table>

<?php    $csct=$result->lastPage();  ?>  

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="{{ $result->previousPageUrl(); }}">Previous</a></li>
    
   
    


    <?php    $currentPage = $result->currentPage();   
    
    $count = $result->lastPage(); 
    ?>

    <?php  for($i=1;$i<=$count;$i++ )
    { 
      if($currentPage === $i)
      {
        ?> 
           <li class="page-item active"><a class="page-link" href="{{ $result->url($i) }}">{{   $i }}</a></li> <?php 
      }else{ 
     ?>     
     
         <li class="page-item"><a class="page-link" href="{{ $result->url($i) }}">{{   $i }}</a></li> 
     
     <?php }

    }?>
    




    
    <li class="page-item"><a class="page-link" href="{{ $result->nextPageUrl(); }}">Next</a></li>
  </ul>
</nav>
    </div>
  </section>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @include('theme.footer')






























