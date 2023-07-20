<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Events table</h6>
          </div>
        </div>
        <div class="m-4">
          <div class="block">
            <div class="row">
              <div class="col">
                <div class="text-end">
                  <a id="openModalBtn" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Event</a>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive p-0">
            <div class="block-content table-responsive">
              <table class="table align-items-center mb-0 table-striped table-bordered datatable-extended"
                id="table-event">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary font-weight-bolder">No</th>
                    <th class="text-uppercase text-secondary font-weight-bolder">Judul</th>
                    <th class="text-uppercase text-secondary font-weight-bolder">Dari Tanggal</th>
                    <th class="text-uppercase text-secondary font-weight-bolder">Sampa iTanggal</th>
                    <th class="text-uppercase text-secondary font-weight-bolder">Status</th>
                    <th class="text-uppercase text-secondary font-weight-bolder text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<footer class="footer py-4  ">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          ©
          <script>
            document.write(new Date().getFullYear())
          </script>,
          made with <i class="fa fa-heart"></i> by
          <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
          for a better web.
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About
              Us</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Event Baru</h5>
      </div>
      <div class="modal-body">
        <form role="form" id="eventForm" class="text-start">
          <label class="form-label">Judul Event</label>
          <div class="input-group input-group-outline my-1">
            <input type="text" class="form-control" name="judul" id="judul" required>
          </div>
          <label class="form-label">Deskripsi</label>
          <div class="input-group input-group-outline mb-1">
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="10" rows="3"></textarea>
          </div>
          <label class="form-label">Lokasi</label>
          <div class="input-group input-group-outline my-1">
            <input type="text" class="form-control" name="lokasi" id="lokasi" required>
          </div>
          <label class="form-label">status</label>
          <div class="input-group input-group-outline my-1">
            <select class="form-control" name="status" id="status">
              <option value="AKTIF">Aktif</option>
              <option value="TIDAK">Tidak</option>
            </select>
          </div>
          <label class="form-label">Dari Tanggal</label>
          <div class="input-group input-group-outline my-1">
            <input type="date" class="form-control" name="dari_date" id="dari_date" required>
          </div>
          <label class="form-label">Sampai Tanggal</label>
          <div class="input-group input-group-outline my-1">
            <input type="date" class="form-control" name="sampai_date" id="sampai_date" required>
          </div>
      </div>
      <input type="text" class="form-control" name="id_event" id="id_event" hidden>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" onclick="closeModal()">Close</button>
        <button type="submit" class="btn btn-primary" onclick="submitEvent()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script>
  function submitEvent() {
    var formData = $("#eventForm").serialize();
    $.ajax({
      type: "POST",
      url: base_url + 'back/event/create_event',
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
          $('#table-event').DataTable().ajax.reload();
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

  function openModal(id) {
    $.get(base_url + 'back/event/data_event/' + id, function (data) {
      var obj = JSON.parse(data)
      $("#id_event").val(obj.id);
      $("#judul").val(obj.nama);
      $("#status").val(obj.status);
      $("#deskripsi").val(obj.deskripsi);
      $("#dari_date").val(obj.dari_tanggal);
      $("#sampai_date").val(obj.sampai_tanggal);
      $("#exampleModal").modal("show");
    });
  }

  function closeModal() {
    $("#judul").val('');
    $("#status").val('');
    $("#deskripsi").val('');
    $("#dari_date").val('');
    $("#sampai_date").val('');
    $("#exampleModal").modal("hide");
  }
  $(document).ready(function () {
    $("#openModalBtn").on("click", function () {
      $("#exampleModal").modal("show");
    });
  });

  $(document).ready(function () {
    $('#table-event').DataTable({
      "ajax": {
        "url": base_url + 'back/event/table',
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
          'data': 'dari_tanggal'
        },
        {
          'data': 'sampai_tanggal'
        },
        {
          'data': 'status'
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

  function delete_event(id) {
    console.log(id)
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
        $.get(`<?= base_url() . 'back/event/delete_event/' ?>${id}`, function (data) {
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
            $('#table-event').DataTable().ajax.reload();
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