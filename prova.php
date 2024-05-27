<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di prova</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-3">
  <h1>Input di ricerca e selezione obbligatoria</h1>

  <form id="myForm">
    <div class="form-group">
      <label for="exampleDataList" class="form-label">Datalist example (required)</label>
      <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." required>
      <datalist id="datalistOptions">
        <option value="San Francisco">
        <option value="New York">
        <option value="Seattle">
        <option value="Los Angeles">
        <option value="Chicago">
      </datalist>
    </div>
    <button type="submit" class="btn btn-primary" id="send" disabled>Invia</button>
  </form>
</div>

<script>
  const inputDatalist = document.getElementById('exampleDataList');
  const submitButton = document.getElementById('send');

  inputDatalist.addEventListener('input', () => {
    const options = Array.from(document.querySelectorAll('option')).map(opt => opt.value);
    console.log(options)
    
    if (!options.includes(inputDatalist.value)) {
      submitButton.disabled = true;
    } else {
      submitButton.disabled = false;
    }
  });
</script>

</body>

</html>