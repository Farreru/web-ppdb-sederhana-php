<!-- MODALS ADD DATA -->
<div class="" id="">
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal  fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Sekolah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" id="form-id">
                    <div class="modal-body">

                        <div id="form-item">
                            <div class="row">
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
                                    <button class="btn btn-success add_items">Add
                                        More</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal FOR EDIT -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" id="form-id-edit">
                <div class="modal-body">

                    <div id="form-item">
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label> Nama Sekolah </label>
                                <input type="text" name="nama_sekolah" id="" class="form-control"
                                    placeholder="Nama Sekolah">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label> Alamat </label>
                                <input type="text" name="alamat" id="" class="form-control"
                                    placeholder="Alamat Sekolah">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label> No Telepon </label>
                                <input type="text" name="no_telp" id="" class="form-control"
                                    placeholder="No Telepon Sekolah">
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="" id="btn-edit-row" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>