var page;
//manage  application

$(document).ready(function(){

    $(document).on('click','.view_btn',function(){
        view_application(event);
    });


});

var $application_no;
function view_application(event){

    var $row=$(event.target).closest('tr');
    $application_no=$row.find('td:eq(0)').text();
    console.log($row);
    console.log($application_no);
    //var $alert_msg = "Your application with </b>Application ID "+ $application_no + "</b> will be deleted.";
    $(".modal-title").html('Application No: <b>'+$application_no+'</b>');
    $(".modal-body").html($("#loading").html());
    $(".modal-body").load('admin/load/application_map.php?application_no='+$application_no);
    //$('#myModal').modal({backdrop: 'static', keyboard: false});
    $("#myModal").modal('show');


};

$(document).ready(function(){
    $(document).on('click','#approve_confirm',function(){
        $('#delete_confirm').html( '<span class="spinner-border spinner-border-sm"></span> Approving..');
        $("#myModal").modal('hide');
        $(".confirm_box-title").html("Confirm Approval!");
        $(".confirm_box-body").html("Are you sure you want approve this application?");
        //$('#confirm_box').modal({backdrop: 'static', keyboard: false});  
        $("#confirm_box").modal('show');
        $("#rejected").css({"display":"none"});
    });

    $(document).on('click','#reject_confirm',function(){
        $('#delete_confirm').html( '<span class="spinner-border spinner-border-sm"></span> Rejecting..');
        $("#myModal").modal('hide');
        $(".confirm_box-title").html("Confirm Rejection!");
        $(".confirm_box-body").html("Are you sure you want reject this application?");
        //$('#confirm_box').modal({backdrop: 'static', keyboard: false});
        $("#confirm_box").modal('show');
        $("#approved").css({"display":"none"});
    });

    $(document).on('click','.cancel_btn',function(){
        //$('#myModal').modal({backdrop: 'static', keyboard: false});
        $("#myModal").modal('show');
        $("#approved").css({"display":"flex"});
        $("#rejected").css({"display":"flex"});
    });



});


$(document).ready(function(){

    $(document).on('click','#approved',function(){
        ammend_application(1);
    });

    $(document).on('click','#rejected',function(){
        ammend_application(0);
    });


});

function ammend_application($action){
    $.post('admin/process/ammend_application.php',
        {application_id:$application_no,action:$action},
        function(data){

            if(data == 1)
            {
                $("#server_msg").html('The application was approved successflly!');
                $("#alert_div").css({"display":"block"});
                load_appications(page);
                $("#total_counts").load("admin/load/application_count.php");
                notify();

            }
            else if(data == 0)
            {
                $("#server_msg").html('The application was rejected successflly!');
                $("#alert_div").css({"display":"block"});
                load_appications(page);
                $("#total_counts").load("admin/load/application_count.php");
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
    $("#confirm_box").modal('hide');
}


//pagination

$(document).ready(function(){



    $(document).on('click','#pagination_link',function(){
        page = $(this).text();
        console.log(page);
        load_appications(page);
    });
    $("#application_table").html($("#loading").html());

});

function load_appications(page){
    $.ajax({
        url: "admin/load/applications_list.php",
        method: "POST",
        data:{page:page},
        dataType:"json",
        success:function(data)
        {
            $("#application_table").html(data.table_data);
            $('.pagination').html(data.pagination);

        }
    });
};

$(window).on('load', function() {
    load_appications();
});

