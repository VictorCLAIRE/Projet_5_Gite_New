<?php
session_start();
ob_start();
require "classes/Model_Gite.php";
$gite = new ModelGite();

    if (isset($_SESSION['connecter_admin']) && $_SESSION['connecter_admin'] == true){
    ?>
        <h1 class="text-center TitreFormAdd">Ajout d'un nouveau logement :</h1>
        <div class="text-center DivFomAdd">
            <form class="DivForm m-5" action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intitule">Intitule du logement :</label>
                            <input class="form-control" required type="text" id="intitule_logement" name="intitule_logement"  >
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="type">Type de logement</label>
                            <select value="" class="form-control" required type="text" id="type_logement" name="type_logement">
                                <?php
                                $gite->LectureTypeLogement();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="etat">Option du logement :</label>
                            <select  class="form-control" required type="text" id="option_logement" name="option_logement">
                                <?php
                                $gite->LectureOptionLogement();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descrpition du logement :</label>
                    <textarea class="form-control" required type="text" id="description_logement" name="description_logement"  ></textarea>
                </div>
                <div class="form-row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="photo_logement">Photo du logement :</label>
                            <input class="form-control" required type="file" id="photo_logement" name="photo_logement" accept="image/png, image/jpeg, image/svg"  >
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="emplacement">Emplacement du logement :</label>
                            <input class="form-control" required type="text" id="emplacement_logement" name="emplacement_logement"  >
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="etat">D??partement du logement :</label>
                            <select  class="form-control" required type="text" id="departement_logement" name="departement_logement">
                                <?php
                                $gite->LectureDepartementLogement();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="chambre">Nombre de chambre du logement :</label>
                            <input class="form-control" required type="number" id="chambre_logement" name="chambre_logement"  >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="sdb">Nombre de salle de bain du logement :</label>
                            <input class="form-control" required type="number" id="sdb_logement" name="sdb_logement"  >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="prix">Prix par nuit du logement :</label>
                            <input class="form-control" required type="number" id="prix_logement" name="prix_logement"  >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="etat">Etat du logement :</label>
                            <select  class="form-control" required type="text" id="etat_logement" name="etat_logement">
                                <?php
                                $gite->LectureEtatLogement();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" name="ajouter btnFormulaireAdd" value="Valider ce nouveau logement" class="btn btn-info m-2">
            </form>
        </div>

        <?php
        if(isset($_POST['ajouter'])){
            $gite->UploadImg();
            $gite->addGite();
        }

    }else{
    header("location:http://localhost/Projet_5_Gite_new/FormulaireConnexion.php");
    }

$content=ob_get_clean();
//Rappel du template sur chaque page
require "views/template.php";
?>