<div class="container mt-5">
<h2 class="pt-3 text-center"><?php echo $mode?> un continent</h2>
    <form action="index.php?uc=continents&action=validForm" method="post" class="col-md-6 offset-md-3 border border-success p-3 rounded">
        <div class="form-group">
            <label for="libelle"> Libellé </label>
            <input type="text" class="form-control"name="libelle" id="libelle" placeholder="Saisir le libellé" value="<?php if($mode == "Modifier") {echo $continent->getLibelle();} ?>">
        </div>
        <div class="form-group">
        <input type="hidden" name="num" id="num" value="<?php if($mode == "Modifier") {echo $continent->getNum();} ?>">
        <div class="row">
            <div class="col"> <a href="index.php?uc=continents&action=list" class="btn btn-dark btn-block"> Revenir a la liste</a></div>
            <div class="col"><button type="submit" class="btn btn-success btn-block"><?php echo $mode?> </button></div>
        </div>
    </form>
</div>