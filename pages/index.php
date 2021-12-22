<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container">
    <form id="form">
      <div class="form-group">
        <label for="data-1">Input</label>
        <textarea class="form-control" id="data-1" rows="3"></textarea>
      </div>
      <button class="btn btn-primary">
        Submit
      </button>
      <button class="btn btn-danger" type="button" id="stop-button">
        Stop
      </button>
    </form>
  
    <div id="response">
  
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <script>
    let formData = []
    let sentIndex = 0
    let isStopped = false

    $('#form').submit(function (e) {
      e.preventDefault()

      formData = $('#data-1').val().split('\n')
      sentIndex = 0
      submitAjax()
    })

    $('#stop-button').on('click', function () {
      isStopped = true
    })

    function submitAjax() {
      const data = formData[sentIndex]

      $.ajax({
        method: 'POST',
        url: '/endpoint-a',
        data: {
          data,
        },
        success: function (res) {
          $('#response').append(`
            <div>${res}</div>
          `)

          sentIndex++

          if (!isStopped && sentIndex < formData.length) submitAjax();
        },
      })
    }
  </script>
</body>

</html>