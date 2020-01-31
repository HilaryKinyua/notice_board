<?php
$connect = mysqli_connect("localhost", "root", "", "notice_board");
$output = '';

$sql="SELECT * FROM signup";
$result=mysqli_query($connect,$sql);
$output .='
<div class="table-responsive"
<table class="table table-bordered">
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Delete</th>
</tr>';
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
        $output .='<td>'.$row["id"].'</td>
<td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["firstname"].'</td>
<td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["lastname"].'</td>
<td class="email" data-id3="'.$row["id"].'" contenteditable>'.$row["email"].'</td>
<td><button name="btn_delete" id="btn_delete" data-id4="'.$row["id"].'">X</button></td>

        ';

    }
    $output .='<tr>
<td></td>
<td id="first_name" contenteditable></td>
<td id="last_name" contenteditable></td>
<td id="email" contenteditable></td>
<td><button name="btn_add" id="btn_add" class="btn btn-success">+</button></td>
</tr>';

}else{
    $output .='<tr>
<td colspan="4" class="alert-danger">Data not found in the database</td>
</tr>';
}
$output .='
</table>
</div>
'

?>