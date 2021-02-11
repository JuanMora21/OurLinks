<div class="mb-3">
    <!--
    <div class="btn-group" role="group" aria-label="Basic outlined example">
        <button type="button" class="btn btn-outline-primary" id="tipo" name="tipo" onclick="{{ old('tipo', $socialNetwork->tipo ??"") }}">Youtube</button>
        <button type="button" class="btn btn-outline-primary" id="tipo" name="tipo" value="{{ old('tipo', $socialNetwork->tipo ?? "") }}">Facebook</button>
        <button type="button" class="btn btn-outline-primary" id="tipo" name="tipo" value="{{ old('tipo', $socialNetwork->tipo ?? "") }}">Twitter</button>
        <button type="button" class="btn btn-outline-primary" id="tipo" name="tipo" value="{{ old('tipo', $socialNetwork->tipo ?? "") }}">Instagram</button>
      </div>
    -->
    <label for="tipo" class="form-label">Tipo</label>
    <br>
    <label class="radio-inline"> <input type="radio" name="tipo" value="Youtube" {{ (old('tipo') == "Youtube") ? "checked" : ""}} >Youtube</label> <br>
    <label class="radio-inline"> <input type="radio" name="tipo" value="Facebook" {{ (old('tipo') == "Facebook") ? "checked" : ""}} >Facebook</label> <br>
    <label class="radio-inline"> <input type="radio" name="tipo" value="Twitter" {{ (old('tipo') == "Twitter") ? "checked" : ""}} >Twitter</label> <br>
    <label class="radio-inline"> <input type="radio" name="tipo" value="Instagram" {{ (old('tipo') == "Instagram") ? "checked" : ""}} >Instagram</label>
<p></p>
    

</div>
<div class="mb-3">
    <label for="url" class="form-label">Enlace</label>
    <input type="url" class="form-control" id="url" name="url" value="{{ old('url', $socialNetwork->url ?? "") }}">
</div>  