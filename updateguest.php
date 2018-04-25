<?php
$guestid2 = $_GET['gid'];
$conn = mysqli_connect('localhost','root','root','Guest_Book');
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM guest_book WHERE Guest_ID='$guestid2'";
$result = $conn->query($sql);
$row = $result->fetch_assoc()
?>

<table border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td><strong> Update Guest </strong></td>
    </tr>
</table>

<table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <form id="form1" name="form1" method="post" action="updateguest.php?gid=<?php echo $guestid2;?>">
    <tr>
            <td>
                <table width="550" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
                    <tr>
                        <td width="150">Guest Book ID</td>
                        <td width="15">:</td>
                        <td width="350"><input name="gid1" type="text" id="gid" size="40" value="<?php echo $row['Guest_ID']?>" readonly/></td>
                    </tr>
                    <tr>
                        <td width="110">Name</td>
                        <td width="15">:</td>
                        <td width="350"><input name="name" type="text" id="name" size="40" value="<?php echo $row['guest_name']?>" required/></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input name="email" type="text" id="email" size="40" value="<?php echo $row['Email']?>" required/></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><input name="phone" type="text" id="phone" size="40" value="<?php echo $row['Phone']?>" required/></td>
                    </tr>
                    <tr>
                        <td valign="top">Comment</td>
                        <td valign="top">:</td>
                        <td><input name="comment" cols="48" rows="4" value="<?php echo $row['Comment']?>" id="comment"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="btnupdate" value="Update" /></td>
                        <td><input type="button" value="Back" id="btnHome"
                                   onClick="document.location.href='listguestbook.php'" /></td>
                    </tr>
                </table>
            </td>
        </form>
    </tr>
</table>

<?php
$conn = mysqli_connect('localhost','root','root','Guest_Book');
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_POST['btnupdate']) {
    $guestid = $_POST['gid1'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];
    $guestid2 = $_GET['gid'];

    $sql = "UPDATE guest_book SET Guest_ID='$guestid',guest_name='$name',Phone='$phone',Comment='$comment',Email='$email' WHERE Guest_ID='$guestid2'";

    if (mysqli_query($conn, $sql)) {

        echo "Record updated successfully";
    }
    else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>
