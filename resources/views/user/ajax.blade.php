

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
            <h1>Ajax</h1>
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


 
     


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   
<!-- Form for Ajax modal -->
 <form id="formid">     
        @csrf
         <input type="hidden" readonly="" id="actionedit" name="actionedit" class="form-control ">
    <input type = "hidden" name = "_token" id="csrf" value = "<?php echo csrf_token(); ?>">
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


   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

    <input type="hidden" class="form-control" id="update_id" name="update_id"   >

  <button type="submit"  class="btn btn-primary" id="butsave">Submit</button>

    </form> 
 
 
<!-- Form for Ajax modal -->

<script> 

$(document).ready(function() {
  
    $('#butsave').on('click', function() { 
      var actionedit = $('#actionedit').val();
     
      if(actionedit === "Add"){    
 
        //Add
      var name = $('#name').val();
      var address = $('#address').val();
      var mobile = $('#mobile').val();
      var designation = $('#designation').val();
      var update_id = $('#update_id').val();
      var actionedit = $('#actionedit').val();
      var token = $('#_token').val();
     
      if(name!="" && address!="" && mobile!="" && designation!=""){
        /*  $("#butsave").attr("disabled", "disabled"); */
          $.ajax({
              url: "/ajaxinsert",
              type: "POST",
              data: {                   
                    _token: $("#csrf").val(),
                  name: name,
                  address: address,
                  mobile: mobile,
                  designation: designation
              },
              cache: false,
              success: function(dataResult){
                if (dataResult.success) {
                            swal.fire("Done!", dataResult.message, "success");
                            $('#exampleModal').modal('toggle');
                          
                        } else {
                            swal.fire("Error!", 'Something went wrong.', "error");
                        }
                     
                 
   
                
                  
              }
          });
      }
      else{
          alert('Please fill all the field !');
      }

      }else{

//EDIT
  
     var name = $('#name').val();
      var address = $('#address').val();
      var mobile = $('#mobile').val();
      var designation = $('#designation').val();
      var update_id = $('#update_id').val();
      var actionedit = $('#actionedit').val();
      var token = $('#_token').val();
     
      if(name!="" && address!="" && mobile!="" && designation!=""){
        /*  $("#butsave").attr("disabled", "disabled"); */
          $.ajax({
              url: "/ajaxedit",
              type: "POST",
              data: {                   
                    _token: $("#csrf").val(),
                  name: name,
                  address: address,
                  mobile: mobile,
                  id: update_id,
                  designation: designation
              },
              cache: false,
              success: function(dataResult){
                if (dataResult.success) {
                  // $('#exampleModal').modal('toggle');
                          swal.fire("Done!", dataResult.message, "success", 5000,);
                          
                          
                        } else {
                            swal.fire("Error!", 'Sumething went wrong.', "error");
                        }
                     
                 
   
                
                  
              }
          });
      }
      else{
          alert('Please fill all the field !');
      }

      }


  });




});
</script>








      </div>
  
    </div>
  </div>
</div>

 

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
 

         

  <button type="submit" class="btn btn-primary" data-toggle="modal" onclick="resetform()"  data-target="#exampleModal">Add New</button>
 
 


 <script>
        function resetform(){
            $("#formid")[0].reset();
            $("#exampleModalCenterTitle").text("Add New Project");
            $("#actionedit").val("Add");
        }
    </script>


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
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php  $ct=$result->firstItem(); ?>  
        @foreach ($result as $key)
  <tr>
      <th> {!!  $ct !!}</th>
      <td>{!!  $key->name; !!}</td>
      <td>{!! $key->address !!}</td>
      <td>{!! $key->mobile !!}</td>
      <td>{!! $key->designation !!}</td>
      <td>
			<a href='javascript:void(0)' class='btn btn-primary' onclick="editproject('{{$key->id}}')">  Edit</a>
			<a href='javascript:void(0)'onclick="del('{{$key->id}}')"> 
			<button class='btn btn-danger'>Delete</button> </a>
			</td>
    </tr>
    <?php  $ct++  ?> @endforeach
  </tbody>
</table>
     <?php    $csct=$result->nextPageUrl(); ?>  

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


<!-- on click edit button -->
    <script>
      function editproject(id){
        // alert("Button click")
        $.ajax({
         method:'GET',
         url:'/Getemployeebyid',
         data:{'id':id},
         dataType:'json',
         success:function(editform)
         {  
          
            $("#name").val(editform.name);
            $("#address").val(editform.address);
            $("#mobile").val(editform.mobile);            
            $("#designation").val(editform.designation);          
            $("#update_id").val(editform.id); 
             $("#exampleModalCenterTitle").text("Edit Project");
              $("#actionedit").val("Edit");
            $('#exampleModal').modal('show'); 
         },
        error: function(e){
            alert(error)
        }
      });
      }
    </script>



<!-- on click delete button    _token: $("#csrf").val(), -->
<script>
  function del(id){

   
     $.ajax({
      method:'delete',
      url:'/deleteemployee',
     
      data:{'id':id,  '_token': $("#csrf").val()},
      success: function(response  ){
        // alert(response)
        swal.fire("Done!", response.massage, response.alerttype, 5000,);
        // location.reload();
      }

     });
  }
</script>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  


  @include('theme.footer')






























