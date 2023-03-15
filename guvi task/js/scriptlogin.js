
  function submitDataLogin(){
    $(document).ready(function(){
      var data = {
        name: $("#name").val(),
        username: $("#username").val(),
        password: $("#password").val(),
        action: $("#action").val(),
      };

      $.ajax({
        url: 'php/function.php',
        type: 'post',
        data: data,
        success:function(response){
            alert(response);
            create(response);
        }
    });
    
});


function create(r){
    const r1 = JSON.parse(r);
    console.log(r1);
    
    localStorage.setItem('dataUser', r1[0].name)
    localStorage.setItem('dataAge', r1[0].age)
    localStorage.setItem('dataContact', r1[0].contactnumber)
    location.pathname = "/project1/home.html"
    // const name = document.createElement('div');
    // const age = document.createElement('div');
    // const contact = document.createElement('div');
    // name.innerHTML = r[0].name;
    // age.innerHTML = r[0].age;
    // contact.innerHTML = r[0].contactnumber;
    // prof.appendChild(name);
    // prof.appendChild(age);
    // prof.appendChild(contact);
}
  }