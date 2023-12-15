function edit_row(id) {
  // Update the modal's content
  var exampleModal = document.getElementById("exampleModal");
  var modalTitle = exampleModal.querySelector(".modal-title");
  var nisn = exampleModal.querySelector('input[name="nisn"]');
  var nama = exampleModal.querySelector('input[name="nama"]');
  var tanggal_lahir = exampleModal.querySelector('input[name="tanggal_lahir"]');
  var tempat_lahir = exampleModal.querySelector('input[name="tempat_lahir"]');
  var alamat = exampleModal.querySelector('input[name="alamat"]');
  var no_telp = exampleModal.querySelector('input[name="no_telp"]');
  var asal_sekolah = exampleModal.querySelector('input[name="asal_sekolah"]');

  var submitButton = document.getElementById("btn-edit-row");

  modalTitle.textContent = "Edit Row ID: " + id;

  $.ajax({
    url: `../function/action.php?class=getSiswaByID`,
    method: "POST",
    data: { id: id },
    success: function (response) {
      console.log(response);

      // Check if the response contains the expected data
      if (response.nisn) {
        nisn.value = response.nisn;
        nama.value = response.nama;
        tanggal_lahir.value = response.tanggal_lahir;
        tempat_lahir.value = response.tempat_lahir;
        alamat.value = response.alamat;
        no_telp.value = response.no_telp;
        asal_sekolah.value = response.asal_sekolah;
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
    text: "Anda yakin ingin menghapus data ini?\nJika anda menghapus data ini maka data orang tua siswa\njuga akan terhapus!",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "OK",
    cancelButtonText: "Batal",
  }).then(function (result) {
    // Reload the window after the user clicks on the confirmation button
    if (result.isConfirmed) {
      $.ajax({
        url: `../function/action.php?class=hapusSiswaByID`,
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
    url: `../function/action.php?class=editSiswaByID`,
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
