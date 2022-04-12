<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"><?= $judul;?></h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post"action="<?= base_url()?>konsumen/update">
                
                <div class="form-group">
                    <input type="text" name="kode_konsumen" value ="<?= $konsumen['kode_konsumen'];?>"class="form-control" readonly>
                    <!-- kode konsumen : disesuaikan dengan nama kolom yang ada di database table konsumen -->
                    <!-- readonly : form kode_konsumen tidak bisa diedit -->

                </div>

                <div class="form-group">
                    <input type="text" name="nama_konsumen" value="<?= $konsumen['nama_konsumen'];?>" class="form-control" placeholder="Input Nama Konsumen" required>
                    
                </div>

                <div class="form-group">
                   <textarea name="alamat_konsumen" class="form-control" cols="30" rows="5" placeholder="Input Alamat Konsumen" required>
                       <?= $konsumen['alamat_konsumen']?>
                   </textarea>
                    
                </div>

                <div class="form-group">
                    <input type="text" name="no_telepon" value="<?= $konsumen['no_telepon'];?>" class="form-control"placeholder="Input No.Telepon  Konsumen" required>
                    <!-- required : menandakan form tersebut wajib diisi -->

                </div>

                <div class="form-group">
                <a href="<?= base_url()?>konsumen" class="btn btn-danger">Batal</a>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>

                </form>
            </div>
        </div>
    </div>
        
    </body>
</html> 