<?php
namespace App\ApplicationService;

use Exception;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

use App\ApplicationService\Commands\EventRegistCommand;
use App\ApplicationService\Commands\EventStatusChangeCommand;
use App\ApplicationService\Commands\EventDeleteCommand;

use App\Domain\Entity\EventEntity;
use App\Domain\ValueObject\eventHashCode;
use App\Domain\ValueObject\eventName;
use App\Domain\ValueObject\eventDescription;
use App\Domain\ValueObject\eventStartDatetime;
use App\Domain\ValueObject\eventEndDatetime;

use App\Domain\ValueObject\userId;

use App\Repositories\EventRepository;

class EventApplicationService
{

    public static function addEvent(EventRegistCommand $command) {
        try {
            $event = EventEntity::SetNew(
                eventHashCode::SetNew(userId::SetNew(Auth::user()->id)),
                eventName::SetNew($command->getEventName()),
                eventDescription::SetNew($command->getDescription()),
                eventStartDatetime::SetNew($command->getEventStartDatetime()),
                eventEndDatetime::SetNew($command->getEventEndDatetime())
            );

            $userId = userId::Reconstruct(Auth::user()->id);
            EventRepository::add($userId, $event);

        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function updateEvent($hashcode, EventRegistCommand $command) {
        try {
            // 対象のイベントを検索
            $event = EventRepository::find($hashcode);
            if ($event === null) {
                throw new Exception("event not found.");
            }

            if ($command->getEventName() !== null) {
                $event->setEventName($command->getEventName());
            }

            if ($command->getDescription() !== null) {
                $event->setEventDescription($command->getDescription());
            }

            $userId = userId::Reconstruct(Auth::user()->id);
            EventRepository::save($userId, $event);
            
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function delete(EventDeleteCommand $command) {
        try {
            // 対象のイベントを検索
            $event = EventRepository::find($command->getHashKey());

            if ($event === null) {
                throw new Exception("event not found.");
            }

            EventRepository::delete($event);

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}