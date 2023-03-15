


  function submitData(){
    console.log("Thaniuhsi")
    $(document).ready(function(){
      var data = {
        name: $("#name").val(),
        username: $("#username").val(),
        password: $("#password").val(),
        age: $("#age").val(),
        contactnumber: $("#contactnumber").val(),
        action: $("#action").val(),
      };
      console.log($("#contactnumber").val());
      localStorage.setItem('username',$("#username").val())                                                                                                             

      $.ajax({
        url: 'php/function.php',
        type: 'post',
        data: data,
        success:function(response){
          alert(response);
          if(response == "Login Successful"){
            window.location.pathname = "/project1/home.html";
          }
        }
      });
    });
  }

