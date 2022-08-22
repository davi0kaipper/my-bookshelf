<form action='<?= $formAction; ?>' method='post' enctype='multipart/form-data'>
    <?php if ($page === 'create'): ?>
        <div class='row mb-3'>
            <label class='col-4 col-form-label' for='cover'>Capa</label>
            <div class='col-8'>
                <input type='file' name='cover' id='cover' class='form-control'>
                <input type='hidden' name='id' id='id' value='<?= $data['id'] ?? ''; ?>'>
            </div>
        </div>
    <?php elseif ($page === 'edit'): ?>
        <div class='row mb-3'>
            <label class='col-4 col-form-label' for='photo'>Capa</label>
            <div class='col-8'>
                <img src='../upload/<?= $data['cover']; ?>'>
                <input type='hidden' name='cover' id='cover' value='<?= $data['cover'] ?? ''; ?>'>
                <input type='hidden' name='id' id='id' value='<?= $data['id'] ?? ''; ?>'>
            </div>
        </div>
    <?php endif; ?>

    <div class='row mb-3'>
        <label class='col-4 col-form-label' for='name'>Título</label>
        <div class='col-8'>
            <input type='text' name='name' id='name' value='<?= $data['name'] ?? ''; ?>' class='form-control'>
        </div>
    </div>

    <div class='row mb-3'>
        <label class='col-4 col-form-label' for='author'>Autor(es)</label>
        <div class='col-8'>
            <input type='text' name='author' id='author' value='<?= $data['author'] ?? ''; ?>' class='form-control'>
        </div>
    </div>

    <div class='row mb-3'>
        <label class='col-4 col-form-label' for='number_of_pages'>Número de páginas</label>
        <div class='col-8'>
            <input type='number' name='number_of_pages' id='number_of_pages' value='<?= $data['number_of_pages'] ?? ''; ?>' class='form-control'>
        </div>
    </div>

    <div class='row mb-3'>
        <div class='col-4'>
            Gênero(s)
        </div>
        <div class='col-8'>
            <div class='form-check'>
                <input type='checkbox' name='genre[]' id='action' value='Ação' <?= checked('Ação', $data['genre'] ?? []); ?> class='form-check-input'>
                <label class='form-check-label' for='action'>Ação</label>
            </div>
            <div class='form-check'>
                <input type='checkbox' name='genre[]' id='academic' value='Acadêmico' <?= checked('Acadêmico', $data['genre'] ?? []); ?> class='form-check-input'>
                <label class='form-check-label' for='academic'>Acadêmico</label>
            </div>
            <div class='form-check'>
                <input type='checkbox' name='genre[]' id='adventure' value='Aventura' <?= checked('Aventura', $data['genre'] ?? []); ?> class='form-check-input'>
                <label class='form-check-label' for='adventure'>Aventura</label>
            </div>
            <div class='form-check'>
                <input type='checkbox' name='genre[]' id='science_fiction' value='Ficção Científica' <?= checked('Ficção Científica', $data['genre'] ?? []); ?> class='form-check-input'>
                <label class='form-check-label' for='science_fiction'>Ficção Científica</label>
            </div>
            <div class='form-check'>
                <input type='checkbox' name='genre[]' id='fantasy' value='Fantasia' <?= checked('Fantasia', $data['genre'] ?? []); ?> class='form-check-input'>
                <label class='form-check-label' for='fantasy'>Fantasia</label>
            </div>
            <div class='form-check'>
                <input type='checkbox' name='genre[]' id='religion' value='Religião' <?= checked('Religião', $data['genre'] ?? []); ?> class='form-check-input'>
                <label class='form-check-label' for='religion'>Religião</label>
            </div>
            <div class='form-check'>
                <input type='checkbox' name='genre[]' id='horror' value='Terror' <?= checked('Terror', $data['genre'] ?? []); ?> class='form-check-input'>
                <label class='form-check-label' for='horror'>Terror</label>
            </div>
        </div>
    </div>
    <div class='row mb-3'>
        <label class='col-4 col-form-label'>Publicação Nacional</label>
        <div class='col-8'>
            <div class='form-check'>
                <input type='checkbox' name='is_national' id='is_national' value='1' <?= checked2($data['is_national']); ?> class='form-check-input'>
            </div>
        </div>
    </div>

    <div class='row mb-3'>
        <label class='col-4 col-form-label' for='publisher'>Editora</label>
        <div class='col-8'>
            <input type='text' name='publisher' id='publisher' value='<?= $data['publisher'] ?? ''; ?>' class='form-control'>
        </div>
    </div>

    <div class='row mb-3'>
        <label class='col-4 col-form-label' for='description'>Descrição</label>
        <div class='col-8'>
            <textarea name='description' id='description' rows='4' class='form-control'><?= $data['description'] ?? ''; ?></textarea>
        </div>
    </div>

    <div class='row d-flex'>
        <button type='submit' class='btn btn-primary w-50 mx-auto'><?= $formSubmit ?></button>
    </div>
</form>
