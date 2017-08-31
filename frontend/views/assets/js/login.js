$(function () {
    $('#login_submit').on('click.submit',function () {
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        function successCB(data) {
            window.location.href = data.url;
        }
        function errorCB(data) {
            alert(data.data.errMsg);
            return;
        }
        requestUrl('/login/login','POST',{username:username,password:password},successCB,errorCB)
    });

})