<?php 
	
use yii\grid\GridView;
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	<th>#</th>
                <th>Nama Lokasi</th>
                <th>Luas Lahan</th>
                <th>Harga Sewa</th>
                <th>Alamat Lokasi</th>
                <th>Jumlah Makam</th>

            </tr>
        </thead>
        <tbody>
        	<?php 
        		$i=0;

        		foreach ($dataPemakaman as $key => $value) {?>
            <tr>
                <td><?=($i+1)?></td>
                <td><?=$value['nama_lokasi'] ?></td>
                <td><?=$value['luas_lahan'] ?></td>
                <td><?=$value['harga_sewa'] ?></td>
                <td><?=$value['alamat_lokasi'] ?></td>
                <td><?=$value['jumlah_makam'] ?></td>
                <td>
                	<a href="view">
          					<span class="glyphicon glyphicon-eye-open"></span>
        			</a>
        		</td>
        			
            </tr>
            <?php
            	$i++;
             } ?>
        </tbody>
    </table>

    

