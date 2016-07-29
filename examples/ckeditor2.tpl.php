<?php require(__DOCROOT__ . __EXAMPLES__ . '/includes/header.inc.php'); ?>
<script>
	ckConfig = {
		language: 'fr',
		uiColor: '#9AB8F3'
	};
</script>


	<?php $this->RenderBegin(); ?>

	<div class="instructions">
		<h1 class="instruction_title">QCKEditor: Implementation of the CKEditor HTML editor.</h1>
		<p>
		<b>QCKEditor</b> implements the <a href="http://ckeditor.com">CKEditor HTML editor</a>. It allows you
		to create a text editing block with full HTML editing capabilities. The text returned from it is HTML.
		</p>
		<?php $this->txtEditor->Render(); ?>
		<?php $this->btnSubmit->Render(); ?>
		<h3>The HTML you typed:</h3>
		<?php $this->pnlResult->Render(); ?>
	</div>

<?php $this->RenderEnd(); ?>
<?php require(__DOCROOT__ . __EXAMPLES__ . '/includes/footer.inc.php'); ?>