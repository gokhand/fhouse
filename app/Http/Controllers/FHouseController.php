<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\FhousePost;

class FHouseController extends Controller
{
	protected $post;

    public function __construct(FhousePost $post)
    {
    	$this->post = $post;
    }

    public function report()
    {
    	$report = $this->post->report();

    	return view('report', compact('report'));
    }

    public function transactions()
    {
    	$transactions = $this->post->transactionList();

    	return view('transactions', compact('transactions'));
    }

    public function singleTransaction($transactionId)
    {
    	$transaction = $this->post->getTransaction($transactionId);

    	return view('transaction', compact('transaction'));
    }
}