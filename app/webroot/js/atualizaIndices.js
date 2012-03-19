function atualizaIndices()
{
    var total = $.ajax_old({
        url: "test.html",
        context: document.body,
        success: function(){
            $(this).addClass("done");
        }
    });
    $.post(
        'omg.php',
        function(data, status) /* On Request Complete */
        {
            $('#T1').html(data); // put all the data in there
            $("#state").html(status); // update status
        },
        function(packet, status, fulldata, xhr) /* If the third argument is a function it is used as the OnDataRecieved callback */
        {
            $("#len").html(fulldata.length); // total how much was recieved so far
            $("#state").html(status); // status (can be any ajax state or "stream"
            var data = $("#T1").html(); // get text of what we received so far
            data += packet; // append the last packet we got
            $("#T1").html(data); // update the div
            $("<li></li>").html(packet).appendTo("#T2"); // add this packet to the list
        }
        );

}