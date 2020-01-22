function getQueryStringParameter(paramToRetrieve) {   
    var hasResult = false;

    var params = document.URL.split("?")[1].split("&");

    for (var i = 0; i < params.length; i = i + 1) {
        var singleParam = params[i].split("=");
 
        if (singleParam[0] == paramToRetrieve)
        {
            hasResult = true;
            return singleParam[1];
        }
    }
    if( !hasResult ){
        return null;
    }
}
