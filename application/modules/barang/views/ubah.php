<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1><?= $judul?></h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $judul?></li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url()?>" class="btn btn-secondary btn-sm">
                    <i class="fa fa-reply-all"></i> Back
                </a>
            </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang:</label>
                    <input type="hidden" name="id" id="id" value="<?= $data->id?>">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-box"></i></span>
                        </div>
                        <input type="text" class="form-control <?= form_error('nama_barang') ? 'is-invalid' : null?>" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" value="<?= $this->input->post('nama_barang') ?? $data->nama_barang?>">
                    </div>
                    <span class="text-red"><?= form_error('nama_barang')?></span>
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                        </div>
                        <input type="number" class="form-control <?= form_error('harga_barang') ? 'is-invalid' : null?>" id="harga_barang" name="harga_barang" placeholder="Masukan Harga Barang" value="<?= $this->input->post('harga_barang') ?? $data->harga_barang ?>">
                    </div>
                    <span class="text-red"><?= form_error('harga_barang')?></span>
                </div>
                <div class="form-group">
                    <label for="kategori_barang">Kategori Barang:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-box"></i></span>
                        </div>
                        <select name="kategori_barang" id="kategori_barang" class="form-control <?= form_error('kategori_barang') ? 'is-invalid' : null ?>">
                            <option value="">--Select--</option>
                            <?php $param = $this->input->post('kategori_barang') ?? $data->id_kategori ;?>
                            <?php foreach($kategori->result() as $ktg):?>
                                <option value="<?= $ktg->id_kategori?>" <?= $ktg->id_kategori == $param ? 'selected' : null ?> > <?= $ktg->nama_kategori ?> </option>
                            <?php endforeach;?>
                        </select>
                        
                    </div>
                    <span class="text-red"><?= form_error('kategori_barang')?></span>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check"></i> Submit
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

<script>
    $("#barang").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
</script>