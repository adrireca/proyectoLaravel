@include('parciales.head')

<div class="col-md-7 mx-5">
    <h2 class="featurette-heading fw-normal lh-1">Inserción de Pistas</h2>
    <p class="lead">Rellena los datos para crear una nueva pista</p>
</div>
<!--@role('admin')-->
<div class="container-fluid py-5 bg-light m-0">
    <div class="w-50 m-auto">
        <div class="container px-5">
            <form action="/pistas" method="post">
                {{csrf_field()}}
                <p class="lead">Introduce los datos de la pista</p>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name=luz id="flexSwitchCheckDefault" checked value="1">
                    <label class="form-check-label" for="flexSwitchCheckDefault">La pista tiene luz</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name=cubierta id="flexSwitchCheckChecked" value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">La pista está cubierta</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name=disponible id="flexSwitchCheckDisabled" checked value="1">
                    <label class="form-check-label" for="flexSwitchCheckDisabled">La pista esta disponible</label>
                </div>
                <div class="mb-3">
                    <label for="inputPrecio" class="form-label">Precio pista</label>
                    <input type="number" step="0.01" class="form-control" id="inputPrecio" name="precioPista" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="inputPrecio" class="form-label">Precio Luz</label>
                    <input type="number" step="0.01" class="form-control" id="inputPrecio" name="precioLuz" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="selectTipo" class="form-label">Selecciona el tipo de pista</label>
                    <select class="form-select" id="selectTipo" name="tipoPista" aria-label="Default select example">
                        <option value="tenis">Tenis</option>
                        <option value="padel">Pádel</option>
                        <option value="futbol">Fútbol</option>
                        <option value="futbolSala">Fútbol sala</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
