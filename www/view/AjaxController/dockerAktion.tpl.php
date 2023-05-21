<!DOCTYPE html>
<html>
<head>
    <title>Docker Containers</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
<h1>Docker Containers</h1>
<table>
    <tr>
        <th>CONTAINER ID</th>
        <th>IMAGE</th>
        <th>COMMAND</th>
        <th>CREATED</th>
        <th>STATUS</th>
        <th>PORTS</th>
        <th>NAMES</th>
    </tr>
    <?php
    shell_exec('docker ps -a', $output);
    array_shift($output);
    foreach ($output as $row) {
        $columns = preg_split('/\s+/', $row);
        echo '<tr>';
        foreach ($columns as $column) {
            echo '<td>' . $column . '</td>';
        }
        echo '</tr>';
    }
    ?>
</table>
</body>
</html>
