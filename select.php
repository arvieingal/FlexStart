<?php
session_start();
include_once("Included/dbconnect/connection.php");
$con = connection();


// Update Activity
if (isset($_POST["update_id"])) {
    $id_select = $_POST['update_id'];

    $output = "";

    $sql = "SELECT * FROM activities WHERE id = '" . $id_select . "'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $activityId = $row['id'];
        $activityName = $row['activityName'];
        $location = $row['location'];
        $dateOfActivity = date("Y-m-d", strtotime($row['dateOfActivity'])); // Convert date to MySQL date format
        $timeOfActivity = date("H:i:s", strtotime($row['timeOfActivity'])); // Convert time to MySQL time format
        $imgOld = $row['image'];
        $remarks = $row['remarks'];

        $img = $row['image'];


        $output .= "<div class='modal-content' style='margin:7% auto;'>
            <div class='head' style=''>
                <!--<i id='back-show' class='bi bi-arrow-left'></i> -->
                <span class='close' onclick='closeModal()'>&times;</span>
            </div>
            <header>Edit Activity</header>";

        if ($_SESSION['Role'] == 'admin') {
            $output .= "<form action='dashboard.php' method='POST' enctype='multipart/form-data'>";
        } else if ($_SESSION['Role'] == 'user') {
            $output .= "<form action='user.php' method='POST' enctype='multipart/form-data'>";
        }

        $output .= "<!-- Activity Name -->
                <input type='hidden' name='acitivityID' placeholder='Name Activity' class='input' value='" . $activityId . "' required>
                <div class='field input-field'>
                    <input type='text' name='nameActivity' placeholder='Name Activity' class='input' value='" . $activityName . "' required>
                </div>

                <!-- Activity Location -->
                <div class='field input-field'>
                    <input type='text' name='location' placeholder='Location' class='input' value='" . $location . "' required>
                </div>

                <!-- Activity Date & Time -->
                <div class='field input-field' style='display: flex; align-items:center; gap: 20px;'>
                    <div>
                        <label>Date: </label>
                        <input type='date' name='date' placeholder='Date' class='input' value='" . $dateOfActivity . "' required>
                    </div>
                    <div>
                        <label>Time: </label>
                        <input type='time' name='time' placeholder='Time' class='input' value='" . $timeOfActivity . "' required>
                    </div>
                </div>

                <!-- Activity File OOTD -->
                <div>
                    <label>OOTD: </label>
                    <input type='file' name='image' class='file' accept='image/*' style='margin-bottom: 20px;' required>
                    <input type='text' name='old_image' value='" . $imgOld . "' style='margin-bottom: 20px;' required>
                    <!-- <img src='activityImg/" . $row['image'] . "' alt='Activity Image' class='expandable-image' style='width: 120px; height:120px; object-fit:cover; border-radius: 5px;'>-->
                </div>

                <div class='field input-field'>
                    <label>Remarks: </label>
                    <textarea type='text' name='remarks' placeholder='Location'> $remarks </textarea>
                </div>

                <div class='field button-field'>
                    <input type='submit' class='addActivity' id='submitBtn' name='updateActivity' value='Update'>
                </div>
            </form>
        </div>";
    }

    echo $output;
}


// Delete Activity

if (isset($_POST["delete_id"])) {
    $id_select = $_POST['delete_id'];

    $output = "";

    $sql = "DELETE FROM activities WHERE id = '" . $id_select . "'";
    $result = $con->query($sql);

    if ($result) {
        $output .= "<div class='modal-content' style='margin:7% auto;'>
                    <div class='head'>
                        <span class='close' onclick='closeModal()'>&times;</span>
                    <div>
                        <header>Delete Activity</header>
                        <p style='text-align:center;'>Activity deleted successfully.</p>
                    </div>
                    </div>";
    } else {
        $output .= "<div class='modal-content' style='margin:7% auto;'>
                    <div class='head'>
                    <span class='close' onclick='closeModal()'>&times;</span>
                    </div>
                    <header>Delete Activity</header>
                    <p>Failed to delete activity.</p>
                 </div>";
    }

    echo $output;
}

// Remarks
if (isset($_POST["set_act"])) {
    $id_select = $_POST['set_act'];

    $output = "";

    $sql = "SELECT * FROM activities WHERE id = '" . $id_select . "'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $remarks = $row['remarks'];


        $output .= "<div class='modal-content' style='padding:20px; padding-bottom: 5px;'>
            <span class='close'>&times;</span>
            <header>Add Remarks</header>
            <form action='user.php' method='POST'>
                <div class='modal-body'>

                <div class='field input-field'>
                    <strong>Activity name:</strong>
                    <h4 style='padding:5px; display:flex; align-items:center;'><i class='bi bi-dot'></i>
                    " . $row['activityName'] . "</h4>
                </div>
                <!--<div class='field input-field'>
                    <label>OOTD: </label>
                    <img src='activityImg/" . $row['image'] . "' alt='Activity Image' class='expandable-image' style='width: 150px; height:150px; object-fit:contain; border-radius: 5px;'>
                
                </div> -->
                    
                    

                    <input type='hidden' id='remarksInput' name='activityId' value = " . $row['id'] . ">
                    <div class='field input-field'>
                        <label>Remarks: </label>
                        <textarea type='text' name='remarks' placeholder='Location'> $remarks </textarea>
                    </div>

                </div>
                <div class='modal-footer'>
                    <button class='btn btn-primary' id='cancelRemarks'>Cancel</button>
                    <button class='btn btn-primary' name='addRemarks'>Done</button>
                </div>
             </form>
        </div>";



    }

    echo $output;



}

?>
<script>
    // Event delegation for cancel button
    document.addEventListener('click', (event) => {
        if (event.target && event.target.matches('#cancelRemarks')) {
            event.preventDefault();
            const remarksModal = document.getElementById("addRemarksModal");
            remarksModal.style.display = 'none';
        }
        else if (event.target && event.target.matches('#cancelRemarks')) {

        }

    });



</script>