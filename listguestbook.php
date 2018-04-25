<form action='listguestbook.php.php' method='post'></form>

<table border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td><strong>Guest Book Listing</strong></td>
    </tr>
</table>

<?php
$conn = mysqli_connect('localhost','root','root','Guest_Book');
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM guest_book";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<br> <table border='1' align=\"center\" cellpadding=\"5\" cellspacing=\"0\"><tr><td>Guest Book ID</td><td>Name</td><td>Email</td><td>Phone</td><td>Comment</td><td></td></tr><br>";
    while($row = $result->fetch_assoc()) {
        echo "<br> <tr><td><a href='updateguest.php?gid=$row[Guest_ID]'>$row[Guest_ID]</a></td><td>$row[guest_name]</td><td>$row[Email]</td><td>$row[Phone]</td><td>$row[Comment]</td><td><a href='deleteguest.php?gid=$row[Guest_ID]'>Delete</a></tr>";
    }
} else {
    echo "0 results";
}
    mysqli_close($conn);
?>
