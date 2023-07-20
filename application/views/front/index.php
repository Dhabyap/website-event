<section class="utama">
    <div style="position: relative;">
        <div style="position: relative;">
            <img src="<?= base_url() . 'static/image/Rectangle 12.png'; ?>" class="z-0" style="width: 100%;" alt="...">
            <img src="<?= base_url() . 'static/image/Rectangle 10.png'; ?>" class="z-1"
                style="width: 100%; opacity: 0.5; position: absolute; top: 0; left: 0;" alt="...">
        </div>

        <div
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; z-index: 2;">
            <div class="row text-white">
                <div class="col">
                    <h1>Segera Daftarkan Diri Anda</h1>
                    <p>Jangan sia-siakan kesempatan ini sebelum terlambat</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="content mt-5">
    <div class="container">
        <h1 class="text-primary text-center">Upcoming Events</h1>
        <div class="row mt-5">
            <?php foreach($events as $row): ?>
            <div class="col-lg-4 col-12">
                <div class="shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 24rem; padding:25px;">
                    <img src="<?= base_url() . 'static/image/Rectangle.png'; ?>" class="card-img-top" alt="...">
                    <div class="row">
                        <div class="col-3">
                            <div class="card-body" style="padding-left: 20px;">
                                <b>
                                    <p class="text-primary" style="margin-top: 15px"><?= date('F', strtotime($row->dari_tanggal)) ; ?></p>
                                </b>
                                <h1 style="margin-top: -15px; margin-left: -7px;"><?= date('d', strtotime($row->dari_tanggal)) ; ?></h1>
                            </div>
                        </div>
                        <div class="col-9" style="padding: 15px;">
                            <div class="card-body">
                                <p class="card-text fw-bold"><?= $row->nama; ?></p>
                                <p class="text-secondary"><?= $row->deskripsi; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="create">
    <div class="card text-black" style="background-color: lightgrey;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="<?= base_url() . 'static/image/image 3.png'; ?>" style="width: auto;" class="card-img-top"
                        alt="...">
                </div>
                <div class="col-md-3 align-self-center">
                    <h2 class="card-title">Make your own Event </h2>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="d-grid gap-2">
                        <a href="<?= base_url() ?>event" class="btn btn-danger btn-lg">Create Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="support mt-5">
    <div class="container text-center justify-content-center p-5">
        <h1 class="text-primary text-bold">Our Support</h1>
        <p class="text-secondary mt-4">We've had the pleasure of working with industry-defining brands. These are
            just some of them.</p>
    </div>
</section> -->