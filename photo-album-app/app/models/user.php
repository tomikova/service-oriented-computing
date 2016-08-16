<?php

class User extends Eloquent {
    public static $unguarded = true;
	public $table = 'users';
}