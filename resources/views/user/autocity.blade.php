

@include('theme.default')
@include('theme.header')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>

@include('theme.sidebar')
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Auto Complate</h1>
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
          <h3 class="card-title">Select Your Country Name</h3>

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
 

         
           
            <div class="form-group">

            <select name="country" class="countries form-control" id="countryId">
                <option value="">Select Country</option>
            </select>
        </div>

        <div class="form-group">
            <select name="state" class="states form-control" id="stateId">
                <option value="">Select State</option>
            </select>
        </div>
<div class="form-group">
            <select name="city" class="cities form-control" id="cityId">
                <option value="">Select City</option>
            </select>
            
        </div>
 


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
        
      </div>
      <!-- /.card -->
 
       <script>
      google.maps.event.addDomListener(window, 'load', function () 
      {
         var places = new google.maps.places.Autocomplete(document.getElementById('ownPlaces'));
         google.maps.event.addListener(places, 'place_changed', function () 
         {
          console.log(places.getPlace());
          var getaddress = places.getPlace();
          //alert(getaddress.address_components[0].long_name);
          //alert(getaddress.formatted_address);
          var whole_address           = getaddress.formatted_address;
          var split_whole_address     = whole_address.split(',');	
          //alert(split_whole_address);
          var whole_address_length    = split_whole_address.length;
          //alert(whole_address_length);
              
          if(whole_address_length == 2)
          {
                 var ownCity    = split_whole_address[0]; //alert(ownCity+'ownCity');
                 var ownState   = split_whole_address[0]; //alert(ownState+'ownState');
                 var ownCountry = split_whole_address[1]; //alert(ownCountry+'ownCountry');
                  
                 $('#ownCity').val(ownCity);
                 $('#ownState').val(ownState);
                 $('#ownCountry').val(ownCountry);
          }
          else
          {
                 var ownCity    = split_whole_address[0]; //alert(ownCity+'ownCity');
                 var ownState   = split_whole_address[1]; //alert(ownState+'ownState');
                 var ownCountry = split_whole_address[2]; //alert(ownCountry+'ownCountry');
                  
                 $('#ownCity').val(ownCity);
                 $('#ownState').val(ownState);
                 $('#ownCountry').val(ownCountry);
          }

          });
      });
      </script>
      
    </section>


<!-- on click edit button -->
    



<!-- on click delete button    _token: $("#csrf").val(), -->
 

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  


  @include('theme.footer')
