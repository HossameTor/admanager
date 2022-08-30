@extends('voyager::master')

@section('content')
<div class="col-md-10">
  <h1 class="mb-4">Dupliquer Banniere</h1>
<form method= "POST" action={{route("postdup",['id'=>$id])}}>
    @csrf
    <div class="form-group">
        <label for="exampleFormControlSelect1">Position</label>
        <select class="form-control" id="exampleFormControlSelect1" name="position"> 
          <option>---</option>
          <option value="AP1">AP1</option>
          <option value="AP2">AP2</option>
          <option value="AP3">AP3</option>
          <option value="AP4">AP4</option>
        </select>
    </div>
    <div class="input-group date form-group" id="datepicker">
      <input type="text" class="form-control" id="Dates" name="planification" placeholder="Select days" required />
      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i><span class="count"></span></span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>



@stop

@section('javascript')
<script>
  $(document).ready(function() {
      var positions =document.getElementsByName("position");
      var position = positions[0];
      var dates = new Array();
      position.onchange = function(){
          dates = [];
          $y = position.value;
          $.ajax({
                  url: '{{ url('position') }}/'+$y,
                  type: 'GET',
                  success: function(data)
                      {
                          
                          for (x in data){
                              dates.push(data[x].date);
                          }
                          $("#datepicker").datepicker("destroy");
                  $('#datepicker').datepicker({
                  startDate: new Date(),
                  multidate: true,
                  format: "yyyy-mm-dd",
                  datesDisabled: dates,
                  daysOfWeekHighlighted: "",
                  language: 'en'
                  }).on('changeDate', function(e) {
                  // `e` here contains the extra attributes
                  $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
              });           
              $( "#datepicker" ).datepicker("refresh");   
                      }
                  });   
                   
                                                                 
              };
              
      $('#datepicker').datepicker({
          startDate: new Date(),
          multidate: true,
          format: "yyyy-mm-dd",
          datesDisabled: dates,
          daysOfWeekHighlighted: "",
          language: 'en'
          }).on('changeDate', function(e) {
  // `e` here contains the extra attributes
              $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
      });
  });
</script>
@stop