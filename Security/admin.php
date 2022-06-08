<?php
    include("scripts/sessions.php");
    if((isset($_SESSION['message'])) && ($_SESSION['message'] === "Authenticated" ))
    {
        echo $_SESSION['message'];
        echo"<p><a href=\"script/doLogout.php\">Logout</a></p>";
        echo"<p><a href=\"index.php\">Home</a></p>";
    }
    else
    {
        header("Location: index.php?error=notLoggedIn");
    }
?>
 <div>
        <form action="index.php" method="get">
            <input type="input" name="lastName" value="" placeholder="Last Name" />
            <input type="submit" value="Go" name="PersonNameSearch" />
            </form>
            <a href="admin.php?lastName=<?php echo $lastName; ?>&PersonDetailSearch=Go&orderBy=houseNumName">Order by House Number or Name</a> |
            <a href="admin.php?lastName=<?php echo $lastName; ?>&PersonDetailSearch=Go&orderBy=firstName">Order by First Name</a> |
            <a href="admin.php?lastName=<?php echo $lastName; ?>&PersonDetailSearch=Go&orderBy=lastName">Order by Last Name</a> |
            </table>
                <tr>
                    <th>First Name</th><th>Middle Name</th><th>Last Name</th><th>House Number or Name</th><th>Address Two</th>
                    <th>AddressThree</th><th>Town or City</th><th>County</th><th>Post Code</th>
                <tr>
            <?php
            if(isset($_GET["PersonNameSearch"]))
            {
                $lastName = $_GET['lastName'];
                //$prevPage = $_SERVER['HTTP_REFERER'];
            }
            else
            {
                $orderby = "";
            }


                $sql = "SELECT firstName, middleName, lastName, houseNumName, addressTwo, addressThree, townCity, county, postCode
                        FROM person, address 
                        WHERE lastName LIKE '%$lastName%'
                        AND address.addressID = person.addressID";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>".$row["firstName"]."</td><td>".$row["middleName"]."</td><td>".$row["lastName"]."</td><td>".$row
                            ["houseNumName"]."</td><td>".$row["addressTwo"]."</td><td>".$row["addressThree"]."</td><td>".$row
                            ["townCity"]."</td><td>".$row["county"]."</td><td>".$row["postCode"]."</td>
                        </tr>";
                };
            
            ?>
            </table>
        </div>
        <?php
        {
            header("Location: index.php?error=notLoggedIn");
        }
?> 