       <div class="main-content container-fluid">
           <div class="page-title">
               <h3>Dashboard</h3>
               <p class="text-subtitle text-muted">Selamat data di sistem pembayaran spp dan buku</p>
           </div>
           <section class="section">
               <div class="row mb-2">
                   <div class="mx-auto">
                       <div class="card mb-3 p-4" style="max-width: 540px;">
                           <div class="row g-0">
                               <div class="col-md-4">
                                   <img src="<?= base_url('assets/assets/images/profile/') . $user['image']; ?>" class="img-fluid rounded-start" alt="...">
                               </div>
                               <div class="col-md-8">
                                   <div class="card-body">
                                       <h5 class="card-title"><?= $user['nama']; ?></h5>
                                       <p class="card-text">
                                           <li>NISN : <?= $user['nisn']; ?></li>
                                       </p>
                                       <p class="card-text">
                                           <li>Tanggal Lahir : <?= $user['tgl_lahir']; ?></li>
                                       </p>
                                       <p class="card-text">
                                           <li>Tempat Lahir : <?= $user['tempat_lahir']; ?></li>
                                       </p>
                                       <p class="card-text">
                                           <li>Tahun Masuk : <?= $user['tahun_masuk']; ?></li>
                                       </p>
                                   </div>
                               </div>
                           </div>
                           <div class="text-center">
                               <a href="<?= base_url('user/detail/') . $user['nisn'] ?>" class="btn btn-primary">Pembayaran</a>
                               <a href="https://drive.google.com/file/d/1FDDDqVKXWd3lpwMHMC8Jg5-ZCzC0iKP_/view?usp=sharing" class="btn btn-primary">Panduan Pembayaran</a>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </div>
       </div>