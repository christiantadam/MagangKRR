@extends('layouts.appAdStar')
@section('content')

<link href="{{ asset('css/AdStar/CpTbl.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<style>
    /* Gaya untuk modal */
    .modal {
        display: none;
        /* Sembunyikan modal secara default */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        /* Latar belakang gelap transparan */
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        width: 1000px;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        size: 100%;
        cursor: pointer;
    }
</style>

<h2>Form Copy Tabel </h2>


<div class="container">
    <div class="card">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Product name :</div>
            <div class="col-lg-2">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option2">StarPark
                    <label class="form-check-label" for="radio1"></label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">AdStar
                    <label class="form-check-label" for="radio2"></label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Model :</div>
            <div class="col-lg-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="check1" name="option2" value="something">
                    <label class="form-check-label">Top Open</label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-check"><label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="check2" name="option2" value="something">
                    <label class="form-check-label">Top Close</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Desing For :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idcust' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namacust' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_customer">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Product Type :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idcust' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namacust' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_customer">
                        List Type
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <h3 class="card-title">Copy to</h3>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Desing For :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idcust' class="form-control" placeholder="" aria-label="" readonly>
                    <input type="text" id='namacust' class="form-control" placeholder="" aria-label="" readonly>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_customer">
                        ...
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Product Type :</div>
            <div class="col-lg-5">
                <div class="input-group mb-3">
                    <input type="text" id='idcust' class="form-control" placeholder="" aria-label="" readonly>
                        --
                    <input type="text" id='namacust' class="form-control" placeholder="" aria-label="" readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">
                <button class="btn btn-primary">Copy</button>
            </div>
        </div>
    </div>
</div>

    {{-- <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>

    <script>
        var ButtonDivisi = document.getElementById('ButtonDivisi')

        ButtonDivisi.addEventListener("click", function(event) {
            event.preventDefault();
        });

        var ButtonKelut = document.getElementById('ButtonKelut')

        ButtonKelut.addEventListener("click", function(event) {
            event.preventDefault();
        });

        var ButtonKelompok = document.getElementById('ButtonKelompok')

        ButtonKelompok.addEventListener("click", function(event) {
            event.preventDefault();
        });

        var ButtonSubKelompok = document.getElementById('ButtonSubKelompok')

        ButtonSubKelompok.addEventListener("click", function(event) {
            event.preventDefault();
        });

        var ButtonType = document.getElementById('ButtonType')

        ButtonType.addEventListener("click", function(event) {
            event.preventDefault();
        });

        function openModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
        }

        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
        }

        function openModal1() {
            var modal = document.getElementById('myModal1');
            modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
        }

        function closeModal1() {
            var modal = document.getElementById('myModal1');
            modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
        }


        function openModal2() {
            var modal = document.getElementById('myModal2');
            modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
        }

        function closeModal2() {
            var modal = document.getElementById('myModal2');
            modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
        }


        function openModal3() {
            var modal = document.getElementById('myModal3');
            modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
        }

        function closeModal3() {
            var modal = document.getElementById('myModal3');
            modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
        }


        function openModal4() {
            var modal = document.getElementById('myModal4');
            modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
        }

        function closeModal4() {
            var modal = document.getElementById('myModal4');
            modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
        }

        $(document).ready(function() {
            $('#TableType').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });

        $(document).ready(function() {
            $('#TableSubKelompok').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });

        $(document).ready(function() {
            $('#TableKelompok').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });

        $(document).ready(function() {
            $('#TableKelut').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });

        $(document).ready(function() {
            $('#TableDivisi').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });


<!-- Modal customer asal-->
<div class="modal fade" id="mdl_customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_customer" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_customer">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_customer" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Namacust</th>
                        <th>IDCUST</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataCust as $data)
                        <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                            <td>{{ $data->NamaCust }}</td>
                            <td>{{ $data->IDCust }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

<!-- Modal customer product type-->
<div class="modal fade" id="mdl_customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_customer" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_customer">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_customer" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Barang</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody>
                    // @foreach ($dataCust as $data)
                    //     <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                    //         <td>{{ $data->NamaCust }}</td>
                    //         <td>{{ $data->IDCust }}</td>
                    //     </tr>
                    // @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

<!-- Modal customer tujuan-->
<div class="modal fade" id="mdl_customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl_customer" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl_customer">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tbl_customer" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Namacust</th>
                        <th>IDCUST</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataCust as $data)
                        <tr data-namacust="{{ $data->NamaCust }}" data-idcust="{{ $data->IDCust }}">
                            <td>{{ $data->NamaCust }}</td>
                            <td>{{ $data->IDCust }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
    </script> --}}
@endsection
