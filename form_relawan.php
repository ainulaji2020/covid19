<?php
    include "koneksi.php";
    
    if(isset($_POST['simpan'])){
        $nama_relawan = $_POST['nama_relawan'];
        $alamat = $_POST['alamat'];
        $propinsi = $_POST['propinsi'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $keahlian = $_POST['keahlian'];
        $id_wilayah = $_POST['id_wilayah'];

        $sql = "INSERT INTO relawan (nama_relawan, alamat, propinsi, email, no_hp, keahlian, id_wilayah) VALUES ('".$nama_relawan."','".$alamat."','".$propinsi."','".$email."','".$no_hp."','".$keahlian."','".$id_wilayah."')";
        $query = mysqli_query($koneksi, $sql);

        header("location:show_data_relawan.php?id_wilayah=".$id_wilayah);
    }

    $sqlWilayah = "SELECT * FROM wilayah";
    $queryWilayah = mysqli_query($koneksi, $sqlWilayah);
?>


<h3>Form Input Relawans</h3>
<form action="form_relawan.php" method="POST">
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama_relawan" /></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                <textarea name="alamat"></textarea>
            </td>
        </tr>
        <tr>
            <td>Propinsi</td>
            <td>:</td>
            <td><input type="text" name="propinsi" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="email" /></td>
        </tr>
        <tr>
            <td>No Handphone</td>
            <td>:</td>
            <td><input type="text" name="no_hp" /></td>
        </tr>
        <tr>
            <td>Keahlian</td>
            <td>:</td>
            <td><input type="text" name="keahlian" /></td>
        </tr>
        <tr>
            <td>Wilayah</td>
            <td>:</td>
            <td>
                <select name="id_wilayah">
                    <?php while($dataWilayah = mysqli_fetch_array($queryWilayah)){ ?>
                        <option value="<?php echo $dataWilayah['id_wilayah']?>" 
                            <?php if(isset($_GET['id_wilayah']) && $dataWilayah['id_wilayah'] == $_GET['id_wilayah']){ ?>
                                selected
                            <?php } ?>
                        ><?php echo $dataWilayah['nama_wilayah'];?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <button name="simpan" style="float: right;">Simpan</button>
            </td>
        </tr>
    </table>
</form>