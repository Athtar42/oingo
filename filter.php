<?php
session_start();
require_once("functions.php");
$server="localhost";
$db_username="root";
$db_password="";
$db_name="proj1"; 
$con=mysqli_connect($server, $db_username, $db_password, $db_name);
if(!$con)
{
	die("can't connect".mysqli_error());
}
$userid=$_SESSION['userid'];
$sql="select * from filter where userID='$userid'";
$result=mysqli_query($con, $sql);
$row=mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Oingo | Filters</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<style>
			.col-center-block {
				float: none;
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
			
			.jumbotron {
				background-image: url("img/primary-search-bg.jpg");
				background-size: cover;
			}
		</style>
	</head>

	<body>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

			<a class="navbar-brand" href="index.html">OINGO</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  				</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.html">OINGO</a>
					</li>
					<li class="nav-item">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Friends
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="friends.php">Friends List</a>
							<a class="dropdown-item" href="#">Requests Sent</a>
							<a class="dropdown-item" href="#">Requests Received</a>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="filter.php">Filter<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="test.php">Test</a>
						
					</li>
					<li class="nav-item">
						<a class="nav-link" href="setting.php">Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Sign Out</a>
					</li>
				</ul>
			</div>

		</nav>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<span class="text-light"><h1 class="display-4">OINGO</h1></span>
			</div>
		</div>
		<div class="container">
			<div class="row myCenter">
				<div class="col-12 col-md-6 col-center-block">
					<h2>Filters</h2>
					<div class="card mb-3">
						<div class="card-header">
							New Filter
						</div>
						<div class="card-body">
								<form name="newfilter" action="updatefilter.php" method="post">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="startdate">Start Date</label>
										</div>
										<input type="date" class="form-control" id="startdate" name="startdate" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="enddate">End Date</label>
										</div>
										<input type="date" class="form-control" id="enddate" name="enddate" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="starttime">Start Time</label>
										</div>
										<input type="time" class="form-control" id="starttime" name="starttime" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="starttime">End Time</label>
										</div>
										<input type="time" class="form-control" id="endtime" name="endtime" aria-describedby="basic-addon">
									</div>				
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="repetition">Repitition</label>
										</div>
										<select class="custom-select" id="repetition" name="repetition">
											<option selected value="no">No Repitition</option>
											<option value="daily">Daily</option>
											<option value="weekly">Weekly</option>
											<option value="monthly">Monthly</option>
										</select>
									</div>													
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon">Tag</span>
										</div>
										<input type="text" class="form-control" id="tag" name="tag" aria-describedby="basic-addon">
									</div>
									
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon">Location</span>
										</div>
										<input type="text" class="form-control" id="location" name="location" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="restrict">Resrtrict</label>
										</div>
										<select class="custom-select" id="restrict" name="restrict">
											<option selected value="all">Everyone</option>
											<option value="friends">Only Friends</option>
											<option value="self">Only Myself</option>
										</select>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon">State</span>
										</div>
										<input type="text" class="form-control" id="State" name="State" aria-describedby="basic-addon">
									</div>
									<fieldset class="form-group">
										<div class="row">
											<legend class="col-form-label col-sm-5 pt-0">If apply after adding?</legend>
											<div class="col-sm-7">
												<div class="form-check">
													<input type="radio" name="apply" value="1" class="form-check-input"><label for="apply" class="form-check-label">Yes</label>
												</div>
												<div class="form-check">
													<input type="radio" name="apply" value="0" class="form-check-input"><label for="apply" class="form-check-label">Not yet</label>
												</div>
											</div>
										</div>
									</fieldset>
									
									<button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Add</button>
								</form>
							
						</div>	
					</div>
					
					<?php
					for($i=1;$i<=$row;$i++)
					{
						$filter=mysqli_fetch_array($result);
						$sql1="select * from schedule where sID=".$filter['fsID'];
						$result1=mysqli_query($con, $sql1);
						$schedule=mysqli_fetch_array($result1);
					?>
					<div class="card mb-3">
						<div class="card-header">
							<?php echo "Filter".$i; ?>
						</div>						
						<div class="card-body">
								<form name="changefilter" action="alterfilter.php" method="post">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="filterID">Filter ID</label>
										</div>
										<input type="text" class="form-control" id="filterID" name="filterID" value="<?php echo $filter['filterID']; ?>" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="startdate">Start Date</label>
										</div>
										<input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo $schedule['startDate']; ?>" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="enddate">End Date</label>
										</div>
										<input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo $schedule['endDate']; ?>" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="starttime">Start Time</label>
										</div>
										<input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $schedule['startTime']; ?>" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="starttime">End Time</label>
										</div>
										<input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo $schedule['endTime']; ?>" aria-describedby="basic-addon">
									</div>				
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="repetition">Repetition</label>
										</div>
										<?php
										switch ($schedule['repetition'])
										{
											case "no":
												echo '<select class="custom-select" id="repetiton">';
													echo '<option selected value="no">No Repetition</option>';
													echo '<option value="daily">Daily</option>';
													echo '<option value="weekly">Weekly</option>';
													echo '<option value="monthly">Monthly</option>';
												echo '</select>';
												break;
											case "daily":
												echo '<select class="custom-select" id="repetiton">';
													echo '<option value="no">No Repetition</option>';
													echo '<option selected value="daily">Daily</option>';
													echo '<option value="weekly">Weekly</option>';
													echo '<option value="monthly">Monthly</option>';
												echo '</select>';
												break;
											case "weekly":
												echo '<select class="custom-select" id="repetiton">';
													echo '<option value="no">No Repetition</option>';
													echo '<option value="daily">Daily</option>';
													echo '<option selected value="weekly">Weekly</option>';
													echo '<option value="monthly">Monthly</option>';
												echo '</select>';
												break;
											case "monthly":
												echo '<select class="custom-select" id="repetiton">';
													echo '<option value="no">No Repetition</option>';
													echo '<option value="daily">Daily</option>';
													echo '<option value="weekly">Weekly</option>';
													echo '<option selected value="monthly">Monthly</option>';
												echo '</select>';
												break;
											
										}
										?>
									</div>													
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon">Tag</span>
										</div>
										<input type="text" class="form-control" id="tag" value="<?php echo '#'.$filter['fTag']; ?>" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="restrict">Resrtrict</label>
										</div>
										<?php
										switch ($filter['fRestrict'])
										{
											case "all":
												echo '<select class="custom-select" id="restrict">';
													echo '<option selected value="all">Everyone</option>';
													echo '<option value="friends">Only Friends</option>';
													echo '<option value="self">Only Myself</option>';
												echo '</select>';
												break;
											case "friends":
												echo '<select class="custom-select" id="restrict">';
													echo '<option value="all">Everyone</option>';
													echo '<option selected value="friends">Only Friends</option>';
													echo '<option value="self">Only Myself</option>';
												echo '</select>';
												break;
											case "self":
												echo '<select class="custom-select" id="restrict">';
													echo '<option value="all">Everyone</option>';
													echo '<option value="friends">Only Friends</option>';
													echo '<option selected value="self">Only Myself</option>';
												echo '</select>';
												break;
										}
										?>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon">State</span>
										</div>
										<input type="text" class="form-control" id="State" name="State" aria-describedby="basic-addon" value="<?php echo $filter['fState']?>">
									</div>
									<fieldset class="form-group">
										<div class="row">
											<legend class="col-form-label col-sm-5 pt-0">If apply?</legend>
											<div class="col-sm-7">
												<?php
												if($filter['apply']==1)
												{
													echo '<div class="form-check">';
														echo '<input type="radio" name="apply" value="1" class="form-check-input" Checked><label for="apply" class="form-check-label">Yes</label>';
													echo '</div>';
													echo '<div class="form-check">';
														echo '<input type="radio" name="apply" value="0" class="form-check-input"><label for="apply" class="form-check-label">Not yet</label>';
													echo '</div>';
												}
												else
												{
													echo '<div class="form-check">';
														echo '<input type="radio" name="apply" value="1" class="form-check-input"><label for="apply" class="form-check-label">Yes</label>';
													echo '</div>';
													echo '<div class="form-check">';
														echo '<input type="radio" name="apply" value="0" class="form-check-input" Checked><label for="apply" class="form-check-label">Not yet</label>';
													echo '</div>';
												}
												?>
											</div>
										</div>
									</fieldset>
									<button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Change</button>
								</form>
							
						</div>			
		
					</div>
					<?php
					}
					?>
			</div>
		</div>
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>