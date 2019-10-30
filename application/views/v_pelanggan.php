<!-- <section id="main-content"> -->
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Data Pelanggan
    </div>
    
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th >ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No KWH</th>
            <th>Username</th>
            <th>Password</th>
            <th>Daya</th>
            <th >Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $no=0;
            foreach ($data_pelanggan as $dt_pelanggan){
                $no++;
                echo '<tr data-expanded="true">
                <td>'.$no.'</td>
                <td>'.$dt_pelanggan->id_pelanggan.'</td>
                <td>'.$dt_pelanggan->nama_pelanggan.'</td>
                 <td>'.$dt_pelanggan->alamat.'</td>
                  <td>'.$dt_pelanggan->nomor_kwh.'</td>
                <td>'.$dt_pelanggan->username.'</td>
                <td>'.$dt_pelanggan->password.'</td>
                <td>'.$dt_pelanggan->daya.'</td>
                <td><a href="#update_pelanggan" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_pelanggan->id_pelanggan.')">Update</a> <a href="'.base_url('index.php/pelanggan/hapus_pelanggan/'.$dt_pelanggan->id_pelanggan).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a></td>
             </tr>';
            }
            ?>
            
          
        </tbody>
      </table>
      <?php 
                  if($this->session->flashdata('pesan')!=null){
                    echo '<div class="alert alert-success">'.$this->session->flashdata('pesan').'</div>';
                  }
                ?>
    </div>
  </div>
</div>
</section>