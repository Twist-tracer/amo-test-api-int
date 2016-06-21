$("document").ready(function() {
    $("#send-request").bind("click", function(){
        $.ajax({
            type: "POST",
            url: "index.php",
            beforeSend: function() {
                $('#send-request')
                    .html("<img src='images/ajax-loader.gif' alt='Отправка...' title='Отправка...' />")
                    .attr("class", "btn btn-default disabled");
            },
            data: "query=send_request",
            success: function(response){
                response = JSON.parse(response);
                $("#response-panel").attr("class", "panel panel-"+response.status);
                $("#response").text(JSON.stringify(JSON.parse(response.response_str), undefined, 2));
                hljs.initHighlighting.called = false;
                hljs.initHighlighting();
                $('#send-request')
                    .text("Отправить запрос")
                    .attr("class", "btn btn-default");
            }
        });
    })
});