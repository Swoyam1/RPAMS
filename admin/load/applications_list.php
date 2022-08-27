<?php

    if(!isset($_SESSION)){
        session_start();
    }


    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    require $rootfol."/process/dbconnect.php";
    $user_id=$_SESSION['user_id'];


    $limit=5;
    $page='';
    $table='';
    $pagination='';
    
    if(isset($_POST['page']))
    {
        $page = $_POST['page'];
        $sql="SELECT * from flight_request WHERE Status='Processed'";
        $result=mysqli_query($conn,$sql);
        
        $total_applications=mysqli_num_rows($result);
        $total_pages = ceil($total_applications/$limit);
        if($total_pages<$page)
        {
            $page=$total_pages;
        }
    }
    else
    {
        $page=1;
    }

    $offset = ($page - 1)*$limit; 



    $sql="SELECT * from flight_request WHERE Status='Processed' LIMIT $limit OFFSET $offset";

    
    if (!mysqli_query($conn, $sql))
    {
        echo mysqli_error($conn);
    }
    else
    {
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0)
        {
                                     
            $table .= '
            
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Application No.</th>
                    <th>Address</th>
                    <th>Date Time</th>
                    <th>Purpose</th>
                    <th>Action</th>                    
                </tr>
            </thead>

            <tbody>
            ';
            while($row = mysqli_fetch_assoc($result))
            {
                $table .= '
                <tr>
                    <td>'.$row["Application_No"].'</td>
                    <td>'.$row["Address"].'</td>
                    <td>'.$row["Timestamp"].'</td>
                    <td>'.$row["Purpose"].'</td>
                    <td class="text-center"><img src="images/free/review.svg" class="view_btn" width="16px" data-toggle="tooltip" data-placement="left" title="View" /></td>
                </tr>
                ';

            }
            $sql="SELECT * from flight_request WHERE Status='Processed'";
            $result=mysqli_query($conn,$sql);
            
            $total_applications=mysqli_num_rows($result);
            mysqli_close($conn);
            $total_pages = ceil($total_applications/$limit);

            $table .= '
            </tbody>
            </table>
            <span>Showing '.($offset+1).' to '.($offset+$limit).' of '.$total_applications.' applications</span>';

            for ($i=1; $i<=$total_pages;$i++)
            {
                if($page==$i)
                {
                    $pagination .='<li class="page-item active"><a class="page-link" id="pagination_link">'.$i.'</a></li>';
                }
                else
                {
                    $pagination .='<li class="page-item"><a class="page-link" id="pagination_link">'.$i.'</a></li>';
                }
            };
        }
        else
        {
            $table .= '<p>No. of appllied applications: 0</p>';

            mysqli_close($conn);
        }



        

        $data=array(
            'table_data'=>$table,
            'pagination'=>$pagination
        );

        echo json_encode($data);
    }
    



?>

