<?php

namespace App\Livewire;

use Livewire\Component;

class LikeButton extends Component
{
    public $likes = 0;
    public $hasLiked = false;

    public function mount()
    {
        // Mengambil jumlah like nyata dari cache server (menyimpan data secara persisten)
        $this->likes = \Illuminate\Support\Facades\Cache::get('portfolio_likes_count', 42); // 42 sebagai base awal yang realistis
        
        // Mengecek apakah user ini (berdasarkan sesi browser) sudah pernah like
        $this->hasLiked = session()->has('has_liked_portfolio');
    }

    public function increment()
    {
        if (!$this->hasLiked) {
            // Tambahkan like ke database/cache
            $this->likes++;
            \Illuminate\Support\Facades\Cache::put('portfolio_likes_count', $this->likes);
            
            // Tandai sesi browser user ini bahwa dia sudah nge-like
            $this->hasLiked = true;
            session()->put('has_liked_portfolio', true);
        } else {
            // Batalkan like
            $this->likes = max(0, $this->likes - 1);
            \Illuminate\Support\Facades\Cache::put('portfolio_likes_count', $this->likes);
            
            // Hapus tanda dari sesi
            $this->hasLiked = false;
            session()->forget('has_liked_portfolio');
        }
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
