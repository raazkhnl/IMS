<?php
// session_start();
require_once 'core/init.php';
require_once 'includes/header.php';
?>

<?php
if (!isset($_SESSION['logged_in'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    echo "<script>window.open('','_self')</script>";
}
?>
<h3 class="h3 text-center text-primary" style = " font-size:40px; margin-top:40px;">Your Approved Upcoming Interviews</h3>
<?php
$email = $_SESSION['email'];
$currentDate = date('Y-m-d');
$sql = "SELECT applications.applied_at, applications.int_id, applications.status, employer_account.employer_name, employer_account.location, internships.category, internships.interview_date FROM applications INNER JOIN customers on applications.cus_id = customers.id Inner join internships on applications.int_id = internships.id INNER JOIN employer_account  ON internships.employer_id=employer_account.employer_id  and customers.email = '$email' AND internships.interview_date >= '$currentDate' ";
$result = $db->query($sql);
if ($result != FALSE) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
} else {
    exit;
}


// echo "<pre>";
// print_r($row);

echo '<div class = "container-fluid row">';
foreach ($row as $row) {
    if($row['status'] == 'approved'){
?>
    <div class='card col-xl-5 m-4'>
        <div class='card-header' style="height: 100px;">
            <h5 class='text-primary text-center'>Your upcoming Interview <p>On</p>
                </p>
        </div>
        <div class='card-body table-responsive'>
            <table class='table table-striped table-condensed' style='display: table'>

                <tr>
                    <th><b>Name: </b></th>
                    <td><?php echo $row['employer_name'] ?></td>
                </tr>
                <tr>
                    <th><b>Post: </b></th>
                    <td><?php echo $row['category'] ?></td>
                </tr>

                <tr>
                    <th><b>Address: </b></th>
                    <td><?php echo $row['location'] ?></td>
                </tr>
                <tr>
                    <th><b>Applied At: </b></th>
                    <td><?php echo $row['applied_at'] ?></td>
                </tr>
                <tr>
                    <th><b>Interview Date: </b></th>
                    <td><?php echo $row['interview_date'] ?></td>
                </tr>
                <tr>
                    <td>
                        <a href="internship.php?internship=<?php echo $row['int_id']?>"class = "text-primary text-center " style="font-size: medium;">View Details</a>
                    </td>
                </tr>
            </table>

        </div>
    </div>
<?php } }?>
</div>