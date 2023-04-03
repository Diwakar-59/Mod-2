var jQueryScript = document.createElement('script');
jQueryScript.setAttribute('src', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
document.head.appendChild(jQueryScript);

function callCount() {
  $(document).ready(function(){
    $('#submit').click(function(){
      // Park avehicle.
      $.ajax({url: "/book",
        success: function(result){
          //alert(result);
        $('.tickets').html(result);
      }});
    });
    
    // Release a vehicle.
    $('#release').click(function(){
      $.ajax({url: "/release",
      success: function(result){
        //alert(result);
      $('.tickets').html(result);
    }});
    });
      
  });
}