<?php

namespace App\Services;

use App\Repositories\SpeakersRepository;
use App\Validations\SpeakersValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SpeakersService
{
    /**
     * @var $speaker_repository
     */
    protected $speaker_repository;

    /**
     * SpeakerRepository constructor.
     *
     * @param SpeakerRepository $speakerRepository
     */
    public function __construct(SpeakersRepository $speakerRepository)
    {
        $this->speaker_repository = $speakerRepository;
    }

    public function getAll() {
        return $this->speaker_repository->getAll();
    }

    public function getSpeaker(int $id) {
        return $this->speaker_repository->getById($id);
    }

    public function createSpeaker(array $data) {

        $this->validate = (new SpeakersValidation)->validateSpeaker($data);

        if ($this->validate !== null) {
            return $this->validate;
        }

        $result = $this->speaker_repository->save($data);

        return $result;
    }

    public function updateSpeaker(array $data, int $id) {
        $this->validate = (new SpeakersValidation)->validateSpeaker($data);

        if ($this->validate !== null) {
            return $this->validate;
        }

        try {
            $speaker = $this->speaker_repository->update($data, $id);
        } catch (\Exception $e) {
            $speaker = $e->getMessage();
        }

        return $speaker;
    }

    public function deleteSpeaker(int $id) {

        try {
            $speaker = $this->speaker_repository->delete($id);
        } catch (\Exception $e) {
            $speaker = $e->getMessage();
        }

        return $speaker;
    }
}
