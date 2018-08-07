
<?php 
use app\models\DataAhliWaris;
use app\models\DataLokasiTpu;
 ?>
<page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">

            <!--====================================================Nama Surat=====================================================================-->
            <table style="margin-top: 1%; width: 100%; ">
                <tr style="text-align: center; ">
                    <td style="width: 100%; font-size: 14pt; border-right: none; border-left: none; border-top: none; border-bottom: none;">LAPORAN</td>
                </tr>
            </table>
            <table style="margin-top: 1%; width: 100%">
                <tr style="text-align: center; font-style: italic;">
                    <td style="width: 49%; font-size: 10pt; text-align: right; border-right: none; border-left: none; border-top: none; border-bottom: none;">Bulan</td>
                    <td style="width: 1%; border-right: none; border-left: none; border-top: none; border-bottom: none;">: </td>
                    <td style="width: 50%; text-align: left; font-size: 10pt; border-right: none; border-left: none; border-top: none; border-bottom: none;"><?=date('F')?></td>
                </tr>
            </table>

            <!--====================================================Nama Dinas=====================================================================-->
            <table style="margin-top: 3%; width: 100%">
                <tr style="text-align: left;">
                    <td style="width: 100%; font-size: 10pt; border-right: none; border-left: none; border-top: none; border-bottom: none;">PEMERINTAH KOTA SURABAYA</td>
                </tr>
                <tr style="text-align: left;">
                    <td style="width: 100%; font-size: 10pt; border-right: none; border-left: none; border-top: none; border-bottom: none;">DINAS KEBERSIHAN DAN RUANG TERBUKA HIJAU</td>
                </tr>
                <tr style="text-align: left;">
                    <td style="width: 100%; font-size: 10pt; border-right: none; border-left: none; border-top: none; border-bottom: none;">CABANG MAKAM UMUM <?=DataLokasiTpu::findOne(Yii::$app->user->identity->ID_TPU)->getAttribute('nama_lokasi')?></td>
                </tr>
            </table>

            <!--====================================================Isi Surat=====================================================================-->
            <table style="width: 100%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">
                <tr style="font-size: 8pt; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">
                    <td style="text-align: center; width: 4%;border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px; border-bottom: none;">NO</td>
                    <td style="text-align: center; width: 10%;border: 1px 1px none 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">TANGGAL</td>
                    <td rowspan="2" style="text-align: center; width: 5%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">BLOK</td>
                    <td style="text-align: center; width: 8%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px; border-bottom: none;">NOMOR</td>
                    <td style="text-align: center; width: 11%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px; border-bottom: none;">NAMA</td>
                    <td rowspan="2" style="text-align: center; width: 28%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">TEMPAT TINGGAL</td>
                    <td style="text-align: center; width: 11%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px; border-bottom: none;">NAMA</td>
                    <td rowspan="2" style="text-align: center; width: 3%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">L/P</td>
                    <td rowspan="2" style="text-align: center; width: 5%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">USIA</td>
                    <td style="text-align: center; width: 7%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px; border-bottom: none;">BEA.</td>
                    <td style="text-align: center; width: 8%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px; border-bottom: none;">MACAM</td>
                </tr>
                <tr style="font-size: 8pt; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">
                    <td style="text-align: center; width: 4%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">URUT</td>
                    <td style="text-align: center; width: 10%; border: none 1px 1px 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">PEMAKAMAN</td>
                    <td style="text-align: center; width: 8%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">MAKAM</td>
                    <td style="text-align: center; width: 11%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">AHLI WARIS</td>
                    <td style="text-align: center; width: 11%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">ALMARHUM</td>
                    <td style="text-align: center; width: 7%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">(Rp.)</td>
                    <td style="text-align: center; width: 8%; border: 1px solid black; border-collapse: collapse; min-width: 2em; min-height: 2em;  padding-top: 1px;">MAKAM</td>
                </tr>
                <?php 
                $i = 1;
                foreach ($data as $jenazah) {
                    $ahliWaris = DataAhliWaris::findOne(['ID_JENAZAH' => $jenazah->ID_JENAZAH]);
                    $tglLahir = date('Y', strtotime($jenazah->tanggal_lahir));
                    $usia = date('Y') - $tglLahir;
                    echo "<tr>
                        <td>$i</td>
                        <td>$jenazah->tgl_pemakaman</td>
                        <td>".($jenazah->iDMAKAM!=null?$jenazah->iDMAKAM->iDKOMPLEK->iDBLOK->nama:'-')."</td>
                        <td>".($jenazah->iDMAKAM!=null?$jenazah->iDMAKAM->NO_MAKAM:'-')."</td>
                        <td>".($ahliWaris != null? $ahliWaris->nama_ahli_waris : '-')."</td>
                        <td>$jenazah->alamat</td>
                        <td>$jenazah->nama_jenazah</td>
                        <td>".($jenazah->jenis_kelamin == 'laki-laki' ? 'L' : 'P')."</td>
                        <td>$usia thn</td>
                        <td>".number_format($jenazah->iDTPU->harga_sewa, 2, ',', '.')."</td>
                        <td>".($usia > 5? 'dewasa' : 'anak')."</td>
                    </tr>";
                    $i++;
                } ?>
            </table>

        </page>