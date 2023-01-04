<table class="table table-hover mb-0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Control</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $file_name = "contact_list.json";
        if (is_file($file_name)) :
            $files = json_decode(file_get_contents($file_name),true);
            foreach ($files as $key => $file) :

        ?>
        <tr>
            <td><?= $file['id'] ?></td>
            <td><?= $file['name'] ?></td>
            <td><?= $file['phone_number'] ?></td>
            <td>
                <button class="btn btn-warning btn-sm">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;
        endif; ?>
    </tbody>
</table>