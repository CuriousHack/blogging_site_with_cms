       <table class="table table-bordered table-hover">
           <thead>
                  <tr>
                       <th>id</th>
                       <th>username</th>
                       <th>firstname</th>
                       <th>lastname</th>
                       <th>email</th>
                       <th>role</th>
                      
                      
                   </tr>
                  
               
           </thead>
                 <tbody>
<?php
$query = "SELECT * FROM users";
$select_users = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users)) {
$user_id= $row['user_id'];
$username= $row['username'];
$user_password= $row['user_password'];
$user_firstname= $row['user_firstname'];
$user_lastname= $row['user_lastname'];
$user_email= $row['user_email'];
$user_image= $row['user_image'];
$user_role= $row['user_role'];


echo "<tr>";
echo "<td>{$user_id}</td>";
echo "<td> {$username}</td>";
echo "<td>{$user_firstname}</td>";

// $query = " SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
// $select_categories_id = mysqli_query($connection,$query);

// while ($row = mysqli_fetch_assoc( $select_categories_id)) {
// $cat_id = $row["cat_id"];
// $cat_title = $row["cat_title"];

// echo "<td> {$cat_title }</td>";

// }

echo "<td>{$user_lastname}</td>";
echo "<td>{$user_email }</td>";
echo "<td>{$user_role}</td>";







// $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
// $select_post_id_query = mysqli_query($connection, $query);
// while ($row = mysqli_fetch_assoc($select_post_id_query)) {
//     $post_id = $row['post_id'];
//     $post_title = $row['post_title'];

//     echo "<td> <a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
// }


//we pass parameters to the urs using ? and parameter name eg ?delete then we capture that parameter wit the get request ater which we can use it in our query
echo "<td><a href = 'users.php?change_to_admin={$user_id}'>admin</a></td>";
echo "<td><a href = 'users.php?change_to_sub={$user_id}'>subscriber</a></td>";
echo "<td><a href = 'users.php?delete={$user_id}'>delete</a></td>";

echo "<td><a href = 'users.php?source=edit_users&edit_users={$user_id}'>edit</a></td>";//we are passing in two parameters
echo "</tr>";
}//source=edit_post&post_id the amber sign helps using multiple parameters to specify exactly where you want that link to take you

?>

                     
                 </tbody>
       </table>

       <?php

if (isset($_GET['change_to_admin'])) {
 $the_user_id=$_GET['change_to_admin'];//after geting the link we pass it to the variable

 $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";

 $change_to_admin_query = mysqli_query($connection, $query);
  header("location:users.php");

}




if (isset($_GET['change_to_sub'])) {
 $the_user_id=$_GET['change_to_sub'];

 $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";

 $change_to_subscriber_query = mysqli_query($connection, $query);
  header("location:users.php");
}






if (isset($_GET['delete'])) {
 $the_user_id=$_GET['delete'];

 $query = "DELETE FROM users WHERE user_id =  {$the_user_id}";

 $comment_delete_query = mysqli_query($connection, $query);
  header("location:users.php");

}
// we need to refresh the table automatically

   ?>