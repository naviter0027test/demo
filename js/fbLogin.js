
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

window.fbAsyncInit = function() {
    FB.init({
        appId      : '585697805544276',
        cookie     : true,
        xfbml      : true,
        version    : 'v5.0'
    });
    //記錄用戶行為資料 可在後台查看用戶資訊
    FB.AppEvents.logPageView();   
};

$(document).ready(function() {

    $('.fbCheckLogin').on('click', function() {
        FB.getLoginStatus(function(response) {
            console.log(response);
        });
    });

    $('.fbLogin').on('click', function() {
        FB.getLoginStatus(function(response) {
            console.log(response);
            if(response.status === 'connect') {
                alert('has login');
            } else {
                FB.login();
            }
        });
    });
});
