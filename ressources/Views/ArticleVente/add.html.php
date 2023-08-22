<?php

use Mouro\Core\Session;

$errors = [];
if (Session::isset("errors")) {
    $errors = Session::get("errors");
    Session::unset("errors");
}
?>
<style>
    .success-message {
        color: green;
    }

    .error-message {
        color: red;
    }
</style>
<div class="container mt-5">
    <div class="card mt-5">
        <div class="card-body bg-white">
            <h4 class="card-title text-center mb-3"> Ajouter des Articles De Ventes </h4>
            <form class="row g-3" novalidate method="post" action="<?= WEB_ROUTE ?>">
                <input id="qteAppro" type="hidden" name="qteAppro" value="0">
                <input id="idAppro" type="hidden" name="idAppro" value="0">
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip04" class="form-label">Articles Vente</label>
                    <input type="text" class="form-control" name="libelleVente" id="venteInput" value="">
                    <div id="feedbackMessage"></div>
                </div>


                <div class="col-md-6 position-relative">
                    <label for="validationTooltip04" class="form-label">Article</label>
                    <select class="form-select" id="validationTooltip04" name="id">
                        <option selected disabled value="">Selectionnez un article</option>

                    </select>
                    <div class="invalid-tooltip">
                        Please select a valid state.
                    </div>
                </div>



                <div class="col-md-4 position-relative">
                    <label for="validationTooltip02" class="form-label">Quantite</label>
                    <input type="number" class="form-control" name="qteAppro" id="validationTooltip02" value="">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="col-12 btn2">
                    <button class="btn btn-dark" type="submit" name="ok">OK</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Article</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>

                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="col-12">
                    <label for="">Montant :</label>
                    <br>
                    <input type="text" name="montant" value="0">
                </div>
                <div class="col-12">
                    <button class="btn btn-dark" name="Enregistrer" type="submit">Submit form</button>
                </div>
                <input type="hidden" name="path" value="store-appro">
                <div class="modal" tabindex="-1" id="exampleModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="quantiteModal" value="0" id="quantity">
                                <button class="material-symbols-outlined" id="plus">
                                    add_box
                                </button>
                                <button class="material-symbols-outlined" id="minus">
                                    indeterminate_check_box
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary" name="confirmer">Confirmer</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body bg-light">
            <h4 class="card-title">Liste des Categories</h4>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    
</script>