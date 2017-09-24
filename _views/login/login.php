<script src="_asset/js/public_js.js" >//public Js </script>
<script>
    $(document).ready(function(){
        $("#formLogin").submit(function(){
            var username = $("#username").val();
            var password = $("#password").val();
           $.post("_controllers/login/cek_role.php", {
               username: username,
               password: password
           }, function (data, status) {
                $("#demo").html(data);
           });
        });
    });
    
</script>

<div id="ajaxLogin">
    <h2>Login</h2>
    <form action="javascript:void(0)" id="formLogin" >
        Username: <input type="text" name="username" id="username" placeholder="username" /> <br/>
        Password: <input type="password" name="password" id="password" placeholder="password" /> <br/>
        <button type="submit">Login</button>
    </form>
    <p id="demo">
    </p>
</div>


<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>