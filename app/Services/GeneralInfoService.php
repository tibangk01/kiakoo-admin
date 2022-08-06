<?php

namespace App\Services;

use App\Repositories\GeneralInfoRepository;

class GeneralInfoService
{
    private $generalInfoRepository;


    public function __construct()
    {
        $this->generalInfoRepository = new GeneralInfoRepository;
    }

    public function update($userId, $formData)
    {
        if (!$this->generalInfoRepository->update($userId, $formData)) {
            session()->flash('general_info_update_error', 'Erreur, réessayer plus tard.');
        } else {
            session()->flash('general_info_update_success', 'Vos informations générales on été bien mis à jour.');
        }
    }
}
