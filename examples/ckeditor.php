<?php
	require('../../../qcubed/qcubed.inc.php');

	use QCubed\Plugin\QCKEditor;

	class SampleForm extends QForm {
		protected $txtEditor;
		protected $btnSubmit;
		protected $pnlResult;

		protected function Form_Create() {
			$this->txtEditor = new QCKEditor($this);
			$this->txtEditor->Text = '<b>Something</b> to start with.';

			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Submit";
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('submit_click'));

			$this->pnlResult = new QPanel($this);
			$this->pnlResult->HtmlEntities = true;
		}

		protected function submit_click($strFormId, $strControlId, $param) {
			$this->pnlResult->Text = $this->txtEditor->Text;
		}
	}

	SampleForm::Run('SampleForm');
