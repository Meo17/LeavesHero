<?php require_once 'includes/HRReport.php'?>
  <script >
 var firebaseConfig = {
    apiKey: "AIzaSyCsHkJI5LjRN-WtQmwZxxFthT8EfRmjUOA",
    authDomain: "leaveshero42-37675.firebaseapp.com",
    databaseURL: "https://leaveshero42-37675.firebaseio.com",
    projectId: "leaveshero42-37675",
    storageBucket: "leaveshero42-37675.appspot.com",
    messagingSenderId: "1030314531552",
    appId: "1:1030314531552:web:5fe385f4488ca974864e85"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {

    var user = firebase.auth().currentUser;
    var query = firebase.database().ref("Subscriber").orderByKey();
    query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){

            var key              = childSnapshot.key;
            var name             = childSnapshot.child("Username").val();
            var companyaddress   = childSnapshot.child("Company_Address").val();
            var contact          = childSnapshot.child("Company_Contact").val();
            var email            = childSnapshot.child("Company_Email").val();
            var password         = childSnapshot.child("Password").val() ;
            var companyname      = childSnapshot.child("Company_Name").val() ;
            var Company_profile  = childSnapshot.child("Company_profile").val();
            var childData        = childSnapshot.val();
            
            if(Company_profile == ""){
              Company_profile = document.querySelector("#profile").src              = "images/icon_user.png"; 
              Company_profile = document.querySelector("#image_upload_preview").src = "images/icon_user.png"; 
            }
          if(user.email == name){

              document.getElementById("userKey").value             =  key;
              document.getElementById("companyaddress").value      =  companyaddress; 
              document.getElementById("password").value            =  password; 
              document.getElementById("companycontact").value      =  contact; 
              document.getElementById("email").value               =  email; 
              document.getElementById("user_para").innerHTML       =  companyname;
              document.querySelector('#profile').src               =  Company_profile;
              document.querySelector('#image_upload_preview').src   =  Company_profile;
          }
           var query1 = firebase.database().ref("Users").orderByKey();
          query1.once("value").then(function(snapshot1){
           snapshot1.forEach(function(childSnapshot1){  
            var key1              = childSnapshot1.key;
            var name1             = childSnapshot1.child("UsersName").val();
            var password1         = childSnapshot1 .child("Password").val();

            if(user.email == name1){
                document.getElementById("comuserskey").value             =  key1;
            }
          });
       });
      });
    });

    if(user != null ){

      var email_id = user.email;
      var user_id = user.uid;
      document.getElementById("userid").value =  user_id;

    }

  } else {
  window.location.href = "index.php";


  }

/////////////////////////////////////////START/////////////////////////////////////////////////////
var usercompanyid                    　=  document.getElementById("userid").value;
var db                               　=  firebase.database();
var employeeleaverequestref          　=  db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         　=  db.ref("Leave_Request/"+usercompanyid);
var Leave_Request_Employee           　=  db.ref("Leave_Request/"+usercompanyid);
var Leave_Request_Employee1            =  db.ref("Leave_Request/"+usercompanyid);
var employeeref                      　=  db.ref("Employee/"+usercompanyid);
var pendingtable                     　=  $('#Pending tbody');
var acceptedtable                    　=  $('#Accepted tbody');
var rejectedtable                    　=  $('#Rejected tbody');
var subdoc                           　=  $('#subdoct tbody');

var update                             =  db.ref("Subscriber");
var empuserupdate                      =  db.ref("Users");
var profphoto                          =  db.ref("Subscriber");
function updateempprofile(event){
  event.preventDefault();

            var userKey                                 =  document.getElementById("userKey").value;
            var comuserskey                             =  document.getElementById("comuserskey").value;       
            
            var file                              =  document.getElementById('inputFile').value;
            var password                          =  document.getElementById("password").value;

            var updateaddress                 = document.getElementById("companyaddress").value;
            var companycontact                = document.getElementById("companycontact").value;
            var upadateemail                  = document.getElementById("email").value;

             var storage           = firebase.storage();
             var picurl            = document.getElementById('photourl').value;
             var vidFileLength     = $("#inputFile")[0].files.length;
             var inpFile           = document.getElementById('inputFile');


        if(picurl ==""){

          
            update.child(userKey).update({
             Company_Email                      :            upadateemail,
             Company_Address                    :            updateaddress,
             Password                           :            password,
             Company_Contact                    :            companycontact,   
            });
              
            empuserupdate.child(comuserskey).update({
              Password : password,
            });
         for (var i = 0; i < inpFile.files.length; i++) {
                var imageFile = inpFile.files[i];

          uploadImageAsPromise(imageFile);

          function uploadImageAsPromise (imageFile) {
            return new Promise(function (resolve, reject) {
                var storageRef = firebase.storage().ref("profile/"+imageFile.name);   
                    var task = storageRef.put(imageFile);
                    console.log(task);
                    task.then(snap=>{

                  
                    storageRef.getDownloadURL().then(function(url) {
 
                    profphoto.child(userKey).update({
                       Company_profile                 :            url,
                       });
                    
                     }); 
                  });

                    //Update progress bar
                      task.on('state_changed',
                        function progress(snapshot){

                            var percentage = snapshot.bytesTransferred / snapshot.totalBytes * 100;
                            console.log(percentage +"%");
                        },
                        function error(err){
                          console.log("Something Wrong while Uploading");
                        },
                        function complete(){
                            var downloadURL = task.snapshot.downloadURL;
                             console.log("Done!");
                            
                              $("#myModal").modal("hide");

                        }
                      );
                 });
               }
             } 
          }
          if(vidFileLength == 0){

            update.child(userKey).update({
             Company_Email                      :            upadateemail,
             Company_Address                    :            updateaddress,
             Password                           :            password,
             Company_Contact                    :            companycontact,   
            });
              
            empuserupdate.child(comuserskey).update({
              Password : password,
            });
            $("#myModal").modal("hide");
          }
         else if( $("#inputFile").val() !=""){

         for (var i = 0; i < inpFile.files.length; i++) {
                var imageFile = inpFile.files[i];

          uploadImageAsPromise(imageFile);

          function uploadImageAsPromise (imageFile) {
            return new Promise(function (resolve, reject) {
                var storageRef = firebase.storage().ref("profile/"+imageFile.name);   
                    var task = storageRef.put(imageFile);
                    console.log(task);
                    task.then(snap=>{

                  
                    storageRef.getDownloadURL().then(function(url) {
 
                    profphoto.child(userKey).update({
                       Company_profile                 :            url,
                       });
                    
                     }); 
                  });

                    //Update progress bar
                      task.on('state_changed',
                        function progress(snapshot){

                            var percentage = snapshot.bytesTransferred / snapshot.totalBytes * 100;
                            console.log(percentage +"%");
                        },
                        function error(err){
                          console.log("Something Wrong while Uploading");
                        },
                        function complete(){
                            var downloadURL = task.snapshot.downloadURL;
                             console.log("Done!");
                            
                              $("#myModal").modal("hide");

                        }
                      );
                 });
               }
             } 
         }
       
  }

var usercompanyid                    =     document.getElementById("userid").value;
var employeeleaverequestref          =     db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         =     db.ref("Leave_Request/"+usercompanyid);
var compholiday1                     =     db.ref('Company_Holiday/'+usercompanyid);
var Leave_Request_Employee           =     db.ref("Leave_Request_Employee/"+usercompanyid);
var Leave_Request_Employee1          =     db.ref("Leave_Request_Employee/"+usercompanyid);
function notif(){
var myArray;
myArray = [];
var count;
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
            var  key2        = childSnapshot1.key;
            var status       = childSnapshot1.child('status').val();
            var leaveType    = childSnapshot1.child('leaveType').val();
            var id           = childSnapshot1.child('id').val();
            var part3        = employeeleaverequestref2.child(key2);
             var childData   = childSnapshot1.val();

            if(status =='waiting for approval'){  
              myArray.push(key2);
              count =  myArray.length;
              document.getElementById('count').innerHTML = count;
              if(count == 0){
                $('#badge1').hide();
              }

            }

          });
        });
     });
 });

}

function report(){
  var lables =[]; 
  var dates  =[];
  var counts =[];
  var array2 =[];
  var c      =[];

  var db                =  firebase.database();
  var usercompanyid     =  document.getElementById("userid").value;
  var Leave_Request     =  db.ref("Leave_Request/"+ usercompanyid);
  var Company_Leave     =  db.ref("Company_Leave/"+ usercompanyid);
  Company_Leave.once('value', function(snapshot3) {
    snapshot3.forEach(function(childSnapshot2){
    var  leavekey          = childSnapshot2.key;
    var  LeaveType         = childSnapshot2.child("LeaveType").val();

              Leave_Request.once('value', function(snapshot) {
              snapshot.forEach(function(childSnapshot){
              var  key        = childSnapshot.key;
              var Leave_Request1 = Leave_Request.child(key);
              Leave_Request1.once('value', function(snapshot2) {
                snapshot2.forEach(function(childSnapshot){
                var  key2                = childSnapshot.key;
                var  dateApproved        = childSnapshot.child('dateApproved').val();
                var  LeaveType1          = childSnapshot.child('leaveType').val();
                var  status              = childSnapshot.child('status').val();

                if (LeaveType == LeaveType1 &&status =='approved' ){
                   lables.push(LeaveType1);
                  // console.log(lables);
                     dates.push(dateApproved);
                   // if()
                      // var dateslabels = ["2019-01-26","2019-02-26","2019-03-26","2019-04-26","2019-05-26","2019-06-26","2019-07-26","2019-08-26","2019-09-26","2019-10-26","2019-11-26","2019-12-26"];
                      // var leg =dates.length;
                      var freqMap = new Map();

                      dates.forEach(function(time) {
                        var date = new Date(time);
                        var monthName = date.toLocaleString("en-us", {
                          month: "short"
                        });
                        var freqMap2 = new Map();
 
               
                    
                  
                        var key = monthName + "-" + date.getFullYear();
                        var count = freqMap.get(key) || 0;
                         freqMap.set(key,++count);
                       
                       // c.push(count);
                      
                      var ctx = document.getElementById("myChartLine").getContext('2d');

                      var myChartLine = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: [...freqMap.keys()],
                                    datasets: [{
                                        label: '# Employee leave',
                                        data:[count],
                                        backgroundColor: [
                                            '#00cc99',
                                            '#ccc',
                                            '#262626',
                                            '#00cc99',
                                            '#ccc',
                                            '#262626'
                                        ],
                                        borderColor: [
                                            '#00cc99',
                                            '#ccc',
                                            '#262626',
                                            '#00cc99',
                                            '#ccc',
                                            '#262626'
                                        ],
                                        borderWidth: 1
                                    }]
                          },
                                  options: {
                                    scales: {
                                        xAxes: [{
                                        gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        }
                                    }],
                                        yAxes: [{
                                          gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        },
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                      });
                      });

     
                }
              
               });

              });

              });

       });

  });

 });

}
function bargraph(){
  var lables =[]; 
  var dates  =[];
  var counts  =[];
  var db                =  firebase.database();
  var usercompanyid     =  document.getElementById("userid").value;
  var Leave_Request     =  db.ref("Leave_Request/"+ usercompanyid);
  var Company_Leave     =  db.ref("Company_Leave/"+ usercompanyid);


              Leave_Request.once('value', function(snapshot) {
              snapshot.forEach(function(childSnapshot){
              var  key        = childSnapshot.key;
              var Leave_Request1 = Leave_Request.child(key);
              Leave_Request1.once('value', function(snapshot2) {
                snapshot2.forEach(function(childSnapshot){
                var  key2                = childSnapshot.key;
                var  dateApproved        = childSnapshot.child('dateApproved').val();
                var  LeaveType1          = childSnapshot.child('leaveType').val();
                var  status              = childSnapshot.child('status').val();

                if (status == "approved"){
                   lables.push(LeaveType1);
                  // console.log(lables);
                   dates.push(dateApproved);
                
                         //console.log(dates);

                         var freqMap = new Map();
                        dates.forEach(function(time) {
                          var date = new Date(time);
                              var monthName = date.toLocaleString("en-us", {
                                month: "short"
                              });
                              var year = date.getFullYear();
                              var key  = monthName + "-" + date.getFullYear();
                              var count = freqMap.get(key) || 0;
                              freqMap.set(key, ++count);
                           console.log(count);
                            var ctx = document.getElementById("myChartBarVer").getContext('2d');
                          
                            var myChartBarVer = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [year],
                                    datasets: [{
                                        label: '# Annually of Employee leave',
                                        data:[count],
                                        backgroundColor: [
                                            '#00cc99',
                                            '#ccc',
                                            '#262626',
                                            '#00cc99',
                                            '#ccc',
                                            '#262626'
                                        ],
                                        borderColor: [
                                            '#00cc99',
                                            '#ccc',
                                            '#262626',
                                            '#00cc99',
                                            '#ccc',
                                            '#262626'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                        gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        }
                                    }],
                                        yAxes: [{
                                          gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        },
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });

                       });
     
                }
              
               });

              });

              });

       });


}


function init(){

report();
notif();
reload_notif();
bargraph();

}
init();
function reload_notif(){
   window.setInterval(notif, 1000);
}



init();


////////////////////////////////////END////////////////////////////////////////////////////////



});
  function logout(){
  firebase.auth().signOut().then(function() {
     window.location.href = "index.php";
    console.log('Signed Out');
  }, function(error) {
    console.error('Sign Out Error', error);

  });

  }
</script>