<?php

namespace App\View\Components\Card\Datatable;

use Illuminate\View\Component;
use App\Http\Services\UserService;

class TradingAccount extends Component
{
    public $userId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userId) 
    {
        $this->userService = new UserService();
        $this->user_id = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->getTradingAccounts();
        
        if (isset($data['error'])) {
            return view('components.card.datatable.trading-account', [
                'error' => true,
                'error_message' => $data['message'],
                'trading_accounts' => []
            ]);
        }

        return view('components.card.datatable.trading-account', [
            'error' => false,
            'trading_accounts' => $data
        ]);
    }

    public function getTradingAccounts()
    {
        try {
            return $this->userService->getTradingAccounts($this->user_id);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
