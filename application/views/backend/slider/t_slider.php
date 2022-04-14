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
                <form method="post"action="<?= base_url()?>slider/simpan" enctype="multipart/form-data">
                
                <div class="form-group mb-2">
                    <label> Gambar Slider</label><br>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="form-group">
                    <label> Status </label>
                    <select class="form-control" name="status_slider">
                    <option>Aktif</option>
                    <option>Tidak Akfit</option>
                    </select>
                </div>
 
                <div class="form-group">
                <a href="<?= base_url()?>slider" class="btn btn-danger">Batal</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                </form>
            </div>
        </div>
    </div>
        
    </body>
</html> 