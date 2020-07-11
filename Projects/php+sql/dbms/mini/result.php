<?php
include"./connect.php";
$query="SELECT * FROM saleman";
$queryExec = mysqli_query($connection,$query);
while($result = mysqli_fetch_array($queryExec)){
    ?>
    <tr>
    <th scope="row">
    <?php echo $result[salesman_id] ?> </th>

    <td>
    <?php echo $result["name"] ?></td>

    <td>
    <?php echo $result["city"] ?></td>
    <td>
    <?php echo $commission["commission"] ?></td>
    </tr>

<?php } ?>