<form action="recommend.php" method="POST">
        <br><label for="filter">Filter: *</label><br>
        <input type="text" id="filter" name="filter" placeholder="Name of the Employee">
        <input type="submit" id="filterbutton" name="filterbutton" value="Filter"></input><br><br>
</form>

<?php

echo '<table id="table" border="0" cellspacing="2" cellpadding="2"> 
        <tr > 
        <th> <font face="Arial">ID</font> </th> 
        <th> <font face="Arial">First Name</font> </th> 
        <th> <font face="Arial">Middle Name</font> </th> 
        <th> <font face="Arial">Last Name</font> </th> 
        </tr>';

$row = 1;
if (($handle = fopen("data.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                        ${'field' . $c} = $data[$c];
                }

                echo "<tr> 
                  <td>$field0</td> 
                  <td>$field1</td> 
                  <td>$field2</td>
                  <td>$field3</td>
              </tr>";
        }
        fclose($handle);
}
?>