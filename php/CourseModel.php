<!DOCTYPE html>
<html>
    <head>
        <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: left;}
        </style>
    </head>
    <body>
        <?php
            include_once "./DatabaseConnector.php";

            $database;
            $con;
            try {
                $database = new DatabaseConnector();
                $con = $database->openConnection();
            } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }

            $sql = "SELECT * FROM course";
            $entries = $con->query($sql);

            echo "
            <tr>
            <th>Course code</th>
            <th>Course description</th>
            <th>Year</th>
            </tr>";
            while($row = $entries->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['course_code'] . "</td>";
                echo "<td>" . $row['course_description'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "</tr>";
            }

            $database->closeConnection();
        ?>
    </body>
</html>