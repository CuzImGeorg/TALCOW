<table>
    <tr>
        <th>Table</th>
        <th>Column</th>
        <th>DataType</th>
        <th>Maxlength</th>
        <th>Nullable</th>
        <th>Default</th>
    </tr>
    <?php foreach ($result as $row)  { ?>

        <td><?=$row[0]?></td>
        <td><?=$row[1]?></td>
        <td><?=$row[2]?></td>
        <td><?=$row[3]?></td>
        <td><?=$row[4]?></td>
        <td><?=$row[5]?></td>
    <?php } ?>



</table>