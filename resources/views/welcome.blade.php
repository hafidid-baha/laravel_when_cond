<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-6 border rounded p-5">
            <h4>Search For a Personn</h4>
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">name (optional)</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">email (optional)</label>
                    <input name="email" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">age (optional)</label>
                    <input name="age" type="number" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">gender (optional)</label>
                    <select name="gender" class="form-select" aria-label="Default select example">
                        <option selected>null</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</body>

</html>
