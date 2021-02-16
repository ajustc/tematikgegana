<?php
if (isset($_POST['search'])) {
    include "../../lib/koneksi.php";
    include "../../lib/config_web.php";
    $no = 1;
    $search = $_POST["search"];

    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE 
    username LIKE '%" . $search . "%' OR
    nama LIKE '%" . $search . "%' OR
    no_hp LIKE '%" . $search . "%'
    ");

    while ($data = mysqli_fetch_array($query)) {
?>
        <tr>
            <th scope="row"><?php echo $no; ?></th>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['password']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['no_hp']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><a href="<?php echo $admin_url; ?>pelanggan/form_edit.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>">
                    <button class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </button>
                </a>
                <a href="<?php echo $admin_url; ?>pelanggan/hapus.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                    <button class="btn btn-danger">
                        <i class="fa fa-remove"></i>
                    </button>
                </a>
            </td>
        </tr>
<?php
    }
}
?>