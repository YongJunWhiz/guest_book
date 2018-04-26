<table border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
        <td><strong> Guest Book </strong></td>
    </tr>
</table>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <form id="form1" name="form1" method="post" action="index.php">
            <td>
                <table width="550" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td width="110">Guest Book ID</td>
                        <td width="15">:</td>
                        <td width="350"><input name="gid" type="text" pattern="[0-9]{0,}" id="id" size="40" required/></td>
                    </tr>
                    <tr>
                        <td width="110">Name</td>
                        <td width="15">:</td>
                        <td width="350"><input name="name" type="text" pattern="[a-z A-Z]{0,}" id="name" size="40" required/></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input name="email" type="email" id="email" size="40" required/></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><input name="phone" type="text" pattern="[0-9]{0,}" id="phone" size="40" required/></td>
                    </tr>                    <tr>
                        <td valign="top">Comment</td>
                        <td valign="top">:</td>
                        <td><textarea name="comment" cols="48" rows="4" id="comment"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="btnsubmit" value="submit" /></td>
                    </tr>
                </table>
            </td>
        </form>
    </tr>
</table>
<table border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>

        <td><strong><a href="listguestbook.php">Guest Book Listing</a> </strong></td>
    </tr>
</table>

<?php

/* Create connection */
$conn = mysqli_connect('localhost','root','root','Guest_Book');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_POST['btnsubmit']) {
    $guestid = $_POST['gid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];

        $sql = "INSERT INTO guest_book(Guest_ID,guest_name,Email,Phone,Comment)

        VALUES ('$guestid','$name','$email','$phone','$comment')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error( $conn );
        }
}
mysqli_close($conn);

?>