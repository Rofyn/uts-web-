<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "dbhotel";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if (!$koneksi) { //cek koneksi
    die("Tidak terkoneksi ke database");
}
$nama            = "";
$no_kamar        = "";
$jenis_kamar     = "";
$harga           = "";
$deskripsi_kamar = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .mx-auto {
            width:auto
        }

        .card {
            margin-top:10px;
        }

    </style>
</head>

<body>
    <div class="mx-auto">
         <!-- mengeluarkan data -->
        <div class="card">
            <div class="card-header">
                <h2 class="text-center" style="background-color: #808080;">Data Ruangan</h2>     
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">No Kamar</th>
                            <th scope="col">Nama &nbsp;</th>
                            <th scope="col">Jenis Kamar &nbsp;</th>
                            <th scope="col">Harga &nbsp;</th>
                            <th scope="col">Deskripsi Kamar &nbsp;</th>
                            <th scope="col">Aksi &nbsp;</th>
                        </tr>
                        <tbody>
                            <?php
                            $sql2   = "select * from ruangan order by id desc";
                            $q2     = mysqli_query($koneksi,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q2)){
                                $id              = $r2['id'];
                                $no_kamar        = $r2['no_kamar'];
                                $nama            = $r2['nama'];
                                $jenis_kamar     = $r2['jenis_kamar'];
                                $harga           = $r2['harga'];
                                $deskripsi_kamar = $r2['deskripsi_kamar'];

                                ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <td scope="row"><?php echo $no_kamar ?></td>
                                    <td scope="row"><?php echo $nama ?></td>
                                    <td scope="row"><?php echo $jenis_kamar ?></td>
                                    <td scope="row"><?php echo $harga ?></td>
                                    <td scope="row"><?php echo $deskripsi_kamar ?></td>
                                    <td scope="row">
                                        <a href="admin-menu-create.php?op=kembali&id=<?php echo $id?>"><button type="button" class="btn btn-outline-danger">Kembali</button></a> 
                                        <a href="admin-menu-create.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                        <a href="menu-ruangan.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>  
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </thead>    
                </table>
            </div>
        </div>
    </div>    


</body>
</html>