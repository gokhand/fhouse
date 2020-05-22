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

        if ($this->checkDeclined($report)) {
            return redirect('/main/logout');
        } else {
            return view('report', compact('report'));
        }
    	
    }

    public function transactions($page = 1)
    {
        $transactions = $this->post->transactionList($page);
        
        if ($this->checkDeclined($transactions)) {
            return redirect('/main/logout');
        } else {
            $current_page = $transactions->current_page;
            $has_next_page = $transactions->next_page_url;
            $has_previous_page = $transactions->prev_page_url;
            
            return view(
                'transactions', compact(
                    'transactions', 'current_page', 'has_next_page', 'has_previous_page',
                )
            );
        }

    }

    public function singleTransaction($transactionId)
    {
    	$transaction = $this->post->getTransaction($transactionId);

        if ($this->checkDeclined($transaction)) {
            return redirect('/main/logout');
        } else {
            return view('transaction', compact('transaction'));
        }
    }

    public function checkDeclined($response)
    {
    	if(isset($response->status) && $response->status == "DECLINED") {
			return 1;
		} else {
            return 0;
        }
    }
}