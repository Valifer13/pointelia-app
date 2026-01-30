<div>
    <h1>List Siswa</h1>
    <table border="1">
        <thead class="**:border **:p-2">
            <th>No.</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Kelas</th>
        </thead>

        <tbody class="**:border **:p-2">
            <?php
            $count = 1;
            foreach ($data["students"] as $student): ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= str_pad($student["nis"], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $student["name"] ?></td>
                <td><?= $student["gender"] ?></td>
                <td><?= $student["class"] ?? "-" ?></td>
            </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</div>
