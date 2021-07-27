<div class="container mt-5">
    <div class="col-12">
        <h1 class="mb-5">Data Barang</h1>
        <a href="#form" onclick="submit('tambah')" data-toggle="modal" class="btn btn-primary rounded-0 mb-5">Tambah Data</a>
        <table class="table table-bordered" id="table_id">
            <thead>
                <th>No</th>
                <th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th>ACTION</th>
            </thead>

            <tbody id="target"></tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">

            <div class="modal-header">
                <h1>TAMBAH DATA</h1>
            </div>
            <div class="modal-body">
                <form class="a-form">
                    <div class="form-group">
                        <label for="kode">Kode Barang:</label>
                        <input type="text" required placeholder="Kode Barang" class="form-control resetable" name="kode_barang" id="kode">
                    </div>
                    <div class="form-group">
                        <label for="nabar">Nama Barang:</label>
                        <input type="text" required placeholder="Nama Barang" class="form-control resetable" name="nama_barang" id="nabar">
                    </div>
                    <div class="form-group">
                        <label for="harbar">Harga Barang:</label>
                        <input type="text" required placeholder="Harga Barang" class="form-control resetable" name="harga" id="harbar">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang:</label>
                        <input type="text" required placeholder="Stok Barang" class="form-control resetable" name="stok" id="stok">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default rounded-0 modalclose">Close <span class="fas fa-times"></span></button>
                <button onclick="tambahData()" id="btn-tambah" class="btn btn-primary rounded-0">Tambah <span class="fas fa-paper-plane"></span></button>
                <button onclick="ubahData()" id="btn-ubah" class="btn btn-primary rounded-0">Ubah <span class="fas fa-wrench"></span></button>

            </div>

        </div>
    </div>
</div>


<?php $this->load->view('javascript'); ?>