<?php
if (isset($_POST['search'])) {
    include "../../lib/koneksi.php";
    include "../../lib/config_web.php";

    $no = 1;
    $search = $_POST["search"];

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE 
    nama_produk LIKE '%" . $search . "%' OR
    harga LIKE '%" . $search . "%'
    ");

    while ($data = mysqli_fetch_array($query)) {

?>
        <tr>
            <th scope="row"><?php echo $no++; ?></th>
            <td><?php echo $data['nama_produk']; ?></td>
            <td><img src="../../file/produk/<?php echo $data['gambar']; ?>" width='130px' height='100px' /></td>
            <td>Rp. <?php echo $data['harga']; ?></td>
            <td><?php echo $data['deskripsi']; ?></td>
            <td><?php echo $data['slide']; ?></td>
            <td><?php echo $data['rekomendasi']; ?></td>
            <td><a href="<?php echo $admin_url; ?>produk/form_edit.php?id_produk=<?php echo $data['id_produk']; ?>">
                    <button class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </button>
                </a>
                <a href="<?php echo $admin_url; ?>produk/hapus.php?id_produk=<?php echo $data['id_produk']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
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