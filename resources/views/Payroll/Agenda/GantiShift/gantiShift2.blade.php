@extends('layouts.appPayroll')
@section('content')


    <nav>
        <ul>
            <li><a href="#page1">Halaman 1</a></li>
            <li><a href="#page2">Halaman 2</a></li>
        </ul>
    </nav>

    <div class="page active" id="page1">
        <h1>Halaman 1</h1>
        <p>Ini adalah konten dari Halaman 1.</p>
    </div>

    <div class="page" id="page2">
        <h1>Halaman 2</h1>
        <p>Ini adalah konten dari Halaman 2.</p>
    </div>
    @endsection
    <script>
        // Mengatur tampilan halaman awal
        document.getElementById("page1").classList.add("active");

        // Mengubah konten ketika link di klik
        document.querySelectorAll("nav a").forEach(function(link) {
            link.addEventListener("click", function(e) {
                e.preventDefault();
                var target = this.getAttribute("href").substr(1);
                document.querySelectorAll(".page").forEach(function(page) {
                    page.classList.remove("active");
                });
                document.getElementById(target).classList.add("active");
            });
        });
    </script>


