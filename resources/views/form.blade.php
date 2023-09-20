<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Indoregion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <h3 class="text-center">Belajar Indoregion</h3>
                            <div class="form-group mb-4">
                                <label for="provinsi">Provinsi :</label>
                                <select class="form-control" id="provinsi">
                                    <option selected class="text-center">-- Pilih Provinsi --</option>
                                    @foreach ($provinces as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="kabupaten">Kabupaten : </label>
                                <select class="form-control" id="kabupaten">
                                    <option selected class="text-center">-- Pilih Kabupaten --</option>

                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="kecamatan">Kecamatan : </label>
                                <select class="form-control" id="kecamatan">
                                    <option selected class="text-center">-- Pilih Kecamatan --</option>

                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="desa">Desa : </label>
                                <select class="form-control" id="desa">
                                    <option selected class="text-center">-- Pilih Desa --</option>

                                </select>
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
        });
        $(function() {
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('kabupaten') }}",
                    data: {id_provinsi: id_provinsi},
                    cache : false,

                    success: function(msg) {
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error', data)
                    },
                });
            })

            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('kecamatan') }}",
                    data: {id_kabupaten: id_kabupaten},
                    cache : false,

                    success: function(msg) {
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error', data)
                    },
                });
            })
            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('desa') }}",
                    data: {id_kecamatan: id_kecamatan},
                    cache : false,

                    success: function(msg) {
                        $('#desa').html(msg);
                    },
                    error: function(data) {
                        console.log('error', data)
                    },
                });
            })
        })
    </script>
  </body>
</html>
