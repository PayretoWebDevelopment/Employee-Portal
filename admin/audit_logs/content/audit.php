<div class="container d-flex flex-column justify-content-center">
<h1 class="card-heading my-5 text-uppercase text-center">HISTORY</h1>
    <div class="container">
        <?php

        $sql = "SELECT * FROM audit_logs";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $array = (array) $row;
        ?>

        <table class="display" id="audit_logs">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>DATE AND TIME</th>
                    <th>USERNAME</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //table for audit logs
                $i = 0;
                foreach ($row as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $key += 1, "</td>";
                    echo "<td>" . $value["dtime"] . "</td>";
                    echo "<td>" . $value["uname"] . "</td>";
                    echo "<td>" . $value["form"] . "</td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#audit_logs').DataTable();
            });
        </script>
    </div>
</div>

<!-- /#page-content-wrapper -->

</html>