<h1>Safe Redirect Manager Importer</h1>
<p>This tool allows a csv file to be imported into Safe Redirect Manager. Upload the csv file to the media library and past the URL in the field below. The csv should have the following format:</p>
<table class="sri-demo-table">
    <tbody>
    <tr>
        <th>Redirect from</th><th>Redirect to</th><th>type (301 or 302)</th><th>notes (optional)</th>
    </tr>
    <tr>
        <td>/page-name/</td><td>https://newsite.wsu.edu/new-page/</td><td>301</td><td>Some note here....</td>
    </tr>
    <tr>
        <td>/page-name/*</td><td>https://newsite.wsu.edu/new-page/</td><td>302</td><td>Some note here....</td>
    </tr>
</tbody>
</table>
<form method="post" class="sri-import">
    <div class="sri-importer__csv">
        <label for="sri_import_file">CSV File URL:</label>
        <input id="sri_import_file" type="text" name="sri_import_file" value="" />
    </div>
    <button class="button button-primary" type="submit">Import</button>
</form>
<?php if ( ! empty( $imported ) ) : ?>
<h2>Imported:</h2>
<ul class="sri-import-list">
    <?php foreach ( $imported as $import ) : ?>
    <li><?php echo wp_kses_post( $import ); ?></li>
    <?php endforeach; ?>
</ul><?php endif; ?>
<style>
    .sri-import input {
        padding: 0.2rem 0.5rem;
        border: 1px solid #333;
        border-radius: 3px;
        width: 400px;
    }
    .sri-import label {
        color: #1d2327;
        font-weight: 600;
    }
    .sri-importer__csv {
        padding: 2rem 0;
    }
    .sri-demo-table {
        border-collapse: collapse;
    }

    .sri-demo-table th,
    .sri-demo-table td {
        border: 1px solid #333;
        padding: 0.5rem;
    }
</style>