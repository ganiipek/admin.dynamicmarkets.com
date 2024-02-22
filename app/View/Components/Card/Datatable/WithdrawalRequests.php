<?php

namespace App\View\Components\Card\Datatable;

use Illuminate\View\Component;
use App\Http\Services\UserService;

class WithdrawalRequests extends Component
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
        $data = $this->getWithdrawals();
        
        if (isset($data['error'])) {
            return view('components.card.datatable.withdrawal-requests', [
                'error' => true,
                'error_message' => $data['message'],
                'withdrawals' => []
            ]);
        }

        return view('components.card.datatable.withdrawal-requests', [
            'error' => false,
            'withdrawals' => $data
        ]);
    }

    public function getWithdrawals()
    {
        try {
            return $this->userService->getWithdrawals($this->user_id);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
