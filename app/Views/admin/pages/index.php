<div class="row">
    <h2 class="page-header text-wrap " id="nav-tabs"><?= $params['titre']?></h2>
    <p>
        <a href="<?= $params['add'] ?>" class="btn btn-success">Ajouter</a>
        <a href="<?= ABSROOT . 'public/admin/index'?>" class="btn btn-info ">Retour</a>
    </p>
</div>


<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Action</td>
    </tr>
    </thead>
    <?php foreach($pages as $post ): ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= $post->titre ?></td>
            <td>
                <a class="btn btn-primary" href="<?= $params['edit'] ?><?= $post->id; ?>">Editer</a>
                <form action="<?= $params['delete'] ?>" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach ; ?>
</table>
