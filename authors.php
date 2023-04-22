<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/authors.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>

  <div class="container mt-5">
    <h1 class="text-center">Authors</h1>

    <div class="row align-items-center mt-5">
      <div class="col-md">
        <div class="card shadow-sm" style="width: 100%">
          <img src="./img/pogi.jpg" alt="" class="card-img-top" />
          <div class="card-body text-center">
            <h5 class="card-title">Kerby Calabar</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#authorModalKerby">See More
            </a>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card shadow-sm" style="width: 100%">
          <img src="./img/bianca.jpg" alt="" class="card-img-top" />
          <div class="card-body text-center">
            <h5 class="card-title">Bianca Nicole Santos</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#authorModalBianca">See More
            </a>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card shadow-sm" style="width: 100%">
          <img src="./img/fedlianne.jpg" alt="" class="card-img-top" />
          <div class="card-body text-center">
            <h5 class="card-title">Fedlianne Rolloda</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#authorModalFedlianne">See More
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3 w-100">
      <button class="btn btn-secondary my-auto" onclick="window.history.back()">
        Go Back
      </button>
    </div>
  </div>

  <div class="modal fade" id="authorModalKerby" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <div class="container-fluid">
            <img src="./img/pogi.jpg" alt="" class="card-img-top rounded-3 mt-4" style="max-width: 320px; max-height: 320px" />
          </div>
          <div style="max-width: 320px; max-height: 320px" class="mx-auto">
            <h5 class="card-title mt-3">Kerby Calabar</h5>
            <p class="text-body mt-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
              non perspiciatis ipsa velit numquam ipsam dolorum cupiditate aut
              molestias neque.
            </p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="authorModalBianca" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <div class="container-fluid">
            <img src="./img/bianca.jpg" alt="" class="card-img-top rounded-3 mt-4" style="max-width: 320px; max-height: 320px" />
          </div>
          <div style="max-width: 320px; max-height: 320px" class="mx-auto">
            <h5 class="card-title mt-3">Bianca Nicole Santos</h5>
            <p class="text-body mt-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
              non perspiciatis ipsa velit numquam ipsam dolorum cupiditate aut
              molestias neque.
            </p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="authorModalFedlianne" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <div class="container-fluid">
            <img src="./img/fedlianne.jpg" alt="" class="card-img-top rounded-3 mt-4" style="max-width: 320px; max-height: 320px" />
          </div>
          <div style="max-width: 320px; max-height: 320px" class="mx-auto">
            <h5 class="card-title mt-3">Fedlianne Rolloda</h5>
            <p class="text-body mt-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
              non perspiciatis ipsa velit numquam ipsam dolorum cupiditate aut
              molestias neque.
            </p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="column">
        <div class="content">
          <img src="./img/pogi.jpg" alt="Kerby" style="width: 100%" />
          <h1>Kerby Calabar</h1>
        </div>
      </div>
      <div class="column">
        <div class="content">
          <img src="./img/fedlianne.jpg" alt="Fedlianne" style="width: 100%" />
          <h1>Fedlianne Rolloda</h1>
        </div>
      </div>
      <div class="column">
        <div class="content">
          <img src="./img/bianca.jpg" alt="Bianca" style="width: 100%" />
          <h1>Bianca Nicole Santos</h1>
        </div>
      </div>
    </div>
 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
    const myModal = document.getElementById("authorModal");
    // const myInput = document.getElementById("myInput");

    myModal.addEventListener("shown.bs.modal", () => {
      // myInput.focus();
    });
  </script>
</body>

</html>