<div class="container mt-5">
  <div class="row pt-3">
    <div class="col-9"><h2>Liste des nationalités</h2></div>
    <div class="col-3"><a href="formNationalites.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité</a> </div>
  </div>
    <table class="table table-hover table-striped table-dark">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numero</th>
      <th scope="col" class="col-md-5">Libellé</th>
      <th scope="col" class="col-md-3">Continent</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($lesNationalites as $nationalites){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$nationalites->num</td>";
        echo "<td class='col-md-5'>$nationalites->libNation</td>";
        echo "<td class='col-md-3'>$nationalites->libContinent</td>";
        echo "<td class='col-md-2'>
        <a href='formNationalites.php?action=Modifier&num=$nationalites->num' class='btn btn-secondary'><i class='fas fa-pen'></i></a>
        <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalité?' data-suppression='supprimerNationalite.php?num=$nationalites->num' class='btn btn-info'><i class='far fa-trash-alt'></i></a>
        </td>";
        echo "</tr>";
      }
      //supprimerNationalite.php?num=$nationalites->num
      ?>
  </tbody>
  </table>
</div>