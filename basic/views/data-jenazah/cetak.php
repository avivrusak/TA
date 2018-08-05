<?php

?>
<page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">
            <!--<html>            <head>
                    <title>Berita Acara</title>
            
            --> 
            <style>
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    min-width: 2em;
                    min-height: 2em;
                    border-right: none;
                    border-left: none;
                    border-top: none;
                    border-bottom: none;
                    padding-top: 13px;
                }

            </style>

            <!--====================================================Kop Surat=====================================================================-->
        <page_header style="width: 100%">
            <table id="kopSurat" style="margin-left: 5mm; margin-top: 5mm; margin-right: 5mm;">
                <tr>
                    <td rowspan="2" style="width : 55%;  text-align: center"> 
                            <img style="width: 50%; height: 32px;" src="logo2.png" >
                    </td>     
                    <td style="width : 15%"> &nbsp;Nomor</td>
                    <td style="width : 1%">: </td>
                    <td style="width : 24%">&nbsp;Nomor Surat</td>                
                </tr>
                <tr>
                    <td style="width : 15%;"> &nbsp;No Rekening</td>
                    <td style="width : 1%">: </td>
                    <td style="width : 24%">&nbsp;Nomor Surat</td>
                </tr>
            </table>
        </page_header>
        <br><br><br><br><br>
            <!--====================================================Nama Surat=====================================================================-->
            <table style="margin-top: 3%; width: 100%">
                <tr style="text-align: center;">
                    <!-- TANDA BUKTI PEMBAYARAN SEMENTARA -->
                    <td style="width: 100%">TANDA BUKTI PEMBAYARAN SEMENTARA</td>
                </tr>
            </table>

            <!--====================================================Isi Surat=====================================================================-->
            <table style="width: 70%; border-left: none; margin-left: 40px; margin-top: 2%;">
                <tr>
                    <td style=" width: 25%;">TERIMA DARI</td>
                    <td style=" width: 1%">: </td>
                </tr>
            </table>
            <table style="width: 70%; border-left: none; margin-left: 40px;">
                <tr>
                    <td style="width: 25%">Nama</td>
                    <td style="width: 1%">: </td>
                    <td><?=$ahliWaris->nama_ahli_waris?></td>
                </tr>
            </table>
            <table style="width: 70%; border-left: none; margin-left: 40px;">
                <tr>
                    <td style="width: 25%">Alamat</td>
                    <td style="width: 1%">: </td>
                    <td><?=$ahliWaris->alamat_w?></td>
                </tr>
            </table>
            <table style="width: 70%; border-left: none; margin-left: 40px;">
                <tr>
                    <td style="width: 25%">Uang Sebesar</td>
                    <td style="width: 1%">: </td>
                    <td style="width: 5%; text-align: left;">Rp.</td>
                    <td style="width: 15%; text-align: left;"><?=number_format($tpu->harga_sewa, 2, ',', '.')?> </td>
                </tr>
            </table>
            <table style="margin-left: 40px;">
                <tr>
                    <td>Sebagai pembayaran Retribusi Pemakaman</td>
                </tr>
            </table>
            <table style="width: 70%; border-left: none; margin-left: 40px;">
                <tr>
                    <td style="width: 25%">Almarhum</td>
                    <td style="width: 1%;">: </td>
                    <td><?=$jenazah->nama_jenazah?></td>
                    <td style="width: 5%"><?=$jenazah->jenis_kelamin=='laki-laki'?'L':'P'?></td>
                    <td style="width: 7%">Umur</td>
                    <td style="width: 1%">: </td>
                    <td style="width: 5%"><?=(date('Y') - date('Y', strtotime($jenazah->tanggal_lahir)))?></td>
                    <td>tahun</td>
                </tr>
            </table>
            <table style="width: 70%; border-left: none; margin-left: 40px;">
                <tr>
                    <td style="width: 25%">Dimakamkan Blok</td>
                    <td style="width: 1%">: </td>
                    <td><?=$jenazah->iDMAKAM->LETAK_MAKAM?></td>
                    <td style="width: 15%; text-align: right;">Nomor</td>
                    <td style="width: 1%">: </td>
                    <td ><?=$jenazah->iDMAKAM->NO_MAKAM?></td>
                    <td style="width: 15%;">Tanggal</td>
                    <td style="width: 1%;">: </td>
                    <td><?=$jenazah->tgl_pemakaman?></td>
                </tr>
            </table><br>

        </page>