<table>
    <?php if(sizeof($result) > 0) { ?>
    <tr>
        <th>Table</th>
        <th>Column</th>
        <th>DataType</th>
        <th>Maxlength</th>
        <th>Default</th>
    </tr>
    <?php  } ?>
    <?php foreach ($result as $row)  { ?>
        <tr>
        <td><?=$row[0]?></td>
        <td><?=$row[1]?></td>
        <td><?=$row[2]?></td>
        <td><?=$row[3]?></td>
        <td><?=$row[4]?></td>
        </tr>
    <?php } ?>



</table>