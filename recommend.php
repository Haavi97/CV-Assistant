        <form action="feedback.php" method="POST">
            <br><label for="filter">Filter: *</label><br>
            <input type="text" id="filter" name="filter" placeholder="Name of the Employee">
            <input type="submit" id="filterbutton" name="filterbutton" value="Filter"></input><br><br>
            <textarea rows="4" cols="50" id="endorsement" name="endorsement" placeholder="Endorse the employee"></textarea><br>
            <input type="number" id="employeeid" name="employeeid" min="1" max="5000" placeholder="EmpID">
            <input type="submit" id="commentbutton" name="commentbutton" value="Comment">
            <input type="submit" id="showbutton" name="showbutton" value="Show Endorsements"><br><br>
        </form>


        <?php

        if (isset($_POST["showbutton"])) {
            $employeeid = $_POST['employeeid'];
            if (($handle = fopen("endorsements.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    for ($c = 1; $c < $num; $c++) {
                        if ($data[0] == $employeeid) {
                            print("$c. " . $data[$c] . '<br>');
                        }
                    }
                }
                fclose($handle);
            }
        }

        if (isset($_POST["commentbutton"])) {
            $endorsement = $_POST['endorsement'] . " (written by user:" . $_SESSION["username"] . ")";
            $employeeid = $_POST['employeeid'];

            $newCsvData = array();
            if (($handle = fopen("endorsements.csv", "a+")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if ($data[0] == $employeeid) {
                        array_push($data, $endorsement);
                        $newCsvData[] = $data;
                    } else {
                        $newCsvData[] = $data;
                    }
                }
                fclose($handle);
                $handle2 = fopen("endorsements.csv", "w");
                foreach ($newCsvData as $row) {
                    fputcsv($handle2, $row);
                }
                
            }
        }

        

        if (isset($_POST["filterbutton"])) {
            $filterstr = $_REQUEST['filter'];
            if ($filterstr == ""){
                getTable();
            }
            else{ 
            echo '<table id="table" border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
        <th> <font face="Arial">ID</font> </th> 
        <th> <font face="Arial">First Name</font> </th> 
        <th> <font face="Arial">Middle Name</font> </th> 
        <th> <font face="Arial">Last Name</font> </th> 
        </tr>
        <br><br>';

            if (($handle = fopen("data.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    if (
                        stristr ($data[1], $filterstr) ||
                        stristr ($data[2], $filterstr) ||
                        stristr ($data[3], $filterstr)
                    ) {
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
                }
                fclose($handle);
            }
        
        }}
        else {
            getTable();
        }

        function getTable() {
            echo '<table id="table" border="0" cellspacing="2" cellpadding="2"> 
            <tr> 
            <th> <font face="Arial">ID</font> </th> 
            <th> <font face="Arial">First Name</font> </th> 
            <th> <font face="Arial">Middle Name</font> </th> 
            <th> <font face="Arial">Last Name</font> </th> 
            </tr>
            <br><br>';
    
    
                if (($handle = fopen("data.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
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
        }



        ?>