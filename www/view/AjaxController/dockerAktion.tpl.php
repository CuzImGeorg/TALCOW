<?php
// Execute the 'docker ps -a' command and capture the output
exec('docker ps -a', $output);

// Remove the header row from the output
array_shift($output);

// Create an HTML table with the container information
$html = '<table>';
$html .= '<tr><th>CONTAINER ID</th><th>IMAGE</th><th>COMMAND</th><th>CREATED</th><th>STATUS</th><th>PORTS</th><th>NAMES</th></tr>';

foreach ($output as $row) {
    $columns = preg_split('/\s+/', $row);

    // Extract the relevant information from each row
    $containerId = $columns[0];
    $image = $columns[1];
    $command = $columns[2];
    $created = $columns[3];
    $status = $columns[4];
    $ports = $columns[5];
    $names = $columns[6];

    // Add a row to the HTML table
    $html .= "<tr><td>$containerId</td><td>$image</td><td>$command</td><td>$created</td><td>$status</td><td>$ports</td><td>$names</td></tr>";
}

$html .= '</table>';

// Output the HTML table
echo $html;
?>
