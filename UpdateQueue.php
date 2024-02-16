<?php

if (isset($_POST['submit']) && isset($_POST['QDate']) && isset($_POST['QStatus'])) {
    require 'conn.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $QDate = $_POST['QDate'];
    $Qstatus = $_POST['QStatus'];

    echo 'QDate = ' . $QDate;


    $sql = 'UPDATE queue SET QDate = : QDate , QStatus, :QStatus , Pid =:Pid';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QDate', $QDate);
    $stmt->bindParam(':Pid', $Pid);
    $stmt->bindParam(':QStatus', $Qstatus);


    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute()) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
