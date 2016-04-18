<?php
class Kalendar extends Connection
{
	public $nazev = '';
	private $timestamp1 = 0;
	public $date1 = '';
	public $hod1 = '';
	public $min1 = '';
	private $timestamp2 = 0;
	public $date2 = '';
	public $hod2 = '';
	public $min2 = '';
	private $_err = array();
	public $odkaz = '';
	public $misto = '';
	public $popis = '';

	public function checkNazev($new)
	{
		$this->nazev = \Library\Admin\safeText($new);
		
		if (strlen($this->nazev) == 0) {
			$this->_err[] = 'Není vyplněný název.';
		}
		if (strlen($this->nazev) > 255) {
			$this->_err[] = 'Vyplněný název je příliš dlouhý.';
		}
	}
	
	public function checkDate1($date, $hod, $min)
	{
		$this->date1 = \Library\Admin\safeText($date);
		$this->hod1 = \Library\Admin\safeText($hod);
		$this->min1 = \Library\Admin\safeText($min);
		
		if (strlen($this->hod1) == 1) {
			$this->hod1 = '0'.$this->hod1;
		}
		if (strlen($this->hod1) > 2  || $this->hod1 > 23) {
			$this->_err[] = 'Špatý formát datumu.';
			return;
		}
		if (strlen($this->min1) == 1) {
			$this->min1 = '0'.$this->min1;
		}
		if (strlen($this->min1) > 2  || $this->min1 > 59) {
			$this->_err[] = 'Špatý formát datumu.';
			return;
		}
		
		if (strtotime($this->date1) == 0) {
			$this->_err[] = 'Špatý formát datumu.';
		} else {
			if ($this->hod1 == '' && $this->min1 == '') {
				$this->timestamp1 = strtotime($this->date1);
			} else if ($this->hod1 != '' && $this->min1 == ''){
				$this->timestamp1 = strtotime($this->date1.'T'.$this->hod1.':00:00');
			} else {
				$this->timestamp1 = strtotime($this->date1.'T'.$this->hod1.':'.$this->min1.':00');
			}
			
			if ($this->timestamp1 == 0) {
				$this->_err[] = 'Špatý formát datumu.';
			}
		}
	}
	
	public function checkDate2($date, $hod, $min)
	{
		$this->date2 = \Library\Admin\safeText($date);
		$this->hod2 = \Library\Admin\safeText($hod);
		$this->min2 = \Library\Admin\safeText($min);
		
		if (strlen($this->hod2) == 1) {
			$this->hod2 = '0'.$this->hod2;
		}
		if (strlen($this->hod2) > 2 || $this->hod2 > 23) {
			$this->_err[] = 'Špatý formát datumu.';
			return;
		}
		if (strlen($this->min2) == 1) {
			$this->min2 = '0'.$this->min2;
		}
		if (strlen($this->min2) > 2 || $this->min2 > 59) {
			$this->_err[] = 'Špatý formát datumu.';
			return;
		}
		
		if ($this->hod2 == '' && $this->min2 == '') {
			$this->timestamp2 = strtotime($this->date2);
		} else if ($this->hod2 != '' && $this->min2 == ''){
			$this->timestamp2 = strtotime($this->date2.'T'.$this->hod2.':00:00');
		} else {
			$this->timestamp2 = strtotime($this->date2.'T'.$this->hod2.':'.$this->min2.':00');
		}		
	}
	
	public function checkOdkaz($new)
	{
		$this->odkaz = \Library\Admin\safeText($new);
	
		if ($this->odkaz != "") {
			if (!filter_var($this->odkaz, FILTER_VALIDATE_URL) === false) {
			} else {
				$this->odkaz = 'http://' . $this->odkaz;
			}
		}
	
		if (strlen($this->odkaz) > 255) {
			$this->_err[] = 'Odkaz je příliš dlouhý!';
		}
	}
	
	public function checkMisto($new)
	{
		$this->misto = \Library\Admin\safeText($new);
	
		if (strlen($this->misto) > 255) {
			$this->_err[] = 'Místo je příliš dlouhé!';
		}
	}
	public function checkPopis($new)
	{
		$this->popis = \Library\Admin\safeText($new);
	
		if (strlen($this->popis) > 255) {
			$this->_err[] = 'Místo je příliš dlouhé!';
		}
	}
	
	public function getErrors()
	{
		return $this->_err;
	}
	
	public function checkTimes()
	{
		if ($this->timestamp2 != 0 && $this->timestamp1 > $this->timestamp2) {
			$this->timestamp1 = $save;
			$this->timestamp1 = $this->timestamp2;
			$this->timestamp2 = $save;
		}
		
		if ($this->timestamp1 == 0) {
			$this->_err[] = 'Musí být správné datum!';
		}
	}
	
	public function saveNewEvent()
	{
		//TODO: save into DB;
		echo 'ok';
	}
}