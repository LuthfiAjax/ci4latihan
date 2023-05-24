<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>C R U D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container my-5">
        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add"><i class="fa-solid fa-plus"></i> Tambah</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; foreach ($products as $row) : ?>
                    <tr>
                        <th scope="row"><?= $count++; ?></th>
                        <td><?= $row['nama_product']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    CLick
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#edit_<?= $row['id_product']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="/delete/<?= $row['id_product']; ?>" class="dropdown-item text-danger">
                                        <i class="fa-solid fa-trash"></i>Hapus</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- modal add -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/create">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Product</label>
                                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Product</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Product</label>
                                <input type="number" class="form-control" id="harga" name="harga">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal edit -->
        <?php foreach ($products as $row) : ?>
        <div class="modal fade" id="edit_<?= $row['id_product']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/update">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Product</label>
                                <input type="text" class="form-control" id="nama" value="<?= $row['nama_product']; ?>" name="nama" autocomplete="off">
                                <input type="hidden" value="<?= $row['id_product']; ?>" name="id" >
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Product</label>
                                <input type="number" class="form-control" id="jumlah" value="<?= $row['jumlah']; ?>" name="jumlah">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Product</label>
                                <input type="number" class="form-control" id="harga" value="<?= $row['harga']; ?>" name="harga">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>