<div class="card-body">
    <div class="card shadow mb-4 border-bottom-success" id="infosiswa" value="0">
        <!-- Card Header - Accordion -->
        <a href="#informasisiswa" class="d-block bg-success border border-success card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-white">Informasi siswa</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="informasisantri">
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <?php foreach ($siswa as $u) : ?>
                            <tr>
                                <td>NISN </td>
                                <td>: <?php echo $u->nisn ?></td>
                            </tr>
                            <tr>
                                <td>Nama siswa</td>
                                <td>: <span id="nm-siswa"><?php echo $u->nama ?></span></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>