var jQueryScript = document.createElement('script');
jQueryScript.setAttribute('src', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
document.head.appendChild(jQueryScript);


// function callCount() {
//   $(document).ready(function(){
//     //var count = 1;
//     $('#submit').click(function(){
//       $.ajax({url: "index.php",
//         success: function(result){
//         console.log(result);
//         //$('.moreposts').html(result);
//       }});
//       });
//   });
// }