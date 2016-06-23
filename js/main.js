function checkJSON(data) {
    try {
        JSON.parse(data);
    }
    catch (e) {
        return false;
    }
    return true;
}

$("document").ready(function() {
    $("#send-request").bind("click", function(){
        $.ajax({
            type: "POST",
            url: "index.php",
            data: "query=get_request_contents",
            success: function(response){
                $("#request").text(response);
                hljs.initHighlighting.called = false;
                hljs.initHighlighting();
            }
        });
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

                if(response.response_str == "") { // Если пустота
                    $("#response-panel").attr("class", "panel panel-warning");
                    $("#response").text(response.response_str);
                } else if(checkJSON(response.response_str)) {
                    $("#response-panel").attr("class", "panel panel-"+response.status);
                    $("#response").text(JSON.stringify(JSON.parse(response.response_str), undefined, 2));
                } else { // Если пришел не JSON
                    $("#response-panel").attr("class", "panel panel-danger");
                    $("#response").text("Неверный формат данных");
                }

                hljs.initHighlighting.called = false;
                hljs.initHighlighting();
                $('#send-request')
                    .text("Отправить запрос")
                    .attr("class", "btn btn-default");
            }
        });
    })
});