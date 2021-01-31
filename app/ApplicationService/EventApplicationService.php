<?php
namespace App\ApplicationService;

use Exception;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

use App\ApplicationService\Commands\EventRegistCommand;
use App\ApplicationService\Commands\StatusChangeCommand;
use App\ApplicationService\Commands\EventDeleteCommand;

use App\Domain\Entity\EventEntity;
use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\eventHashCode;
use App\Domain\ValueObject\eventName;
use App\Domain\ValueObject\eventDescription;
use App\Domain\ValueObject\eventStartDatetime;
use App\Domain\ValueObject\eventEndDatetime;
use App\Domain\ValueObject\status;
use App\Domain\ValueObject\userId;

use App\Repositories\BoardRepository;
use App\Repositories\EventRepository;
use App\Http\DTO\eventDTO;

class EventApplicationService
{

    public static function findEvent($event_hash_key) {
        $event = EventRepository::find($event_hash_key);
        $event = eventDTO::convert($event);

        return $event;
    }

    public static function addEvent(EventRegistCommand $command) {
        try {
            $event = EventEntity::SetNew(
                boardHashCode::Reconstruct($command->getBoardHashCode()),
                eventHashCode::SetNew(userId::SetNew(Auth::user()->id)),
                eventName::SetNew($command->getEventName()),
                eventDescription::SetNew($command->getDescription()),
                eventStartDatetime::SetNew($command->getEventStartDatetime()),
                eventEndDatetime::SetNew($command->getEventEndDatetime()),
                status::SetNew(Config::get('const.status.open')) // デフォルトは「公開」状態
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

            if ($command->getEventStartDatetime() !== null) {
                $event->setEventStartDatetime($command->getEventStartDatetime());
            }

            if ($command->getEventEndDatetime() !== null) {
                $event->setEventEndDatetime($command->getEventEndDatetime());
            }

            $userId = userId::Reconstruct(Auth::user()->id);
            EventRepository::save($userId, $event);
            
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function statusChange(StatusChangeCommand $command) {
        try {
            // 対象のボードを検索
            $event = EventRepository::find($command->getHashKey());

            if ($event === null) {
                throw new Exception("board not found.");
            }

            // ステータス変更
            $event->statusChange($command->getStatus());

            $userId = userId::Reconstruct(Auth::user()->id);
            EventRepository::save($userId, $event);

            return true;
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