
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
  <script src="./security.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jQuery 3.3.1.js" ></script>
<script src="js/jQuery-3.2.0.js" ></script>
<script type="text/javascript" src="js/jquery.form.js" ></script>
<script src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="dist/sweetalert.js" ></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js1/jQuery 3.3.1.js" ></script>
<script src="js1/jQuery-3.2.0.js" ></script>
<script type="text/javascript" src="js/jquery.form.js" ></script>
<script src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="dist/sweetalert.js" ></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js1/init.js"></script>
<script src="js1/materialize.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jQuery 3.3.1.js" ></script>
<script type="text/javascript" src="js/jquery.form.js" ></script>
<script src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="dist/sweetalert.js" ></script>
<script src="js/jQuery 3.3.1.js"></script>
 <!-- /.container -->
<script src="Chart.min.js"></script>
    <!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>
<script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
  
  <!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
  
<script>

$(document).ready(function(){  
           $('#dsearch').keyup(function(){  
                search_table($(this).val());  
           });  
 
           function search_table(value){  
                $('#tbody1 ').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
                 

</script>
