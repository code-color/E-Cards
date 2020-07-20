<?php

session_start();

require_once("db.php");

$limit = 4;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page-1) * $limit;




  if(isset($_GET['filter']) && $_GET['filter']=='searchBar') {

    $search = $_GET['search'];
    $sql = "SELECT * FROM users WHERE firstname LIKE '%$search%' LIMIT $start_from, $limit";
	$sql = "SELECT * FROM users WHERE email LIKE '%$search%' LIMIT $start_from, $limit";
	$sql = "SELECT * FROM users WHERE contactno LIKE '%$search%' LIMIT $start_from, $limit";
     

 
  }

  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $sql1 = "SELECT * FROM users WHERE id_user='$row[id_user]'";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0) {
                  while($row1 = $result1->fetch_assoc()) 
                  {
               ?>

         <div class="attachment-block clearfix">
                <img class="attachment-img" src="profilepic/<?php echo $row1['logo']; ?>" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-profile.php?id=<?php echo $row['id_user']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></a> </h4>
                  <div class="attachment-text">	
				  
                      <div><strong><?php echo $row1['email']; ?> | <?php echo $row['contactno']; ?> </strong></div>
                  </div>
                </div>
              </div>

      <?php
        }
      }
    }
  }

else {
	echo "No matches";
}




$conn->close();