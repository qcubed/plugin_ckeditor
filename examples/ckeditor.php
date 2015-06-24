<?php
	require('../../../framework/qcubed.inc.php');

	use QCubed\Plugin\QCKEditor;

	class SampleForm extends QForm {
		protected $txtEditor;

		protected function Form_Create() {
			$this->txtEditor = new QCKEditor($this);
			$this->txtEditor->Text = '<b>Something</b> to start with.';
		}
	}

	SampleForm::Run('SampleForm');
?>