<br>
<br>
<table class="display" id="abs">
    <thead>
        <tr style="background-color: #89FF41;">
            <th>NRP</th>
            <th>Nama Mahasiswa</th>
            <th>Total Jam</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /**@var $item Jadwal */

        foreach ($asistens as $item) {

            echo '<tr>';
            echo '<td>' . $item->getMahasiswa()->getNrp() . '</td>';
            echo '<td>' . $item->getMahasiswa()->getNamaMahasiswa()  . '</td>';
            echo '<td>' . $item->getTotalJam() . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>

    <script>
        $(document).ready(function() {
            $("#abs").DataTable();
        });
    </script>
</table>