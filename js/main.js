$("document").ready(function() {
    $("#send-request").bind("click", function(){
        $.ajax({
            type: "POST",
            url: "index.php",
            data: "query=send_request",
            success: function(response){
                response = JSON.parse(response);
                $("#response-panel").attr("class", "panel panel-"+response.status);
                $("#response").text(JSON.stringify(JSON.parse(response.response_str), undefined, 2));
                hljs.initHighlighting.called = false;
                hljs.initHighlighting();
            }
        });
    })
});