<?php
session_start();
include_once("../Included/dbconnect/connection.php");
$con = connection();


if (isset($_POST["manage"])) {
    $id_select = $_POST['manage'];

    $output = "";

    $sql = "SELECT * FROM user WHERE id = '" . $id_select . "'";
    $result = $con->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    

        $activityId = $row['ID'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        // $profileImg = $row['profileImg']


        $output .=
            "<div class='modal-content'>
            <div class='head'>
                <span class='close' onclick=''>&times;</span>
            </div>
            <header>Manage User</header>

            <div class='userName' style='text-align:center;'>
                <div class='user-profile' style='display:flex; align-items:center; justify-content: center;'>
                    <img src='../activityImg/profile-img.jpg' alt=' style='border-radius:50%;'>
                </div>
                <h5 style='padding:10px;'>" . $firstName . " " . $lastName . "</h5>
            </div>

            <div class='container d-grid gap-2'>
            <button id='viewAccount' class='btn btn-primary'>View Account</button>
            <button id='editAccount' class='btn btn-primary'>Edit Account</button>
            <button class='btn btn-secondary'>Cancel</button>
        </div>
        </div>";
    }
    echo $output;
}

?>

<script>
    function redirect() {
        var buttons = document.querySelectorAll('.container button');
        var close = document.querySelector('.close');
        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                if (btn.id === 'viewAccount') {
                    window.location = 'viewAccount.php?id=' + <?php echo $activityId ?>
                } else if (btn.id === 'editAccount') {
                    window.location = 'editAccount.php?id=' + <?php echo $activityId ?>
                } else {
                    document.getElementById('manageModal').style.display = 'none';
                }
                
            })
        });
        close.addEventListener('click', () =>{
            document.getElementById('manageModal').style.display = 'none';
        })
    }
    redirect();







</script>