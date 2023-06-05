<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- SweetAlert2 -->
<script src="<?= base_url()?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        </div>
    </div>
    <div class="card-body">
        
        <div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>
        <div id="flashWarning" data-warning="<?= $this->session->flashdata('warning');?>"></div>
        <div id="flashError" data-error="<?= $this->session->flashdata('error');?>"></div>

        <a href="<?= base_url('barang/add')?>" class="btn btn-success btn-sm">
            <i class="fa fa-plus-circle"></i> Tambah Data
        </a>
        <br><br>
        <div class="col-lg-4">
            <form action="<?= base_url()?>" method="post">
                <div class="form-group">
                    <label for="sortir">Jenis Barang :</label>
                    <select name="sortir" id="sortir" class="form-control">
                        <option value="">--Select--</option>
                        <?php foreach($kategori->result() as $dataKategori):?>
                            <option value="<?= $dataKategori->id_kategori?>" <?= set_value('sortir') == $dataKategori->id_kategori ? 'selected' : null ?> ><?= $dataKategori->nama_kategori?></option>
                        <?php endforeach ;?>
                    </select>
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-danger btn-sm">
                    <i class="fa fa-eye"></i> Views
                </button>
            </form>
        </div>
        <br>
        <table class="table table-bordered table-hover text-center" id="barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jenis Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; $total=0; foreach($barang->result() as $data):?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $data->nama_barang;?></td>
                    <td><?= rupiah($data->harga_barang);?></td>
                    <td><?= $data->nama_kategori;?></td>
                    <td>
                        <a href="<?= base_url('barang/ubah/'.$data->id)?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-alt"></i>
                        </a>    |
                        <form action="<?= base_url('barang/del')?>" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= $data->id?>">
                                <button class="btn btn-sm btn-danger" id="form-delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <?php $total += $data->harga_barang?>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Jumlah</td>
                    <td colspan="3" class="text-left"><?= rupiah($total)?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
    <!-- <div class="card-footer">
        Footer
    </div> -->
    <!-- /.card-footer-->
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

    var flashsuccess = $('#flashSuccess').data('success');
    var flashwarning = $('#flashWarning').data('warning');
    var flasherror = $('#flashError').data('error');

    if(flashsuccess)
    {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashsuccess,
        })
    }

    if(flashwarning)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashwarning,
        })
    }

    if(flasherror)
    {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: flasherror,
        })
    }

    $(document).on('click', '#form-delete', function(e){
        e.preventDefault();
        var link = $(this).parent('form');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Hapus Data Ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                link.submit();
            }
        })
    });
</script>