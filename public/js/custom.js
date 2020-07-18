$(document).ready(function () {

  $("#modal-delete").on("show.bs.modal",function(e){
      var t=$(e.relatedTarget),
      n=$(this),
      i=t.data("action")||n.find("form").attr("action"),
      a=t.data("message")||"this record",
      o=t.data("return-url")||"";
      n.find("form").attr("action",i),n.find('input[name="return_url"]').val(o),
      n.find("#message").text(a);
  });

  $("#show_current_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_current_password input').attr("type") == "text"){
            $('#show_current_password input').attr('type', 'password');
            $('#show_current_password i').addClass( "fa-eye-slash" );
            $('#show_current_password i').removeClass( "fa-eye" );
        }else if($('#show_current_password input').attr("type") == "password"){
            $('#show_current_password input').attr('type', 'text');
            $('#show_current_password i').removeClass( "fa-eye-slash" );
            $('#show_current_password i').addClass( "fa-eye" );
        }
    });
    $("#show_new_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_new_password input').attr("type") == "text"){
            $('#show_new_password input').attr('type', 'password');
            $('#show_new_password i').addClass( "fa-eye-slash" );
            $('#show_new_password i').removeClass( "fa-eye" );
        }else if($('#show_new_password input').attr("type") == "password"){
            $('#show_new_password input').attr('type', 'text');
            $('#show_new_password i').removeClass( "fa-eye-slash" );
            $('#show_new_password i').addClass( "fa-eye" );
        }
    });
    $("#show_confirm_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_confirm_password input').attr("type") == "text"){
            $('#show_confirm_password input').attr('type', 'password');
            $('#show_confirm_password i').addClass( "fa-eye-slash" );
            $('#show_confirm_password i').removeClass( "fa-eye" );
        }else if($('#show_confirm_password input').attr("type") == "password"){
            $('#show_confirm_password input').attr('type', 'text');
            $('#show_confirm_password i').removeClass( "fa-eye-slash" );
            $('#show_confirm_password i').addClass( "fa-eye" );
        }
    });
});