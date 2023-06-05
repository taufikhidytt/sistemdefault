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
                <a href="<?= base_url('kategori')?>" class="btn btn-secondary btn-sm">
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
                    <input type="hidden" name="id_kategori" id="id_kategori" value="<?= $data->id_kategori ?>">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-box"></i></span>
                        </div>
                        <input type="text" class="form-control <?= form_error('nama_kategori') ? 'is-invalid' : null?>" id="nama_kategori" name="nama_kategori" placeholder="Masukan Nama Kategori" value="<?= $this->input->post('nama_kategori') ?? $data->nama_kategori?>">
                    </div>
                    <span class="text-red"><?= form_error('nama_kategori')?></span>
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
</script>