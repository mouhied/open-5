<table class="table table-striped text-center ">
    <tr class="table-Secondaire">
        <th>ID</th>
        <th>Titre</th>
        <th>Chapo</th>
        <th>Contenu</th>
        <th>Auteur</th>
        <th>Create_at</th>
        <th colspan="2"><a href="/posts/ajouter" class="btn btn-primary d-block">Ajouter</a></th>
    </tr>
    <?php foreach ($posts as $post) : ?>
      <tr>
        <td class="align-middle">#<?= $post->id ?></td>
        <td class="align-middle"><?= $post->titre ?></td>
        <td class="align-middle"><?= $post->chapo ?></td>
        <td class="align-middle"><?= $post->contenu ?></td>
        <td class="align-middle"><?= $post->auteur ?></td>
        <td class="align-middle"><?= $post->create_at ?></td>
        <td class="align-middle">
          <a href="/posts/modifier/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
        </td>
        <td class="align-middle">
          <form method="POST" action="/admin/supprimePost/<?= $post->id ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
            <button class="btn btn-danger" type="submit">Supprimer</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

</table>