function edit_row(id) {
  // Update the modal's content
  var exampleModal = document.getElementById("exampleModal");
  var modalTitle = exampleModal.querySelector(".modal-title");
  var namaSekolahInput = exampleModal.querySelector(
    'input[name="nama_sekolah"]'
  );
  var alamatInput = exampleModal.querySelector('input[name="alamat"]');
  var noTelpInput = exampleModal.querySelector('input[name="no_telp"]');
  var submitButton = document.getElementById("btn-edit-row");

  modalTitle.textContent = "Edit Row ID: " + id;

  $.ajax({
    url: `../function/action.php?class=getSekolahByID`,
    method: "POST",
    data: { id: id },
    success: function (response) {
      console.log(response);

      // Check if the response contains the expected data
      if (response.nama_sekolah) {
        namaSekolahInput.value = response.nama_sekolah; // Set the value for Nama Sekolah
        alamatInput.value = response.alamat; // Set the value for Alamat Sekolah
        noTelpInput.value = response.no_telp; // Set the value for No Telepon Sekolah
        submitButton.name = `${id}`;
      } else {
        // Handle the case when the data is missing or incorrect
        console.log("Invalid response data");
      }
    },
  });

  // Show the modal
  var modal = new bootstrap.Modal(exampleModal);
  modal.show();
}

function delete_row(id) {
  Swal.fire({
    title: "Pemberitahuan!",
    text: "Anda yakin ingin menghapus data ini?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "OK",
    cancelButtonText: "Batal",
  }).then(function (result) {
    // Reload the window after the user clicks on the confirmation button
    if (result.isConfirmed) {
      $.ajax({
        url: `../function/action.php?class=hapusSekolahByID`,
        method: "post",
        data: { id: id },
        success: function (response) {
          console.log(response);

          Swal.fire({
            title: "Berhasil",
            text: "Data berhasil dihapus",
            icon: "success",
            confirmButtonText: "OK",
          }).then(function (result) {
            // Reload the window after the user clicks on the confirmation button
            if (result.isConfirmed) {
              location.reload(); // Add this line to reload the window
            }
          });
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.status);
          if (jqXHR.status === 0) {
            // Request failed due to network error
            Swal.fire(
              "Gagal",
              "Terjadi kesalahan jaringan. Silakan coba lagi.",
              "error"
            );
          } else if (jqXHR.status === 500) {
            // Request failed with HTTP status code 500 (Internal Server Error)
            Swal.fire(
              "Gagal",
              "Terjadi kesalahan server saat memproses permintaan.",
              "error"
            );
          } else {
            // Request failed with an HTTP status code other than 0 or 500
            Swal.fire(
              "Gagal",
              "Terjadi kesalahan saat memproses permintaan.",
              "error"
            );
          }
        },
      });
    }
  });
}

$("#form-id-edit").submit(function (e) {
  var submitButton = document.getElementById("btn-edit-row");
  e.preventDefault();
  $.ajax({
    url: `../function/action.php?class=editSekolahByID`,
    method: "post",
    data: $(this).serialize() + "&id=" + submitButton.name,
    success: function (response) {
      console.log(response);
      Swal.fire({
        title: "Berhasil",
        text: "Data berhasil diubah!",
        icon: "success",
        confirmButtonText: "OK",
      }).then(function (result) {
        // Reload the window after the user clicks on the confirmation button
        if (result.isConfirmed) {
          location.reload(); // Add this line to reload the window
        }
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.status);
      if (jqXHR.status === 0) {
        // Request failed due to network error
        Swal.fire(
          "Gagal",
          "Terjadi kesalahan jaringan. Silakan coba lagi.",
          "error"
        );
      } else if (jqXHR.status === 500) {
        // Request failed with HTTP status code 500 (Internal Server Error)
        Swal.fire(
          "Gagal",
          "Terjadi kesalahan server saat memproses permintaan.",
          "error"
        );
      } else {
        // Request failed with an HTTP status code other than 0 or 500
        Swal.fire(
          "Gagal",
          "Terjadi kesalahan saat memproses permintaan.",
          "error"
        );
      }
    },
  });
});

$(document).ready(function () {
  $(".add_items").click(function (e) {
    e.preventDefault();
    $("#form-item").prepend(`<div class="row append_items">
    <div class="col-sm-3 mb-3">
        <label> Nama Sekolah </label>
        <input type="text" name="nama_sekolah[]" id="" class="form-control"
            placeholder="Nama Sekolah">
    </div>
    <div class="col-sm-4 mb-3">
        <label> Alamat </label>
        <input type="text" name="alamat[]" id="" class="form-control"
            placeholder="Alamat Sekolah">
    </div>
    <div class="col-sm-3 mb-3">
        <label> No Telepon </label>
        <input type="text" name="no_telp[]" id="" class="form-control"
            placeholder="No Telepon Sekolah">
    </div>
    <div class="col-sm-2 mb-3 d-grid">
        <button class="btn btn-danger remove_items">Remove</button>
    </div>
</div>
                `);
  });
});
$(document).on("click", ".remove_items", function (e) {
  e.preventDefault();
  let row_items = $(this).parent().parent();
  $(row_items).remove();
});

$("#form-id").submit(function (e) {
  e.preventDefault();
  $("#add_items").val("Adding...");
  $.ajax({
    url: "../function/action.php?class=tambahSekolah",
    method: "post",
    data: $(this).serialize(),
    success: function (response) {
      console.log(response);
      $("#add_items").val("Simpan");
      $("#form-id")[0].reset();
      $(".append_items").remove();
      Swal.fire({
        title: "Berhasil",
        text: "Data berhasil ditambahkan",
        icon: "success",
        confirmButtonText: "OK",
      }).then(function (result) {
        // Reload the window after the user clicks on the confirmation button
        if (result.isConfirmed) {
          location.reload(); // Add this line to reload the window
        }
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.status);
      if (jqXHR.status === 0) {
        // Request failed due to network error
        Swal.fire(
          "Gagal",
          "Terjadi kesalahan jaringan. Silakan coba lagi.",
          "error"
        );
      } else if (jqXHR.status === 500) {
        // Request failed with HTTP status code 500 (Internal Server Error)
        Swal.fire(
          "Gagal",
          "Terjadi kesalahan server saat memproses permintaan.",
          "error"
        );
      } else {
        // Request failed with an HTTP status code other than 0 or 500
        Swal.fire(
          "Gagal",
          "Terjadi kesalahan saat memproses permintaan.",
          "error"
        );
      }
    },
  });
});
