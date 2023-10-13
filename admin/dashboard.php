<?php include_once('dash-header.php') ?>

<?php include_once('sideBar.php') ?>


<main id="main" class="main" style='margin-top:60px;'>

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../userManage.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li> -->
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Active User -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Active Users <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php echo $totalUsers ?>
                                        </h6>
                                        <!-- 
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Active User -->


                    <!-- Deactivate User -->
                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Deactivate User <span>| This Year</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?php echo $totalUsers ?>
                                            </h6>

                                            <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <!-- End Deactivate USer  -->


                    <!-- Total User  -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Users <span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <!-- <div class="ps-3">
                                        <h6>
                                             <?php echo $totalUsers ?>
                                        </h6>

                                    </div> -->
                                    <div class="total-right" style="padding-left: 20px;">
                                        <div class="cont admin">
                                            <h5>
                                                <?php echo $totalUsers ?>
                                                <strong>- Admin</strong>
                                            </h5>
                                        </div>

                                        <div class="cont user">
                                            <h5>
                                                <?php echo $totalUsers ?>
                                                <strong>- User</strong>

                                            </h5>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Total User -->



                </div>

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart
                            </div>
                            <div class="card-body">
                                <canvas id="activityChart" width="100%" height="50"></canvas>
                            </div>
                            <div class="card-footer small text-muted" id="activityChartUpdated"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Pie Chart
                            </div>
                            <div class="card-body" style="display:flex; align-items:center; justify-content:center;">
                                <canvas id="genderChart" class='chart'>
                                </canvas>
                            </div>
                            <div class="card-footer small text-muted" id="genderChartUpdated"></div>
                        </div>
                    </div>

                </div>
            </div>

            <section id="list-user">
                <div class="card mb-4">
                    <div class="card-header" style='font-size: 18px; color:black; font-weight: 600;'>
                        <i class="bi bi-table"></i>
                        List Of User
                    </div>
                    <div class="card-header">
                        <div class="upper-table">
                            <input type="text" name="searchUser" placeholder="Enter name">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $countUser = 1;
                                do { ?>
                                    <tr>
                                        <td>
                                            <?php echo $countUser++ ?>
                                        </td>
                                        <td>
                                            <?php echo $rowUsers['firstName'] ?>
                                        </td>
                                        <td>
                                            <?php echo $rowUsers['lastName'] ?>
                                        </td>
                                        <td>
                                            <?php echo $rowUsers['gender'] ?>
                                        </td>
                                        <td>
                                            <?php echo $rowUsers['address'] ?>
                                        </td>
                                        <td>
                                            <?php echo $rowUsers['email'] ?>
                                        </td>
                                        <td>
                                            <!-- <button class="btn btn-primary">Activate</button>
                                            <button class="btn btn-danger">Deactivate</button> -->
                                            <button class="manageBtn btn btn-primary"
                                                id="<?php echo $rowUsers['ID'] ?>">Manage</button>
                                        </td>

                                    </tr>


                                <?php } while ($rowUsers = $resultUser->fetch_assoc()) ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


            <script>
                $(document).ready(function () {
                    // Show Manage
                    $('.manageBtn').click(function () {
                        var act_id = $(this).attr('id');

                        $.ajax({
                            url: "manage.php",
                            method: 'post',
                            data: { manage: act_id },
                            success: function (result) {
                                $('#manageModal').html(result);
                            }
                        });

                        $('#manageModal').show();
                    });


                    $('.editActivityBtn').click(function () {
                        act_id = $(this).attr('id')
                        // alert(act_id)
                        $.ajax({
                            url: "../select.php",
                            method: 'post',
                            data: { update_id: act_id },
                            success: function (result) {
                                $('#editModal').html(result);
                            }
                        });


                        $('#editModal').show();
                    })

                    // For Delete Activity
                    $('.deleteBtn').click(function () {
                        const act_id = $(this).attr('id')
                        // alert(act_id)
                        confirmDeleteModal(act_id);
                    });


                });



                function confirmDeleteModal(actId) {
                    $("#deleteModal .modal-body").text("Are you sure you want to delete Activity ");

                    $("#confirmDelete").off("click").on("click", function () {
                        console.log("Deleting item ID: " + actId);
                        deleteActivity(actId);
                    });
                }

                function deleteActivity(actId) {
                    $.ajax({
                        url: "../select.php",
                        method: 'post',
                        data: { delete_id: actId },
                        success: function (result) {
                            $('#deleteModal').html(result);
                            location.reload();
                        }
                    });
                }

            </script>

            <!-- Manage User -->
            <div id="manageModal" class="modal" style="overflow: ; display:;"></div>


            <!-- EDIT Activity -->
            <div id="editModal" class="modal" style="z-index:99999; overflow: auto;"></div>


            <!-- Delete Activity -->
            <div id="deleteModal" class="modal fade" role="dialog" aria-hidden="true" style="z-index:99999;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding: 5px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">DELETE</h5>
                            <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"
                                aria-label="Close" style="font-size:40px;"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this activity?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>






            <section id="list-user">
                <div class="card mb-4">
                    <div class="card-header" style='font-size: 18px; color:black; font-weight: 600;'>
                        <i class="bi bi-table"></i>
                        List Of Activities
                    </div>
                    <div class="card-header">
                        <div class="upper-table">
                            <input type="text" name="searchUser" placeholder="Enter name">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Activity Name</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>OOTD</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($activities)) {
                                    $countActivity = 1;
                                    foreach ($activities as $activity) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $countActivity++; ?>
                                            </td>
                                            <td>
                                                <?php echo $activity['activityName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $activity['location']; ?>
                                            </td>
                                            <td>
                                                <?php echo $activity['dateOfActivity']; ?>
                                            </td>
                                            <td>
                                                <?php echo $activity['timeOfActivity']; ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo "../activityImg/" . $activity['image']; ?>"
                                                    alt="Activity Image" class="expandable-image"
                                                    style="width: 120px; height:120px; object-fit:cover; border-radius: 5px;">
                                            </td>
                                            <td style="width:200px">
                                                <p>I really enjoyed playing basketball earlier.</p>
                                            </td>
                                            <td>
                                                <button class="editActivityBtn btn btn-primary"
                                                    id="<?php echo $activity['id'] ?>">Edit</button>


                                                <button id="<?php echo $activity['id'] ?>" class="deleteBtn btn btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                            </td>


                                        </tr>
                                    <?php }
                                } else { ?>
                                    <div class="alert alert-warning alert-dismissable fade show" role="alert"
                                        style="display:flex;align-items: center; justify-content:space-between;">
                                        <strong>No Activity Added Yet!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close"
                                            style="width: 50px;"></button>
                                    </div>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>



        </div>
    </section>












    <script>
        // Get the gender data from PHP variables

        function updateTimestamp(elementId) {
            var now = new Date();
            var timestamp = "Updated at " + now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            document.getElementById(elementId).innerHTML = timestamp;
        }

        // Get the gender data from PHP variables
        var labels = <?php echo json_encode(array_keys($genderData)); ?>;
        var data = <?php echo json_encode(array_values($genderData)); ?>;

        var ctx = document.getElementById('genderChart').getContext('2d');
        var genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56'
                    ]
                }]
            }
        });

        var activityLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var activityData = <?php echo json_encode(array_values($activityData)); ?>;
        activityData.push(<?php echo array_sum($activityData); ?>);

        var activityCtx = document.getElementById('activityChart').getContext('2d');
        var activityChart = new Chart(activityCtx, {
            type: 'bar',
            data: {
                labels: activityLabels,
                datasets: [{
                    label: 'Number of Activities',
                    data: activityData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                        ticks: {
                            callback: function (value, index, values) {
                                if (index === values.length - 1) {
                                    return 'Total: ' + value;
                                } else {
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });

        // Update the "Updated at" timestamps
        updateTimestamp("activityChartUpdated");
        updateTimestamp("genderChartUpdated");


        // console.log(activityData)





    </script>


</main>

<?php include_once('dash-footer.php') ?>