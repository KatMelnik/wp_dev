<?php

namespace gamma\common;


class Session
{
	const STORAGE_KEY = 'gamma_session';

	function __construct()
	{
		if ( !session_id() )
			session_start();

	}

	public function __isset($key){
		return isset($_SESSION[self::STORAGE_KEY][$key]);
	}

	public function get($key){
		if(isset($this->$key))
			return $_SESSION[self::STORAGE_KEY][$key];

		return null;
	}

	public function set($key, $value){
		$_SESSION[self::STORAGE_KEY][$key] = $value;
	}

	public function remove($key){
		if(isset($this->$key))
			unset($_SESSION[self::STORAGE_KEY][$key]);
	}


	public function getFlash($key){
		$flashMessages = $this->get('flash');


		if( is_array($flashMessages) && isset($flashMessages[$key])){
			$this->removeFlash($key);
			return $flashMessages[$key];
		}

		return null;
	}

	public function setFlash($key, $value){
		$this->set('flash', [$key => $value]);
	}


	public function removeFlash($key){
		unset($_SESSION[self::STORAGE_KEY]['flash'][$key]);
	}


}
