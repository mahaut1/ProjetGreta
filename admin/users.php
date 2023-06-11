<?php
include_once "../view/header-admin.php"
?>
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Utilisateurs</h1>
                <a href="http://localhost/ProjetGreta/admin/user/add" class="btn btn-primary text-white">Ajouter</a>
                <a href="http://localhost/ProjetGreta/admin/user/import" class="btn btn-primary text-white">Import</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($membres as $m) { ?>
                        <tr>
                            <th scope="row"><?= $m['id_membre'] ?></th>
                            <td><?= $m['email'] ?></td>
                            <td>
                                <a class="btn btn-danger text-white" href="http://localhost/ProjetGreta/admin/user/del?id=<?= $u['id_membre'] ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>