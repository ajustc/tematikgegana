<?php
if (isset($_POST['search'])) {
    include "../../lib/koneksi.php";
    include "../../lib/config_web.php";

    $no = 1;
    $search = $_POST["search"];

    $query = mysqli_query($koneksi, "SELECT * FROM pesanan JOIN pelanggan 
	ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE
    nama LIKE '%" . $search . "%' OR
    tgl_pesanan LIKE '%" . $search . "%' OR
    tgl_pengiriman LIKE '%" . $search . "%' OR
    status_produk LIKE '%" . $search . "%' OR
    status_pesanan LIKE '%" . $search . "%'
    ");

    while ($data = mysqli_fetch_array($query)) {

?>
        <tr>
            <th scope="row"><?php echo $no++; ?></th>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['tgl_pesanan']; ?></td>
            <td><?php echo $data['tgl_pengiriman']; ?></td>
            <td><?php echo $data['jam_pesanan']; ?></td>
            <td><?php echo $data['status_produk']; ?></td>
            <td><?php echo $data['status_pesanan']; ?></td>
            <td>Rp. <?php echo number_format($data['total_pesanan']); ?></td>
            <!-- tombol detail -->
            <td>
                <a class="btn btn-warning btn-xs" href="<?php echo $admin_url; ?>pesanan/detail_pesanan.php?id=<?php echo $data['id_pesanan']; ?>">
                    Detail
                </a>
                <a class="btn btn-danger btn-xs" href="<?php echo $admin_url; ?>pesanan/hapus.php?id=<?php echo $data['id_pesanan']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                    <i class="fa fa-remove"></i>
                </a>
                <!-- tombol lihat pembayaran -->
                <?php if ($data['status_pesanan'] !== "Pending") : ?>
                    <a class="btn btn-success btn-xs" href="<?php echo $admin_url; ?>pesanan/lihat_pembayaran.php?id=<?php echo $pecah['id_pesanan']; ?>">Lihat Pembayaran</a>
                <?php endif ?>
            </td>
        </tr>
<?php
    }
}
?>