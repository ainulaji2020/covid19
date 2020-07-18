<?php
    include "koneksi.php";

    $sql = "SELECT * FROM wilayah";
    $query = mysqli_query($koneksi, $sql);
    
    $no = 1;
?>

Menu : <a href="wilayah.php">Form Data Relawan</a>

<?php if($query){ ?>
    <h3>Daftar Wilayah</h3>
    <table>
        <?php while($data = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?php echo $no;?>.</td>
                <td><a href="show_data_relawan.php?id_wilayah=<?php echo $data['id_wilayah']?>"><?php echo $data['nama_wilayah'];?></td>
            </tr>
        <?php $no++; } ?>
    </table>
<?php } ?>