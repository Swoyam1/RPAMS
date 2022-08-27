function resetNFZaddForm(){
    document.getElementById("nfz-add").reset();
}

function ChangeURL(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Title, obj.Url);
    }
    //else {
    //    alert("Browser does not support HTML5.");
    //}
}



//Script for auto incresing height of text box
var observe;
if (window.attachEvent) {
    observe = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}
else {
    observe = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}
function auto_textbox_height () {
    var text = document.getElementById('textbox');
    function resize () {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);

    //text.focus();
    //text.select();
    resize();
}


//preventing form submission on pressing ENTER key 

$('form input').keydown(function (e) {
    if (e.keyCode == 13) {
        var inputs = $(this).parents("form").eq(0).find(":input");
        if (inputs[inputs.index(this) + 1] != null) {                    
            inputs[inputs.index(this) + 1].focus();
        }
        e.preventDefault();
        return false;
    }
});


//notification

function notify(view = '')
{
    $.ajax({
        url: "users/load/notify.php",
        method: "POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
            $('#notifications').html(data.notification);
            if(data.unseen_count>0)
            {
                $('.count').html(data.unseen_count);
            }
        }
    });
};

$(document).ready(function() {
    $('#notify').click(function()
    {
        $('#notifications_count').html('');
        notify('viewed');
    });

});

setInterval(function() {
    notify();
}, 60000);





//delete  application

$(document).ready(function(){

    $(document).on('click','.delete_btn',function(){
        delete_confirmation(event);
        console.log(this);
        console.log(event);
    });


});

var $application_no;
function delete_confirmation(event){

    var $row=$(event.target).closest('tr');
    $application_no=$row.find('td:eq(0)').text();
    console.log($row);
    console.log($application_no);
    var $alert_msg = "Your application with </b>Application ID "+ $application_no + "</b> will be deleted.";
    $(".modal-title").html('Comfirm Application Deletion!');
    $(".modal-body").html($alert_msg);

    $("#myModal").modal('show');


};

$(document).ready(function(){
    $(document).on('click','#delete_confirm',function(){
            console.log('again');
            $('#delete_confirm').html( '<span class="spinner-border spinner-border-sm"></span> Deleting..');
            delete_application($application_no);
    });
});

function delete_application($application_no)
{
    $.post('process/delete_application.php',
            {application_id:$application_no},
            function(data){

                if(data == 1)
                {
                    $("#server_msg").html('Your application was deleted!');
                    $("#alert_div").css({"display":"block"});
                    $("#application_table").load("users/applications/pending_applications.php");
                    notify();
                }
                else
                {
                    $("#server_msg").text(data);
                    $("#alert_div").css({"display":"block"});
                }
                
                //alert(data);
            }
        );
        $('#delete_confirm').html('Delete');
        $("#myModal").modal('hide');
};
