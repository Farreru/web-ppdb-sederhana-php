function pending(id) {
  Swal.fire({
    title: "Pemberitahuan!",
    text: "Anda yakin ingin Pending Peserta ini?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "OK",
    cancelButtonText: "Batal",
  }).then(function (result) {
    // Reload the window after the user clicks on the confirmation button
    if (result.isConfirmed) {
      $.ajax({
        url: `../function/action.php?class=updateStatusPendaftaranByID`,
        method: "post",
        data: { id: id, status: 1 },
        success: function (response) {
          console.log(response);

          Swal.fire({
            title: "Berhasil",
            text: "Peserta berhasil dipending!",
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

function tolak(id) {
  Swal.fire({
    title: "Pemberitahuan!",
    text: "Anda yakin ingin Menolak Peserta ini?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "OK",
    cancelButtonText: "Batal",
  }).then(function (result) {
    // Reload the window after the user clicks on the confirmation button
    if (result.isConfirmed) {
      $.ajax({
        url: `../function/action.php?class=updateStatusPendaftaranByID`,
        method: "post",
        data: { id: id, status: 3 },
        success: function (response) {
          console.log(response);

          Swal.fire({
            title: "Berhasil",
            text: "Peserta berhasil ditolak!",
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

function terima(id) {
  Swal.fire({
    title: "Pemberitahuan!",
    text: "Anda yakin ingin Menerima Peserta ini?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "OK",
    cancelButtonText: "Batal",
  }).then(function (result) {
    // Reload the window after the user clicks on the confirmation button
    if (result.isConfirmed) {
      $.ajax({
        url: `../function/action.php?class=updateStatusPendaftaranByID`,
        method: "post",
        data: { id: id, status: 2 },
        success: function (response) {
          console.log(response);

          Swal.fire({
            title: "Berhasil",
            text: "Peserta berhasil diterima!",
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

function hapus_pendaftaran(id) {
  Swal.fire({
    title: "Pemberitahuan!",
    text: "Anda yakin ingin Menerima Peserta ini?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "OK",
    cancelButtonText: "Batal",
  }).then(function (result) {
    // Reload the window after the user clicks on the confirmation button
    if (result.isConfirmed) {
      $.ajax({
        url: `../function/action.php?class=hapusPendaftaranByID`,
        method: "post",
        data: { id: id },
        success: function (response) {
          console.log(response);

          Swal.fire({
            title: "Berhasil",
            text: "Peserta berhasil dihapus!",
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
