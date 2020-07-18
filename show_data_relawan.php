<?php
    include "koneksi.php";

    $where = "";

    if(isset($_GET['id_wilayah'])){
        $where = "WHERE id_wilayah='".$_GET['id_wilayah']."'";
    }

    $sql = "SELECT * FROM wilayah ".$where." ORDER BY id_wilayah DESC";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);

    $sqlRelawan = "SELECT * FROM relawan WHERE id_wilayah='".$data['id_wilayah']."'";
    $queryRelawan = mysqli_query($koneksi, $sqlRelawan);
    
    $no = 1;
?>


<center>
    <p>Data Relawan Covid19 wilayah <?php echo $data['nama_wilayah']?></p>
    <p>Per <?php echo date("d F Y H:i:s", strtotime($data['waktu']));?></p>
    <br />
    <table border="1" cellpadding="5">
        <tr>
            <td>No</td>
            <td>Nama Lengkap</td>
            <td>Alamat</td>
            <td>Propinsi</td>
            <td>Email</td>
            <td>No Handphone</td>
            <td>Keahlian</td>
        </tr>
        <?php while($dataRelawan = mysqli_fetch_array($queryRelawan)){ ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $dataRelawan['nama_relawan']?></td>
                <td><?php echo $dataRelawan['alamat']?></td>
                <td><?php echo $dataRelawan['propinsi']?></td>
                <td><?php echo $dataRelawan['email']?></td>
                <td><?php echo $dataRelawan['no_hp']?></td>
                <td><?php echo $dataRelawan['keahlian']?></td>
            </tr>
        <?php $no++; } ?>
    </table>
    <?php if(isset($_GET['id_wilayah'])){ ?>
        <br />
        <a href="form_relawan.php?id_wilayah=<?php echo $_GET['id_wilayah']?>">Add Relawan</a>
    <?php } ?>
</center>