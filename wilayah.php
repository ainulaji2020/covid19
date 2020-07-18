<?php
    include "koneksi.php";
    
    if(isset($_POST['simpan'])){
        $nama_wilayah = $_POST['nama_wilayah'];
        $waktu = date("Y-m-d H:i:s");

        $sql = "INSERT INTO wilayah (nama_wilayah, waktu) VALUES ('".$nama_wilayah."','".$waktu."')";
        $query = mysqli_query($koneksi, $sql);

        header("location:form_relawan.php");
    }
?>

<h3>Form Input Wilayah</h3>
<form action="wilayah.php" method="POST">
    <table>
        <tr>
            <td>Wilayah</td>
            <td>:</td>
            <td><input type="text" name="nama_wilayah" /></td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="submit" name="simpan" style="float: right;">Simpan</button>
            </td>
        </tr>
    </table>
</form>