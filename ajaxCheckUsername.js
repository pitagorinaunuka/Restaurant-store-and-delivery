$('#modalLRInput14').on( 'input', function() {
     email = document.getElementById('modalLRInput14').value;
     $.ajax({
      url: "/email",
      data:'email='+email,
      type: "POST",
      success:function(data){
        notice = document.getElementById('emailAvailability');
        if(data == 1){
          notice.style.color = "green";
          notice.innerHTML = "Username available";
        } else {
          notice.style.color = "red";
          notice.innerHTML = "Username unavailable";
        }
      },
      error:function (){}
  });  
});