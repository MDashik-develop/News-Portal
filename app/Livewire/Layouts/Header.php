<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use App\Traits\HasBengaliNumbers;

class Header extends Component
{
    use HasBengaliNumbers;

    public $bangla_date;
    public $hijri_date;

    public function mount()
    {
        $city = 'ঢাকা';
        $weekday = $this->convertToBengaliNumbers(
            [
                'Sunday' => 'রবিবার',
                'Monday' => 'সোমবার',
                'Tuesday' => 'মঙ্গলবার',
                'Wednesday' => 'বুধবার',
                'Thursday' => 'বৃহস্পতিবার',
                'Friday' => 'শুক্রবার',
                'Saturday' => 'শনিবার',
            ][date('l', time())]
        );
        $en_date = date('j F Y', time());
        $en_date_bn = $this->convertToBengaliNumbers($en_date);
        $this->bangla_date = "$city, $weekday $en_date_bn";
        $this->hijri_date = $this->getBanglaDate() . ', ' . $this->getHijriDate();
    }

    public function render()
    {
        return view('livewire.layouts.header', [
            'bangla_date' => $this->bangla_date,
            'hijri_date' => $this->hijri_date,
        ]);
    }
}
