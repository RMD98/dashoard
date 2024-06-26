@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Anggota Dosen Yang Terlibat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{secure_url('/editpkm/ketua')}}/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 mt-2 ml-4 card shadows">
                    <input type="text" hidden class="form-control" id="id" name="id" value="{{$id}}">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama" name="nama" value=""
                        placeholder="Nama">
                    </p>
                    <p><b>NIDN</b>
                        <select onchange="Update()" class="nidn form-control" required name="nidn" id="nidn">
                            <option value=""></option>
                        </select>
                        <!-- <input type="text" class="form-control" id="nidn" name="nidn" value=""
                        placeholder="NIDN"> -->
                    </p>
                    <p><b>Program Studi</b>
                        <select class="form-control" name="prodi" id="prodi">
                            @foreach($prodi as $prodis)
                                <option value="{{$prodis->id}}">{{$prodis->nama}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><b>Jenjang Pendidikan</b>
                        <input type="text" class="form-control" id="pend" name="pend" value=""
                        placeholder="Jenjang Pendidikan">
                    </p>
                    <p><b>Jabatan Fungsional</b>
                        <input type="text" class="form-control" id="jab" name="jab" value=""
                        placeholder="Jabatan Fungsional">
                    </p>
                    <p><b>Golongan</b>
                        <input type="text" class="form-control" id="gol" name="gol" value=""
                        placeholder="Golongan">
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>

@stop
@push('script')
<script>
        var id = document.getElementById("id").value
        $.get(secure_url('/ketuas'), {pkm:id}, function (data, textStatus, jqXHR) { 
            var prod = Object.keys(data)
            console.log(prod.length)
            if(prod.length != 0){
                var newOption = new Option(data.nidn, data.nidn, true, true);
                $('.nidn').append(newOption).trigger('change');
                console.log(newOption);
            }
        })
        function Update(){
            var dt = $('#nidn').val();
            console.log(dt)
            $.get(secure_url('/dosens'), {q:dt}, function (data, textStatus, jqXHR){
                document.getElementById('nama').value = data.nama;
                document.getElementById('nidn').value = data.nidn;
                document.getElementById('pend').value = data.pendidikan;
                document.getElementById('jab').value = data.jab_fungsional;
                document.getElementById('gol').value = data.golongan;
                $(`select[name='prodi'] option[value='${data.prodi}']`).prop('selected',true);
            })
        }
</script>
@endpush