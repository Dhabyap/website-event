<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-secondary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2 justify-content-between">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="<?= base_url('static/'); ?>assets/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto text-center">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= $details->nama; ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        <?= tanggal($details->dari_tanggal); ?>
                    </p>
                </div>
            </div>
            <div class="col-auto my-auto ">
                <div class="text-end">
                    <a id="openModalBtn" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Peserta</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-5">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Deskripsi</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                <?= $details->deskripsi; ?>
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <!-- <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                        Name:</strong> &nbsp; Alec M. Thompson</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li> -->
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Location:</strong> &nbsp;
                                    <?= $details->lokasi; ?>
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tanggal
                                        Event:</strong> &nbsp;
                                    <?= tanggal($details->dari_tanggal); ?> -
                                    <?= tanggal($details->sampai_tanggal); ?>
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-facebook fa-lg"></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-7">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0 text-center">Pendaftar</h6>
                        </div>
                        <div class="block-content table-responsive">
                            <table class="table align-items-center mb-0 table-striped table-bordered datatable-extended"
                                id="table-peserta">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Email</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Jenis Kelamin</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Nomor Handphone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                    <div class="avatar me-3">
                                        <img src="<?= base_url('static/'); ?>assets/img/kal-visuals-square.jpg"
                                            alt="kal" class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Sophie B.</h6>
                                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                        href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="<?= base_url('static/'); ?>assets/img/marie.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Anne Marie</h6>
                                        <p class="mb-0 text-xs">Awesome work, can you..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                        href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="<?= base_url('static/'); ?>assets/img/ivana-square.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Ivanna</h6>
                                        <p class="mb-0 text-xs">About files I can..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                        href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="<?= base_url('static/'); ?>assets/img/team-4.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Peterson</h6>
                                        <p class="mb-0 text-xs">Have a great afternoon..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                        href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0">
                                    <div class="avatar me-3">
                                        <img src="<?= base_url('static/'); ?>assets/img/team-3.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                        href="javascript:;">Reply</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
            </div>
            <div class="modal-body">
                <form role="form" id="eventPeserta" class="text-start">
                    <label class="form-label">Nama Event</label>
                    <div class="my-1">
                        <input value="<?= $details->nama ?>" type="text" class="form-control" disabled>
                    </div>
                    <label class="form-label">Nama</label>
                    <div class="input-group input-group-outline my-1">
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <label class="form-label">Email</label>
                    <div class="input-group input-group-outline my-1">
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <label class="form-label">Nomor Handphone</label>
                    <div class="input-group input-group-outline mb-1">
                        <input type="text" class="form-control" name="handphone" id="handphone" required>
                    </div>
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="input-group input-group-outline my-1">
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="">--Pilih--</option>
                            <option value="P">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="id_peserta" id="id_peserta" hidden>
                    <input type="text" class="form-control" value="<?= $details->id; ?>" name="id_event" id="id_event"
                        hidden>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" onclick="closeModal()">Close</button>
                <button type="submit" class="btn btn-primary" onclick="submitPeserta()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#table-peserta').DataTable({
            "ajax": {
                "url": base_url + 'back/event/peserta_table/<?= $details->id ?>',
                "type": "POST",
            },
            "bLengthChange": true,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": true,
            "processing": true,
            "serverSide": false,
            "oLanguage": {
                "sZeroRecords": "Data tidak ditemukan !"
            },
            "order": [
                [0, "asc"]
            ],
            'columns': [
                {
                    'data': 'id',
                    'defaultContent': '',
                    "width": 20,
                },
                {
                    'data': 'nama'
                },
                {
                    'data': 'email'
                },
                {
                    'data': 'gender'
                },
                {
                    'data': 'handphone'
                },
                {
                    'data': 'id_decode'
                },
            ],
            rowCallback: function (row, data, index) {
                var api = this.api();
                $('td:eq(0)', row).html(index + 1 + (api.page() * api.page.len()));
            },
        });
    });
    function submitPeserta() {
        var formData = $("#eventPeserta").serialize();
        $.ajax({
            type: "POST",
            url: base_url + 'back/event/add_event_peserta',
            data: formData,
            dataType: "json",
            success: function (response) {

                if (response.code == 200) {
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #3EC148, #64CE6D)",
                        },
                        onClick: function () { }
                    }).showToast();
                    $('#table-peserta').DataTable().ajax.reload();
                    $("#exampleModal").modal("hide");
                } else {
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #DA2625, #E25150)",
                        },
                        onClick: function () { }
                    }).showToast();
                }
            },
            error: function (xhr, status, error) {
                // Handle any errors that occur during the AJAX request
            }
        });
    }
    $(document).ready(function () {
        $("#openModalBtn").on("click", function () {
            $("#exampleModal").modal("show");
        });
    });

    function closeModal() {
        $("#nama").val('');
        $("#email").val('');
        $("#gender").val('');
        $("#handphone").val('');
        $("#id_peserta").val('');
        $("#exampleModal").modal("hide");
    }

    function openModal(id) {
        $.get(base_url + 'back/event/data_detail_event/' + id, function (data) {
            var obj = JSON.parse(data)
            $("#id_peserta").val(obj.id);
            $("#nama").val(obj.nama);
            $("#email").val(obj.email);
            $("#handphone").val(obj.handphone);
            $("#gender").val(obj.gender);
            $("#exampleModal").modal("show");
        });
    }

    function delete_event(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Data yang di hapus tidak dapat di kembalikan lagi!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.get(`<?= base_url() . 'back/event/delete_detail_event/' ?>${id}`, function (data) {
          let response = JSON.parse(data);
          if (response.code == 200) {
            Toastify({
              text: response.message,
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top",
              position: "right",
              stopOnFocus: true,
              style: {
                background: "linear-gradient(to right, #3EC148, #64CE6D)",
              },
              onClick: function () { }
            }).showToast();
            $('#table-peserta').DataTable().ajax.reload();
          } else {
            Toastify({
              text: response.message,
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top",
              position: "right",
              stopOnFocus: true,
              style: {
                background: "linear-gradient(to right, #DA2625, #E25150)",
              },
              onClick: function () { }
            }).showToast();
          }
        });
      }
    })
  }

</script>