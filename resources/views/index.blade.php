@extends(Auth::user() ? 'index.login' : 'index.logout');