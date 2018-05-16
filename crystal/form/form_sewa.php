<!DOCTYPE html>
<html>
    <head>
        <title>Form data ahli waris </title>

    </head>
    <body>
        <form method="post" action="simpan_sewa.php">
            <table>
               
                <tr><td>Nama Ahli Waris</td><td><input type="text" name="nama_ahli_waris"></td></tr>

                <tr><td>Alamat</td><td><input type="text" name="alamat"></td></tr>

                <tr><td>No Telpon </td><td><input type="text" name="no_telp"></td></tr>

                <tr><td>JENIS KELAMIN</td><td>
                        <input type="radio" name="jenis_kelamin" value="L">Laki Laki
                        <input type="radio" name="jenis_kelamin" value="P">Perempuan
                    </td></tr>

               <!--  <tr><td>JURUSAN</td><td>
                        <select name="jurusan">
                            <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                            <option value="TEKNIK MESIN">TEKNIK MESIN</option>
                            <option value="TEKNIK KIMIA">TEKNIK KIMIA</option>
                        </select>
                    </td></tr> -->
                

                <tr><td colspan="2"><button type="submit" value="simpan">SIMPAN</button></td></tr>
            </table>
        </form>
    </body>
</html>